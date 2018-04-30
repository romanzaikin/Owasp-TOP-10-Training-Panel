$("#register").click(function () {
    $("#login-panel").fadeOut(1000);
    $("#register-panel").delay(1000).fadeIn(1000);
});
$("#login").click(function () {
    $("#register-panel").fadeOut(1000);
    $("#login-panel").delay(1000).fadeIn(1000);
});