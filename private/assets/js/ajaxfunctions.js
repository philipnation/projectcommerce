$(function() {
    // Add a click event listener to the button
    $('#btn_register').click(function() {
        // Make an AJAX request
        const btn_register = document.getElementById("btn_register")
        btn_register.innerHTML = "<div class='custom-loader'></div>"
        setTimeout(function(){
            btn_register.innerHTML = 'sign up'
        }, 3000)
    });

    // Add a click event listener to the button
    $('#btn_login').click(function() {
        // Make an AJAX request
        const btn_login = document.getElementById("btn_login")
        btn_login.innerHTML = "<div class='custom-loader'></div>"
        setTimeout(function(){
            btn_login.innerHTML = 'sign in'
        }, 3000)
    });

    $("[class^='reduce']").click(function(){
        //alert(1)
        var quantity = $(this).siblings("[id^='quantity']").val();
        quantity--
        //alert(quantity)
    });
});