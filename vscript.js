        var audio = document.querySelector('audio');

        function captureMicrophone(callback) {
            navigator.mediaDevices.getUserMedia({
                audio: true
            }).then(callback).catch(function(error) {
                alert('Unable to access your microphone.');
                console.error(error);
            });
        }

        function stopRecordingCallback() {
            audio.srcObject = null;
            recorder.microphone.stop();
            var blob = recorder.getBlob();
            audio.src = URL.createObjectURL(blob);
            var fileType = 'audio'; // or "audio"
            var fileName = (Math.random() * 1000).toString().replace('.', '');

            if (fileType === 'audio') {
                fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'opus');
				}

            var formData = new FormData();
            formData.append(fileType + '-filename', fileName);
            formData.append(fileType + '-blob', blob);

            xhr('save.php', formData, function(fName) {
                window.open(location.href + fName);
            });

            function xhr(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {

                    }
                };
                request.open('POST', url);
                request.send(data);

            }








        }

        var recorder; // globally accessible

        document.getElementById('btn-start-recording').onclick = function() {
            this.disabled = true;
            captureMicrophone(function(microphone) {
                audio.srcObject = microphone;

                recorder = RecordRTC(microphone, {
                    type: 'audio',
                    recorderType: StereoAudioRecorder,
                    desiredSampRate: 16000
                });

                recorder.startRecording();

                // release microphone on stopRecording
                recorder.microphone = microphone;

                document.getElementById('btn-stop-recording').disabled = false;








            });
        };

        document.getElementById('btn-stop-recording').onclick = function() {
            this.disabled = true;
            recorder.stopRecording(stopRecordingCallback);

        };


        function getRandomString() {
            if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
                var a = window.crypto.getRandomValues(new Uint32Array(3)),
                    token = '';
                for (var i = 0, l = a.length; i < l; i++) {
                    token += a[i].toString(36);
                }
                return token;
            } else {
                return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
            }
        }





        function getFileName(fileExtension) {
            var d = new Date();
            var year = d.getUTCFullYear();
            var month = d.getUTCMonth();
            var date = d.getUTCDate();
            return 'RecordRTC-' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
        }

