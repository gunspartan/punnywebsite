$(function() {
  var $pun = $("#pun");
  var $name = $("#name");
  var $content = $("#content");

  function loadPun(puns) {
    var randomNum = Math.floor(Math.random() * puns.length);
    var randomPun = puns[randomNum];
    $pun.html(randomPun.punTitle + "<br> <p>" + randomPun.punContent + "</p>");
  }
  $.ajax({
    type: "GET",
    url: "/api/puns.json",
    success: function(puns) {
      loadPun(puns);
    },
    error: function() {
      alert("error loading puns");
    }
  });

  $("#new-pun").on("click", function() {
    $.ajax({
      type: "GET",
      url: "/api/puns.json",
      success: function(newPun) {
        loadPun(newPun);
      },
      error: function() {
        alert("error loading puns");
      }
    });
  });

  $("#add-pun").on("click", function() {
    var punToPost = {
      punTitle: $name.val(),
      punContent: $content.val()
    };

    $.ajax({
      type: "GET",
      url: "/api/puns.json",
      data: punToPost,
      success: function() {
        alert("Pun added");
      },
      error: function() {
        alert("error saving pun");
      }
    });
  });
});
