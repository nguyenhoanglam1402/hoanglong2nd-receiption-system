$(document).ready(function () {
    var listOfReceiptions = [];
    setInterval(() => {
        $.ajax({
            type: "POST",
            url: "/server-side/getReceiptions.php",
            dataType:"json",
            success: function (response) {
                displayComponent(response);
            },
            error: function (log) {
                console.log("Unexpected error :\n > Title: " + log.status + "\n > Status: " + log.statusText);
            }
        });
    }, 3000);

    function displayComponent(response){
        console.log(response);
    }
});