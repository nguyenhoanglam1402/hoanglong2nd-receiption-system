$(document).ready(function () {
    var listOfReceiptions = [];
    setInterval(() => {
        $.ajax({
            type: "POST",
            url: "/server-side/getRecieption.php",
            dataType:"json",
            success: function (response) {
                displayComponent(response);
            }
        });
    }, 3000);

    function displayComponent(response){
        console.log(response);
    }
});