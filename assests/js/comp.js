var mouseXY = {};
$(document).on("mousemove", function (event) {
  mouseXY.X = event.pageX;
  mouseXY.Y = event.pageY;
});
var iCompass = $("#compass");
var prevXY = { X: null, Y: null };
var cowInterval = setInterval(function () {
  if (
    prevXY.Y != mouseXY.Y ||
    (prevXY.X != mouseXY.X && (prevXY.Y != null || prevXY.X != null))
  ) {
    var compassXY = iCompass.position();
    var diffX = compassXY.left - mouseXY.X;
    var diffY = compassXY.top - mouseXY.Y;
    var tan = diffY / diffX;

    var atan = (Math.atan(tan) * 180) / Math.PI;
    if (diffY > 0 && diffX > 0) {
      atan += 180;
    } else if (diffY < 0 && diffX > 0) {
      atan -= 180;
    }

    prevXY.X = mouseXY.X;
    prevXY.Y = mouseXY.Y;
    iCompass.css({ transform: "rotate(" + atan + "deg)" });
  }
}, 10);
$(window).on("load", function () {
  document.getElementById("main").style.visibility = "hidden";
  /* Progress Bar animation */
  document.getElementById("loader").style.visibility = "visible";
  setTimeout(function () {
    document.getElementById("loader").style.visibility = "hidden";
    document.getElementById("main").style.visibility = "visible";
  }, 5000);
});
