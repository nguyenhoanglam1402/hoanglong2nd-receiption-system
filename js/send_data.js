$(document).ready(function () {

    $('#send-button').click(function (e) { 
        
    });

    $('#cancel-button').click(function (e) { 
        cancel();        
    });

    function cancel(){
        window.location.href('/index.php');
    }
});