
let btn_start = document.getElementById("btn_start");
let btn_player1_point = document.getElementById("btn_player1_point");
let btn_player2_point = document.getElementById("btn_player2_point");    
btn_player1_point.addEventListener("click", function(){addPointToPlayer("1")});
btn_player2_point.addEventListener("click", function(){addPointToPlayer("2")});
btn_start.addEventListener("click", function(){
    location.reload();
});

function addPointToPlayer(player){

}
