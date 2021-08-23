//[Dashboard Javascript]

//Project:	Elitex Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


// ------------------------------

var Widgetschart = function() {



    // Simple bar charts
    var _barChartWidget = function(element, barQty, height, animate, easing, duration, delay, color, tooltip) {
        if (typeof d3 == 'undefined') {
            return;
        }

        // Initialize chart only if element exsists in the DOM
        if(element) {

            // Tooltip
            // ------------------------------

            // Initiate
            var tip = d3.tip()
                .attr('class', 'd3-tip')
                .offset([-10, 0]);

            // Daily meetings tooltip content
            if(tooltip == "hours") {
                tip.html(function (d, i) {
                    return "<div class='text-center'>" +
                            "<h6 class='mb-0'>" + d + "</h6>" +
                            "<span class='font-size-16'>meetings</span>" +
                            "<div class='font-size-16'>" + i + ":00" + "</div>" +
                        "</div>";
                });
            }

            // Statements tooltip content
            if(tooltip == "goal") {
                tip.html(function (d, i) {
                    return "<div class='text-center'>" +
                            "<h6 class='mb-0'>" + d + "</h6>" +
                            "<span class='font-size-16'>statements</span>" +
                            "<div class='font-size-16'>" + i + ":00" + "</div>" +
                        "</div>";
                });
            }

            // Online members tooltip content
            if(tooltip == "members") {
                tip.html(function (d, i) {
                    return "<div class='text-center bg-dark p-5'>" +
                            "<h6 class='mb-0'>" + d + "0" + "</h6>" +
                            "<span class='font-size-14'>members</span>" +
                            "<div class='font-size-14'>" + i + ":00" + "</div>" +
                        "</div>";
                });
            }



            // Bar loading animation
            // ------------------------------


        }
    };

    // Simple line chart
    var _lineChartWidget = function(element, chartHeight, lineColor, pathColor, pointerLineColor, pointerBgColor) {
        if (typeof d3 == 'undefined') {
            return;
        }

        // Initialize chart only if element exsists in the DOM
        if(element) {


            // Basic setup
            // ------------------------------

            // Add data set
            var dataset = [
                {
                    "date": "04/13/14",
                    "alpha": "60"
                }, {
                    "date": "04/14/14",
                    "alpha": "35"
                }, {
                    "date": "04/15/14",
                    "alpha": "65"
                }, {
                    "date": "04/16/14",
                    "alpha": "50"
                }, {
                    "date": "04/17/14",
                    "alpha": "65"
                }, {
                    "date": "04/18/14",
                    "alpha": "20"
                }, {
                    "date": "04/19/14",
                    "alpha": "60"
                }
            ];

            // Add tooltip
            // ------------------------------

            var tooltip = d3.tip()
                .attr('class', 'd3-tip')
                .html(function (d) {
                    return "<ul class='list-unstyled mb-1 bg-dark p-5'>" +
                        "<li>" + "<div class='my-1'><i class='fa fa-check mr-2'></i>" + formatDate(d.date) + "</div>" + "</li>" +
                        "<li>" + "Sales: &nbsp;" + "<span class='float-right'>" + d.alpha + "</span>" + "</li>" +
                        "<li>" + "Revenue: &nbsp; " + "<span class='float-right'>" + "$" + (d.alpha * 0).toFixed(2) + "</span>" + "</li>" +
                    "</ul>";
                });


        }
    };


    return {
        init: function() {

            _barChartWidget("#chart_bar_basic", 24, 50, true, "elastic", 1200, 50, "#5A8DEE", "members");

            _lineChartWidget('#line_chart_simple', 50, '#FDAC41', '#FDAC41', '#FDAC41', '#fff');

        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    Widgetschart.init();
});
