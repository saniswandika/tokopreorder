
var deviceSalesData = {
				labels: [],
				datasets: [{
						label: '',
						data: [],
						backgroundColor: [
							'#a461d8', '#a461d8', '#a461d8', '#a461d8', '#a461d8', '#a461d8', '#a461d8', '#a461d8',
						],
						borderColor: [
							'#a461d8', '#a461d8', '#a461d8', '#a461d8', '#a461d8', '#a461d8', '#a461d8', '#a461d8',
						],
						borderWidth: 1,
						fill: false
					},

				]
			};
			var deviceSalesOptions = {
				scales: {
					xAxes: [{
						stacked: false,
						barPercentage: .5,
						categoryPercentage: 0.4,
						position: 'bottom',
						display: true,
						gridLines: {
							display: false,
							drawBorder: false,
							drawTicks: false
						},
						ticks: {
							display: true, //this will remove only the label
							stepSize: 500,
							fontColor: "#a7afb7",
							fontSize: 14,
							padding: 10,
						}
					}],
					yAxes: [{
						stacked: false,
						display: true,
						gridLines: {
							drawBorder: false,
							display: true,
							color: "#eef0fa",
							drawTicks: false,
							zeroLineColor: 'rgba(90, 113, 208, 0)',
						},
						ticks: {
							display: true,
							beginAtZero: true,
							stepSize: 5,
							fontColor: "#a7afb7",
							fontSize: 14,
							callback: function(value, index, values) {
								return value + '';
							},
						},
					}]
				},
				legend: {
					display: false
				},
				legendCallback: function(chart) {
					var text = [];
					text.push('<ul class="' + chart.id + '-legend">');
					for (var i = 0; i < chart.data.datasets.length; i++) {
						text.push('<li><span class="legend-box" style="background:' + chart.data.datasets[i].backgroundColor[i] + ';"></span><span class="legend-label text-dark">');
						if (chart.data.datasets[i].label) {
							text.push(chart.data.datasets[i].label);
						}
						text.push('</span></li>');
					}
					text.push('</ul>');
					return text.join("");
				},
				tooltips: {
					backgroundColor: 'rgba(0, 0, 0, 1)',
				},
				plugins: {
					datalabels: {
						display: false,
						align: 'center',
						anchor: 'center'
					}
				}
			};
			var barChartCanvas = $("#device-sales").get(0).getContext("2d");
			// This will get the first returned node in the jQuery collection.
			var barChartx = new Chart(barChartCanvas, {
				type: 'bar',
				data: deviceSalesData,
				options: deviceSalesOptions
			});
			// document.getElementById('device-sales-legend').innerHTML = barChart.generateLegend();

