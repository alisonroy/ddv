$("#answer-submit").click(function () {
  var answer = document.getElementById("answer-input-box").value;
  var answer_no = document.getElementById("answer-input-box").name;
  $.ajax({
    type: "POST",
    url: "assests/php/answer-check.php",
    datatype: "html",
    data: {
      username: localStorage.username,
      auth_token: localStorage.auth_token,
      answer: answer,
      answer_no: answer_no,
    },
    success: function (response) {
      var parsedResponse = JSON.parse(response);
      console.log(parsedResponse);
      if (parsedResponse != "false") {
        window.location.pathname = "ddv/" + parsedResponse + ".html";
      } else {
      }
    },

    error: function (error) {},
  });
});
