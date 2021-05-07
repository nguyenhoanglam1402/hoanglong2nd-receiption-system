$(document).ready(function () {
    var listOfReceiptions = [];
    var remainingDate;
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
    }, 1000);

    function displayComponent(response){
        console.log(response);
        if(listOfReceiptions.length != response.length){
            listOfReceiptions = response;
            $('.listCustomer').empty();
            listOfReceiptions.forEach(receiption => {
                $('.listCustomer').append(
                    '<li class="customer-item">'+
                    '<div class="customer-item-card shadow-sm dark-tab shadow-sm">'+
                        '<div class="title">'+
                            '<span class="customer-name-tag">'+receiption.name+'</span>'+
                        '</div>'+
                        '<p class="customer-description">Dịch vụ đã đặt: <span class="services-tag">'+ receiption.typeOfService+'</span></p>'+
                        '<p class="customer-description">Số tiền đặt cọc: <b>'+ receiption.deposit+' VNĐ</b></p>'+
                        '<div class="notification" id="'+receiption.rid+'">'+
                          '<span class="warning-notification ">'+ remainingDate +' NGÀY</span>'+
                          '<span class="due-tag">Ngày hẹn: <span class="date">'+receiption.dueDate+'</span></span>'+
                        '</div>'+
                    '</div>'+
                  '</li>'
                );
                setStatusOfCustomerCard(receiption.dueDate, receiption.rid);
            });
        } else if(response.length == 0){
            $('.listCustomer').empty();
            $('.listCustomer').append(
                '<li class="trending-list-item">'+
                    '<i class="fas fa-frown"></i>Không có dữ liệu ! '+
                '</li>');
        }
    }

    function setStatusOfCustomerCard(dueDate, rid){
        remainingDate = calculateDifferentDay(dueDate);
        if( remainingDate >= 3 && remainingDate <=7){
            $("#" + rid).addClass("warning-time");
        }
        else if(remainingDate < 3){
            $("#" + rid).addClass("dangerous-time");
        }
        else{
            $("#" + rid).addClass("long-term");
        }
    }

    function calculateDifferentDay(dateEnd){
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