var optionsProfileVisit = {
    annotations: {
        position: "back",
    },
    dataLabels: {
        enabled: false,
    },
    chart: {
        type: "bar",
        height: 300,
    },
    fill: {
        opacity: 1,
    },
    plotOptions: {},
    series: [
        {
            name: "Pemilih",
            data: [100, 220],
        },
    ],
    colors: "#198754",
    xaxis: {
        categories: ["No. 1", "No. 2"],
    },
};

var optionsOne = {
    series: [70, 30],
    labels: ["No. Urut 1", "No. Urut 2"],
    colors: ["#198754", "#8abba8"],
    chart: {
        type: "donut",
        width: "100%",
        height: "350px",
    },
    legend: {
        position: "bottom",
    },
    plotOptions: {
        pie: {
            donut: {
                size: "30%",
            },
        },
    },
};
var optionsTwo = {
    series: [30, 70],
    labels: ["No. Urut 1", "No. Urut 2"],
    colors: ["#198754", "#8abba8"],
    chart: {
        type: "donut",
        width: "100%",
        height: "350px",
    },
    legend: {
        position: "bottom",
    },
    plotOptions: {
        pie: {
            donut: {
                size: "30%",
            },
        },
    },
};
var optionsThree = {
    series: [70, 30],
    labels: ["No. Urut 1", "No. Urut 2"],
    colors: ["#198754", "#8abba8"],
    chart: {
        type: "donut",
        width: "100%",
        height: "350px",
    },
    legend: {
        position: "bottom",
    },
    plotOptions: {
        pie: {
            donut: {
                size: "30%",
            },
        },
    },
};

var optionsFour = {
    series: [30, 70],
    labels: ["No. Urut 1", "No. Urut 2"],
    colors: ["#198754", "#8abba8"],
    chart: {
        type: "donut",
        width: "100%",
        height: "350px",
    },
    legend: {
        position: "bottom",
    },
    plotOptions: {
        pie: {
            donut: {
                size: "30%",
            },
        },
    },
};

// var optionsEurope = {
//     series: [
//         {
//             name: "series1",
//             data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605],
//         },
//     ],
//     chart: {
//         height: 80,
//         type: "area",
//         toolbar: {
//             show: false,
//         },
//     },
//     colors: ["#5350e9"],
//     stroke: {
//         width: 2,
//     },
//     grid: {
//         show: false,
//     },
//     dataLabels: {
//         enabled: false,
//     },
//     xaxis: {
//         type: "datetime",
//         categories: [
//             "2018-09-19T00:00:00.000Z",
//             "2018-09-19T01:30:00.000Z",
//             "2018-09-19T02:30:00.000Z",
//             "2018-09-19T03:30:00.000Z",
//             "2018-09-19T04:30:00.000Z",
//             "2018-09-19T05:30:00.000Z",
//             "2018-09-19T06:30:00.000Z",
//             "2018-09-19T07:30:00.000Z",
//             "2018-09-19T08:30:00.000Z",
//             "2018-09-19T09:30:00.000Z",
//             "2018-09-19T10:30:00.000Z",
//             "2018-09-19T11:30:00.000Z",
//         ],
//         axisBorder: {
//             show: false,
//         },
//         axisTicks: {
//             show: false,
//         },
//         labels: {
//             show: false,
//         },
//     },
//     show: false,
//     yaxis: {
//         labels: {
//             show: false,
//         },
//     },
//     tooltip: {
//         x: {
//             format: "dd/MM/yy HH:mm",
//         },
//     },
// };

// var optionsAmerica = {
//     ...optionsEurope,
//     colors: ["#008b75"],
// };
// var optionsIndonesia = {
//     ...optionsEurope,
//     colors: ["#dc3545"],
// };

var chartProfileVisit = new ApexCharts(
    document.querySelector("#chart-profile-visit"),
    optionsProfileVisit
);
var chartOne = new ApexCharts(document.querySelector("#chart-1"), optionsOne);
var chartTwo = new ApexCharts(document.querySelector("#chart-2"), optionsTwo);
var chartThree = new ApexCharts(
    document.querySelector("#chart-3"),
    optionsThree
);
var chartFour = new ApexCharts(document.querySelector("#chart-4"), optionsFour);
// var chartEurope = new ApexCharts(
//     document.querySelector("#chart-europe"),
//     optionsEurope
// );
// var chartAmerica = new ApexCharts(
//     document.querySelector("#chart-america"),
//     optionsAmerica
// );
// var chartIndonesia = new ApexCharts(
//     document.querySelector("#chart-indonesia"),
//     optionsIndonesia
// );

// chartIndonesia.render();
// chartAmerica.render();
// chartEurope.render();
chartProfileVisit.render();
chartOne.render();
chartTwo.render();
chartThree.render();
chartFour.render();
