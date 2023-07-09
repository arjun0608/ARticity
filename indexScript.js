console.log("Welcome to ARticity...");

let songIndex = 0;
let audioElement = new Audio ("Khamoshi.mp3");
let masterPlay = document.getElementById('masterPlay');
let masterPause = document.getElementById('masterPause');
let myProgressBar = document.getElementById('myProgressBar');
let songItems = Array.from(document.getElementsByClassName('songItem'));

let songs= [
        {song: "Khamoshi", filePath:"songs/Khamoshi.mp3", coverPath: "covers/Profile.jpg"},
]

songItems.forEach(element => {
    console.log(element,i);
    element.getElementsByTagName("img")[0].src = songs[i].filePath;
});
masterPlay.addEventListener('click',()=>{
    if(audioElement.paused || audioElement.currentTime<=0) {
        audioElement.play();
        masterPlay.classList.remove("playMusic");
        document.getElementById("masterPause").style.display = "block";
        masterPlay.classList.add("pauseMusic");
    }
})
masterPause.addEventListener('click',()=>{
    if(audioElement.played) {
        audioElement.pause();
        masterPlay.classList.remove("pauseMusic");
        document.getElementById("masterPause").style.display = "none";
        masterPlay.classList.add("playMusic");
    }
})

audioElement.addEventListener('timeupdate',()=>{
    console.log('timeupdate');
    progress = parseInt((audioElement.currentTime/audioElement.duration)*100);
    console.log(progress);
    myProgressBar.value = progress;
})

myProgressBar.addEventListener('change',()=>{
    audioElement.currentTime = myProgressBar.value * audioElement.duration/100;
})
