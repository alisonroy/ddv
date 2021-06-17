$(".email").on("change keyup paste", function () {
  if ($(this).val()) {
    $(".icon-paper-plane").addClass("next");
  } else {
    $(".icon-paper-plane").removeClass("next");
  }
});
$(".next-button").hover(function () {
  $(this).css("cursor", "pointer");
});

$(".next-button.email").click(function () {
  var username = document.getElementById("username").value;
  $.ajax({
    type: "POST",
    url: "assests/php/login-check.php",
    datatype: "html",
    data: {
      username: username,
    },
    success: function (response) {
      var parsedResponse = JSON.parse(response);
      console.log(parsedResponse);
      if (parsedResponse != "false") {
        console.log("Username Correct");
        localStorage.setItem("username", username);
        $(".email-section").addClass("fold-up");
        $(".password-section").removeClass("folded");
      } else {
        console.log("Username wrong");
        var fail = document.getElementById("failed");
        fail.innerHTML = "";
        var para = document.createElement("p");
        var paratext = document.createTextNode("Wrong Username");
        para.appendChild(paratext);
        fail.appendChild(para);
        fail.classList.remove("d-none");
      }
    },

    error: function (error) {},
  });
});

$(".password").on("change keyup paste", function () {
  if ($(this).val()) {
    $(".icon-lock").addClass("next");
  } else {
    $(".icon-lock").removeClass("next");
  }
});

$(".next-button").hover(function () {
  $(this).css("cursor", "pointer");
});

// $(".next-button.password").click(function () {
//   console.log("Something");
//   $(".password-section").addClass("fold-up");
//   $(".repeat-password-section").removeClass("folded");
// });

// $(".repeat-password").on("change keyup paste", function () {
//   if ($(this).val()) {
//     $(".icon-repeat-lock").addClass("next");
//   } else {
//     $(".icon-repeat-lock").removeClass("next");
//   }
// });

$(".next-button.password").click(function () {
  var password = document.getElementById("password").value;
  $.ajax({
    type: "POST",
    url: "assests/php/password.php",
    datatype: "html",
    data: {
      username: localStorage.username,
      password: password,
    },
    success: function (response) {
      var parsedResponse = JSON.parse(response);
      console.log(parsedResponse);
      if (parsedResponse != "false") {
        localStorage.setItem("auth_token", parsedResponse);
        console.log("Password Correct");
        $(".password-section").addClass("fold-up");
        window.location.pathname = "/intro.html";
      } else {
        console.log("Password wrong");
        var fail = document.getElementById("failed");
        fail.innerHTML = "";
        var para = document.createElement("p");
        var paratext = document.createTextNode("Wrong Password");
        para.appendChild(paratext);
        fail.appendChild(para);
        fail.classList.remove("d-none");
      }
    },

    error: function (error) {},
  });
});

$("#failed").click(function () {
  document.getElementById("failed").classList.add("d-none");
});
