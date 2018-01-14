window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	title:{
		text: "Age Range of Registered Residents"
	},
	toolTip: {
		shared: true
	},

	data: [{
		type: "column",
		legendText: "Male",
		dataPoints:[
			{ label: "0-18", y: 266.21 },
			{ label: "19-35", y: 302.25 },
			{ label: "36-60", y: 157.20 },
			{ label: "61-100+", y: 148.77 },
		]
	},
	{
		type: "column",	
		legendText: "Female",
		axisYType: "secondary",
		dataPoints:[
			{ label: "0-18", y: 10.46 },
			{ label: "19-35", y: 2.27 },
			{ label: "36-60", y: 3.99 },
			{ label: "61-100+", y: 4.45 },
		]
	}]
});
/*chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}*/

}