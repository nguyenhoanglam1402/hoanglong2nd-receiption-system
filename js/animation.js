$(document).ready(function () {
    $(".task-container ").on("click", ".task-tab .done-button", function () {
        var taskTab = $(this).parents(".task-tab");
        var notificationLine = $(this).closest("div");
        var notificationMessage = notificationLine.find(".due-date");
        var currentStatus = notificationLine.attr("class").split(' ').pop();
        var taskID = $(taskTab).attr("id");
        $(notificationLine).removeClass(currentStatus);
        $(notificationLine).addClass("completed-task");
        $(this).html("");
        var timeout = 4;
        var countDown = setInterval(() => {
            timeout -= 1;
            console.log(timeout);
            if (timeout < 0) {
                clearInterval(countDown);
                updateReceiption();
            } else if (timeout <= 3 && timeout >= 0) {
                $(notificationMessage).html("Đưa vào kho lưu trữ sau " + timeout + " giây" + '<i class="fas fa-cloud-upload-alt"></i>');
            }
        }, 1000);

        function updateReceiption() {
            $.ajax({
                type: "POST",
                url: "./server-side/receiptionStorage.php",
                data: {
                    function: 'setStatus',
                    updatedStatus: true,
                    receiptionID: taskID
                },
                success: function (response) {
                    $(taskTab).remove();
                    console.log(response);
                },
                error: function (response) {
                    $(this).html("Thử lại");
                    console.log(response.status);
                },
            });  
        }
      
    });
});

