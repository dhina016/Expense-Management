$(function() {
    //get the bar chart canvas
    var cData = JSON.parse(`<?php echo $grapinward; ?>`);
    var ctx = $("#pie_inward");

    //bar chart data
    var data = {
        labels: cData.label,
        datasets: [{
            data: cData.data,
            backgroundColor: [
                "#DEB887"
            ]
        }]
    };

    //options
    var options = {
        responsive: true,
        legend: {
            display: true,
            position: "bottom",
            labels: {
                fontColor: '#71748d',
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }
        }
    };

    //create bar Chart class object
    var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
    });

});
