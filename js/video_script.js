// var video= document.querySelector('.video');
// var btn= document.getElementByID('play-pause');
// function play_pause() {

// 	if (video.pause){
// 		video.play();
		
// 	}
// 	else if(video.play){
// 		video.pause();
// 	}
// }
// btn.onclick=function(){
// alert('play!!!!!!!!');
// };

var vid, playbtn, seekslider, currentTimeTxt, durationTimeTxt, mutebtn, volumeslider, playbackSpeed, speedBack, speedForward;
function intializePlayer(){
// Set object references
    vid = document.getElementById("les_video");
    playbtn = document.getElementById("playpausebtn"); //element to get an id
    seekslider = document.getElementById("seekslider");
    currentTimeTxt = document.getElementById("currentTimeTxt");
    durationTimeTxt = document.getElementById("durationTimeTxt");
    mutebtn = document.getElementById("mutebtn");
    volumeslider = document.getElementById("volumeslider");
    playbackSpeed = document.getElementById("chosenSpeed");
    speedBack = document.getElementById("rewind");
     speedforward = document.getElementById("fastForward");
    // Add event listeners
    playbtn.addEventListener("click",playPause); // 
    // seekslider.addEventListener("change",vidSeek); // ("". function called)
    vid.addEventListener("timeupdate",seektimeupdate);
    vid.addEventListener("click",playPause);
    mutebtn.addEventListener("click",vidmute);
    volumeslider.addEventListener("change",setvolume);
    playbackSpeed.addEventListener("change", chosenSpeed);
    speedBack.addEventListener("click", rewind);
    speedforward.addEventListener("click",fastForward);
}
function chg_play(){
playbtn.innerHTML='';
}
window.onload = intializePlayer; // window.onload means that anything in between the curly brackets will run when the entire has loaded, including images, etc.
function playPause(){
    if(vid.paused){
    	vid.play();
        document.getElementById("play").style.display="none";
        document.getElementById("pause").style.display="block";
        
    } else {
    	vid.pause();
        document.getElementById("play").style.display="block";
        document.getElementById("pause").style.display="none";
        
    }
}

// function vidSeek(){
//     var seekto = vid.duration * (seekslider.value / 100);
//     vid.currentTime = seekto;
// }
// function seektimeupdate(){
//     var nt = vid.currentTime * (100 / vid.duration);
//     seekslider.value = nt;
//     var currentMinutes = Math.floor(vid.currentTime / 60);
//     var currentSeconds = Math.floor(vid.currentTime - currentMinutes * 60);
//     var durationMinutes = Math.floor(vid.duration / 60); // math.floor for rounding the numbers
//     var durationSeconds = Math.round(vid.duration - durationMinutes * 60); //Math.round for a more precise rounding no. (test)
//     if(currentSeconds < 10){ currentSeconds = "0"+currentSeconds; }
//     if(durationSeconds < 10){ durationSeconds = "0"+durationSeconds; } 
//     if(currentMinutes < 10){ currentMinutes = "0"+currentMinutes; } // calculates the current time of video
//     if(durationMinutes < 10){ durationMinutes = "0"+durationMinutes; }
//     currentTimeTxt.innerHTML = currentMinutes+":"+currentSeconds; //currentMinutes / currentSeconds = current mins / seconds
//     durationTimeTxt.innerHTML = durationMinutes+":"+durationSeconds; //durationMinutes / durationSeconds = duration minutes / seconds 
// }
function vidmute(){
    if(vid.muted){
        vid.muted = false;
        mutebtn.innerHTML = "Mute";
        volumeslider.value=vid.volume * 100;
    } else {
        vid.muted = true;
        mutebtn.innerHTML = "Unmute";
        volumeslider.value=0;
    }
}

function setvolume_mute(){
	if(!vid.muted){
		vid.muted=true;
		document.getElementById('volume').style.display='none';
		document.getElementById('muted').style.display='block';
	}
   else{
   	vid.muted=false;
   	document.getElementById('volume').style.display='block';
		document.getElementById('muted').style.display='none';
   }
}

function stop_it(){
    vid.currentTime=0;
    if(vid.play){
    	vid.pause();
        document.getElementById("play").style.display="block";
        document.getElementById("pause").style.display="none";
    }// uses the identifier for the playbackrate and connects value
}

function rewind() {
	if (vid.currentTime<5&&vid.currentTime>=0){
		alert("You just started the video!");
	}
    vid.currentTime-=5;
}
function fastForward(){
if (vid.duration-vid.currentTime<5){
alert("You have less than 5s left in this video!");
}
	vid.currentTime+=5;
}
function current_time(){
	if (vid.play)
do{
	var i=vid.currentTime;
		console.log(i);
	return document.write(i);
	i++;
}
while(vid.play && i <=vid.duration);
}
