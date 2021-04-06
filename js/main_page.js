
var listOfDailyData = [];
var dataset = new Clerk();
var dataset1 = new Clerk();
var dataset2 = new Clerk();
var dataset3 = new Clerk();


setInterval(()=>{ 
    getDataFromWeek()
},3000);

function getDataFromWeek(){
    $.ajax({
        type: "POST",
        url: "/server-side/getDataForChart.php",
        dataType: "json",
        success: function (response) {
            dataResolve(response);
            console.log(response);
        }
    });
}

function dataResolve(response){

    if(listOfDailyData.length != response.length){
        listOfDailyData = null;
        listOfDailyData = response;
        console.log(listOfDailyData);
        listOfDailyData.forEach(daily => {
            daily.forEach(node => {
                switch(node.title){
                    case "Ảnh cưới":
                        dataset.addData(node.amount);
                        break;
                    case "Mâm quả cưới":
                        dataset1.addData(node.amount);
                        break;
                    case "Ảnh Studio (Hình phòng)":
                        dataset2.addData(node.amount);
                        break;
                    case "Áo cưới (Cô dâu / Chú rể)":
                        dataset3.addData(node.amount);
                        break;
                }
            });
        });
    }
    else {
        console.log("Don't have any update !");
    }
    drawChart();
    console.log(dataset.getData());
    console.log(dataset1.getData());
    console.log(dataset2.getData());
    console.log(dataset3.getData());
}

function drawChart(){
    var ctx = document.getElementById('chartView').getContext('2d');
    console.log('Im here');
    new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
    
        // The data for our dataset
        data: {
            labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
            datasets: [
                {
                    label: 'Ảnh cưới',
                    backgroundColor: '#fff0',
                    borderColor: '#007bff',
                    data: dataset.getData()
                },
                {
                    label: 'Thuê áo cưới',
                    backgroundColor: '#fff0',
                    borderColor: '#009688',
                    data: dataset3.getData()
                },
                {
                    label: 'Hình phòng (Studio)',
                    backgroundColor: '#fff0',
                    borderColor: '#dc3545',
                    data: dataset2.getData()
                },
                {
                    label: 'Lượng đặt mâm quả',
                    backgroundColor: '#fff0',
                    borderColor: '#fd7e14',
                    data: dataset1.getData()
                }
            ]
    },
    
        // Configuration options go here
        options: {}
    });
}