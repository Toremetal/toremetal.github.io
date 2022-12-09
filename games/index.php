<style>
.gamebody {
  background: url('https://toremetal.github.io/img/gamebackground/b<?=rand(1,3)?>.jpg') no-repeat center;
  background-size: 776px 100%;
  object-align:center;
  items-align:center;
}
.lost {
  height:512px;
  width:100%512px;
  background: url('https://toremetal.github.io/img/gamebackground/explosion.gif') no-repeat center;
  background-size: 512px 100%;
  object-align:center;
  items-align:center;
  border-radius:10px;
}
.won {
  height:512px;
  width:100%512px;
  background: url('https://toremetal.github.io/img/gamebackground/cheers<?=rand(1,2)?>.jpg') no-repeat center;
  background-size: 512px 100%;
  object-align:center;
  items-align:center;
  border-radius:10px;
}
.gamebody table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 732px;
  opacity:0.9;
margin:auto;
}

.gamebody td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  opacity:0.9;
}

.gamebody tr:nth-child(even) {
  /*background-color: #dddddd;*/
  opacity:0.9;
}
/* The Modal (background) */
.gamebody .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.gamebody .modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 320px;
}

/* The Close Button */
.gamebody .close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.gamebody .close:hover,
.gamebody .close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
/* Popup container - can be anything you want */
.gamebody .popup {
  position: relative;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.gamebody .popup .popuptext {
  visibility: hidden;
  width: 200px;
  background-color: #555;
  color: red;
  font-size:24px;
  text-align: center;
  border-radius: 6px;
  padding: 14px 0;
  position: absolute;
  z-index: 2;
}

/* Popup arrow */
.gamebody .popup .popuptext::after {
  content: "";
  position: absolute;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.gamebody .popup .show {
  visibility: visible;
  /*-webkit-animation: fadeIn 1s;*/
  /*animation: fadeIn 1s;*/
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
.gamebody {
  from {opacity: 0;} 
  to {opacity: 1;}
}
}

@keyframes fadeIn {
.gamebody {
  from {opacity: 0;}
  to {opacity:1 ;}
}
}
@-webkit-keyframes fadeout {
.gamebody {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
}

@keyframes fadeout {
.gamebody {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
}
</style>
<div class="gamebody">
<script>
function myFunction(cb) {
  // Get the checkbox
  var checkBox = document.getElementById(cb);
  // Get the output text
  var text = document.getElementById("myModa");

  // If the checkbox is checked, display the output text
  if (checkBox.checked==true){
    text.style.display = "block";
  } else {
  text.style.display = "none";
  }
}
//alert(document.getElementById("c1").checked==true);
</script>
<h2 style="width:100%;text-align:center;margin-bottom:0;padding-bottom:0;">Find all the bombs before they blow.</h2>
<?php
$_SESSION["cnt"] = 0;
function get_val($cnt) {

if (rand(0,9) == 0) {
    return "";
} else if (rand(0,9) == 1) {
    $_SESSION["cnt"]=$_SESSION["cnt"]+1;
    return "checked";
} else if (rand(0,9) == 2) {
    return "";
} else if (rand(0,9) == 3) {
    $_SESSION["cnt"]=$_SESSION["cnt"]+1;
    return "checked";
} else if (rand(0,9) == 4) {
    return "";
} else if (rand(0,9) == 5) {
    $_SESSION["cnt"]=$_SESSION["cnt"]+1;
    return "checked";
} else if (rand(0,9) == 6) {
    return "";
} else if (rand(0,9) == 7) {
    $_SESSION["cnt"]=$_SESSION["cnt"]+1;
    return "checked";
} else if (rand(0,9) == 8) {
    return "";
} else if (rand(0,9) == 9) {
    $_SESSION["cnt"]=$_SESSION["cnt"]+1;
    return "checked";
} else {
    return "";
}
}
$board=array(0=>"a",1=>"b",2=>"c",3=>"d",4=>"e",5=>"f",6=>"g");

echo "<table id='table'>";
for ($i = 12; $i > 0; $i--) {
echo '<tr>';
for ($j = 0; $j < 7; $j++) {
echo '<td id="'.$board[$j].$i.'-td" onclick="fire('."'".$board[$j].$i."'".')"><input type="checkbox" id="'.$board[$j].$i.'" '.get_val($cnt).' hidden disabled/><sup class="popup" ><button id="'.$board[$j].$i.'-btn" onclick="fire('."'".$board[$j].$i."'".')"></button>';
echo ' <span class="popuptext" id="myPopup">No Bomb There!</span></sup></td>';
}
echo '</tr>';
}
echo '</table>';

?>
<div id="lost" style="display:none;border-radius:10px;" class="lost" align="center">
<h1 style="background-color:orange;width:fit-content;" align="center">Sorry, Better luck next time.</h1>
</div>
<div id="won" style="display:none;" class="won" align="center">
<h1 style="background-color:orange;width:fit-content;" align="center">Congradulations, you found all the bombs and saved everyone!</h1>
</div>
<p align="center">
Bombs: <input id="bombs" type="number" value="<?=$_SESSION["cnt"] ?>" readonly style="border:none;width:30px;"/>
<label for="attempts">Attempts:</label> 
<input id="attempts" type="number" value="0" readonly style="border:none;width:30px;"/>
<label for="hits">Found:</label> 
<input id="hits" type="number" value="0" readonly style="border:none;width:30px;"/>
<label for="miss">Misses:</label> 
<input id="miss" type="number" value="0" readonly style="border:none;width:30px;"/>
</p>
<script>
function fire($arg) {
document.getElementById($arg+"-btn").disabled = true;
document.getElementById($arg+"-td").onclick = "";
document.getElementById($arg+"-btn").style = "opacity:0.8;";
document.getElementById("attempts").value = parseInt(document.getElementById("attempts").value) + 1;
    if (document.getElementById($arg).checked) {
        document.getElementById("hits").value = parseInt(document.getElementById("hits").value) + 1;
        if ( parseInt(document.getElementById("hits").value)==parseInt(document.getElementById("bombs").value) ) {
            document.getElementById("table").style = "display:none;";
            document.getElementById("won").style = "display:block;";
        }
        
  document.getElementById("cv").checked=false;
  document.getElementById("cc").checked=false;
  document.getElementById("cvv").checked=false;
  document.getElementById("vvc").checked=false;
  document.getElementById("a").checked=false;
  document.getElementById("b").checked=false;
  document.getElementById("c").checked=false;
  document.getElementById("d").checked=false;
        return document.getElementById("myModal").style.display = "block";//alert("hit");
    } else {
        document.getElementById("miss").value = parseInt(document.getElementById("miss").value) + 1;
        if (parseInt(document.getElementById("miss").value)>10) {
            document.getElementById("table").style = "display:none;";
            document.getElementById("lost").style = "display:block;";
        }
        return pop("No Bomb There!");
    }
}
</script>
 

<script>
// When the user clicks on div, open the popup
function pop(val) {
  var popup = document.getElementById("myPopup");
  popup.innerHTML = val;
  popup.classList.toggle("show");

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ popup.classList.toggle("show"); }, 3000);
}
</script>

<script>
// When the user clicks on div, open the popup
function bomb_test() {
  if(!document.getElementById("cc").checked && !document.getElementById("vvc").checked && document.getElementById("cvv").checked && document.getElementById("cv").checked && document.getElementById("a").checked && document.getElementById("b").checked && !document.getElementById("c").checked && document.getElementById("d").checked){document.getElementById("myModal").style.display="none";pop("Bomb Diffused!")}
}
</script>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>You found a bomb!</p>
    <p style="color:darkred;">Can you disarm it?
<br />
    ✂<input id="a" type="checkbox" onclick='bomb_test()' />☣
    ✂<input id="b" type="checkbox" onclick='bomb_test()' />☢
    ✂<input id="c" type="checkbox" onclick='bomb_test()' />☣
    ✂<input id="d" type="checkbox" onclick='bomb_test()' />☢
<br />
    ✂<input id="cv" type="checkbox" onclick='bomb_test()' />☢
    ✂<input id="cc" type="checkbox" onclick='bomb_test()' />☣
    ✂<input id="cvv" type="checkbox" onclick='bomb_test()' />☢
    ✂<input id="vvc" type="checkbox" onclick='bomb_test()' />☢
<br />
    ✂<input id="e" type="checkbox" onclick='bomb_test()' />☣
    ✂<input id="f" type="checkbox" onclick='bomb_test()' />☢
    ✂<input id="g" type="checkbox" onclick='bomb_test()' />☣
    ✂<input id="h" type="checkbox" onclick='bomb_test()' />☢
    </p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
//var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
//btn.onclick = function() {
//  modal.style.display = "block";
//}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</div>