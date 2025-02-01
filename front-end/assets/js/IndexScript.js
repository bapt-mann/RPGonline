const createRoom = document.getElementById("createRoom");
const joinRoom = document.getElementById("joinRoom");
const pseudo = document.getElementById("pseudo");



createRoom.addEventListener("click", function() {
    var formData = new FormData();
    formData.append("joueur1", pseudo.value);

    fetch("../back-end/php/creer_chambre.php", {
        /*method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "joueur1:"+ encodeURIComponent(pseudo.value)
        */
        method:"POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success==false) {
            alert(data.message);
            return;
        }
        alert("Chambre créée avec l'ID : " + data.chambre_id);
        sessionStorage.setItem("room_id", data.chambre_id);
        sessionStorage.setItem("player_id", data.player1_id);

        window.location.href = "waiting.html";
        

    });
});



joinRoom.addEventListener("click", function() {
    let roomId = document.getElementById("roomId").value;
    fetch("../back-end/php/rejoindre_chambre.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "chambre_id:" + encodeURIComponent(roomId)+"joueur2:"+ pseudo.value
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Rejoint avec succès !");
            sessionStorage.setItem("room_id", data.chambre_id);
            sessionStorage.setItem("player_id", data.player2_id);
            window.location.href = "waiting.html";
        } else {
            alert(data.message);
        }
    });
});