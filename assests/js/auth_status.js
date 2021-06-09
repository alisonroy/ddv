$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "assests/php/auth_status.php",
    datatype: "html",
    data: {
      username: localStorage.username,
      auth_token: localStorage.auth_token,
    },
    success: function (response) {
      var parsedResponse = JSON.parse(response);
      console.log(parsedResponse);
      if (parsedResponse != "false") {
        console.log("Auth Success");
      } else {
        window.location.pathname = "ddv/logout.html";
      }
    },

    error: function (error) {},
  });
});
