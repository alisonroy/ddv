$(window).on("load", function () {
  $.ajax({
    type: "POST",
    url: "assests/php/credit.php",
    datatype: "html",
    data: {
      username: localStorage.username,
      auth_token: localStorage.auth_token,
    },
    success: function (response) {
      var parsedResponse = JSON.parse(response);
      console.log(parsedResponse);
      if (parsedResponse != "false") {
        if (parsedResponse != "success" && parsedResponse != "finished") {
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
StarWars = (function () {
  /*
   * Constructor
   */
  function StarWars(args) {
    // Context wrapper
    this.el = $(args.el);

    // The animation wrapper
    this.animation = this.el.find(".animation");

    // Remove animation and shows the start screen
    this.reset();

    // Start the animation on click
    // this.start.bind(
    //   "click",
    // $(document).on("ready", function () {
    //   $.proxy(function () {
    //     // this.start.hide();
    //     // this.audio.play();
    //     this.el.append(this.animation);
    //   }, this);
    // });
    // );
    this.el.append(this.animation);

    // Reset the animation and shows the start screen
    // $(this.audio).bind(
    //   "ended",
    //   $.proxy(function () {
    //     this.audio.currentTime = 0;
    //     this.reset();
    //   }, this)
    // );
  }

  /*
   * Resets the animation and shows the start screen.
   */
  StarWars.prototype.reset = function () {
    // this.start.show();
    this.cloned = this.animation.clone(true);
    this.animation.remove();
    this.animation = this.cloned;
  };

  return StarWars;
})();

new StarWars({
  el: ".starwars",
});
