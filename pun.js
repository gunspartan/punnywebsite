var puns = ["pun1", "pun2", "pun3", "pun4"];
var randomNum = Math.floor(Math.random() * (puns.length - 1));
var randomPun = puns[randomNum];

$(function() {
  $("#pun").html(randomPun);
});
