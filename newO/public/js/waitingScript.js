const room_id = document.querySelector('#room_id');
const player_id = document.querySelector('#player_id');
const ready = document.querySelector('#ready');


if (sessionStorage.getItem("room_id")){
    room_id.innerText = sessionStorage.getItem("room_id")
}

ready.addEventListener("click", function() {
    if (sessionStorage.getItem('ready')=='ready') sessionStorage.setItem("ready", "");
    else sessionStorage.setItem("ready", "ready");

})

player_id.innerText = sessionStorage.getItem("player_id")