$(document).ready(function () {

    var customerName;
    var typeOfService;
    var description;
    var totalMoney;
    var deposit;
    var dateTime;
    var phoneNumber;
    
    $('#send-button').click(function (e) { 
        customerName = $('#customer-name-input').val();
        typeOfService = $('#type-service-selector').val();
        description = $('#description-input').val();
        totalMoney = $('#total-money-input').val();
        deposit = $('#deposit-input').val();
        dateTime = $('#datetime-input').val();
        phoneNumber = $('#phonenumber').val();
        if(checkValidated()){
            $.ajax({
                type: "POST",
                url: "/server-side/submit_receiption.php",
                data: {
                    name: customerName,
                    type: typeOfService,
                    descr: description,
                    last: (totalMoney - deposit),
                    depos: deposit,
                    date: dateTime,
                    phone: phoneNumber
                },
                dataType: "dataType",
                success: function (response) {
                    alert(response);
                }
            });
        }
    });

    $('#cancel-button').click(function (e) { 
        cancel();        
    });

    function cancel(){
        location.href = '/index.php';
    }

    function checkValidated(){
        var isValidated = false;
        if(customerName == ''){
            alert('Bạn nên nhập tên khách hàng !');
        } else if (description == ''){
            alert('Bạn không nên bỏ trống chi tiết biên lai !');
        } else if (totalMoney <= 0 || totalMoney == null){
            alert('Tổng tiền của sản phẩm không hợp lệ !');
        } else if (deposit <= 0 || deposit == null){
            alert('Tiền đặt cọc không được dưới 0 đồng hoặc bỏ trống');
        } else if (dateTime == '' || dateTime == null){
            alert('Vui lòng định trước ngày hẹn của bạn với khách hàng !');
        } else if (phoneNumber == 0 || phoneNumber == null){
            alert('Vui lòng nhập số điện thoại của khách hàng để thuận tiện cho việc liên lạc!');
        } else{
            isValidated = true;
        }
        return isValidated;
    }
});