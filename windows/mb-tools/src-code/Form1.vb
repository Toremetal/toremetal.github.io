Imports System.IO
Imports System.Reflection

Public Class Form1
    'My.Application.Info.Version.Major + My.Application.Info.Version.Minor + My.Application.Info.Version.Build + My.Application.Info.Version.Revision
    Public Shared AppRev As Integer = 6
    Public Shared App_Version As String = Application.ProductVersion + "." + AppRev.ToString() ' + "2025.4.2.4"
    Dim Old_Version As String = Application.ProductVersion + "." + (AppRev - 1).ToString() '"2025.4.2.4" 'Application.ProductVersion
    Dim isElevated As Boolean = My.User.IsInRole(ApplicationServices.BuiltInRole.Administrator)
    Dim App_Name As String = Assembly.GetExecutingAssembly.GetName().Name
    Dim App_Path As String = Replace(Assembly.GetExecutingAssembly.Location, App_Name + ".exe", "")
    Dim versionsAvailable As New List(Of String)()
    Dim bootMenuOptions As New List(Of String)()
    Dim bootMenuOptionDetails As New List(Of String)()

    Public CmdOUTPUT As String = ""
    Public currentCmd As String

    Dim ReScanTheBootMenu = False
    Dim ReScanTheDrives = False

    Dim theURL = "https://drive.google.com/uc?id=1A93-nH96C-GiaZm5PcqLHaFlOG8YkfJr?export=download"
    Dim theURL2 = "https://drive.google.com/file/d/1lhb_Jaul1vNfo-K0ZUBUYn7JrPy59NQ5/view?usp=sharing"
    Dim theFile = Chr(34) + App_Path + "boot.sdi" + Chr(34)
    Dim theFile2 = Chr(34) + App_Path + "boot.wim" + Chr(34)

    Enum APP_OPS
        S_BOOT_TOOLS
        S_VHD_TOOLS
        S_DRIVER_TOOLS
        S_REPAIR_TOOLS
        BOOT_DRIVE_FROM_CURRENT_SYSTEM
        BOOT_CURRENT_SYSTEM_FROM_DRIVE
        BOOT_CURRENT_SYSTEM_FROM_DRIVE_ACTIVE
        BOOT_CURRENT_SYSTEM_FROM_DRIVE_ACTIVE_BOOTSECT
        CREATE_WINPE_BOOT_OPTION
    End Enum

    Function Get_UsedDrives()
        Used_Drives.Items.Clear()
        BootableTargetDrive.Items.Clear()
        For Each drive In My.Computer.FileSystem.Drives
            Used_Drives.Items.Add(drive.RootDirectory.Name.ToString().Replace("\", ""))
            BootableTargetDrive.Items.Add(drive.RootDirectory.Name.ToString().Replace("\", ""))
        Next
        Used_Drives.SelectedItem = Used_Drives.Items.Item(My.Computer.FileSystem.Drives.Count - 1)
        BootableTargetDrive.SelectedItem = Used_Drives.Items.Item(My.Computer.FileSystem.Drives.Count - 1)
        Return My.Computer.FileSystem.Drives.Count
    End Function

    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        'Application.EnableVisualStyles()
        Text = Text + "(" + App_Version + ")"
        If Environment.GetCommandLineArgs.Length > 1 Then 'My.Application.CommandLineArgs
            WimFile.Text = Environment.GetCommandLineArgs.ElementAt(1)
        End If
        FolderBrowserDialog1.ShowNewFolderButton = True
        If DriverDialog.DriverFolder.Text = "" Then DriverDialog.DriverFolder.Text = FileIO.SpecialDirectories.Desktop + "\Image-Drivers"
        If Not FileIO.FileSystem.DirectoryExists(MountFolder.Text) Then MountFolder.Text = ""
        If Not FileIO.FileSystem.FileExists(WimFile.Text) Then WimFile.Text = ""
        Validate_Buttons()
        Get_UsedDrives()
        Create_Shortcut_StartMenu()
        Get_WimEditions()
        Get_BootEntries()
    End Sub

    Private Sub BackgroundWorker1_RunWorkerCompleted(sender As Object, e As System.ComponentModel.RunWorkerCompletedEventArgs) Handles BackgroundWorker1.RunWorkerCompleted
        Timer2.Stop()
        ProgressBar1.Visible = False
        UnMountingStatus.Visible = False
        MountingStatus.Visible = False
        LabelDriverStatus.Visible = False
        CreateUSB_OS.Enabled = True
        Validate_Buttons()
        LastCmd.Text = currentCmd.Replace(App_Path, "")
        currentCmd = ""
        If ReScanTheDrives Then Get_UsedDrives()
        If ReScanTheBootMenu Then Get_BootEntries()
        Button16.Enabled = True
        Button18.Enabled = True
        Button20.Enabled = True
        RepairDialog.Button1.Enabled = True
    End Sub

    Private Sub BackgroundWorker1_DoWork(sender As Object, e As System.ComponentModel.DoWorkEventArgs) Handles BackgroundWorker1.DoWork

        Try
            Dim gImages As New Process
            Dim sIm As ProcessStartInfo = gImages.StartInfo
            sIm.FileName = "C:\windows\system32\cmd.exe"
            sIm.Arguments = " /c " + currentCmd + " & exit"
            sIm.RedirectStandardOutput = True
            sIm.UseShellExecute = False
            sIm.CreateNoWindow = True
            gImages.Start()
            While Not gImages.StandardOutput.EndOfStream()
                Dim TmpOUTPUT As String = gImages.StandardOutput.ReadLine().ToString()
                If Not TmpOUTPUT = "" And Not TmpOUTPUT = " " Then CmdOUTPUT = TmpOUTPUT + Environment.NewLine + CmdOUTPUT
            End While
            gImages.WaitForExit()
            If Not gImages.ExitCode = 0 Then
                currentCmd = "ERROR: " + gImages.ExitCode + " | (" + currentCmd + ")"
            End If
        Catch ex As Exception
            currentCmd = ex.Message + ": (" + currentCmd + ")"
        End Try
    End Sub

    Public Function RunTheCmd(Optional ByVal TheMessage As String = "", Optional ByRef TheButtons As MessageBoxButtons = MsgBoxStyle.OkCancel, Optional ByRef TheAnswer As MsgBoxResult = MsgBoxResult.Ok)
        Dim TheMes As String = "Important! Please Confirm the Details are Correct and press ok to proceed." + Environment.NewLine + currentCmd.Replace(App_Path, "")
        If Not TheMessage = "" Then
            TheMes = TheMessage
        End If
        If Not BackgroundWorker1.IsBusy Then
            If MsgBox(TheMes, TheButtons, "™T©ReMeTaL MB-Tools - (Administrator) CMD's") = TheAnswer Then
                LastCmd.Text = currentCmd.Replace(App_Path, "")
                ProgressBar1.Visible = True
                CmdOUTPUT = ""
                Timer2.Start()
                BackgroundWorker1.RunWorkerAsync()
                Return True
            End If
        End If
        Return False
    End Function

    Public Function FolderIsEmpty(TheFolder) As Boolean
        If FileIO.FileSystem.DirectoryExists(TheFolder) Then
            Try
                FolderIsEmpty = FileIO.FileSystem.GetDirectories(TheFolder).Count = 0 And FileIO.FileSystem.GetFiles(TheFolder).Count = 0
            Catch ex As Exception
                FolderIsEmpty = False
            End Try
        Else
            FolderIsEmpty = False
        End If
    End Function

    Public Function Validate_Buttons()
        If Not MountFolder.Text = "" Then
            If Not FolderIsEmpty(MountFolder.Text) Then
                Button1.Enabled = False
                Button2.Enabled = True
                DriverDialog.Button3.Enabled = True
                DriverDialog.InstallDrivers.Enabled = True
                RepairDialog.ButtonRemountImage.Enabled = True
                RepairDialog.Button11.Enabled = True
            ElseIf Not WimFile.Text = "" And FolderIsEmpty(MountFolder.Text) Then
                RepairDialog.ButtonRemountImage.Enabled = False
                RepairDialog.Button11.Enabled = True
                Button1.Enabled = True
                Button2.Enabled = False
                DriverDialog.Button3.Enabled = False
                DriverDialog.InstallDrivers.Enabled = False
            End If
        Else
            Button1.Enabled = False
            Button2.Enabled = False
            DriverDialog.Button3.Enabled = False
            DriverDialog.InstallDrivers.Enabled = False
            RepairDialog.ButtonRemountImage.Enabled = False
            RepairDialog.Button11.Enabled = False
        End If
        If WimFile.Text = "" Then
            Button10.Enabled = False
        Else
            Button10.Enabled = True
        End If
        Return True
    End Function

    Public Function Create_Shortcut_Desktop(Optional ByVal OVERWRITE As Boolean = False) As Boolean
        Dim sCut As String = FileIO.SpecialDirectories.Desktop + "\MB-Tools-v" + App_Version + ".lnk"
        If Not FileIO.FileSystem.FileExists(sCut) Or OVERWRITE Then
            FileIO.FileSystem.WriteAllText(App_Path + "createShortcut.vbs", "Set WshShell = CreateObject(" + Chr(34) + "Wscript.shell" + Chr(34) + ")" + Environment.NewLine + "Set oMyLnk=WshShell.CreateShortcut(" + Chr(34) + sCut + Chr(34) + ")" + Environment.NewLine + "oMyLnk.WindowStyle=4" + Environment.NewLine + "oMyLnk.IconLocation=" + Chr(34) + App_Path + "icon.ico" + Chr(34) + Environment.NewLine + "oMyLnk.TargetPath=" + Chr(34) + App_Path + "MB-Tools.exe" + Chr(34) + Environment.NewLine + "oMyLnk.Save" + Environment.NewLine + "Wscript.quit", False, System.Text.Encoding.Unicode)
            Process.Start(App_Path + "createShortcut.vbs").WaitForExit()
            FileIO.FileSystem.DeleteFile(App_Path + "createShortcut.vbs")
            Return True
        End If
        Return False
    End Function

    Public Function Create_Shortcut_StartMenu(Optional ByVal OVERWRITE As Boolean = False) As Integer
        Dim sCut As String = FileIO.SpecialDirectories.Desktop.Replace("Desktop", "AppData") + "\Roaming\Microsoft\Windows\Start Menu\Programs\™T©ReMeTaL\(Admin)MB-Tools-v" + App_Version + ".lnk"

        Dim oldLink = sCut.Replace(App_Version, Old_Version)
        If Not FileIO.FileSystem.FileExists(sCut) Or OVERWRITE Then

            FileIO.FileSystem.WriteAllText(App_Path + "createShortcut.vbs", "Set WshShell = CreateObject(" + Chr(34) + "Wscript.shell" + Chr(34) + ")" + Environment.NewLine + "Set oMyLnk=WshShell.CreateShortcut(" + Chr(34) + sCut + Chr(34) + ")" + Environment.NewLine + "oMyLnk.WindowStyle=4" + Environment.NewLine + "oMyLnk.IconLocation=" + Chr(34) + App_Path + "icon.ico" + Chr(34) + Environment.NewLine + "oMyLnk.TargetPath=" + Chr(34) + App_Path + "MB-Tools.exe" + Chr(34) + Environment.NewLine + "oMyLnk.Save" + Environment.NewLine + "Wscript.quit", False, System.Text.Encoding.Unicode)
            Process.Start(App_Path + "createShortcut.vbs").WaitForExit()
            FileIO.FileSystem.DeleteFile(App_Path + "createShortcut.vbs")
            'MsgBox("An Admin ShortCut has been added to the Start Menu. Administrator Level is Required for this application to work. By default the application runs at the standard account level in order to protect your device. You must run as Administrator to actually use most functions. Right Click the (admin) ShortCut, Select More, and then Run As Administrator. You must use the NON (admin) application link to check for updates. The administrator level link bypasses checking for updates to protect your device. There is no way to change this. It is necessary for Internet downloaded content to protect downloaded files from being pre-tampered with and injected with malware.")
            If FileIO.FileSystem.FileExists(oldLink) Then
                FileIO.FileSystem.DeleteFile(oldLink)
            End If
        End If
        Return 0
    End Function

    Private Sub WimFile_TextChanged(sender As Object, e As EventArgs) Handles WimFile.TextChanged
        Validate_Buttons()
        EnableApplyMediaBtn()
    End Sub

    Private Sub MountFolder_TextChanged(sender As Object, e As EventArgs) Handles MountFolder.TextChanged
        Validate_Buttons()
    End Sub
    Private Sub MountFolder_Click(sender As Object, e As EventArgs) Handles MountFolder.Click
        If Not FolderBrowserDialog1.ShowDialog = DialogResult.Cancel Then
            MountFolder.Text = FolderBrowserDialog1.SelectedPath
            My.Settings.Save()
        End If
    End Sub

    Private Sub WimFile_Click(sender As Object, e As EventArgs) Handles WimFile.Click
        Dim WimfileStr As String = "IMAGE_" + Date.Now.Date.Month.ToString() + "-" + Date.Now.Date.Day.ToString() + "-" + Date.Now.Date.Year.ToString() + "_" + Date.Now.Date.ToShortTimeString().Replace(":", "-").Replace(" ", "_") + ".wim"
        OpenFileDialog1.Title = "Select an Existing File or Enter a File Name to Create a New File"
        OpenFileDialog1.CheckFileExists = False
        OpenFileDialog1.FileName = WimfileStr
        OpenFileDialog1.Filter = "WIM FILES|*.wim|ESD Files|*.esd"
        If Not OpenFileDialog1.ShowDialog = DialogResult.Cancel Then
            WimFile.Text = OpenFileDialog1.FileName
            My.Settings.Save()
            Get_WimEditions()
        End If
    End Sub

    Function Get_WimEditions()
        If isElevated Then
            If FileIO.FileSystem.FileExists(WimFile.Text) Then
                Dim ImageCount = 0
                Dim ImageOptions As String = ""
                Dim ImagesInformation As String = ""
                Selected_Index.Items.Clear()
                For Item = 1 To 2
                    Dim gImages As New Process
                    Dim sIm = gImages.StartInfo
                    sIm.FileName = "C:\windows\system32\cmd.exe"
                    sIm.Arguments = " /c Dism.exe /Get-ImageInfo /ImageFile:" + Chr(34) + WimFile.Text + Chr(34) + " /index:" + Item.ToString() + " & exit & exit"
                    'sIm.RedirectStandardError = True
                    sIm.RedirectStandardOutput = True
                    sIm.UseShellExecute = False
                    sIm.CreateNoWindow = True
                    gImages.Start()
                    'gImages.BeginErrorReadLine()
                    'gImages.BeginOutputReadLine()
                    'While Not gImages.StandardError.EndOfStream()
                    While Not gImages.StandardOutput.EndOfStream()
                        'ImagesInformation += gImages.StandardError.ReadLine()
                        Dim theLine = gImages.StandardOutput.ReadLine()
                        If theLine.Contains("Index :") Or theLine.Contains("Name :") Or theLine.Contains("Edition :") Then
                            ImageOptions += theLine + Environment.NewLine
                            If theLine.Contains("Edition") Then
                                versionsAvailable.Add(ImageOptions)
                                ImageOptions = ""
                            End If
                        End If
                        If Not theLine.Contains("Error:") And Not theLine.Contains("image does Not exist") And Not theLine.Contains("image does not exist") And Not theLine.Contains("for existing images") And Not theLine.Contains("The DISM log file can be found at") And Not theLine.Contains("Deployment Image Servicing") And Not theLine.Contains("Version:") And Not theLine.Contains("The operation completed") And Not theLine = "" Then
                            ImagesInformation += theLine + Environment.NewLine
                        End If
                    End While
                    'ImagesInformation = gImages.StandardError.ReadToEnd()
                    ''ImagesInformation = gImages.StandardOutput.ReadToEnd()

                    gImages.WaitForExit()
                    If Not gImages.ExitCode = 0 Then
                        Exit For
                    End If
                    ImageCount += 1
                    Selected_Index.Items.Add(ImageCount.ToString())
                    ImagesInformation += "=================================================================" + Environment.NewLine
                Next
                If Selected_Index.Items.Count > 0 Then
                    Selected_Index.SelectedIndex = 0
                    VersionDetails.Text = versionsAvailable.Item(Selected_Index.SelectedIndex)
                End If
                DialogWimInfo.DialogWimInfo_TextBox.Text = ImagesInformation
                Return True
            End If
        End If
        Return False
    End Function

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        If FileIO.FileSystem.FileExists(WimFile.Text) And FileIO.FileSystem.DirectoryExists(MountFolder.Text) And Not Selected_Index.Text = "" Then
            Button1.Enabled = False
            MountingStatus.Visible = True
            Dim StrEA = "", StrCI = "", StrRO = ""
            If RO_CheckBox.Checked Then
                StrRO = " /ReadOnly"
            End If
            If CI_CheckBox.Checked Then
                StrCI = " /CheckIntegrity"
            End If
            If EA_CheckBox.Checked Then
                StrEA = " /EA"
            End If
            currentCmd = "Dism.exe /Mount-Image /ImageFile:" + Chr(34) + WimFile.Text + Chr(34) + " /Index:" + Selected_Index.Text + " /MountDir:" + Chr(34) + MountFolder.Text + Chr(34) + StrEA + StrCI + StrRO
            If Not RunTheCmd() Then
                LastCmd.Text = "Operation Cancelled"
                Button1.Enabled = True
                MountingStatus.Visible = False
            End If
        End If
    End Sub

    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        Dim SaveImage As String = " /Discard"
        Button2.Enabled = False
        UnMountingStatus.Visible = True
        If CommitChanges.Checked Then
            SaveImage = " /Commit"
        End If
        currentCmd = "Dism.exe /Unmount-Image /MountDir:" + Chr(34) + MountFolder.Text + Chr(34) + SaveImage
        If Not RunTheCmd() Then
            LastCmd.Text = "Operation Cancelled"
            Button2.Enabled = True
            UnMountingStatus.Visible = False
        End If
    End Sub


    Private Sub Button5_Click(sender As Object, e As EventArgs) Handles Button5.Click
        Enabled = False
        If DriverDialog.IsHandleCreated Then
            DriverDialog.Close()
        Else
            DriverDialog.ShowDialog()
        End If
        Enabled = True
    End Sub

    Private Sub Button7_Click(sender As Object, e As EventArgs) Handles Button7.Click
        VHDTOOLS.Visible = Not VHDTOOLS.Visible
        CheckButtons(APP_OPS.S_VHD_TOOLS)
    End Sub

    Private Sub Button8_Click(sender As Object, e As EventArgs) Handles Button8.Click
        VHDTOOLS.Visible = Not VHDTOOLS.Visible
        CheckButtons(APP_OPS.S_VHD_TOOLS)
    End Sub

    Private Sub Button19_Click(sender As Object, e As EventArgs) Handles Button19.Click
        Boot_Tools.Visible = Not Boot_Tools.Visible
        CheckButtons(APP_OPS.S_BOOT_TOOLS)
    End Sub
    Private Sub Button13_Click(sender As Object, e As EventArgs) Handles Button13.Click
        Button13.Enabled = False
        If RepairDialog.IsHandleCreated Then
            RepairDialog.Close()
        Else
            RepairDialog.ShowDialog()
        End If
        Button13.Enabled = True
    End Sub

    Public Function CheckButtons(btn As APP_OPS)
        If btn = APP_OPS.S_VHD_TOOLS Then
            Boot_Tools.Visible = False
        ElseIf btn = APP_OPS.S_BOOT_TOOLS Then
            VHDTOOLS.Visible = False
        End If
        If VHDTOOLS.Visible Or Boot_Tools.Visible Then
            DriveImagingTools.Visible = False
        Else
            DriveImagingTools.Visible = True
        End If
        Return 0
    End Function
    Private Sub SizeMB_TextChanged(sender As Object, e As EventArgs) Handles SizeMB.TextChanged
        Try
            If Not SizeMB.Text = "" Then
                If SizeMB.Text > 0 Then
                    SizeGB.Text = SizeMB.Text * 0.001
                Else
                    MsgBox("Please enter a positive number")
                    SizeMB.Text = ""
                End If
            Else
                SizeGB.Text = ""
            End If
        Catch ex As Exception
            SizeGB.Text = ""
            SizeMB.Text = ""
            MsgBox("Please enter a number")
        End Try
        If Not VHD_file.Text = "" And Not SizeMB.Text = "" Then
            CreateVhdBtn.Enabled = True
        Else
            CreateVhdBtn.Enabled = False
        End If
    End Sub

    Private Sub SizeGB_TextChanged(sender As Object, e As EventArgs) Handles SizeGB.TextChanged
        Try
            If Not SizeGB.Text = "" Then
                If SizeGB.Text > 0 Then
                    SizeMB.Text = SizeGB.Text * 1000
                Else
                    MsgBox("Please enter a positive number")
                    SizeGB.Text = ""
                End If
            Else
                SizeMB.Text = ""
            End If
        Catch ex As Exception
            SizeMB.Text = ""
            SizeGB.Text = ""
            MsgBox("Please enter a number")
        End Try
    End Sub

    Private Sub VHD_file_Click(sender As Object, e As EventArgs) Handles VHD_file.Click
        Dim filStr As String = "VHD_" + Date.Now.Date.Month.ToString() + "-" + Date.Now.Date.Day.ToString() + "-" + Date.Now.Date.Year.ToString() + "_" + Date.Now.Date.ToShortTimeString().Replace(":", "-").Replace(" ", "_") + ".vhd"
        OpenFileDialog1.Title = "Select an Existing File or Enter a File Name to Create a New File"
        OpenFileDialog1.CheckFileExists = False
        OpenFileDialog1.FileName = filStr
        OpenFileDialog1.Filter = "VHD FILES|*.vhd|VHDX Files|*.vhdx"
        If Not OpenFileDialog1.ShowDialog = DialogResult.Cancel Then
            VHD_file.Text = OpenFileDialog1.FileName
        End If
    End Sub
    Private Sub VHD_file_TextChanged(sender As Object, e As EventArgs) Handles VHD_file.TextChanged
        If Not VHD_file.Text = "" And FileIO.FileSystem.FileExists(VHD_file.Text) Then
            AttachVhdBtn.Enabled = True
        Else
            AttachVhdBtn.Enabled = False
        End If
        If Not VHD_file.Text = "" And Not SizeMB.Text = "" Then
            CreateVhdBtn.Enabled = True
        Else
            CreateVhdBtn.Enabled = False
        End If
        My.Settings.Save()
    End Sub

    Private Sub CheckBox1_CheckedChanged(sender As Object, e As EventArgs) Handles CheckBox1.CheckedChanged
        If WimFile.Text = "" Then
            CheckBox1.Checked = False
            MsgBox("Please Select a Windows Installation Media file first.")
        End If
    End Sub

    Private Sub AttachVhdBtn_Click(sender As Object, e As EventArgs) Handles AttachVhdBtn.Click
        AttachVhdBtn.Enabled = False
        'SELECT VDISK FILE="c:\test\test.vhd"
        If FileIO.FileSystem.FileExists(VHD_file.Text) Then
            File.WriteAllText(App_Path + "AttachVHD.s", "SELECT VDISK FILE=" + Chr(34) + VHD_file.Text + Chr(34) + Environment.NewLine + "ATTACH VDISK" + Environment.NewLine + "EXIT")
            currentCmd = "diskpart /s " + Chr(34) + App_Path + "AttachVHD.s" + Chr(34) + " & del /q " + Chr(34) + App_Path + "AttachVHD.s" + Chr(34)
            ReScanTheDrives = True
            If Not RunTheCmd() Then
                LastCmd.Text = "Operation Cancelled"
                AttachVhdBtn.Enabled = True
                ReScanTheDrives = False
            End If
        Else
            AttachVhdBtn.Enabled = True
            MsgBox("ERROR: (File) NOT FOUND!")
        End If
    End Sub
    Private Sub CreateVhdBtn_Click(sender As Object, e As EventArgs) Handles CreateVhdBtn.Click
        CreateVhdBtn.Enabled = False
        If Not FileIO.FileSystem.FileExists(App_Path + "CreateVHD.bat") Then
            File.WriteAllText(App_Path + "CreateVHD.bat", My.Resources.CreateVHD)
        End If
        'usage:
        'call CreateVHD.bat *vhd-file *Size(MB) install.wim-file(optional) install-image-index(optional-default 1)
        If CheckBox1.Checked Then
            currentCmd = "call " + Chr(34) + App_Path + "CreateVHD.bat" + Chr(34) + " " + Chr(34) + VHD_file.Text + Chr(34) + " " + SizeMB.Text + " " + Chr(34) + WimFile.Text + Chr(34) + " " + Selected_Index.Text + " & del /q " + Chr(34) + App_Path + "CreateVHD.bat" + Chr(34)
        Else
            currentCmd = "call " + Chr(34) + App_Path + "CreateVHD.bat" + Chr(34) + " " + Chr(34) + VHD_file.Text + Chr(34) + " " + SizeMB.Text + " & del /q " + Chr(34) + App_Path + "CreateVHD.bat" + Chr(34)
        End If
        ReScanTheDrives = True
        If Not RunTheCmd() Then
            LastCmd.Text = "Operation Cancelled"
            CreateVhdBtn.Enabled = True
            ReScanTheDrives = False
        End If
    End Sub

    Function CreateOfflineScripts() As Boolean
        If MsgBox("Create CMD Tools for use in WinPE or CMDLINE Environment?", MsgBoxStyle.YesNo) = MsgBoxResult.Yes Then
            Try
                Dim ScriptFolder As String = FileIO.SpecialDirectories.Desktop + "\CmdScripts"
                Dim DriverBat As String = ScriptFolder + "\DriverTool.bat"
                Dim VhdBat As String = ScriptFolder + "\CreateVHD.bat"
                If Not FileIO.FileSystem.DirectoryExists(ScriptFolder) Then
                    FileIO.FileSystem.CreateDirectory(ScriptFolder)
                    LastCmd.Text = "Created [CmdScripts] Directory | " + LastCmd.Text
                Else
                    LastCmd.Text = "Existing [CmdScripts] Directory Found! | " + LastCmd.Text
                End If
                If Not FileIO.FileSystem.FileExists(DriverBat) Then
                    File.WriteAllText(DriverBat, My.Resources.DriverTool)
                    LastCmd.Text = "Created *DriverTool | " + LastCmd.Text
                Else
                    LastCmd.Text = "Existing *DriverTool Found! | " + LastCmd.Text
                End If
                If Not FileIO.FileSystem.FileExists(VhdBat) Then
                    File.WriteAllText(VhdBat, My.Resources.CreateVHD)
                    LastCmd.Text = "Created *CreateVHD | " + LastCmd.Text
                Else
                    LastCmd.Text = "Existing *CreateVHD Found! | " + LastCmd.Text
                End If
                Return True
            Catch ex As Exception
                LastCmd.Text = "(Create CmdLine Scripts) ERROR: " + ex.Message
            End Try
        Else
            LastCmd.Text = "Operation Cancelled"
        End If
        Return False
    End Function

    Private Sub Button10_Click(sender As Object, e As EventArgs) Handles Button10.Click
        Button10.Enabled = False
        If Get_WimEditions() Then
            DialogWimInfo.Show()
        Else
            MsgBox("Run As Administrator to use this. Or no information Available.")
        End If
        Button10.Enabled = True
    End Sub

    Private Sub Button15_Click(sender As Object, e As EventArgs) Handles ReScanDrives.Click
        ReScanDrives.Enabled = False
        Get_UsedDrives()
        ReScanDrives.Enabled = True
    End Sub
    Function EnableApplyMediaBtn() As Boolean
        Try
            ApplyMedia.Enabled = FileIO.FileSystem.FileExists(WimFile.Text) And Not Used_Drives.Text.ToString() = "C:"
            CaptureImage.Enabled = Not WimFile.Text = "" And Not FileIO.FileSystem.FileExists(WimFile.Text)
            Return ApplyMedia.Enabled
        Catch ex As Exception
            Return False
        End Try

    End Function
    Private Sub Used_Drives_SelectedItemChanged(sender As Object, e As EventArgs) Handles Used_Drives.SelectedItemChanged
        EnableApplyMediaBtn()
    End Sub
    Private Sub ApplyMedia_Click(sender As Object, e As EventArgs) Handles ApplyMedia.Click
        ApplyMedia.Enabled = False
        'Dism.exe /Apply-Image /ImageFile:install.wim /Index:1 /ApplyDir:D:\ /CheckIntegrity /Verify
        Try
            Dim StrCheckIntegrity = "", StrVerify = "", StrEA = "\"
            If EA_CheckBox.Checked Then
                StrEA = "\ /EA"
            End If
            If VERIFY_CheckBox.Checked Then
                StrVerify = " /Verify"
            End If
            If CI_CheckBox.Checked Then
                StrCheckIntegrity = " /CheckIntegrity"
            End If
            currentCmd = "Dism.exe /Apply-Image /ImageFile:" + Chr(34) + WimFile.Text + Chr(34) + " /Index:" + Selected_Index.Text + " /ApplyDir:" + Used_Drives.Text + StrEA + StrCheckIntegrity + StrVerify
            If Not RunTheCmd() Then
                LastCmd.Text = "Operation Cancelled"
                ApplyMedia.Enabled = True
            End If

        Catch ex As Exception
            File.WriteAllText(App_Path + "ERROR.LOG-V(" + App_Version + ").txt", ex.HelpLink + Environment.NewLine + ex.Message + Environment.NewLine + ex.Source + Environment.NewLine + ex.StackTrace)
        End Try
    End Sub

    Private Sub CaptureImage_Click(sender As Object, e As EventArgs) Handles CaptureImage.Click
        CaptureImage.Enabled = False
        'Dism.exe /Capture-Image /ImageFile:install.wim /CaptureDir:D:\ /Name:Drive-D /Description:Description /CheckIntegrity /Verify
        Try
            Dim StrCheckIntegrity = "", StrVerify = "", StrEA = ""
            If EA_CheckBox.Checked Then
                StrEA = " /EA"
            End If
            If VERIFY_CheckBox.Checked Then
                StrVerify = " /Verify"
            End If
            If CI_CheckBox.Checked Then
                StrCheckIntegrity = " /CheckIntegrity"
            End If
            If FileIO.FileSystem.FileExists(WimFile.Text) Then
                currentCmd = "Dism.exe /Append-Image /ImageFile:" + Chr(34) + WimFile.Text + Chr(34) + " /ApplyDir:" + Used_Drives.Text + "\ /Name:" + Chr(34) + InternalImageName.Text + Chr(34) + StrEA + StrCheckIntegrity + StrVerify
            Else
                currentCmd = "Dism.exe /Capture-Image /ImageFile:" + Chr(34) + WimFile.Text + Chr(34) + " /ApplyDir:" + Used_Drives.Text + "\ /Name:" + Chr(34) + InternalImageName.Text + Chr(34) + StrEA + StrCheckIntegrity + StrVerify
            End If
            If Not RunTheCmd() Then
                LastCmd.Text = "Operation Cancelled"
                CaptureImage.Enabled = True
            End If

        Catch ex As Exception
            File.WriteAllText(App_Path + "ERROR.LOG-V(" + App_Version + ").txt", ex.HelpLink + Environment.NewLine + ex.Message + Environment.NewLine + ex.Source + Environment.NewLine + ex.StackTrace)
        End Try
    End Sub

    Dim tmrCnt = 0
    Private Sub Timer1_Tick(sender As Object, e As EventArgs) Handles Timer1.Tick
        tmrCnt += 1
        If tmrCnt = 1 Then SplashScreen1.Show()
        Timer1.Stop()
    End Sub

    Private Sub Button15_Click_1(sender As Object, e As EventArgs) Handles Button15.Click
        Boot_Tools.Visible = Not Boot_Tools.Visible
        CheckButtons(APP_OPS.S_BOOT_TOOLS)
    End Sub

    Private Sub Selected_Index_SelectedItemChanged(sender As Object, e As EventArgs) Handles Selected_Index.SelectedItemChanged
        If Selected_Index.Items.Count > 0 Then
            VersionDetails.Text = versionsAvailable.Item(Selected_Index.SelectedIndex)
        End If
    End Sub

    Private Sub Timer2_Tick(sender As Object, e As EventArgs) Handles Timer2.Tick
        ProgressBar1.Visible = True
        Try
            CmdsOutput.Text = CmdOUTPUT
        Catch ex As Exception
            ProgressBar1.Visible = False
            CmdsOutput.Text = ex.Message
        End Try
    End Sub

    Private Sub CreateUSB_OS_Click(sender As Object, e As EventArgs) Handles CreateUSB_OS.Click
        CreateUSB_OS.Enabled = False
        Try
            If FileIO.FileSystem.FileExists(App_Path + "CreateBootEntry.bat") Then
                FileIO.FileSystem.DeleteFile(App_Path + "CreateBootEntry.bat")
            End If
            If Install_Image_OnDrive.Checked Then
                currentCmd = "call " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34) + " " + BootableTargetDrive.Text.Replace(":", "") + " " + Chr(34) + WimFile.Text + Chr(34) + " " + Selected_Index.Text + " " + Has_Boot_Sector.Checked.ToString() + " " + CheckBox2.Checked.ToString() + " & del /q " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34)
            ElseIf CheckBox2.Checked Then
                currentCmd = "call " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34) + " " + BootableTargetDrive.Text.Replace(":", " ") + "justboot"
            Else
                currentCmd = "call " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34) + " " + BootableTargetDrive.Text.Replace(":", " ") + Has_Boot_Sector.Checked.ToString()
            End If
            File.WriteAllText(App_Path + "CreateBootEntry.bat", My.Resources.CreateUSB)
            If Not RunTheCmd() Then
                LastCmd.Text = "Operation Cancelled"
                FileIO.FileSystem.DeleteFile(App_Path + "CreateBootEntry.bat")
                CreateUSB_OS.Enabled = True
            End If

        Catch ex As Exception
            File.WriteAllText(App_Path + "ERROR.LOG-V(" + App_Version + ").txt", ex.HelpLink + Environment.NewLine + ex.Message + Environment.NewLine + ex.Source + Environment.NewLine + ex.StackTrace)
        End Try
    End Sub
    Function Get_BootEntries()
        Try

            If isElevated Then
                Boot_Menu.Items.Clear()
                bootMenuOptionDetails.Clear()
                Dim BootMaker As New Process
                Dim BMSI As ProcessStartInfo = BootMaker.StartInfo
                BMSI.RedirectStandardOutput = True
                BMSI.UseShellExecute = False
                BMSI.CreateNoWindow = True
                BMSI.FileName = "C:\windows\system32\cmd.exe"
                BMSI.Arguments = " /c bcdedit"
                BootMaker.Start()
                Dim BootUniqueID_Details As String = ""
                While Not BootMaker.StandardOutput.EndOfStream()
                    Dim TmpOUTPUT As String = BootMaker.StandardOutput.ReadLine().ToString()
                    Dim TmpOUTPUT2 As String = TmpOUTPUT.ToLower()
                    If TmpOUTPUT2.Contains("identifier") Or TmpOUTPUT2.Contains("device") Or TmpOUTPUT2.Contains("description") Then
                        If TmpOUTPUT2.ToLower().Contains("identifier") Then
                            If Not BootUniqueID_Details = "" Then
                                bootMenuOptionDetails.Add(BootUniqueID_Details)
                                BootUniqueID_Details = ""
                            End If
                            Boot_Menu.Items.Add(TmpOUTPUT.Replace("identifier", "").Replace(" ", ""))
                        Else
                            BootUniqueID_Details = TmpOUTPUT.Replace("identifier", "").Replace("device", "").Replace("description", "").Replace(" ", "") + Environment.NewLine + BootUniqueID_Details
                        End If
                    End If
                End While
                BootMaker.WaitForExit()
                If BootMaker.ExitCode = 0 Then
                    If Not BootUniqueID_Details = "" Then
                        bootMenuOptionDetails.Add(BootUniqueID_Details)
                        BootUniqueID_Details = ""
                    End If
                    If Boot_Menu.Items.Count > 0 Then
                        Boot_Menu.SelectedIndex = 0
                        BootDetails.Text = bootMenuOptionDetails.ElementAt(Boot_Menu.SelectedIndex)
                    End If
                    Return True
                End If
                Return False
            End If
        Catch ex As Exception
            File.WriteAllText(App_Path + "ERROR.LOG-V(" + App_Version + ").txt", ex.HelpLink + Environment.NewLine + ex.Message + Environment.NewLine + ex.Source + Environment.NewLine + ex.StackTrace)
        End Try
        Return False
    End Function

    Function CreateBootEntry(Optional ByVal BootOption As APP_OPS = APP_OPS.CREATE_WINPE_BOOT_OPTION)
        Try
            If FileIO.FileSystem.FileExists(App_Path + "CreateBootEntry.bat") Then
                FileIO.FileSystem.DeleteFile(App_Path + "CreateBootEntry.bat")
            End If
            If BootOption = APP_OPS.BOOT_DRIVE_FROM_CURRENT_SYSTEM Then
                ReScanTheBootMenu = True
                currentCmd = "call " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34) + " " + BootableTargetDrive.Text + " & del /q " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34)
                File.WriteAllText(App_Path + "CreateBootEntry.bat", My.Resources.CreateBootOption)
                If Not RunTheCmd() Then
                    FileIO.FileSystem.DeleteFile(App_Path + "CreateBootEntry.bat")
                    Button16.Enabled = True
                    ReScanTheBootMenu = False
                End If
            ElseIf BootOption = APP_OPS.BOOT_CURRENT_SYSTEM_FROM_DRIVE Then
                currentCmd = "call " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34) + " " + BootableTargetDrive.Text + " & del /q " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34)
                File.WriteAllText(App_Path + "CreateBootEntry.bat", My.Resources.CreateBootOptionTwo)
                If Not RunTheCmd() Then
                    FileIO.FileSystem.DeleteFile(App_Path + "CreateBootEntry.bat")
                    Button18.Enabled = True
                End If
            ElseIf BootOption = APP_OPS.BOOT_CURRENT_SYSTEM_FROM_DRIVE_ACTIVE Then
                currentCmd = "call " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34) + " " + BootableTargetDrive.Text.Replace(":", "") + " " + Has_Boot_Sector.Checked.ToString() + " & del /q " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34)
                File.WriteAllText(App_Path + "CreateBootEntry.bat", My.Resources.CreateUSB)
                If Not RunTheCmd() Then
                    LastCmd.Text = "Operation Cancelled"
                    FileIO.FileSystem.DeleteFile(App_Path + "CreateBootEntry.bat")
                    Button18.Enabled = True
                End If
            ElseIf BootOption = APP_OPS.BOOT_CURRENT_SYSTEM_FROM_DRIVE_ACTIVE_BOOTSECT Then
                currentCmd = "call " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34) + " " + BootableTargetDrive.Text + " & del /q " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34)
                File.WriteAllText(App_Path + "CreateBootEntry.bat", My.Resources.CreateNewSystemBootDevice)
                If Not RunTheCmd() Then
                    FileIO.FileSystem.DeleteFile(App_Path + "CreateBootEntry.bat")
                    Button18.Enabled = True
                End If
            ElseIf BootOption = APP_OPS.CREATE_WINPE_BOOT_OPTION Then
                Try
                    Dim BcdStore As String
                    Dim BootUniqueID As String = ""
                    Dim BootMaker As New Process
                    Dim BMSI As ProcessStartInfo = BootMaker.StartInfo
                    BMSI.RedirectStandardOutput = True
                    BMSI.UseShellExecute = False
                    BMSI.CreateNoWindow = True
                    BMSI.FileName = "C:\windows\system32\cmd.exe"
                    If BootableTargetDrive.Text = "C:" Then
                        ReScanTheBootMenu = True
                        BcdStore = ""
                        BMSI.Arguments = " /c bcdedit /create /d " + Chr(34) + "WinPE" + Chr(34) + " /application osloader & exit"
                    Else
                        BcdStore = Chr(34) + BootableTargetDrive.Text + "\boot\bcd" + Chr(34)
                        BMSI.Arguments = " /c bcdedit /store " + BcdStore + " /create /d " + Chr(34) + "WinPE" + Chr(34) + " /application osloader & exit"
                    End If
                    'BMSI.Arguments = " /c bcdedit " + BcdStore + "/create {ramdiskoptions} & bcdedit " + BcdStore + "set {ramdiskoptions} ramdisksdidevice partition=" + Used_Drives.Text + " & bcdedit " + BcdStore + "set {ramdiskoptions} ramdisksdipath \boot.sdi & bcdedit " + BcdStore + "/create /d WinPE /application bootapp & exit"
                    BootMaker.Start()
                    While Not BootMaker.StandardOutput.EndOfStream()
                        Dim TmpOUTPUT As String = BootMaker.StandardOutput.ReadLine().ToString()
                        If TmpOUTPUT.Contains("The entry {") And TmpOUTPUT.Contains("} was successfully created.") Then
                            BootUniqueID = TmpOUTPUT.Replace("The entry {", "").Replace("} was successfully created.", "").Replace(" ", "")
                        End If
                        If Not TmpOUTPUT = "" And Not TmpOUTPUT = " " Then CmdOUTPUT = TmpOUTPUT + Environment.NewLine + CmdOUTPUT
                    End While
                    BootMaker.WaitForExit()
                    If BootMaker.ExitCode = 0 And BootUniqueID.Count = 36 Then 'ba76985d-1d7c-11f0-aee1-87f1054caf2b

                        currentCmd = "call " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34) + " " +
                            BootUniqueID + " " + BootableTargetDrive.Text + " " + Chr(34) + Wim_Path.Text + "\boot.wim" + Chr(34) + " " + Chr(34) + Sdi_Path.Text + "\boot.sdi" + Chr(34) + " " + BcdStore +
                            " & del /Q " + Chr(34) + App_Path + "CreateBootEntry.bat" + Chr(34)
                        If FileIO.FileSystem.FileExists(App_Path + "CreateBootEntry.bat") Then
                            FileIO.FileSystem.DeleteFile(App_Path + "CreateBootEntry.bat")
                        End If
                        File.WriteAllText(App_Path + "CreateBootEntry.bat", My.Resources.CreateBootEntry)

                        If Not RunTheCmd("Important! Please Confirm You want to create a WinPE Boot Option for drive [" + BootableTargetDrive.Text + "]?", MsgBoxStyle.YesNo, MsgBoxResult.Yes) Then
                            ReScanTheBootMenu = False
                            BMSI.Arguments = " /c bcdedit " + BcdStore + "/delete {" + BootUniqueID + "} /cleanup"
                            BootMaker.Start()
                            While Not BootMaker.StandardOutput.EndOfStream()
                                Dim TmpOUTPUT = BootMaker.StandardOutput.ReadLine().ToString()
                                If Not TmpOUTPUT = "" And Not TmpOUTPUT = " " Then CmdOUTPUT = TmpOUTPUT + Environment.NewLine + CmdOUTPUT
                            End While
                            BootMaker.WaitForExit()
                            If BootMaker.ExitCode > 0 Then
                                LastCmd.Text = "ERROR: " + BootMaker.ExitCode + " | (" + currentCmd + ")"
                            End If
                            Button20.Enabled = True
                        End If
                    Else
                        LastCmd.Text = "UniqueID: " + BootUniqueID + " | ERROR: " + BootMaker.ExitCode + " | (" + currentCmd + ")"
                        Button20.Enabled = True
                    End If
                Catch ex As Exception
                    LastCmd.Text = ex.Message + " | (" + currentCmd + ")"
                    Button20.Enabled = True
                End Try
            Else
                MsgBox("No Option Selected!")
                Button20.Enabled = True
            End If

        Catch ex As Exception
            File.WriteAllText(App_Path + "ERROR.LOG-V(" + App_Version + ").txt", ex.HelpLink + Environment.NewLine + ex.Message + Environment.NewLine + ex.Source + Environment.NewLine + ex.StackTrace)
        End Try
        Return 0
    End Function

    Private Sub Button16_Click(sender As Object, e As EventArgs) Handles Button16.Click
        Button16.Enabled = False
        CreateBootEntry(APP_OPS.BOOT_DRIVE_FROM_CURRENT_SYSTEM)
    End Sub

    Private Sub Button18_Click(sender As Object, e As EventArgs) Handles Button18.Click
        Button18.Enabled = False
        If Has_Boot_Sector.Checked Then
            CreateBootEntry(APP_OPS.BOOT_CURRENT_SYSTEM_FROM_DRIVE_ACTIVE)
        ElseIf CheckBox2.Checked Then
            CreateBootEntry(APP_OPS.BOOT_CURRENT_SYSTEM_FROM_DRIVE)
        Else
            CreateBootEntry(APP_OPS.BOOT_CURRENT_SYSTEM_FROM_DRIVE_ACTIVE_BOOTSECT)
        End If
    End Sub

    Private Sub BootableTargetDrive_SelectedItemChanged(sender As Object, e As EventArgs) Handles BootableTargetDrive.SelectedItemChanged
        If BootableTargetDrive.Text = "C:" Then
            Install_Image_OnDrive.Checked = False
            Install_Image_OnDrive.Enabled = False
            CreateUSB_OS.Enabled = False
        Else
            Install_Image_OnDrive.Enabled = True
            CreateUSB_OS.Enabled = True
        End If
    End Sub

    Private Sub CheckBox2_CheckedChanged(sender As Object, e As EventArgs) Handles CheckBox2.CheckedChanged
        Has_Boot_Sector.Enabled = Not CheckBox2.Checked
    End Sub

    Private Sub Has_Boot_Sector_CheckedChanged(sender As Object, e As EventArgs) Handles Has_Boot_Sector.CheckedChanged
        CheckBox2.Enabled = Not Has_Boot_Sector.Checked
    End Sub

    Private Sub Button20_Click(sender As Object, e As EventArgs) Handles Button20.Click
        Button20.Enabled = False 'Chr(34) + BootableTargetDrive.Text + Sdi_Path.Text + Chr(34)
        If Not FileIO.FileSystem.FileExists(theFile) And Not FileIO.FileSystem.FileExists(theFile2) And Not FileIO.FileSystem.FileExists(Chr(34) + BootableTargetDrive.Text + Sdi_Path.Text + Chr(34)) And Not FileIO.FileSystem.FileExists(Chr(34) + BootableTargetDrive.Text + Wim_Path.Text + Chr(34)) Then
            BackgroundWorker2.RunWorkerAsync()
        ElseIf FileIO.FileSystem.FileExists(Chr(34) + BootableTargetDrive.Text + Sdi_Path.Text + Chr(34)) And FileIO.FileSystem.FileExists(Chr(34) + BootableTargetDrive.Text + Wim_Path.Text + Chr(34)) Then
            CreateBootEntry(APP_OPS.CREATE_WINPE_BOOT_OPTION)
        ElseIf FileIO.FileSystem.FileExists(theFile) And FileIO.FileSystem.FileExists(theFile2) Then
            BackgroundWorker3.RunWorkerAsync()
            CreateBootEntry(APP_OPS.CREATE_WINPE_BOOT_OPTION)
        Else
            If Not FileIO.FileSystem.FileExists(theFile) Or Not FileIO.FileSystem.FileExists(theFile2) Then
                BackgroundWorker2.RunWorkerAsync()
            End If
            If Not FileIO.FileSystem.FileExists(Chr(34) + BootableTargetDrive.Text + Sdi_Path.Text + Chr(34)) Or Not FileIO.FileSystem.FileExists(Chr(34) + BootableTargetDrive.Text + Wim_Path.Text + Chr(34)) Then
                BackgroundWorker3.RunWorkerAsync()
                CreateBootEntry(APP_OPS.CREATE_WINPE_BOOT_OPTION)
            End If
        End If
    End Sub

    Private Sub BackgroundWorker2_DoWork(sender As Object, e As System.ComponentModel.DoWorkEventArgs) Handles BackgroundWorker2.DoWork
        'Public Function GetTheFile(ByVal theURL As String, ByVal theFile As String, Optional ByVal theURL2 As String = "", Optional ByVal theFile2 As String = "") As Boolean End Function
        If My.Computer.Network.IsAvailable Then
            If Not FileIO.FileSystem.FileExists(theFile) Then
                Try
                    My.Computer.Network.DownloadFile(theURL, theFile)
                Catch ex As Exception
                    'downloadResults = "DOWNLOAD FILE ERROR: " + ex.Message
                End Try
            End If
            If Not FileIO.FileSystem.FileExists(theFile2) Then
                Try
                    My.Computer.Network.DownloadFile(theURL2, theFile2)
                Catch ex As Exception
                    'downloadResults = "DOWNLOAD FILE2 ERROR: " + ex.Message
                End Try
            End If
        End If
    End Sub
    Private Sub BackgroundWorker2_RunWorkerCompleted(sender As Object, e As System.ComponentModel.RunWorkerCompletedEventArgs) Handles BackgroundWorker2.RunWorkerCompleted
        BackgroundWorker3.RunWorkerAsync()
        CreateBootEntry(APP_OPS.CREATE_WINPE_BOOT_OPTION)
    End Sub

    Private Sub BackgroundWorker3_DoWork(sender As Object, e As System.ComponentModel.DoWorkEventArgs) Handles BackgroundWorker3.DoWork
        If FileIO.FileSystem.FileExists(theFile) Then
            If Not FileIO.FileSystem.DirectoryExists(BootableTargetDrive.Text + Sdi_Path.Text.Replace("\boot.sdi", "")) Then
                FileIO.FileSystem.CreateDirectory(BootableTargetDrive.Text + Sdi_Path.Text.Replace("\boot.sdi", ""))
            End If
            FileIO.FileSystem.CopyFile(theFile, Chr(34) + BootableTargetDrive.Text + Sdi_Path.Text + Chr(34))
        End If
        If FileIO.FileSystem.FileExists(theFile2) Then
            If Not FileIO.FileSystem.DirectoryExists(BootableTargetDrive.Text + Wim_Path.Text.Replace("\boot.wim", "")) Then
                FileIO.FileSystem.CreateDirectory(BootableTargetDrive.Text + Wim_Path.Text.Replace("\boot.wim", ""))
            End If
            FileIO.FileSystem.CopyFile(theFile2, Chr(34) + BootableTargetDrive.Text + Wim_Path.Text + Chr(34))
        End If
    End Sub

    Private Sub Boot_Menu_SelectedItemChanged(sender As Object, e As EventArgs) Handles Boot_Menu.SelectedItemChanged
        If Boot_Menu.SelectedIndex < bootMenuOptionDetails.Count Then
            BootDetails.Text = bootMenuOptionDetails.ElementAt(Boot_Menu.SelectedIndex)
        Else
            BootDetails.Text = ""
        End If
    End Sub

    Private Sub ReScanForDrivesToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles ReScanForDrivesToolStripMenuItem.Click
        ReScanForDrivesToolStripMenuItem.Enabled = False
        Get_UsedDrives()
        ReScanForDrivesToolStripMenuItem.Enabled = True
    End Sub

    Private Sub ReScanBootEntriesToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles ReScanBootEntriesToolStripMenuItem.Click
        Enabled = False
        Get_BootEntries()
        Enabled = True
    End Sub

    Private Sub ReScanWimInfoToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles ReScanWimInfoToolStripMenuItem.Click
        Enabled = False
        Get_WimEditions()
        Enabled = True
    End Sub

    Private Sub CreateOfflineScriptsToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles CreateOfflineScriptsToolStripMenuItem.Click
        Enabled = False
        CreateOfflineScripts()
        Enabled = True
    End Sub

    Private Sub VMVHDToolsToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles VMVHDToolsToolStripMenuItem.Click
        Enabled = False
        VHDTOOLS.Visible = Not VHDTOOLS.Visible
        CheckButtons(APP_OPS.S_VHD_TOOLS)
        Enabled = True
    End Sub

    Private Sub BootToolsToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles BootToolsToolStripMenuItem.Click
        Enabled = False
        Boot_Tools.Visible = Not Boot_Tools.Visible
        CheckButtons(APP_OPS.S_BOOT_TOOLS)
        Enabled = True
    End Sub

    Private Sub OptionsToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles OptionsToolStripMenuItem.Click
        Enabled = False
        If DriverDialog.IsHandleCreated Then
            DriverDialog.Close()
        Else
            DriverDialog.ShowDialog()
        End If
        Enabled = True
    End Sub

    Private Sub CustomizeToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles CustomizeToolStripMenuItem.Click
        Enabled = False
        If RepairDialog.IsHandleCreated Then
            RepairDialog.Close()
        Else
            RepairDialog.ShowDialog()
        End If
        Enabled = True
    End Sub

    Private Sub OpenToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles OpenToolStripMenuItem.Click
        If Not FolderBrowserDialog1.ShowDialog = DialogResult.Cancel Then
            MountFolder.Text = FolderBrowserDialog1.SelectedPath
            My.Settings.Save()
        End If
    End Sub

    Private Sub NewToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles NewToolStripMenuItem.Click
        Dim WimfileStr As String = "IMAGE_" + Date.Now.Date.Month.ToString() + "-" + Date.Now.Date.Day.ToString() + "-" + Date.Now.Date.Year.ToString() + "_" + Date.Now.Date.ToShortTimeString().Replace(":", "-").Replace(" ", "_") + ".wim"
        OpenFileDialog1.Title = "Select a Backup/install Image File"
        OpenFileDialog1.CheckFileExists = True
        OpenFileDialog1.FileName = ""
        OpenFileDialog1.Filter = "WIM FILES|*.wim|ESD Files|*.esd"
        If Not OpenFileDialog1.ShowDialog = DialogResult.Cancel Then
            WimFile.Text = OpenFileDialog1.FileName
            My.Settings.Save()
            Get_WimEditions()
        End If
    End Sub

    Private Sub SaveToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles SaveToolStripMenuItem.Click
        Dim WimfileStr As String = "IMAGE_" + Date.Now.Date.Month.ToString() + "-" + Date.Now.Date.Day.ToString() + "-" + Date.Now.Date.Year.ToString() + "_" + Date.Now.Date.ToShortTimeString().Replace(":", "-").Replace(" ", "_") + ".wim"
        SaveFileDialog1.Title = "Create or Append a Backup Image of Drive [" + Used_Drives.Text + "]"
        SaveFileDialog1.CheckFileExists = False
        SaveFileDialog1.OverwritePrompt = False
        SaveFileDialog1.FileName = WimfileStr
        SaveFileDialog1.Filter = "WIM FILES|*.wim"
        If OpenFileDialog1.ShowDialog = DialogResult.OK Then
            WimFile.Text = SaveFileDialog1.FileName
            My.Settings.Save()
            CaptureImage.PerformClick()
        End If
    End Sub

    Private Sub ExitToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles ExitToolStripMenuItem.Click
        Close()
    End Sub

    Private Sub AboutToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles AboutToolStripMenuItem.Click
        About.ShowDialog()
    End Sub

    Private Sub CheckForUpdatesToolStripMenuItem_Click_1(sender As Object, e As EventArgs) Handles CheckForUpdatesToolStripMenuItem.Click
        CheckForUpdatesToolStripMenuItem.Enabled = False
        'MsgBox(My.Computer.Network.Ping("1.1.1.1").ToString(), MsgBoxStyle.Exclamation, Me.Text)
        CheckUpdate(True)
        CheckForUpdatesToolStripMenuItem.Enabled = True
    End Sub
    Function CheckUpdate(Optional ByVal showMsg = False)
        If My.Computer.Network.IsAvailable Then
            If My.Computer.Network.Ping("1.1.1.1", 5) Then
                Try
                    Dim latestVersion = WebBrowser1.Document.Body.InnerText
                    If latestVersion.Count < 16 Then
                        If Not App_Version.Equals(latestVersion) Then
                            If Not showMsg Then
                                Me.Text = Me.Text + "    -Update Available: [" + latestVersion + "]"
                            End If
                        End If
                    Else
                        WebBrowser1.Refresh()
                    End If
                Catch ex As Exception
                    WebBrowser1.Refresh()
                    If showMsg Then MsgBox(ex.Message, MsgBoxStyle.Exclamation, Me.Text)
                    Return False
                End Try
            Else
                If showMsg Then MsgBox("No Network Connected.", MsgBoxStyle.Exclamation, Me.Text)
                Return False
            End If
        End If
        Return True
    End Function
    Private Sub HelpOnlineToolStripMenuItem_Click_1(sender As Object, e As EventArgs) Handles HelpOnlineToolStripMenuItem.Click
        Enabled = False
        Process.Start("https://www.toremetal.com/windows/mb-tools/")
        Enabled = True
    End Sub

    Private Sub DesktopLinkToolStripMenuItem_Click_1(sender As Object, e As EventArgs) Handles DesktopLinkToolStripMenuItem.Click
        Enabled = False
        Create_Shortcut_Desktop(OVERWRITE:=True)
        Enabled = True
    End Sub

    Private Sub StartMenuLinkToolStripMenuItem_Click_1(sender As Object, e As EventArgs) Handles StartMenuLinkToolStripMenuItem.Click
        Enabled = False
        Create_Shortcut_StartMenu(OVERWRITE:=True)
        Enabled = True
    End Sub
    Dim waiting = 20
    Private Sub Timer3_Tick(sender As Object, e As EventArgs) Handles Timer3.Tick
        waiting -= 1
        If waiting = 15 Then
            'MsgBox(waiting.ToString())
            CheckUpdate()
        End If
        If waiting = 0 Then Timer3.Stop()
    End Sub

    Private Sub FeedbackToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles FeedbackToolStripMenuItem.Click
        Process.Start("https://forms.gle/Do8eZDFBsiSued9aA")
    End Sub

    Private Sub InstallDrivers_CheckedChanged(sender As Object, e As EventArgs)

    End Sub

    Private Sub Button3_Click(sender As Object, e As EventArgs)

    End Sub

    Private Sub DriverFolder_Click(sender As Object, e As EventArgs)

    End Sub

    Private Sub Label2_Click(sender As Object, e As EventArgs)

    End Sub

    Private Sub Button4_Click(sender As Object, e As EventArgs)

    End Sub

    Private Sub Button6_Click(sender As Object, e As EventArgs)

    End Sub
End Class
