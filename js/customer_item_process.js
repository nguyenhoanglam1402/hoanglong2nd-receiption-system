document.body.onclick = function(element){
    if(element.target.getAttribute("class") == "customer-item-card") {
        sessionStorage.setItem('receiption', element.target.getAttribute("id"));
        console.log("I'm here ");
    }
}