$("#login-button").click(function(event){
        event.preventDefault();

    $('form').fadeOut(500);
    $('.wrapper').addClass('form-success');
});
$("#signUpHere-button").click(function(event){
    openfile("signUP.html");
});
