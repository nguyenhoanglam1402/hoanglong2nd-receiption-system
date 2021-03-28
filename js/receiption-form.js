var customerName = document.getElementById('customer-name-input').value;
var typeOfService = document.getElementById('type-service-selector').value;
var description = document.getElementById('description-input').value;
var totalMoney = document.getElementById('total-money-input').value;
var deposit = document.getElementById('deposit-input').value;
var dateTime = document.getElementById('datetime-input').value;
var phoneNumber = document.getElementById('phonenumber').value;


function cancel(){
    location.href='/index.php';
}

function checkExistedUser(){
    var isExistUser = true;
    var customer = customerName;
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "/server-side/")
    return isExistUser;
}

function sendReceiption(){
    if(true){
        var formData = new FormData(this);
        formData.append(CustomerName, customerName);
        formData.append(Type,typeOfService);
        var xhtml = new XMLHttpRequest();
        xhtml.open("POST", "/server-side/checkAvailableUser", true);
        xhtml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhtml.send(formData);
    }
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