$("#answer-submit").click(function (e) {
  e.preventDefault();
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
        if (parsedResponse != "wrong") {
          window.location.pathname = "/" + parsedResponse + ".html";
        } else {
          document.getElementById("wrong-ans").classList.remove("d-none");
          setTimeout(function () {
            document.getElementById("wrong-ans").classList.add("d-none");
          }, 5000);
        }
      }
    },

    error: function (error) {},
  });
});
