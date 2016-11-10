$(document).ready(function(){

    // show register form / hide login form
    $("#sign-up").click(function(){
        $("#login").slideUp("slow", function(){
            $("#register").slideDown("slow");
        });
    });

    // show login form / hide register form
    $("#sign-in").click(function(){
        $("#register").slideUp("slow", function(){
            $("#login").slideDown("slow");
        });
    });

    
});
