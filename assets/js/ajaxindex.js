$(document).ready(function(){

    $("#individual_login_button").click(function(){
        var individual_unique_id = $("#individual_unique_id").val();
        $.post("include/login_individual.php", {
            //The first name, rate , and message is the post array and then the second onces are the variables
            individual_unique_id: individual_unique_id
        }, function(data, status){
            $("#login_reply").html(data);
            document.getElementById("login_reply").style.display = 'block';
            //document.getElementById("loginform").style.display = 'none';
            if (document.getElementById('login_reply').innerHTML == '<p>fill in the required details</p>'){
                setTimeout(closeloginreply, 3000)
            }
            else if (document.getElementById('login_reply').innerHTML == '<p>code does not exist</p>'){
                setTimeout(closeloginreply, 3000)
            }
            else{
                setTimeout(closeloginreply, 3000)
                window.location.href = 'individual'
            }
        });
    });
});


$(document).ready(function(){
    $("#building_login_button").click(function(){
        var building_unique_id = $("#building_unique_id").val();
        $.post("../handlers/adduserdetails.php", {
            //The building_unique_id is the post array and then the second onces are the variables
            building_unique_id: building_unique_id
        }, function(data, status){
            $("#login_reply").html(data);
            alert(data);
        });
    });
});


$(document).ready(function(){

    $("#individual_register_button").click(function(){
        var individual_name = $("#individual_name").val();
        var individual_building_address = $("#individual_building_address").val();
        var individual_street_name = $("#individual_street_name").val();
        var individual_phone_number = $("#individual_phone_number").val();
        var individual_landmark = $("#individual_landmark").val();
        var individual_flat_number = $("#individual_flat_number").val();
        var individual_email = $("#individual_email").val();
        var individual_location = $("#individual_location").val();
        $.post("include/register_individual.php", {
            //The first name, rate , and message is the post array and then the second onces are the variables
            individual_name: individual_name,
            individual_building_address: individual_building_address,
            individual_street_name: individual_street_name,
            individual_phone_number: individual_phone_number,
            individual_landmark: individual_landmark,
            individual_flat_number: individual_flat_number,
            individual_email: individual_email,
            individual_location: individual_location
        }, function(data, status){
            $("#login_reply").html(data);
            document.getElementById("login_reply").style.display = 'block';
            //document.getElementById("loginform").style.display = 'none';
            if (document.getElementById('login_reply').innerHTML == '<p>fill in the required details</p>'){
                setTimeout(closeloginreply, 3000)
            }
            else if (document.getElementById('login_reply').innerHTML == '<p>account not created</p>'){
                setTimeout(closeloginreply, 3000)
            }
            else{
                document.getElementById('regindividual').style.display = 'none'
                //setTimeout(closeloginreply, 30000)
                //window.location.reload()
            }
        });
    });
});


$(document).ready(function(){

    $("#building_register_button").click(function(){
        var contact_name = $("#contact_name").val();
        var building_building_address = $("#building_building_address").val();
        var building_street_name = $("#building_street_name").val();
        var contact_phone_number = $("#contact_phone_number").val();
        var building_flat_total = $("#building_flat_total").val();
        var building_email = $("#building_email").val();
        var building_location = $("#building_location").val();
        $.post("include/register_building.php", {
            //The first name, rate , and message is the post array and then the second onces are the variables
            contact_name: contact_name,
            building_building_address: building_building_address,
            building_street_name: building_street_name,
            contact_phone_number: contact_phone_number,
            building_flat_total: building_flat_total,
            building_email: building_email,
            building_location: building_location
        }, function(data, status){
            $("#login_reply").html(data);
            document.getElementById("login_reply").style.display = 'block';
            //document.getElementById("loginform").style.display = 'none';
            if (document.getElementById('login_reply').innerHTML == '<p>fill in the required details</p>'){
                setTimeout(closeloginreply, 3000)
            }
            else if (document.getElementById('login_reply').innerHTML == '<p>account not created</p>'){
                setTimeout(closeloginreply, 3000)
            }
            else{
                document.getElementById('regbuilding').style.display = 'none'
                //setTimeout(closeloginreply, 3000)
                //window.location.reload()
            }
        });
    });
});