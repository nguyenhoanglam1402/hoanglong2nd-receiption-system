var ctx = document.getElementById('chartView').getContext('2d');
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


function getDataFromWeek(){
    $.ajax({
        type: "POST",
        url: "url",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
}