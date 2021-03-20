function setStatusOfCustomerCard(){
    var date = document.getElementsByClassName('date').val;
    var date = new Date();
    if()
}

function parseDateType(){
    var part = str.split('/');
    return new Date(part[2], part[0]-1,part[1]);
}

function datediff(first, second) {
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return Math.round((second-first)/(1000*60*60*24));
}