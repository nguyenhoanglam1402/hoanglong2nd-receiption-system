$(document).ready(function () {
    var listOfReceiptionsItems = [];
    var amountOfMarriedService = 0;
    var amountOfItemsService = 0;
    var amountOfPhotographerService = 0;
    var amountOfClothesService = 0;
    var refreshReceiption = setInterval(() => {
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
            amountOfMarriedService = 0;
            amountOfItemsService = 0;
            amountOfPhotographerService = 0;
            amountOfClothesService = 0;
            listOfReceiptionsItems.forEach(item => {
                createTaskBlock(item);
                addEffectAndColor(item)
            });
        }
        else if (response.length == 0) {
            clearInterval(refreshReceiption);
            cleanDisplay();
            buildNotification();
        }
        
    }

    function buildNotification() {
        var map = new Map();
        map.set(0, { urlImage: '/images/asset/QuotesArt/family.png', qouteContent: '"Your tasks have been done ! You need to find some peaceful and hopeful inside yourself and your family"' });
        map.set(1, { urlImage: '/images/asset/QuotesArt/yoga.png', qouteContent: "\"No tasks remaining ! Don't forget your health ! Standup and try with some gymnastics ! Not just you but with your child and family.\""});
        map.set(2, { urlImage: '/images/asset/QuotesArt/take_a_nap.png', qouteContent: '"Congratulation ! You deserve a nap and a smile ! Take it !"' });

        var randomeValue = Math.floor(Math.random() * map.size);

        $("main").append(
            '<link rel="stylesheet" href="/css/quotes.css">'+
            '<div class="qoutes-container">'+
                '<div class="quotes-block">' +
                    '<img class="qoutes-image" src="'+ map.get(randomeValue)['urlImage'] +'" alt="" srcset="">' +
                    '<p class="quote-content">"'+ map.get(randomeValue)['qouteContent'] +'"</p>'+
                '</div>' +
            '</div>'
        );

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
            case "L??m ????m c?????i":
                index = 0;
                amountOfMarriedService += 1;
                $('#amount-marrie-service').html(amountOfMarriedService);
                break;
            case "Ch???p ???nh c?????i":
                index = 1;
                amountOfPhotographerService += 1;
                $('#amount-photographer-service').html(amountOfPhotographerService);
                break;
            case "?????t m??m qu??? c?????i":
                index = 2;
                amountOfItemsService += 1;
                $('#amount-item-service').html(amountOfItemsService);
                break;
            case "??o c?????i/ trang ph???c":
                index = 3;
                amountOfClothesService += 1;
                $('#amount-clothes-service').html(amountOfClothesService);
                break;
        }
        $("." + title[index]).append(
        '<div class="task-tab" id="'+ item.rid +'">' +
          '<div class="light-line linear-blue"></div>'+
          '<div class="content-container">' +
            '<div class="tab-content">' +
              '<div class="tab-header">' +
                '<h1 class="customer-name">' + item.name + '</h1>'+
                '<p class="created-date">Ng??y t???o: ' + item.createdDate + '</p>'+
              '</div>'+
              '<p class="description-tag">M?? t??? chi ti???t</p>' +
              '<p class="description-content">'+ item.description +'</p>' +
              '<span class="deposit-block">' +
                '<h1 class="deposit-tag">?????t c???c: </h1>' +
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
                'Ho??n th??nh' +
              '</button>' +
              '<p class="due-date">Ng??y h???n: '+ item.dueDate +'</p>' +
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
            case "L??m ????m c?????i":
                $("#" + item.rid + " .light-line").addClass("linear-blue");
                break;
            case "Ch???p ???nh c?????i":
                $("#" + item.rid + " .light-line").addClass("linear-orange");
                break;
            case "?????t m??m qu??? c?????i":
                $("#" + item.rid + " .light-line").addClass("linear-light-green");
                break;
            case "??o c?????i/ trang ph???c":
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