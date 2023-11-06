        var videoElement = document.getElementById('video');
        function mPlay() {
            if (document.getElementById('play-btn').innerHTML == "▶️") {
                document.getElementById('play-btn').innerHTML = "⏸️";
                document.getElementById('play-btn').title = "Pause";
                videoElement.play();
            } else {
                document.getElementById('play-btn').title = "Play";
                document.getElementById('play-btn').innerHTML = "▶️"
                videoElement.pause();
            }
        }

        function mPause() {
            videoElement.pause();
        }
        function restart() {
            /* Move currentTime to start */
            videoElement.currentTime = 0;
        }
        function halfSpeed() {
            /* Set to half speed */
            var speed = 0.5;
            videoElement.playbackRate = speed;
        }
        function doubleSpeed() {
            /* Set to double speed */
            var speed = 2.0;
            videoElement.playbackRate = speed;
        }

        function back() {
            /* Move 10 seconds back */
            var seekTime = videoElement.currentTime - 10;
            if (seekTime >= 0 && seekTime <= videoElement.duration) {
                videoElement.currentTime = seekTime;
            }
        }
        function forward() {
            /* Move 10 seconds forward */
            var seekTime = videoElement.currentTime + 10;
            if (seekTime >= 0 && seekTime <= videoElement.duration) {
                videoElement.currentTime = seekTime;
            }
        }
        function playV(id) {
            var cnt = document.getElementById("cnt").value;
            var activeSource = document.getElementById("v" + cnt);
            document.getElementById("cnt").value = id;
            var nextSource = document.getElementById("v" + id);
            activeSource.className = '';
            nextSource.className = 'active';
            videoElement.src = nextSource.src;
            videoElement.play();
            document.getElementById('play-btn').innerHTML = "⏸️";
            document.getElementById('play-btn').title = "Pause";
        }
        function next() {
            var cnt = document.getElementById("cnt").value;
            var activeSource = document.getElementById("v" + cnt);
            var total = parseInt(document.getElementById("video").childElementCount) - 1;
            if (parseInt(cnt) >= total) {
                cnt = 0
            } else {
                cnt = ++cnt
            }
            document.getElementById("cnt").value = cnt;
            var nextSource = document.getElementById("v" + cnt);
            activeSource.className = '';
            nextSource.className = 'active';
            videoElement.src = nextSource.src;
            videoElement.play();
            document.getElementById('play-btn').innerHTML = "⏸️";
            document.getElementById('play-btn').title = "Pause";
        }
        function last() {
            var cnt = document.getElementById("cnt").value;
            var nextSource;
            var activeSource = document.getElementById("v" + cnt);
            if (parseInt(cnt) > 0) {
                cnt = --cnt
                document.getElementById("cnt").value = cnt;
                nextSource = document.getElementById("v" + cnt);
            } else {
                var lc = document.getElementById("video").lastChild;
                nextSource = document.getElementById(lc.id);
                document.getElementById("cnt").value = lc.id.toString().replace("v", "");
            }
            activeSource.className = '';
            nextSource.className = 'active';
            videoElement.src = nextSource.src;
            videoElement.play();
            document.getElementById('play-btn').innerHTML = "⏸️";
            document.getElementById('play-btn').title = "Pause";
        }

        videoElement.addEventListener('loadeddata', function () {
            console.log('Video loaded.');
        });

        videoElement.addEventListener('timeupdate', function () {
            console.log('Current time: ' + videoElement.currentTime);
        });

        videoElement.addEventListener('seeked', function () {
            console.log('Seek operation completed.');
            videoElement.play();
        });

        videoElement.addEventListener('stalled', function () {
            console.log('Video stalled.');
        });

        videoElement.addEventListener('ended', function (e) {
            console.log('Video ended.');
            var cnt = document.getElementById("cnt").value;
            var activeSource = document.getElementById("v" + cnt);
            var total = parseInt(document.getElementById("video").childElementCount) - 1;
            if (parseInt(cnt) >= total) {
                cnt = 0
            } else {
                cnt = ++cnt
            }
            document.getElementById("cnt").value = cnt;
            var nextSource = document.getElementById("v" + cnt);
            activeSource.className = '';
            nextSource.className = 'active';
            videoElement.src = nextSource.src;
            videoElement.play();
            document.getElementById('play-btn').innerHTML = "⏸️";
            document.getElementById('play-btn').title = "Pause";
        });
                /* --> */