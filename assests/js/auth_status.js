$(document).ready(function () {
  var page_check = true;
  if (window.location.pathname == "/intro.html") {
    var page_check = false;
  }
  $.ajax({
    type: "POST",
    url: "assests/php/auth_status.php",
    datatype: "html",
    data: {
      username: localStorage.username,
      auth_token: localStorage.auth_token,
      page_check: page_check,
    },
    success: function (response) {
      console.log(response);
      var parsedResponse = JSON.parse(response);
      console.log(parsedResponse);
      if (parsedResponse != "false") {
        if (parsedResponse != "success") {
          if (window.location.pathname != parsedResponse) {
            window.location.pathname = parsedResponse;
          }
        }
      } else {
        window.location.pathname = "/logout.html";
        localStorage.clear;
      }
    },

    error: function (error) {},
  });
});
