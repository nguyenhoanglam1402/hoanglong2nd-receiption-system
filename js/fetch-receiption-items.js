$(document).ready(function () {
    var listOfReceiptionsItems = [];

    setInterval(() => {
        $.ajax({
            type: "POST",
            url: "./server-side/getReceiptions.php",
            data: {
              amount: 30  
            },
            dataType: "json",
            success: function (response) {
                displayReceiptionItem(response);
            }
        });
    }, 1000);

    function displayReceiptionItem(response) {
        if ((listOfReceiptionsItems.length != response.length) && response.length !=0) {
            cleanColumn();
            listOfReceiptionsItems = response;
            listOfReceiptionsItems.forEach(item => {
                createTaskBlock(item);
                addEffectAndColor(item)
            });
        }
        else if (response.length == 0) {
            cleanDisplay();
            rebuildDisplay();
        }
        
    }

    function cleanDisplay() {
        $(".column-container").remove();
    }

    function cleanColumn() {
        $(".marrie-service").empty();
        $(".photographer-service").empty();
        $(".item-service").empty();
        $(".clothes-service").empty();
    }

    function createTaskBlock(item) {
        var title = ["marrie-service", "photographer-service", "item-service","clothes-service"];
        var index = 0;
        var depositCurrencyFormat = new Intl.NumberFormat({ style: 'currency', currency: 'JPY' }).format(item.deposit);
        switch (item.typeOfService) {
            case "Làm đám cưới":
                index = 0;
                break;
            case "Chụp ảnh cưới":
                index = 1;
                break;
            case "Đặt mâm quả cưới":
                index = 2;
                break;
            case "Áo cưới/ trang phục":
                index = 3;
                break;
        }
        $("." + title[index]).append(
        '<div class="task-tab" id="'+ item.rid +'">' +
          '<div class="light-line linear-blue"></div>'+
          '<div class="content-container">' +
            '<div class="tab-content">' +
              '<div class="tab-header">' +
                '<h1 class="customer-name">' + item.name + '</h1>'+
                '<p class="created-date">Ngày tạo: ' + item.createdDate + '</p>'+
              '</div>'+
              '<p class="description-tag">Mô tả chi tiết</p>' +
              '<p class="description-content">'+ item.description +'</p>' +
              '<span class="deposit-block">' +
                '<h1 class="deposit-tag">Đặt cọc: </h1>' +
                '<p class="deposit-value">'+ depositCurrencyFormat +'VND</p>' +
              '</span>' +
              '<span class="phone-block">' +
                '<h1 class="phone-tag">Phone number:</h1>' +
                '<p class="phone-number">'+ item.phoneNumber +'</p>' +
              '</span>' +
            '</div>' +
            '<div class="notification-line">' +
              '<button class="done-button">' +
                '<i class="fas fa-check-circle"></i>'+
                'Hoàn thành' +
              '</button>' +
              '<p class="due-date">Ngày hẹn: '+ item.dueDate +'</p>' +
            '</div>' +
          '</div>' +
        '</div>' 
        );
    }

    function addEffectAndColor(item) {
        // Change color of notification line following the deadline
        var remainingDate = calculateDifferentDay(item.dueDate);

        if (remainingDate >= 7) {
            $("#" + item.rid + " .notification-line").addClass("long-term");
        }
        else if (remainingDate >= 3 && remainingDate < 7) {
            $("#" + item.rid + " .notification-line").addClass("warning-time");
        }
        else {
            $("#" + item.rid + " .notification-line").addClass("dangerous-time");
        }
        switch (item.typeOfService) {
            case "Làm đám cưới":
                $("#" + item.rid + " .light-line").addClass("linear-blue");
                break;
            case "Chụp ảnh cưới":
                $("#" + item.rid + " .light-line").addClass("linear-orange");
                break;
            case "Đặt mâm quả cưới":
                $("#" + item.rid + " .light-line").addClass("linear-light-green");
                break;
            case "Áo cưới/ trang phục":
                $("#" + item.rid + " .light-line").addClass("linear-green");
                break;
        }
    }

    function calculateDifferentDay(dateEnd) {
        var currentDate = new Date();
        var dateTime = currentDate.getFullYear()+'-'+
                        (currentDate.getMonth() + 1) +'-'+
                        currentDate.getDate();
        var currentTime = new Date(dateTime);
        var dueDay = new Date(dateEnd);
        var time_difference = dueDay.getTime() - currentTime.getTime();  
        var days_difference = time_difference / (1000 * 60 * 60 * 24);  
        return days_difference;
    }
});