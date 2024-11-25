$(document).ready(function(){
    //menú vertical
    $(".navbar-toggler").click(function(e) {
        e.preventDefault();
        $("#navbarNav").toggleClass("active");
    });
});