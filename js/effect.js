function setStatusOfCustomerCard(){
    var customerItem = document.getElementsByClassName('customer-item-card');
    var dueDay = document.getElementsByClassName('date');
    for(var index = 0; index < customerItem.length; index++){
        var remainingDate = calculateDifferentDay(dueDay[index].innerHTML);
        if( remainingDate >= 3 && remainingDate <=7){
            customerItem[index].style.backgroundColor = '#fc891275';
        }
        else if(remainingDate < 2){
            customerItem[index].style.backgroundColor = '#fc1d1275';
        }
        else{
            customerItem[index].style.backgroundColor = '#1275fc75';
        }
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