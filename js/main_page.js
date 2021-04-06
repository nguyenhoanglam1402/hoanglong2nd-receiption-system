var ctx = document.getElementById('chartView').getContext('2d');

var dataset = new Clerk();
var dataset1 = new Clerk();
var dataset2 = new Clerk();
var dataset3 = new Clerk();

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
        datasets: [
            {
                label: 'Lượng hình thẻ',
                backgroundColor: '#fff0',
                borderColor: '#007bff',
                data: [0, 10, 5, 2, 20, 30, 45]
            },
            {
                label: 'Lượng thuê áo cưới',
                backgroundColor: '#fff0',
                borderColor: '#009688',
                data: [5, 15, 5, 2, 25, 20, 35]
            },
            {
                label: 'Lượng hình phòng (Studio)',
                backgroundColor: '#fff0',
                borderColor: '#dc3545',
                data: [10, 9, 25, 23, 5, 34, 25]
            },
            {
                label: 'Lượng đặt mâm quả',
                backgroundColor: '#fff0',
                borderColor: '#fd7e14',
                data: [5, 2, 1, 6, 7, 10, 2]
            }
        ]
},

    // Configuration options go here
    options: {}
});

setInterval( getDataFromWeek(),3000);

function getDataFromWeek(){
    $.ajax({
        type: "POST",
        url: "/server-side/getDataForChart.php",
        dataType: "json",
        success: function (response) {
            dataResolve(response);
        }
    });
}

function dataResolve(response){
    var listOfDailyData = [];
    if(listOfDailyData.length != response.length){
        listOfDailyData = response;
        listOfDailyData.forEach(dailyData => {
            dailyData.forEach(node => {
                switch (node.name){
                    case "Áo cưới":
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
    console.log(dataset1.getData());
    console.log(dataset2.getData());
    console.log(dataset3.getData());
}