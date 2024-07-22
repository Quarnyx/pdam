var options = {
    chart: {
        type: "bar",
        height: 350,
        stacked: !0,
        parentHeightOffset: 0,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !0
        }
    },
    series: [{
        name: "Income",
        data: [300, 333, 258, 295, 258, 326, 275, 283, 271, 316, 333, 271]
    }, {
        name: "Expense",
        data: [300, 333, 258, 295, 259, 326, 275, 283, 271, 316, 333, 271]
    }],
    plotOptions: {
        bar: {
            horizontal: !1,
            borderRadius: 5,
            borderRadiusApplication: "end",
            borderRadiusWhenStacked: "last",
            columnWidth: "40%",
            dataLabels: {
                total: {
                    style: {
                        fontSize: "13px",
                        fontWeight: 900
                    }
                }
            }
        }
    },
    dataLabels: {
        enabled: !1
    },
    xaxis: {
        categories: ["Jan", "Fab", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        axisBorder: {
            show: !1
        }
    },
    yaxis: {
        labels: {
            padding: 4
        }
    },
    colors: ["#537AEF", "#dee2e6"],
    legend: {
        position: "top",
        show: !0,
        horizontalAlign: "right"
    },
    fill: {
        opacity: 1
    },
    grid: {
        padding: {
            top: -20,
            right: 0,
            bottom: 0
        },
        strokeDashArray: 4,
        xaxis: {
            lines: {
                show: !0
            }
        }
    }
};
(chart = new ApexCharts(document.querySelector("#chart-money"), options)).render();