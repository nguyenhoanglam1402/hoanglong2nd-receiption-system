
var listOfDailyData = [];
var dataset = new Clerk();
var dataset1 = new Clerk();
var dataset2 = new Clerk();
var dataset3 = new Clerk();


setInterval(()=>{ 
    getDataFromWeek()
},500);

function getDataFromWeek(){
    var currentDate = getCurrentDate();
    var startDate = getMonday(currentDate);
    console.log(startDate + " -> " + currentDate);
    $.ajax({
        type: "POST",
        url: "/server-side/getDataForChart.php",
        data: {
            stardate: startDate,
            endate: currentDate
        },
        dataType: "json",
        success: function (response) {
            dataResolve(response);
            console.log(response);
        }
    });
}

function dataResolve(response){

    if(JSON.stringify(listOfDailyData)!=JSON.stringify(response)){
        listOfDailyData = [];
        dataset.resetData();
        dataset1.resetData();
        dataset2.resetData();
        dataset3.resetData();
        listOfDailyData = response;
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
        drawChart();
    }
    else {
        console.log("Don't have any update !");
    }
}

function getMonday(date) {
    date = new Date(date);
    var day = date.getDay(),
        diff = date.getDate() - day + (day == 0 ? -6:1); // adjust when day is sunday
    var monday = new Date(date.setDate(diff));
    var result = monday.getFullYear() + "-" + (monday.getMonth() +1) + "-" + monday.getDate();
    return result;
}

function getCurrentDate() {
    var currentDate = new Date();
    var dateTime = currentDate.getFullYear()+'-'+
        (currentDate.getMonth() + 1) +'-'+
        currentDate.getDate();
    return dateTime;
}

function drawChart(){
    var ctx = document.getElementById('chartView').getContext('2d');
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
        options: {
            legend: {
                labels: {
                    fontColor: "white",
                }
            },
            scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        fontColor: "white",
                        suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                        // OR //
                        beginAtZero: true   // minimum value will be 0.
                    }
                }],
                xAxes: [{
                    display: true,
                    ticks: {
                        fontColor: "white",
                    }
                }]
            }
        }
    });
}