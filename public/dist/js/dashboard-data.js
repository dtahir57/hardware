/*Dashboard Init*/
 
"use strict"; 

/*****Ready function start*****/
$(document).ready(function(){
	$('#statement').DataTable({
		"bFilter": false,
		"bLengthChange": false,
		"bPaginate": false,
		"bInfo": false,
	});
	
	if($('#chart_1').length > 0) {
		// Area Chart
		var data=[{
            period: '01',
            iphone: 180,
        }, {
            period: '02',
            iphone: 105,
        },
         {
            period: '03',
            iphone: 250,
        },
		 {
            period: '04',
            iphone: 160,
        },
		 {
            period: '05',
            iphone: 130,
        },
		{
            period: '06',
            iphone: 155,
        },
		{
            period: '07',
            iphone: 150,
        },
		{
            period: '08',
            iphone: 110,
        },
		{
            period: '09',
            iphone: 170,
        },
		{
            period: '10',
            iphone: 150,
        },
		{
            period: '11',
            iphone: 150,
        },
		{
            period: '12',
            iphone: 150,
        },
		{
            period: '13',
            iphone: 150,
        },
		{
            period: '14',
            iphone: 150,
        },
		{
            period: '15',
            iphone: 160,
        },
		{
            period: '16',
            iphone: 180,
        }, {
            period: '17',
            iphone: 105,
        }];
		var areaChart = Morris.Area({
				element: 'chart_1',
				data: data,
				xkey: 'period',
				ykeys: ['iphone'],
				labels: ['iPhone'],
				pointSize: 2,
				lineWidth: 2,
				grid: false,
				axes: false,
				padding: 0,
				pointStrokeColors:['#4dad44'],
				pointFillColors:['#ffffff'],
				behaveLikeLine: true,
				smooth: false,
				hideHover: 'auto',
				lineColors: ['#4dad44'],
				resize: true,
				gridTextColor:'#878787',
				gridTextFamily:"Poppins",
				parseTime: false,
				fillOpacity:0.6
			});	
	}
});
/*****Ready function end*****/

/*****Load function start*****/
$(window).on("load",function(){
	window.setTimeout(function(){
		$.toast({
			heading: 'Welcome to Winkle',
			text: 'Use the predefined ones, or specify a custom position object.',
			position: 'bottom-right',
			loaderBg:'#e8af48',
			icon: 'info',
			hideAfter: 3500, 
			stack: 6
		});
	}, 3000);
});
/*****Load function* end*****/

/*****E-Charts function start*****/
var echartsConfig = function() { 
	if( $('#e_chart_1').length > 0 ){
		var eChart_1 = echarts.init(document.getElementById('e_chart_1'));
		var option = {
			tooltip: {
				trigger: 'axis',
				backgroundColor: 'rgba(33,33,33,1)',
				borderRadius:0,
				padding:10,
				axisPointer: {
					type: 'cross',
					label: {
						backgroundColor: 'rgba(33,33,33,1)'
					}
				},
				textStyle: {
					color: '#fff',
					fontStyle: 'normal',
					fontWeight: 'normal',
					fontFamily: "'Poppins', sans-serif",
					fontSize: 12
				}	
			},
			grid:{
				show:false,
			},

			legend: {
				show:false,
			},

			singleAxis: {
				top: 0,
				bottom: 20,
				axisTick: {
					show:false
				},
				type: 'time',
				axisPointer: {
					animation: true,
					label: {
						show: true
					}
				},
				axisLabel: {
					textStyle: {
						color: '#878787',
						fontStyle: 'normal',
						fontWeight: 'normal',
						fontFamily: "'Poppins', sans-serif",
						fontSize: 12
					}
				},
				axisLine: {
						show:false
				},
				splitLine: {
					show: false,
				}
			},

			series: [
				{
					color: ['#da4296', '#fd6421', '#243f6b'],
					type: 'themeRiver',
					label: {
						normal: {
							show: false
						}
					},
					itemStyle: {
						emphasis: {
							shadowBlur: 5,
							shadowColor: 'rgba(0, 0, 0, 0.5)'
						}
					},
					data: [['2015/11/08',10,'DQ'],['2015/11/09',15,'DQ'],['2015/11/10',35,'DQ'],
					['2015/11/14',7,'DQ'],['2015/11/15',2,'DQ'],['2015/11/16',17,'DQ'],
					['2015/11/17',33,'DQ'],['2015/11/18',40,'DQ'],['2015/11/19',32,'DQ'],
					['2015/11/20',26,'DQ'],['2015/11/21',35,'DQ'],['2015/11/22',40,'DQ'],
					['2015/11/23',32,'DQ'],['2015/11/24',26,'DQ'],['2015/11/25',22,'DQ'],
					['2015/11/08',35,'TY'],['2015/11/09',36,'TY'],['2015/11/10',37,'TY'],
					['2015/11/11',22,'TY'],['2015/11/12',24,'TY'],['2015/11/13',26,'TY'],
					['2015/11/14',34,'TY'],['2015/11/15',21,'TY'],['2015/11/16',18,'TY'],
					['2015/11/17',45,'TY'],['2015/11/18',32,'TY'],['2015/11/19',35,'TY'],
					['2015/11/20',30,'TY'],['2015/11/21',28,'TY'],['2015/11/22',27,'TY'],
					['2015/11/23',26,'TY'],['2015/11/24',15,'TY'],['2015/11/25',30,'TY'],
					['2015/11/26',35,'TY'],['2015/11/27',42,'TY'],['2015/11/28',42,'TY'],
					['2015/11/08',21,'SS'],['2015/11/09',25,'SS'],['2015/11/10',27,'SS'],
					['2015/11/11',23,'SS'],['2015/11/12',24,'SS'],['2015/11/13',21,'SS'],
					['2015/11/14',35,'SS'],['2015/11/15',39,'SS'],['2015/11/16',40,'SS'],
					['2015/11/17',36,'SS'],['2015/11/18',33,'SS'],['2015/11/19',43,'SS'],
					['2015/11/20',40,'SS'],['2015/11/21',34,'SS'],['2015/11/22',28,'SS'],
					]
				}
			]
		};
		eChart_1.setOption(option);
		eChart_1.resize();
	}
	if( $('#e_chart_2').length > 0 ){
		var eChart_2 = echarts.init(document.getElementById('e_chart_2'));
		var option = {
			color: ['#4dad44','#2278dd','#e8af48','#fd6421'],		
			tooltip: {
				trigger: 'axis',
				backgroundColor: 'rgba(33,33,33,1)',
				borderRadius:0,
				padding:10,
				axisPointer: {
					type: 'cross',
					label: {
						backgroundColor: 'rgba(33,33,33,1)'
					}
				},
				textStyle: {
					color: '#fff',
					fontStyle: 'normal',
					fontWeight: 'normal',
					fontFamily: "'Poppins', sans-serif",
					fontSize: 12
				}	
			},
			toolbox: {
				show: true,
				orient: 'vertical',
				left: 'right',
				top: 'center',
				showTitle: false,
				feature: {
					mark: {show: true},
					magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
					restore: {show: true},
				}
			},
			grid: {
				left: '3%',
				right: '10%',
				bottom: '3%',
				containLabel: true
			},
			xAxis : [
				{
					type : 'category',
					data : ['2011','2012','2013','2014','2015','2016','2017'],
					axisLine: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#878787'
						}
					},
				}
			],
			yAxis : [
				{
					type : 'value',
					axisLine: {
						show:false
					},
					axisLabel: {
						textStyle: {
							color: '#878787'
						}
					},
					splitLine: {
						show: false,
					}
				}
			],
			series : [
				{
					name:'1',
					type:'bar',
					data:[320, 332, 301, 334, 390, 330, 320]
				},
				{
					name:'2',
					type:'bar',
					stack: 'st1',
					data:[120, 132, 101, 134, 90, 230, 210]
				},
				{
					name:'3',
					type:'bar',
					stack: 'st1',
					data:[220, 182, 191, 234, 290, 330, 310]
				},
				{
					name:'4',
					type:'bar',
					stack: 'st1',
					data:[150, 232, 201, 154, 190, 330, 410]
				}
			]
		};

		eChart_2.setOption(option);
		eChart_2.resize();
	}
	if( $('#e_chart_3').length > 0 ){
		var eChart_3 = echarts.init(document.getElementById('e_chart_3'));
		var option3 = {
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c} ({d}%)",
				backgroundColor: 'rgba(33,33,33,1)',
				borderRadius:0,
				padding:10,
				textStyle: {
					color: '#fff',
					fontStyle: 'normal',
					fontWeight: 'normal',
					fontFamily: "'Poppins', sans-serif",
					fontSize: 12
				}	
			},
			legend: {
				show:false
			},
			toolbox: {
				show : false,
			},
			calculable : true,
			itemStyle: {
				 normal: {
					 shadowBlur: 5,
					 shadowColor: 'rgba(0, 0, 0, 0.5)'
				 }
			},
			series : [
				{
					name:'Advertising',
					type:'pie',
					radius : '80%',
					center : ['50%', '50%'],
					roseType : 'radius',
					color: ['#8d62cd','#0095eb', '#243f6b'],
					label: {
						normal: {
							fontFamily: "'Poppins', sans-serif",
							fontSize: 12
						}
					},
					data:[
						{value:335, name:'Active'},
						{value:310, name:'Closed'},
						{value:274, name:'Hold'},
					].sort(function (a, b) { return a.value - b.value; }),
				},
			],
			animationType: 'scale',
			animationEasing: 'elasticOut',
			animationDelay: function (idx) {
				return Math.random() * 1000;
			}	
		};
		eChart_3.setOption(option3);
		eChart_3.resize();
	}
		if( $('#e_chart_4').length > 0 ){
		var eChart_4 = echarts.init(document.getElementById('e_chart_4'));
		var option4 = {
			color: ['#ff354d'],
			tooltip: {
				trigger: 'axis',
				backgroundColor: 'rgba(33,33,33,1)',
				borderRadius:0,
				padding:10,
				axisPointer: {
					type: 'cross',
					label: {
						backgroundColor: 'rgba(33,33,33,1)'
					}
				},
				textStyle: {
					color: '#fff',
					fontStyle: 'normal',
					fontWeight: 'normal',
					fontFamily: "'Poppins', sans-serif",
					fontSize: 12
				}	
			},
			
			xAxis: [{
				type: 'category',
				data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun','Mon', 'Tue', 'Wed'],
				axisLine: {
					show: false
				},
				axisTick: {
					show: false
				}
			}],
			yAxis: {
				type: 'value',
				axisLine: {
					show: false
				},
				axisLabel: {
					textStyle: {
						color: '#878787'
					}  
				},
				splitLine: {
					show: false,
				},
				axisTick: {
					show: false
				}
			},
			series: [{
				data: [120, 200, 150, 80, 70, 110, 130,70, 110, 130],
				type: 'bar',
				barMaxWidth: 10, 
				barGap: "30%",
			}]
		};
		eChart_4.setOption(option4);
		eChart_4.resize();
	}

	
}
/*****E-Charts function end*****/

/*****Sparkline function start*****/
var sparklineLogin = function() { 
	if( $('#sparkline_1').length > 0 ){
		$("#sparkline_1").sparkline([2,4,4,6,8,5,6,4,8,6,6], {
			type: 'bar',
			width: '100%',
			height: '180',
			barWidth: '8',
			barSpacing: '15',
			barColor: '#ed8739',
			highlightSpotColor: '#ed8739'
		});
	}	
}
/*****Sparkline function end*****/

/*****Resize function start*****/
var sparkResize,echartResize;
$(window).on("resize", function () {
	/*Sparkline Resize*/
	clearTimeout(sparkResize);
	sparkResize = setTimeout(sparklineLogin, 200);
	
	/*E-Chart Resize*/
	clearTimeout(echartResize);
	echartResize = setTimeout(echartsConfig, 200);
}).resize(); 
/*****Resize function end*****/

/*****Function Call start*****/
sparklineLogin();
echartsConfig();
/*****Function Call end*****/