const waves = document.querySelector("#bermuda-triangle-waves");
const ship = document.querySelector("#bermuda-triangle-ship");
const airplane01 = document.querySelector("#bermuda-triangle-airplane-01");
const airplane02 = document.querySelector("#bermuda-triangle-airplane-02");
const triangles = document.querySelectorAll(".bermuda-triangle-triangle");

TweenMax.set(triangles[0], { transformOrigin: "224 212" });
TweenMax.set(triangles[1], { transformOrigin: "160 162" });
TweenMax.set(triangles[2], { transformOrigin: "83 97" });

const tl = new TimelineMax();

tl.to(
  ship,
  5,
  {
    transformOrigin: "center",
    rotation: 360,
    scale: 0.3,
    opacity: 0,
    x: 180,
    y: -100,
    repeat: -1,
    ease: Power2.easeIn,
    yoyo: true,
  },
  0
);

tl.to(
  airplane01,
  5,
  {
    transformOrigin: "center",
    rotation: 360,
    scale: 0.3,
    opacity: 0,
    y: 140,
    repeat: -1,
    ease: Power2.easeIn,
    yoyo: true,
  },
  0
);

tl.to(
  airplane02,
  5,
  {
    transformOrigin: "center",
    rotation: 360,
    scale: 0.3,
    opacity: 0,
    x: -140,
    y: -140,
    repeat: -1,
    ease: Power2.easeIn,
    yoyo: true,
  },
  0
);

tl.fromTo(
  waves,
  3,
  {
    opacity: 0.4,
    transformOrigin: "center",
  },
  {
    rotation: 5,
    opacity: 1,
    repeat: -1,
    ease: Power2.easeInOut,
    yoyo: true,
  },
  0
);

tl.staggerTo(
  triangles,
  7,
  {
    rotation: 122,
    repeat: -1,
    ease: Back.easeInOut,
    yoyo: true,
  },
  -0.3,
  0
);
$(window).on("load", function () {
  document.getElementById("main").style.visibility = "hidden";
  /* Progress Bar animation */
  document.getElementById("loader").style.visibility = "visible";
  setTimeout(function () {
    document.getElementById("loader").style.visibility = "hidden";
    document.getElementById("main").style.visibility = "visible";
  }, 5000);
});
