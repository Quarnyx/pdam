"use strict";
var options = {
    series: [{ data: [40, 55, 40, 60, 48, 28, 56, 60] }],
    chart: {
        height: 45,
        type: "bar",
        sparkline: { enabled: !0 },
        animations: { enabled: !1 },
    },
    colors: ["#537AEF"],
    plotOptions: { bar: { columnWidth: "40%", borderRadius: 2 } },
    dataLabels: { enabled: !1 },
    fill: { opacity: 1 },
    grid: { strokeDashArray: 4 },
    labels: [1, 2, 3, 4, 5, 6, 7, 8],
    xaxis: { crosshairs: { width: 1 } },
    yaxis: { labels: { padding: 4 } },
    tooltip: { theme: "light" },
    legend: { show: !1 },
    tooltip: { enabled: false },
},
    chart = new ApexCharts(document.querySelector("#new-orders"), options);
chart.render();
options = {
    series: [{ data: [55, 25, 35, 55, 35, 65, 40, 65] }],
    chart: {
        height: 45,
        type: "bar",
        sparkline: { enabled: !0 },
        animations: { enabled: !1 },
    },
    colors: ["#ec8290"],
    plotOptions: { bar: { columnWidth: "40%", borderRadius: 2 } },
    dataLabels: { enabled: !1 },
    fill: { opacity: 1 },
    grid: { strokeDashArray: 4 },
    labels: [1, 2, 3, 4, 5, 6, 7, 8],
    xaxis: { crosshairs: { width: 1 } },
    yaxis: { labels: { padding: 4 } },
    tooltip: { theme: "light", enabled: false },
    legend: { show: !1 },
};
(chart = new ApexCharts(
    document.querySelector("#sales-report"),
    options
)).render();
options = {
    series: [{ data: [60, 38, 30, 50, 42, 37, 44, 60] }],
    chart: {
        height: 45,
        type: "bar",
        sparkline: { enabled: !0 },
        animations: { enabled: !1 },
    },
    colors: ["#29aa85"],
    plotOptions: { bar: { columnWidth: "40%", borderRadius: 2 } },
    dataLabels: { enabled: !1 },
    fill: { opacity: 1 },
    grid: { strokeDashArray: 4 },
    labels: [1, 2, 3, 4, 5, 6, 7, 8],
    xaxis: { crosshairs: { width: 1 } },
    yaxis: { labels: { padding: 4 } },
    tooltip: { theme: "light", enabled: false },
    legend: { show: !1 },
};
(chart = new ApexCharts(document.querySelector("#revenue"), options)).render();
options = {
    series: [{ data: [65, 38, 28, 55, 40, 35, 50, 70] }],
    chart: {
        height: 45,
        type: "bar",
        sparkline: { enabled: !0 },
        animations: { enabled: !1 },
    },
    colors: ["#537AEF"],
    plotOptions: { bar: { columnWidth: "40%", borderRadius: 2 } },
    dataLabels: { enabled: !1 },
    fill: { opacity: 1 },
    grid: { strokeDashArray: 4 },
    labels: [1, 2, 3, 4, 5, 6, 7, 8],
    xaxis: { crosshairs: { width: 1 } },
    yaxis: { labels: { padding: 4 } },
    tooltip: { theme: "light", enabled: false },
    legend: { show: !1 },
};
(chart = new ApexCharts(document.querySelector("#expenses"), options)).render();
