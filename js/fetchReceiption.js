$(document).ready(function () {
    var listOfReceiptions = [];
    setInterval(() => {
        $.ajax({
            type: "GET",
            url: "/server-side/getRecieptions.php",
            dataType:"json",
            success: function (response) {
                displayComponent(response);
            },
            error: function (log) {
                console.log("Unexpected error :" + log);
            }
        });
    }, 3000);

    function displayComponent(response){
        console.log(response);
    }
});