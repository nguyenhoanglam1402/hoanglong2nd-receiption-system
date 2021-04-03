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
        if(listOfReceiptions.length != response.length){
            listOfReceiptions = response;
            $('.listCustomer').empty();
            listOfReceiptions.forEach(receiption => {
                $('.listCustomer').append(
                    '<li class="customer-item">'+
                        '<div class="customer-item-card shadow-sm">'+
                            '<div class="title">'+
                                '<span class="customer-name-tag">'+receiption.name+'</span>'+
                                '<span class="due-tag">Ngày hẹn: <span class="date">'+receiption.dueDate+'</span></span>'+
                            '</div>'+
                            '<p class="customer-description">Dịch vụ đã đặt: <span class="services-tag">'+ receiption.typeOfService+'</span></p>'+
                            '<p class="customer-description">Số tiền đặt cọc: <b>'+ receiption.deposit+' VNĐ</b></p>'+
                        '</div>'+
                    '</li>'
                    );
            });
        }
    }
});