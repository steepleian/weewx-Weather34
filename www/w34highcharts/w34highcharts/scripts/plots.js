/*****************************************************************************
Javascript to setup, configure and display Highcharts plots of weewx weather data.
Based on Highcharts documentation and examples, and a lot of Stackoverflow Q&As.
History
    v1.0.0      June 2019  By Jerry Dietrich
        -  large rewrite of the original plots.js to support w34 type charts
*****************************************************************************/
function plot_js(units, ptype, span, plt_div, dplots = false, cdates = false, reload_plot_type_span = null, realtime = false, radial = false){
	var createweeklyfunctions = {
	    temperatureplot: [addWeekOptions, create_temperature_chart],
	    indoorplot: [addWeekOptions, create_indoor_chart],
	    tempallplot: [addWeekOptions, create_tempall_chart],
	    tempderivedplot: [addWeekOptions, create_tempderived_chart],
	    apparentplot: [addWeekOptions, create_apparent_chart],
	    humidityplot: [addWeekOptions, create_humidity_chart],
	    barometerplot: [addWeekOptions, create_barometer_chart],
	    bartempwindplot: [addWeekOptions, create_bartempwind_chart],
	    dewpointplot: [addWeekOptions, create_dewpoint_chart],
	    windbarbplot: [addWeekOptions, create_wind_barb_chart],
	    windplot: [addWeekOptions, create_wind_chart],
	    windallplot: [addWeekOptions, create_windall_chart],
	    winddirplot: [addWeekOptions, create_winddir_chart],
	    windroseplot: [addWindRoseOptions, setWindRose, create_windrose_chart],
	    windrosegustplot: [addWindRoseOptions, setWindRose, create_windrose_chart],
	    lightningplot: [addWeekOptions, create_lightning_chart],
	    lightningmonthplot: [create_lightning_month_chart],
	    rainplot: [addWeekOptions, create_rain_chart],
	    rainmonthplot: [create_rain_month_chart],
	    luminosityplot: [addWeekOptions, create_luminosity_chart],
	    radiationplot: [addWeekOptions, create_radiation_chart],
	    radsmallplot: [addYearOptions, setRadSmall, create_radiation_chart],
	    raduvplot: [addWeekOptions, create_raduv_chart],
	    uvsmallplot: [addYearOptions, setUvSmall, create_uv_chart],
	    raduvplot: [addYearOptions, create_raduv_chart],
	    airqualityplot: [addWeekOptions, create_aq_chart],
	    tempsmallplot: [addYearOptions, setTempSmall, create_temperature_chart],
	    barsmallplot: [addYearOptions, setBarSmall, create_barometer_chart],
	    windsmallplot: [addYearOptions, setWindSmall, create_wind_chart],
	    rainsmallplot: [addYearOptions, setRainSmall, create_rain_chart],
	    strikesmallplot: [addYearOptions, setStrikeSmall, create_strike_chart],
	    uvplot: [addWeekOptions, create_uv_chart],
	    cloudcoverplot: [addWeekOptions, create_cloudcover_chart]
	};
	
	var createyearlyfunctions = {
	    temperatureplot: [addYearOptions,create_temperature_chart],
	    indoorplot: [addYearOptions, create_indoor_chart],
	    tempsmallplot: [addYearOptions, setTempSmall, create_temperature_chart],
	    tempallplot: [addYearOptions, create_tempall_chart],
	    tempderivedplot: [addYearOptions, create_tempderived_chart],
	    apparentplot: [addYearOptions, create_apparent_chart],
	    humidityplot: [addYearOptions, create_humidity_chart],
	    barometerplot: [addYearOptions, create_barometer_chart],
	    barsmallplot: [addYearOptions, setBarSmall, create_barometer_chart],
	    dewpointplot: [addYearOptions, create_dewpoint_chart],
	    windsmallplot: [addYearOptions, setWindSmall, create_wind_chart],
	    winddirplot: [addYearOptions, create_winddir_chart],
	    windplot: [addYearOptions, create_wind_chart],
	    windallplot: [addYearOptions, create_windall_chart],
	    rainplot: [addYearOptions, create_rain_chart],
	    rainmonthplot: [create_rain_month_chart],
	    rainsmallplot: [addYearOptions, setRainSmall, create_rain_chart],
	    strikesmallplot: [addYearOptions, setStrikeSmall, create_strike_chart],
	    lightningplot: [addYearOptions, create_lightning_chart],
	    lightningmonthplot: [create_lightning_month_chart],
	    luminosityplot: [addYearOptions, create_luminosity_chart],
	    radiationplot: [addYearOptions, create_radiation_chart],
	    raduvplot: [addYearOptions, create_raduv_chart],
	    airqualityplot: [addYearOptions, create_aq_chart],
	    radsmallplot: [addYearOptions, setRadSmall, create_radiation_chart],
	    uvplot: [addYearOptions, create_uv_chart],
	    uvsmallplot: [addYearOptions, setUvSmall, create_uv_chart],
	    cloudcoverplot: [addYearOptions, create_cloudcover_chart]
	};
	
	var postcreatefunctions = {
	    tempsmallplot: [post_create_small_chart],
	    barsmallplot: [post_create_small_chart],
	    windsmallplot: [post_create_small_chart],
	    rainsmallplot: [post_create_small_chart],
	    strikesmallplot: [post_create_small_chart],
	    rainmonthplot: [remove_range_selector],
	    lightningmonthplot: [remove_range_selector],
	    radsmallplot: [post_create_small_chart],
	    uvsmallplot: [post_create_small_chart],
	    windroseplot: [post_create_windrose_chart],
	    windrosegustplot: [post_create_windrose_chart]
	};
	
	var jsonfileforplot = {
	    temperatureplot: [['temp_week.json'],['year.json']],
	    indoorplot: [['indoor_derived_week.json'],['year.json']],
	    tempsmallplot: [['temp_week.json'],['year.json']],
	    tempallplot: [['temp_week.json'],['year.json']],
	    tempderivedplot: [['indoor_derived_week.json','temp_week.json','wind_week.json'],['year.json']],
	    apparentplot: [['indoor_derived_week.json','temp_week.json','wind_week.json'],['year.json']],
	    dewpointplot: [['temp_week.json'],['year.json']],
	    humidityplot: [['temp_week.json'],['year.json']],
	    barometerplot: [['bar_rain_week.json'],['year.json']],
	    barsmallplot: [['bar_rain_week.json'],['year.json']],
	    bartempwindplot: [['bar_rain_week.json','temp_week.json','wind_week.json'],[null]],
	    windbarbplot: [['wind_week.json'],['year.json']],
	    windplot: [['wind_week.json'],['year.json']],
	    windsmallplot: [['wind_week.json'],['year.json']],
	    windallplot: [['wind_week.json'],['year.json']],
	    winddirplot: [['wind_week.json'],['year.json']],
	    windroseplot: [['wind_rose_week.json'],[]],
	    windrosegustplot: [['wind_rose_week.json'],[]],
	    rainplot: [['bar_rain_week.json'],['year.json']],
	    rainmonthplot: [['year.json'],['year.json']],
	    rainsmallplot: [['bar_rain_week.json'],['year.json']],
	    strikesmallplot: [['bar_rain_week.json'],['year.json']],
	    lightningplot: [['bar_rain_week.json'],['year.json']],
	    lightningmonthplot: [['year.json'],['year.json']],
	    luminosityplot: [['solar_week.json'],['year.json']],
	    radiationplot: [['solar_week.json'],['year.json']],
	    raduvplot: [['solar_week.json'],['year.json']],
	    airqualityplot: [['solar_week.json'],['year.json']],
	    radsmallplot: [['solar_week.json'],['year.json']],
	    uvplot: [['solar_week.json'],['year.json']],
	    uvsmallplot: [['solar_week.json'],['year.json']],
	    cloudcoverplot: [['solar_week.json'],['year.json']]
	};
	
	var tempcolors = [[-10,"#3369e7"],[-5,"#3b9cac"],[0,"#00a4b4"],[5,"#00a4b4"],[10,"#88b04b"],[15,"#e6a141"],[20,"#ff7c39"],[25,"#efa80f"],[30,"#d05f2d"],[35,"#d86858"],[40,"#fd7641"],[45,"#de2c52"],[50,"#de2c52"]];
	var humcolors = [[0,"#3369e7"],[10,"#3b9cac"],[20,"#00a4b4"],[30,"#00a4b4"],[40,"#88b04b"],[50,"#e6a141"],[60,"#ff7c39"],[70,"#efa80f"],[80,"#d05f2d"],[90,"#d86858"],[100,"#fd7641"]];
	var barcolors = [[28.0,"#3369e7"],[28.25,"#3b9cac"],[28.5,"#00a4b4"],[28.75,"#00a4b4"],[29.0,"#88b04b"],[29.25,"#e6a141"],[29.5,"#ff7c39"],[29.75,"#efa80f"],[30.0,"#d05f2d"],[30.25,"#d86858"],[30.5,"#fd7641"],[30.75,"#de2c52"],[31,"#de2c52"]];
	var windcolors = [[0,"#3369e7"],[2.5,"#3b9cac"],[5,"#00a4b4"],[7.5,"#00a4b4"],[10,"#88b04b"],[12.5,"#e6a141"],[15,"#ff7c39"],[17.5,"#efa80f"],[20,"#d05f2d"],[22.5,"#d86858"],[25,"#fd7641"],[27.5,"#de2c52"],[30,"#de2c52"]];
	var aqcolors = [[50,"#90b12a"],[100,"#ba923a"],[150,"#ff7c39"],[200,"#ff7c39"],[300,"#916392"],[400,"#d05041"]];
	var plotsnoswitch = ['rainmonthplot','lightningmonthplot','windroseplot','windrosegustplot','bartempwindplot','windbarbplot','strikesmallplot'];
	var radialplots = ['tempallplot','dewpointplot','temperatureplot','indoorplot','humidityplot','barometerplot','tempderivedplot','apparentplot','windplot','airqualityplot','cloudcoverplot'];
	var compareplots = ['dewpointplot','temperatureplot','tempallplot','indoorplot','humidityplot','barometerplot','tempderivedplot','apparentplot','windplot','lightningplot','luminosityplot','radiationplot','uvplot','airqualityplot','cloudcoverplot'];
	var monthNames = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	var windrosespans = ["1h","24h","Week","Month","Year"];
        var compassdirections = ["N","NNE","NE","ENE","E","ESE","SE","SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"];
	var realtimeXscaleFactor = 300/realtimeinterval;
	var realtimeinterval = 2;
	var reload_plot_type = null;
	var reload_span = null;
	var plot_type = null;
	var compare_dates_ts = [];
	var compare_dates = false;
	var do_realtime = false;
	var auto_update = false;
	var day_plots = false;
	var timer1 = null;
	var timer2 = null;
	var prevrealtime = "";
	var windrosesamples = 0;
	var windrosespeeds = [];
	var windrosespan = windrosespans[0];
        var prev_speed, prev_compassindex = -1;
	var categories;
	var utcoffset;
	var chart;
	var url_units;
	var first_tp_display = true;
	var plot_div;
	
	/*****************************************************************************
	Read multiple json files at the same time found at this URL
	https://stackoverflow.com/questions/19026331/call-multiple-json-data-files-in-one-getjson-request
	*****************************************************************************/
	jQuery.getMultipleJSON = function(){
	  return jQuery.when.apply(jQuery, jQuery.map(arguments, function(jsonfile){
	    return jQuery.getJSON(jsonfile).fail(function(){
	      alert("!!!!NO DATA FOUND in database. Please choose another date!!!!\n" + jsonfile);return true;});
	  })).then(function(){
	    var def = jQuery.Deferred();
	    return def.resolve.apply(def, jQuery.map(arguments, function(response){
	      return response[0];}));
	    });
	};

        function polar_chart_hack(){
                chart.rangeSelector.clickButton(0, true);
        }

	function create_common_options(){
	    var commonOptions = {
	        chart: {
	            spacing: [10, 10, 0, 0],
	            boost: {useGPUTranslations: false},
	            spacingLeft: 20,
                    events: {
                         load: function(event){             // Hack to make radial charts display correctly the first time when they are not full of data
                            if (enable_radial_charts_reload && this.options.chart.polar && event.target.series[0].data.length > 10 && plot_type != 'windroseplot' && plot_type != 'windrosegustplot')
                               setTimeout(polar_chart_hack,0);
                         }
                    },
	        },
	        legend: {
	            enabled: true,
	            itemDistance:15,
	        },
	        plotOptions: {
	            area: {
	                dataGrouping: {
	                    enabled: false,
	                },
	                lineWidth: 1,
	                marker: {
	                    enabled: false,
	                    radius: 2,
	                    symbol: 'circle'
	                },
	            },
	            column: {
                        dataGrouping: {
                            enabled: false,
                        },
                    },
	            columnrange: {
                        dataGrouping: {
                            enabled: false,
	                },
                    },
	            series: {states: {hover: {halo: {size: 0,}}}, 
                            turboThreshold:5000,
	            },
	            scatter: {
	                marker: {
	                    radius: 2,
	                    symbol: 'circle'
	                },
	                shadow: false,
	                states: { hover: {halo: false,}}
	            },
	            windbarb: {
	                dataGrouping: {
	                    enabled: false,
	                }
	            },
	            spline: {
                        dataGrouping: {
                            enabled: false,
                        },
	                lineWidth: 1,
	                marker: {
	                    radius: 1,
	                    enabled: false,
	                    symbol: 'circle'
	                },
	                shadow: false,
	                states: {
	                    hover: {
	                        lineWidth: 1,
	                        lineWidthPlus: 1}}},
	        },
	        rangeSelector: {},
                exporting: {
                    buttons: {
                        contextButton: {enabled: false,},
                        redButton:     {y: (plot_div=='plot_div2'?-100:0),},
                        yellowButton:  {y: (plot_div=='plot_div2'?-100:0),},
                        greenButton:   {y: (plot_div=='plot_div2'?-100:0),},
                        toggle: {
                            text: 'Select',
                            x: -10,
                            menuItems:[]
                        }
                    }
                },
	        series: [{}],
	        tooltip: {
	            valueDecimals: 2,
	            crosshairs: true,
	            enabled: true,
	            followPointer: true,
	            dateTimeLabelFormats: {
	                minute: '%H:%M',
	                hour: '%H:%M',
	                day: ''
	            },
	            shared: true,
	            split: false,
	            valueSuffix: ''
	        },
	        xAxis: [{
	            dateTimeLabelFormats: {
	                day: '%e %b',
	                week: '%e %b',
	                month: '%b %y',
	            },
	            lineWidth: 1,
	            minorGridLineWidth: 0,
	            minorTickLength: 2,
	            minorTickPosition: 'outside',
	            minorTickWidth: 1,
	            tickLength: 4,
	            tickPosition: 'outside',
	            tickWidth: 1,
	            title: {},
	            type: 'datetime',
	            minRange: 1,
	        },{
	            dateTimeLabelFormats: {
	                day: '%e %b',
	                week: '%e %b',
	                month: '%b %y',
	            },
	            lineWidth: 1,
	            minorGridLineWidth: 0,
	            minorTickLength: 2,
	            minorTickPosition: 'outside',
	            minorTickWidth: 1,
	            tickLength: 4,
	            tickPosition: 'outside',
	            tickWidth: 1,
	            title: {},
	            type: 'datetime',
	            opposite: true,
	            minRange: 1,
	            visible: false,
	            labels: {formatter: function() {
	                    for (var i = 0; i < compare_dates_ts.length; i++)
	                        if (Math.abs(compare_dates_ts[i][0] - this.value) < 100000){
	                            var time = Highcharts.dateFormat('%H:%M', compare_dates_ts[i][1]);
	                            return time.split(":")[0] == 0 || time.split(":")[0] == 23 || time.split(":")[0] == 1 ? Highcharts.dateFormat('%e. %b', compare_dates_ts[i][1]):time;
	                        }
	                }
	            },
	        }],
	        yAxis: [{
	            labels: {
	                x: -4,
	                y: 4,
	            },
	            lineWidth: 1,
	            minorGridLineWidth: 0,
	            minorTickLength: 2,
	            minorTickPosition: 'outside',
	            minorTickWidth: 1,
	            opposite: false,
	            showLastLabel: true,
	            startOnTick: true,
	            endOnTick: true,
	            tickLength: 4,
	            tickPosition: 'outside',
	            tickWidth: 1,
	            title: {text: ''}
	            }, {
	            labels: {
	                x: 4,
	                y: 4,
	            },
	            lineWidth: 1,
	            minorGridLineWidth: 0,
	            minorTickLength: 2,
	            minorTickPosition: 'outside',
	            minorTickWidth: 1,
	            showLastLabel: true,
	            opposite: true,
	            startOnTick: true,
	            endOnTick: true,
	            tickLength: 4,
	            tickPosition: 'outside',
	            tickWidth: 1,
	            title: {
	                text: ''}
	            }, {
	            labels: {
	                x: 4,
	                y: 4,
	            },
	            lineWidth: 1,
	            minorGridLineWidth: 0,
	            minorTickLength: 2,
	            minorTickPosition: 'outside',
	            minorTickWidth: 1,
	            showLastLabel: true,
	            opposite: true,
	            startOnTick: true,
	            endOnTick: true,
	            visible: false,
	            tickLength: 4,
	            tickPosition: 'outside',
	            tickWidth: 1,
	            title: {
	                text: ''}
	        }],
	    };
	    return commonOptions;
	};
	
	function remove_range_selector(chart){
	    chart.update({
	        rangeSelector: {enabled: false}
	    });
	};
	
	function add_realtime_button(units,plot_type){
	    if (auto_update) return;
	    if (do_realtime){
	        if (timer2 != null){
	            clearInterval(timer2);
	            timer2 = null;
	        }
	        do_realtime = true;
	    }
	    realtimeXscaleFactor = realtimeplot[plot_type][4]/realtimeinterval;
	    setTimeout(display_chart, 0, units, realtimeplot[plot_type][3], 'weekly',plot_div,false,false,reload_plot_type+":"+reload_span, true);
	}
	
	function addWindRoseOptions(options, span, seriesData, units, plot_type) {
	    options.rangeSelector = {inputEnabled:false};
	    options.rangeSelector.buttons = [{
	        text: '1h',
	        events: {click: function (e) {setTimeout(display_chart, 0, units, plot_type, ["weekly"],plot_div);windrosespan=windrosespans[0];return false;}}
	    }, {
	        text: '24h',
	        events: {click: function (e) {setTimeout(display_chart, 0, units, plot_type, ["weekly"],plot_div);windrosespan=windrosespans[1];return false;}}
	    }, {
	        text: getTranslation(windrosespans[2]),
	        events: {click: function (e) {setTimeout(display_chart, 0, units, plot_type, ["weekly"],plot_div);windrosespan=windrosespans[2];return false;}}
	    }, {
	        text: getTranslation(windrosespans[3]),
	        events: {click: function (e) {setTimeout(display_chart, 0, units, plot_type, ["weekly"],plot_div);windrosespan=windrosespans[3];return false;}}
	    }, {
	        text: getTranslation(windrosespans[4]),
	        events: {click: function (e) {setTimeout(display_chart, 0, units, plot_type, ["weekly"],plot_div);windrosespan=windrosespans[4];return false;}}
	    }, {
	        text: getTranslation("RT"),
	        events: {click: function (e) {add_realtime_button(units, plot_type)}}
	    }];
	    return options
	};
	    
	function addWeekOptions(obj, span, seriesData, units, plot_type) {
	    if (do_realtime) return obj;
	    if (compare_dates)
	         obj.rangeSelector = {inputEnabled:false };
	    obj.rangeSelector.buttons = [{
	        type: 'hour',
	        count: 1,
	        text: '1h'
	    }, {
	        type: 'hour',
	        count: 6,
	        text: '6h'
	    }, {
	        type: 'hour',
	        count: 12,
	        text: '12h'
	    }, {
	        type: 'hour',
	        count: 24,
	        text: '24h'
	    }, {
	        type: 'hour',
	        count: 36,
	        text: '36h'
	    }, {
	        type: 'all',
	        text: 'All'
	    }];
	    if (realtimeplot.hasOwnProperty(plot_type) && !day_plots && !compare_dates) {obj.rangeSelector.buttons.push({
	        text: getTranslation("RT"),
	        events: {click: function (e) {remove_range_selector(chart);add_realtime_button(units, plot_type)}}})
	    }
	    obj.rangeSelector.selected = day_plots || compare_dates ? 4 : 3;
	    return obj
	};
	
	function addYearOptions(obj) {
            if (do_radial){
                obj.rangeSelector.buttons = [{
                    type: 'month',
                    count: 1,
                    text: '1m'
                }, {
                    type: 'month',
                    count: 6,
                    text: '6m'
	        }, {
	            type: 'year',
	            count: 1,
	            text: '1yr'
                }, {
                    type: 'all',
                    text: 'All'
                }],
                obj.rangeSelector.selected = 0;
            }
            else{
    	        obj.rangeSelector.buttons = [{
	            type: 'day',
	            count: 1,
    	            text: '1d'
    	        }, {
	            type: 'week',
	            count: 1,
	            text: '1w'
	        }, {
	            type: 'month',
	            count: 1,
	            text: '1m'
	        }, {
	            type: 'month',
	            count: 6,
	            text: '6m'
	        }, {
	            type: 'year',
	            count: 1,
	            text: '1yr'
	        }, {
	            type: 'all',
                    text: 'All'
	        }],
	        obj.rangeSelector.selected = 4;
            }
	    return obj
	};
	
	function custom_tooltip(tooltip, first_line, lowHigh = false) {
	    var order = [], i, j, temp = [], temp1 = [], points = tooltip.points;
	    if (points == undefined) points = [tooltip.point];
	    for (j = 0; j < points.length; j++)
	        order.push(j);
	    if (first_line == "date"){
	        if (lowHigh)
	            temp = '<span style="font-size: 10px">' + Highcharts.dateFormat('%e %B %Y',new Date(tooltip.x)) + '</span><br/>';
	        else
	            temp = '<span style="font-size: 10px">' + Highcharts.dateFormat('%e %B %Y %H:%M',new Date(tooltip.x)) + '</span><br/>';
	        if (compare_dates){
	            for (i = 0; i < compare_dates_ts.length; i++)
	                if (compare_dates_ts[i][0] == tooltip.x && compare_dates_ts[i][1] != null){
	                    temp1  = '<span style="font-size: 10px">' + Highcharts.dateFormat('%e %B %Y %H:%M',compare_dates_ts[i][1]) + '</span><br/>';
	                    temp = '<span style="font-size: 10px">' + Highcharts.dateFormat('%e %B %Y %H:%M',new Date(tooltip.x)) + '</span><br/>';
	                    break;
	                }
	        }
	    }else
	       temp = '<span style="font-size: 10px">' + first_line[tooltip.x] + '</span><br/>';
	    $(order).each(function(i,j){
	        if (points[j] != undefined && points[j].y != undefined){
	            if (lowHigh){
	                if (points[j].point.high != undefined)
	                    temp += '<span style="color: '+points[j].series.color+'">' + getTranslation(points[j].series.name) + ': ' + getTranslation('Lowest') + ' ' + parseFloat(points[j].y.toFixed(2)) + ' ' + getTranslation('Highest') + ' ' + parseFloat(points[j].point.high.toFixed(2)) + points[j].series.tooltipOptions.valueSuffix + '</span><br/>';
	                else
	                    temp += '<span style="color: '+points[j].series.color+'">' + getTranslation(points[j].series.name) + ': ' + parseFloat(points[j].y.toFixed(2)) + points[j].series.tooltipOptions.valueSuffix + '</span><br/>';
	            }else
	                temp += '<span style="color: '+points[j].series.color+'">' + getTranslation(points[j].series.name) + ': ' + parseFloat(points[j].y.toFixed(2)) + points[j].series.tooltipOptions.valueSuffix + '</span><br/>';
	            if (temp1.length > 0 && i == order.length/2 -1)
	                temp += temp1;
	        }
	    });
	    if (first_tp_display){
	        first_tp_display = false;
	        temp += "When mouse cursor turns to a hand then left click to drill down into chart data"
	    }
	    return temp;
	};
	
	function getTranslation(term){
	    if (typeof translations == 'undefined') return term;
	    if (translations.hasOwnProperty(term)) return translations[term];
	    if (translations.hasOwnProperty(term.replace(' ', ''))) return translations[term.replace(' ', '')];
	    var parts = term.split(/([" ", "/", "&"])/);
	    var translation = "";
	    for (var i = 0; i < parts.length; i++)
	       translation += translations.hasOwnProperty(parts[i]) ? translations[parts[i]] : parts[i];
	    return translation.length > 0 ? translation : term;
	};
	
	function create_chart_options(options, type, title, valueSuffix, values, first_line = "date"){
	    var fields = ['name', 'type', 'yAxis', 'visible', 'showInLegend', 'tooltip', 'xAxis'];
	    options.series = [];
	    options.chart.type = type;
	    if (first_line != null)
	        options.tooltip.formatter = function() {return custom_tooltip(this, first_line, type=='columnrange' ? true : false)};
	    if (valueSuffix != null) options.tooltip.valueSuffix = valueSuffix;
	    options.xAxis[0].minTickInterval = do_realtime ? 450000 : 900000;
	    options.title = {text: getTranslation(title)};
	    for (var i = 0; i < values.length; i++){
	        options.series[i] = [];
	        for (field in fields) options.series[i].push(field);
	        for (var j = 0; j < fields.length; j++)
	            if (values[i][j] != null){
	                options.series[i][fields[j]] = (fields[j] == 'name' ? getTranslation(values[i][j]) : values[i][j]);  
	                if (fields[j] == 'yAxis')
	                    options[fields[j]][values[i][j]].visible = true;
	                if (fields[j] == 'xAxis'){
	                    options[fields[j]][values[i][j]].visible = true;
	                    options[fields[j]][values[i][j]].linkedTo = 0;
	                }
	            }
	    }
	    return options;
	};
	
	function post_create_small_chart(chart, height){
	    chart.update({
	        exporting: {enabled: false },
	        rangeSelector: {enabled: false},
	        navigator: {enabled: false},
	        scrollbar: {enabled: false},
	        legend:{enabled:false },
	        title: {text: ''}
	    });
	};
	
	function reinflate_time(series, ts_start = null, returnDate = false){
	    series[0][0] = ts_start == null ? (series[0][0] + (utcoffset *60)) *1000: ts_start; 
	    for (var i = 1; i < series.length; i++)
	        series[i][0] = returnDate ? new Date((series[0][0] + (series[i][0] *1000))) : series[0][0] + (series[i][0] *1000);
	    if (returnDate) series[0][0] = new Date(series[0][0]);
	    return series;
	};
	
	function remove_zero_dps(seriesData){
	    data = [];
	    for (var i = 0; i < seriesData.length; i++)
	        if (i == 0 || i == seriesData.length -1 || seriesData[i][1] > 0 || i % 1000 == 0)
	            data.push(seriesData[i]);
	    return data;
	}
	
	function create_compare_days_ts(series, series1){
	    compare_dates_ts = [];
	    var a = series.map(function(arr){return arr.slice(0,1);});
	    var b = reinflate_time(series1.map(function(arr){return arr.slice(0,1);}),null,true);
	    //for(var i=0;i<a.length;i++)compare_dates_ts.push([a[i] == undefined ? null : a[i], b[i] == undefined ? null : b[i]].flat()); // Correct way
	    for(var i=0;i<a.length;i++)compare_dates_ts.push([a[i] == undefined ? null : a[i], b[i] == undefined ? null : b[i]].reduce((acc, val) => acc.concat(val), []));  // Microsoft way
	}

        function convert_tempcolors(temp_units){
            var tcolors = [];
            for (var i = 0; i < tempcolors.length; i++)
                tcolors.push([convert_temp("C", temp_units, tempcolors[i][0]), tempcolors[i][1]]);
            return tcolors;
        }

	function setTempSmall(options) {
	    options.chart.marginBottom = 20;
	    options.yAxis[0].height = "180";
	    $("#"+plot_div).css("height", 210);
	    return options
	};
	
	function create_temperature_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTempminmax)));
	        dataMinMax.push(convert_temp(seriesData[0].dewpointplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointminmax)));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['Temperature', 'Dewpoint'], convert_tempcolors(units.temp));
	    }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'columnrange', 'Temperature Dewpoint Ranges & Averages', '\xB0' + units.temp, [['Temperature Range', 'columnrange'],['Average Temperature','spline'],['Dewpoint Range', 'columnrange'],['Average Dewpoint', 'spline']]);
	        options.series[0].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTempminmax));
	        options.series[1].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTempaverage));
	        options.series[2].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointminmax));
	        options.series[3].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointaverage));
	    }
	    else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Temperature Dewpoint', '\xB0' + units.temp, [['Temperature', 'spline'],['Dewpoint','spline'],['Temperature', 'spline',,,,,1],['Dewpoint','spline',,,,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Temperature Dewpoint', '\xB0' + units.temp, [['Temperature', 'spline'],['Dewpoint','spline'],['Feels', 'spline',, false, false]])
	        options.series[0].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTemp));
	        options.series[1].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.dewpoint));
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].temperatureplot.outTemp);
	            options.series[2].data = convert_temp(seriesData[1].temperatureplot.units, units.temp, reinflate_time(seriesData[1].temperatureplot.outTemp, options.series[0].data[0][0]));
	            options.series[3].data = convert_temp(seriesData[1].temperatureplot.units, units.temp, reinflate_time(seriesData[1].temperatureplot.dewpoint, options.series[0].data[0][0]));
	        }
	    }
	    options.yAxis[0].title.text = "(\xB0" + units.temp + ")";
	    options.yAxis[0].tickInterval = 10;
	    return options;
	};
	
	function create_indoor_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.inTempminmax)));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['Temperature'], convert_tempcolors(units.temp));
	    }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'columnrange', 'Indoor Temperature Humidity Ranges & Averages', '\xB0' + units.temp, [['Temperature Range', 'columnrange'],['Average Temperature','spline'],['Humidity Range', 'columnrange', 1,,, {valueSuffix: '%'}],['Humidity', 'spline', 1,,,{valueSuffix: '%'}]]);
	        options.series[0].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.inTempminmax));
	        options.series[1].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.inTempaverage))
	        options.series[2].data = reinflate_time(seriesData[0].humidityplot.inHumidityminmax);
	        options.series[3].data = reinflate_time(seriesData[0].humidityplot.inHumidityaverage);
	    }
	    else if (span[0] == "weekly"){ 
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Indoor Temperature Humidity', '\xB0' + units.temp, [['Temperature', 'spline'],['Humidity','spline', 1,,, {valueSuffix: '%'}], ['Temperature', 'spline',,,,,1],['Humidity','spline', 1,,, {valueSuffix: '%'},1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Indoor Temperature Humidity', '\xB0' + units.temp, [['Temperature', 'spline'],['Humidity','spline', 1,,, {valueSuffix: '%'}]]);
	        options.series[0].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.inTemp));
	        options.series[1].data = reinflate_time(seriesData[0].humidityplot.inHumidity);
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].temperatureplot.inTemp);
	            options.series[2].data = convert_temp(seriesData[1].temperatureplot.units, units.temp, reinflate_time(seriesData[1].temperatureplot.inTemp, options.series[0].data[0][0]));
	            options.series[3].data = reinflate_time(seriesData[1].humidityplot.inHumidity, options.series[0].data[0][0]);
	        }
	    }
	    options.yAxis[0].title.text = "(\xB0" + units.temp + ")";
	    options.yAxis[1].title.text = "(%)";
	    return options;
	};
	
	function create_tempall_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTempminmax)));
	        dataMinMax.push(convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointminmax)));
	        dataMinMax.push(reinflate_time(seriesData[0].humidityplot.outHumidityminmax));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['Temperature', 'Dewpoint', 'Humidity'], convert_tempcolors(units.temp));
            }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'columnrange', 'Temperature Dewpoint Humidity Ranges & Averages', '\xB0' + units.temp, [['Temp Range', 'columnrange'],['Average Temp','spline'],['Dewpoint Range', 'columnrange'],['Average Dewpoint','spline'],['Humidity Range', 'columnrange', 1,,, {valueSuffix: '%'}],['Humidity Avg', 'spline', 1,,,{valueSuffix: '%'}]]);
	        options.series[0].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTempminmax));
	        options.series[1].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTempaverage));
	        options.series[2].data = convert_temp(seriesData[0].dewpointplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointminmax));
	        options.series[3].data = convert_temp(seriesData[0].dewpointplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointaverage));
	        options.series[4].data = reinflate_time(seriesData[0].humidityplot.outHumidityminmax);
	        options.series[5].data = reinflate_time(seriesData[0].humidityplot.outHumidityaverage);
	    }
	    else if (span[0] == "weekly"){        
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Temperature Dewpoint Humidity', '\xB0' + units.temp, [['Temperature', 'spline'],['Dewpoint','spline'],['Humidity', 'spline', 1,,,{valueSuffix: '%'}],['Temperature', 'spline',,,,,1],['Dewpoint','spline',,,,,1],['Humidity', 'spline', 1,,,{valueSuffix: '%'},1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Temperature Dewpoint Humidity', '\xB0' + units.temp, [['Temperature', 'spline'],['Dewpoint','spline'],['Humidity', 'spline', 1,,,{valueSuffix: '%'}]]);
	        options.series[0].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTemp));
	        options.series[1].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.dewpoint));
	        options.series[2].data = reinflate_time(seriesData[0].humidityplot.outHumidity);
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].temperatureplot.outTemp);
	            options.series[3].data = convert_temp(seriesData[1].temperatureplot.units, units.temp, reinflate_time(seriesData[1].temperatureplot.outTemp, options.series[0].data[0][0]));
	            options.series[4].data = convert_temp(seriesData[1].temperatureplot.units, units.temp, reinflate_time(seriesData[1].temperatureplot.dewpoint, options.series[0].data[0][0]));
	            options.series[5].data = reinflate_time(seriesData[1].humidityplot.outHumidity, options.series[0].data[0][0]);
	        }
	    }
	    options.yAxis[0].title.text = "(\xB0" + units.temp + ")";
	    options.yAxis[1].title.text = "(%)";
	    options.yAxis[0].tickInterval = 10;
	    options.yAxis[1].tickInterval = 10;
	    return options;
	};
	
	function create_tempderived_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.heatindexminmax)));
	        dataMinMax.push(convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.windchillminmax)));
	        try{
	            dataMinMax.push(convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.appTempminmax)));
	        }catch{}
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['Windchill', 'Heatindex', 'Apparent'], convert_tempcolors(units.temp));
	    }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'columnrange', 'HeatIndex/Windchill/Apparent Ranges & Averages', '\xB0' + units.temp, [['Windchill Range', 'columnrange'],['Avg Windchill','spline'],['Heatindex Range', 'columnrange'],['Avg Heatindex','spline'],['AppT Range', 'columnrange'],['Avg AppT','spline']]);
	        options.series[2].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.windchillminmax));
	        options.series[3].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.windchillaverage));
	        options.series[0].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.heatindexminmax));
	        options.series[1].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.heatindexaverage));
	        options.series[4].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.appTempminmax));
	        options.series[5].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.appTempaverage));
	    }
	    else if (span[0] == "weekly"){        
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'HeatIndex/Windchill/Apparent', '\xB0' + units.temp, [['HeatIndex', 'spline'],['Windchill','spline'],['Apparent', 'spline'],['HeatIndex', 'spline',,,,,1],['Windchill','spline',,,,,1],['Apparent','spline',,,,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'HeatIndex/Windchill/Apparent', '\xB0' + units.temp, [['HeatIndex', 'spline'],['Windchill','spline'],['Apparent', 'spline']]);
	        options.series[1].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.windchill));
	        options.series[0].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.heatindex));
	        try{
	            options.series[2].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.appTemp));
	        }catch{
	            options.series[2].data = reinflate_time(calculate_thw(seriesData[1], seriesData[2], units.temp));
	        }
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[3].windchillplot.windchill);
	            options.series[3].data = convert_temp(seriesData[3].windchillplot.units, units.temp, reinflate_time(seriesData[3].windchillplot.heatindex, options.series[0].data[0][0]));
	            options.series[4].data = convert_temp(seriesData[3].windchillplot.units, units.temp, reinflate_time(seriesData[3].windchillplot.windchill, options.series[0].data[0][0]));
	            try{
	                options.series[5].data = convert_temp(seriesData[3].windchillplot.units, units.temp, reinflate_time(seriesData[3].windchillplot.appTemp, options.series[0].data[0][0]));
	            }catch{
	                options.series[5].data = reinflate_time(calculate_thw(seriesData[4], seriesData[5], units.temp), options.series[0].data[0][0]);
	            }
	        }
	    }
	    options.yAxis[0].title.text = "(\xB0" + units.temp + ")";
	    options.yAxis[0].tickInterval = 10;
	    return options;
	};
	
	function calculate_thw(seriesData, seriesData1, units){
	    var t,e = 0;
	    var data_thw = [];
	    for (var i = 0; i < seriesData.temperatureplot.outTemp.length; i++){
	        t = convert_temp(seriesData.temperatureplot.units, "C", seriesData.temperatureplot.outTemp[i][1]);
	        e = (seriesData.humidityplot.outHumidity[i][1] / 100.0) * 6.105 * Math.exp(17.27 * t / (237.7 + t));
	        data_thw.push([seriesData1.windplot.windSpeed[i][0], convert_temp("C", units, (t + 0.33 * e - 0.7 * convert_wind(seriesData1.windplot.units, "m/s", seriesData1.windplot.windSpeed[i][1]) - 4.0))]);
	    }
	    return data_thw;
	}
	
	function create_apparent_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        try{
	            dataMinMax.push(convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.appTempminmax)));
	            return do_radial_chart(options, dataMinMax, 'columnrange', ['Apparent'], convert_tempcolors(units.temp));
	        }catch(err){
	            console.log(err);
	            return null;
	       }
	    }
	    else if (span[0] == "yearly"){
	        try{
	            options = create_chart_options(options, 'columnrange', 'Apparent/Temperature Ranges & Averages', '\xB0' + units.temp, [['Apparent Range', 'columnrange'],['Average Apparent','spline'],['Temperature Range', 'columnrange'],['Average Temperature','spline']]);
	            options.series[0].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.appTempminmax));
	            options.series[1].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.appTempaverage));
	            options.series[2].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTempminmax));
	            options.series[3].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.outTempaverage));
	        }catch(err){
	            console.log(err);
	            return null;
	       }
	    }
	    else if (span[0] == "weekly"){        
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Apparent/Temperature', '\xB0' + units.temp, [['Apparent','spline'],['Temperature', 'spline'],['Apparent','spline',,,,,1],['Temperature','spline',,,,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Apparent/Temperature', '\xB0' + units.temp, [['Apparent','spline'],['Temperature', 'spline']]);
	        try{
	            options.series[0].data = convert_temp(seriesData[0].windchillplot.units, units.temp, reinflate_time(seriesData[0].windchillplot.appTemp));
	        }catch{
	            options.series[0].data = reinflate_time(calculate_thw(seriesData[1], seriesData[2], units.temp));
	        }
	        options.series[1].data = convert_temp(seriesData[1].temperatureplot.units, units.temp, reinflate_time(seriesData[1].temperatureplot.outTemp));
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[4].temperatureplot.outTemp);
	            try{
	                options.series[2].data = convert_temp(seriesData[3].windchillplot.units, units.temp, reinflate_time(seriesData[3].windchillplot.appTemp,options.series[0].data[0][0]));
	            }catch{
	                options.series[2].data = reinflate_time(calculate_thw(seriesData[4], seriesData[5], units.temp), options.series[0].data[0][0]);
	            }
	            options.series[3].data = convert_temp(seriesData[4].temperatureplot.units, units.temp, reinflate_time(seriesData[4].temperatureplot.outTemp, options.series[0].data[0][0]));
	        }
	    }
	    options.yAxis[0].title.text = "(\xB0" + units.temp + ")";
	    options.yAxis[0].tickInterval = 10;
	    return options;
	};
	
	function create_dewpoint_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(convert_temp(seriesData[0].dewpointplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointminmax)));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ["Dewpoint"], convert_tempcolors(units.temp));
	    }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'columnrange', 'Dewpoint Ranges & Averages', '\xB0' + units.temp, [['Dewpoint Range', 'columnrange'],['Dewpoint','spline']]);
	        options.series[0].data = convert_temp(seriesData[0].dewpointplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointminmax));
	        options.series[1].data = convert_temp(seriesData[0].dewpointplot.units, units.temp, reinflate_time(seriesData[0].dewpointplot.dewpointaverage));
	    }
	    else if (span[0] == "weekly"){                
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Dewpoint', '\xB0' + units.temp, [['Dewpoint', 'spline'],['Dewpoint', 'spline',,,,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Dewpoint', '\xB0' + units.temp, [['Dewpoint', 'spline']]);
	        options.series[0].data = convert_temp(seriesData[0].temperatureplot.units, units.temp, reinflate_time(seriesData[0].temperatureplot.dewpoint));
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].temperatureplot.dewpoint);
	            options.series[1].data = convert_temp(seriesData[1].temperatureplot.units, units.temp, reinflate_time(seriesData[1].temperatureplot.dewpoint, options.series[0].data[0][0]));
	        }
	    }
	    options.yAxis[0].title.text = "(\xB0" + units.temp + ")";
	    return options;
	};
	
	function create_humidity_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(reinflate_time(seriesData[0].humidityplot.outHumidityminmax));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['Humidity'], humcolors);
	    }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'columnrange', 'Humidity Ranges & Averages', null,[['Humidity Range', 'columnrange',,,,{valueSuffix: '%'}],['Average Humidity','spline',,,,{valueSuffix: '%'}]]);
	        options.series[0].data = reinflate_time(seriesData[0].humidityplot.outHumidityminmax);
	        options.series[1].data = reinflate_time(seriesData[0].humidityplot.outHumidityaverage);
	    }
	    else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Humidity', null, [['Humidity', 'spline',,,,{valueSuffix: '%'}], ['Humidity', 'spline',,,,{valueSuffix: '%'},1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Humidity', null, [['Humidity', 'spline',,,,{valueSuffix: '%'}]]);
	        options.series[0].data = reinflate_time(seriesData[0].humidityplot.outHumidity);
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].humidityplot.outHumidity);
	            options.series[1].data = reinflate_time(seriesData[1].humidityplot.outHumidity, options.series[0].data[0][0]);
	        }
	    }
	    options.yAxis.min = 0;
	    options.yAxis.max = 100;
	    options.yAxis[0].minorTickInterval = 5;
	    options.yAxis[0].title.text = "(" + seriesData[0].humidityplot.units + ")";
	    return options;
	};

        function convert_barcolors(bar_units){
            var bcolors = [];
            for (var i = 0; i < barcolors.length; i++)
                bcolors.push([convert_pressure("inHg", bar_units, barcolors[i][0]), barcolors[i][1]]);
            return bcolors;
        }
	
	function setBarSmall(obj) {
	    obj.chart.marginBottom = 20;
	    obj.yAxis[0].height = "260";
	    $("#"+plot_div).css("height", 290);
	    return obj
	};
	
	function create_barometer_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(convert_pressure(seriesData[0].barometerplot.units, units.pressure, reinflate_time(seriesData[0].barometerplot.barometerminmax)));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['Barometer'], convert_barcolors(units.pressure));
	    }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'columnrange', 'Barometer Ranges & Averages',units.pressure,[['Barometer Range', 'columnrange'],['Average Barometer','spline']]);
	        options.series[0].data = convert_pressure(seriesData[0].barometerplot.units, units.pressure, reinflate_time(seriesData[0].barometerplot.barometerminmax));
	        options.series[1].data = convert_pressure(seriesData[0].barometerplot.units, units.pressure, reinflate_time(seriesData[0].barometerplot.barometeraverage));
	    }
	    else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Barometer', units.pressure, [['Barometer', 'spline'], ['Barometer', 'spline',,,,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Barometer', units.pressure, [['Barometer', 'spline']]);
	        options.series[0].data = convert_pressure(seriesData[0].barometerplot.units, units.pressure, reinflate_time(seriesData[0].barometerplot.barometer));
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].barometerplot.barometer);
	            options.series[1].data = convert_pressure(seriesData[1].barometerplot.units, units.pressure, reinflate_time(seriesData[1].barometerplot.barometer, options.series[0].data[0][0]));
	        }
	    }
	    options.yAxis[0].title.text = "(" + units.pressure + ")";
	    return options;
	};
	
	function create_bartempwind_chart(options, span, seriesData, units){
	    options = create_chart_options(options, 'spline', 'Barometer/Temp/Wind', units.pressure, [['Barometer', 'spline'], ['Temp', 'spline',1,,,{valueSuffix: units.temp}],['Wind', 'column',2,,,{valueSuffix: units.wind}]]);
	    options.series[0].data = convert_pressure(seriesData[0].barometerplot.units, units.pressure, reinflate_time(seriesData[0].barometerplot.barometer));
	    options.series[1].data = convert_pressure(seriesData[1].temperatureplot.units, units.temp, reinflate_time(seriesData[1].temperatureplot.outTemp));
	    options.series[2].data = convert_pressure(seriesData[2].windplot.units, units.wind, reinflate_time(seriesData[2].windplot.windSpeed));
	    options.yAxis[0].title.text = "(" + units.pressure + ")";
	    options.yAxis[1].title.text = "(\xB0" + units.temp + ")";
	    options.yAxis[2].title.text = "(" + units.wind + ")";
	    return options;
	};
	
        function convert_windcolors(wind_units){
            var wcolors = [];
            for (var i = 0; i < windcolors.length; i++)
                wcolors.push([convert_wind("mph", wind_units, windcolors[i][0]), windcolors[i][1]]);
            return wcolors;
        }
	function setWindSmall(options) {
	    options.chart.marginBottom = 20;
	    options.yAxis[0].height = "295";
	    $("#"+plot_div).css("height", 325);
	    return options;
	};
	
	function create_wind_chart(options, span, seriesData, units){
	    if (span[0] == "yearly" && do_radial){
	        var dataMinMax = [];
	        dataMinMax.push(convert_wind(seriesData[0].windplot.units, units.wind, reinflate_time(seriesData[0].windplot.windmax)));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['Wind Gust Speed'], convert_windcolors(units.wind));
	    }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'area', 'Wind Speed Gust Max & Averages', units.wind,[['Wind Gust', 'area'],['Average Gust','area'],['Average Wind','area']]);
	        options.series[0].data = convert_wind(seriesData[0].windplot.units, units.wind, reinflate_time(seriesData[0].windplot.windmax));
	        options.series[1].data = convert_wind(seriesData[0].windplot.units, units.wind, reinflate_time(seriesData[0].windplot.windAvmax));
	        options.series[2].data = convert_wind(seriesData[0].windplot.units, units.wind, reinflate_time(seriesData[0].windplot.windaverage));
	    }
	    else if (span[0] == "weekly"){
	        if (do_realtime)
	            options = create_chart_options(options, 'spline', 'Wind Speed', units.wind,[['Wind Speed', 'spline']]);
                else{
                    if (do_radial){
                        var dataMinMax = [];
                        convert_wind(seriesData[0].windplot.units, units.wind, reinflate_time(seriesData[0].windplot.windSpeed));
                        for (var i = 0; i < seriesData[0].windplot.windSpeed.length; i++)
	                   dataMinMax.push({x:seriesData[0].windplot.windSpeed[i][0], y:seriesData[0].windplot.windSpeed[i][1]});
	                options.plotOptions.series.turboThreshold = 0; //Need this to work around highcharts bug 
                        return do_radial_chart(options, dataMinMax, 'line', ['Wind Speed'], null);
                    }
	            if (compare_dates)
	                options = create_chart_options(options, 'spline', 'Wind Speed Gust', units.wind,[['Wind Speed', 'spline'],['Wind Gust', 'spline'], ['Wind Speed', 'spline',,,,,1],['Wind Gust', 'spline',,,,,1]]);
	            else
	                options = create_chart_options(options, 'spline', 'Wind Speed Gust', units.wind,[['Wind Speed', 'spline'],['Wind Gust', 'spline']]);
	            options.series[1].data = convert_wind(seriesData[0].windplot.units, units.wind, reinflate_time(seriesData[0].windplot.windGust));
	        }
	        options.series[0].data = convert_wind(seriesData[0].windplot.units, units.wind, reinflate_time(seriesData[0].windplot.windSpeed));
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].windplot.windSpeed);
	            options.series[3].data = convert_wind(seriesData[1].windplot.units, units.wind, reinflate_time(seriesData[1].windplot.windGust, options.series[0].data[0][0]));
	            options.series[2].data = convert_wind(seriesData[1].windplot.units, units.wind, reinflate_time(seriesData[1].windplot.windSpeed, options.series[0].data[0][0]));
	        }
	    }
	    options.yAxis[0].min = 0;
	    options.yAxis[0].title.text = "(" + units.wind + ")";
	    return options;
	};
	
	function create_wind_barb_chart(options, span, seriesData, units){
	    options = create_chart_options(options, 'windbarb', 'Wind Gust and Direction with Barb', units.wind,[['Wind Barb', 'windbarb'],['Wind Gust', 'spline']], null);
	    wb  = [];
	    wb1 = [];
	    wd = reinflate_time(seriesData[0].winddirplot.windDir);
	    ws = convert_wind(seriesData[0].windplot.units, units.wind, reinflate_time(seriesData[0].windplot.windGust));
	    for (var i = j = 0; i < ws.length; i+=10, j++){
	       wb[j]  = [ws[i][0], ws[i][1] > 0 || !hide_zero_wind_barb ? convert_wind(units.wind, "mph", ws[i][1])*0.44704 : null, wd[i][1]]; 
	       wb1[j] = [ws[i][0], ws[i][1], wd[i][1]]; }
	    options.plotOptions.series.turboThreshold = 0; //Need this to work around highcharts bug with wind barb 
	    options.series[0].data = wb;
	    options.series[1].data = wb1;
	    options.xAxis[0].offset = 20;
	    options.series[0].yOffset = -10;
	    options.series[0].vectorLength = 20;
	    options.series[0].lineWidth = 1;
	    options.yAxis[0].min = 0;
	    options.rangeSelector.selected = 1;
	    options.yAxis[0].title.text = "(" + units.wind + ")";
            options.tooltip.formatter = function(){if (this.points[1] == undefined) tooltip = '<span style="font-size: 10px">' + Highcharts.dateFormat('%e %B %Y %H:%M',new Date(this.points[0].x)) + '</span><br/>' + '<span style="color: ' + this.points[0].series.color+'">' + getTranslation("WindBarb") + ": " + 0 + " " + units.wind + " (" + getTranslation('Calm') + ')</span><br/>';
                                                else {spd = this.points[1].y;bn = this.points[0].series.beaufortName[Math.round(Math.pow(Math.pow((convert_wind(units.wind, "mph", spd)/1.8702),0.33),2))];tooltip = '<span style="font-size: 10px">' + Highcharts.dateFormat('%e %B %Y %H:%M',new Date(this.points[0].x)) + '</span><br/>' + '<span style="color: ' + this.points[1].series.color+'">' + getTranslation("WindBarb") + ": " + spd + " " + units.wind + " (" + getTranslation(bn) + ')</span><br/><span style="color: '+ this.points[0].series.color + '">' + getTranslation("Wind Direction") + ": " + (this.points[0].point.options.direction == null ? getTranslation("Calm") : this.points[0].point.options.direction + '\xB0') + '</span><br/>';}
                                                  return tooltip;};
	    return options;
	};
	
	function create_winddir_chart(options, span, seriesData, units){
	    if (span[0] == "yearly"){
	        options = create_chart_options(options, 'scatter', 'Wind Direction Average', null, [['Wind Direction Average', 'scatter']]);
	        options.series[0].data = reinflate_time(seriesData[0].winddirplot.windDir);
	    }
	    else if (span[0] == "weekly"){
	        options = create_chart_options(options, 'scatter', 'Wind Direction', null, [['Wind Direction', 'scatter']]);
	        options.series[0].data = reinflate_time(seriesData[0].winddirplot.windDir);
	    }
	    options.yAxis[0].title.text = "Direction";
	    options.yAxis[0].tickPositioner = function(){var positions = [0,90,180,270,360]; return positions;};
	    return options;
	};
	
	function create_windall_chart(options, span, seriesData, units){
	    if (span[0] == "yearly"){
	        options = create_chart_options(options, 'area', 'Wind Speed/Gust/Direction Max & Averages', units.wind,[['Max Wind Gust', 'area'],['Average Gust','area'],['Average Wind','area'],['Average Wind Direction', 'scatter',1,,,{valueSuffix: '\xB0'}]]);
	        options.series[0].data = reinflate_time(convert_wind(seriesData[0].windplot.units, units.wind, seriesData[0].windplot.windmax));
	        options.series[1].data = reinflate_time(convert_wind(seriesData[0].windplot.units, units.wind, seriesData[0].windplot.windAvmax));
	        options.series[2].data = reinflate_time(convert_wind(seriesData[0].windplot.units, units.wind, seriesData[0].windplot.windaverage));
	        options.series[3].data = reinflate_time(seriesData[0].winddirplot.windDir);
	    }
	    else if (span[0] == "weekly"){
	        if (do_realtime)
	            options = create_chart_options(options, 'spline', 'Average Wind Speed/Gust/Direction', units.wind,[['Avg Wind Speed', 'spline'], ['Avg Wind Gust', 'spline'], ['Avg Wind Direction', 'scatter',1,,,{valueSuffix: '\xB0'}]]);
	        else
	            options = create_chart_options(options, 'spline', 'Wind Speed/Gust/Direction', units.wind,[['Wind Speed', 'spline'],['Wind Gust', 'spline'],['Wind Direction', 'scatter',1,,,{valueSuffix: '\xB0'}]]);
	        options.series[0].data = reinflate_time(convert_wind(seriesData[0].windplot.units, units.wind, seriesData[0].windplot.windSpeed));
	        options.series[1].data = reinflate_time(convert_wind(seriesData[0].windplot.units, units.wind, seriesData[0].windplot.windGust));
	        options.series[2].data = reinflate_time(seriesData[0].winddirplot.windDir);
	    }
	    options.yAxis[0].min = 0;
	    options.yAxis[0].title.text = "(" + units.wind + ")";
	    options.yAxis[1].title.text = "Direction";
	    options.yAxis[1].tickPositioner = function(){var positions = [0,90,180,270,360]; return positions;};
	    return options;
	};
	
	function setWindRose(options){
	    options.legend= {
	        align: 'right',
	        verticalAlign: 'top',
	        y: 100,
	        layout: 'vertical',
	        text: getTranslation('Wind Speed'),
	        itemStyle: {font: '8pt Trebuchet MS, Verdana, sans-serif'},
	        enabled: true
	    };
	    options.chart.polar = true;
	    options.chart.type = 'column';
	    options.chart.pane = {size: '100%'};
	    options.title = {text: getTranslation('Wind Rose')};
	    options.tooltip.split = false; 
	    options.tooltip.shared = false;
	    options.tooltip.valueSuffix ='%';
	    options.xAxis.tickmarkPlacement = "on";
	    options.xAxis[0].showLastLabel = false;
	    options.yAxis= {
	        lineWidth: 1,
	        minorGridLineWidth: 0,
	        minorTickLength: 2,
	        minorTickWidth: 1,
	        opposite: false,
	        showLastLabel: true,
	        showFirstLabel: false,
	        startOnTick: true,
	        tickLength: 4,
	        tickWidth: 1,
	    };
	    options.yAxis.endOnTick = false;
	    options.yAxis.title = {text: getTranslation('Frequency (%)')};
	    options.yAxis.labels = {formatter: function () {return this.value + '%';}};
	    options.yAxis.reversedStacks = false;
	    options.plotOptions.series = {
	            stacking: 'normal',
	            shadow: false,
	            groupPadding: 0,
	            pointPlacement: 'on'
	    };   
	    return options
	};
	
	function create_windrose_chart(options, span, seriesData, units, plot_type){
	    if (!windrosespans.includes(windrosespan)) windrosespan = windrosespans[1];
	    if (do_realtime) windrosespan = windrosespans[0];
	    if (windrosespan == windrosespans[0]){
	        convertlegend(null, (plot_type=="windroseplot"?seriesData[0].windroseHour:seriesData[0].windroseHourGust), units);
	        options.series = (plot_type=="windroseplot"?seriesData[0].windroseHour.series:seriesData[0].windroseHourGust.series);
	        options.xAxis.categories = seriesData[0].windroseHour.xAxis.categories;
	        windrosesamples = seriesData[0].windroseHour.samples;
	    }
	    else if (windrosespan == windrosespans[1]){
	        convertlegend(null,  (plot_type=="windroseplot"?seriesData[0].windroseDay:seriesData[0].windroseDayGust), units);
	        options.series = (plot_type=="windroseplot"?seriesData[0].windroseDay.series:seriesData[0].windroseDayGust.series);
	        options.xAxis.categories = seriesData[0].windroseDay.xAxis.categories;
	    }
	    else if (windrosespan == windrosespans[2]){
	        convertlegend(null, (plot_type=="windroseplot"?seriesData[0].windroseWeek:seriesData[0].windroseWeekGust), units);
	        options.series = (plot_type=="windroseplot"?seriesData[0].windroseWeek.series:seriesData[0].windroseWeekGust.series);
	        options.xAxis.categories = seriesData[0].windroseWeek.xAxis.categories;
	    }
	    else if (windrosespan == windrosespans[3]){
	        convertlegend(null, (plot_type=="windroseplot"?seriesData[0].windroseMonth:seriesData[0].windroseMonthGust), units);
	        options.series = (plot_type=="windroseplot"?seriesData[0].windroseMonth.series:seriesData[0].windroseMonthGust.series);
	        options.xAxis.categories = seriesData[0].windroseMonth.xAxis.categories;
	    }
	    else if (windrosespan == windrosespans[4]){
	        convertlegend(null, (plot_type=="windroseplot"?seriesData[0].windroseYear:seriesData[0].windroseYearGust), units);
	        options.series = (plot_type=="windroseplot"?seriesData[0].windroseYear.series:seriesData[0].windroseYearGust.series);
	        options.xAxis.categories = seriesData[0].windroseYear.xAxis.categories;
	    }
	    categories = options.xAxis.categories;
	    options.title = {text: getTranslation("Wind "+(plot_type=="windroseplot"?"Speed ":"Gust " + (do_realtime?"10 min Avg ":""))) + (do_realtime ? getTranslation('RT') : getTranslation(windrosespan))};
	    return options;
	};
	
	function convertlegend(chart, series_record, units, usey = false){
	    if (!usey) windrosespeeds = [];
	    var totalPercent = 0;
	
	    var series = series_record;
	    if (series.series != null)
	        series = series.series;
	    for (var i = 0; i < series.length; i++)
	        for (var j = 0; j < series[i].data.length; j++)
	            totalPercent += usey ? series[i].data[j].y : series[i].data[j];
	    for (var i = 0; i < series.length; i++){
	        var percent = 0, newName = "", speed = 0, firstspeed = 0, parts = series[i].name.replace("> ","").split("-"), legendname = "";
	        for (var j = 0; j < parts.length; j++){
	            firstspeed = speed;
	            if (usey) firstspeed = windrosespeeds[0];
	            if (series_record.series == null)
	                speed = parseInt(parts[j]);
	            else
	                speed = convert_wind(series_record.units, units['wind'], parseInt(parts[j]), 0);
	            if (!usey) windrosespeeds.push(speed);
	            newName += speed;
	            if (j + 1 < parts.length && i != 0) newName += "-";
	        }
	        for (var j = 0; j < series[i].data.length; j++)
	            percent += usey ? series[i].data[j].y : series[i].data[j];
	        legendname = (i == 0 ? "> " + firstspeed: newName) + " " + units['wind'] + " (" + (totalPercent == 0 ? "0.0" : ((percent/totalPercent)*100.0).toFixed(1)) + "%)";
	        series[i].name = legendname;
	        if (chart != undefined)
	            $(chart.legend.allItems[i].legendItem.element.childNodes).text(legendname)
	    }
	};
	 
	function post_create_windrose_chart(chart){
	    chart.update({
	        xAxis: {
	            type: "category",
	            categories: categories 
	        },
	        navigator: {enabled: false},
	        scrollbar: {enabled: false},
	    });
	};
	
	function setRainSmall(options) {
	    options.chart.marginBottom = 20;
	    options.yAxis[0].height = "295";
	    $("#"+plot_div).css("height", 325);
	    return options;
	};
	
	function create_rain_chart(options, span, seriesData, units){
	    if (span[0] == "yearly"){
	        options = create_chart_options(options, 'column', 'RainFall', units.rain,[['RainFall', 'column']]);
	        options.series[0].data = remove_zero_dps(convert_rain(seriesData[0].rainplot.units, units.rain, reinflate_time(seriesData[0].rainplot.rainsum)));
	    }
	    if (span[0] == "weekly"){
	        options = create_chart_options(options, 'column', 'RainFall', units.rain,[['RainFall', 'column'], ['RainRate', 'spline', 1]], null);
	        options.series[0].data = convert_rain(seriesData[0].rainplot.units, units.rain, reinflate_time(seriesData[0].rainplot.rain));
	        options.series[1].data = convert_rain(seriesData[0].rainplot.units, units.rain, reinflate_time(seriesData[0].rainplot.rainRate));
	        options.yAxis[1].title.text = "(" + units.rain + ")";
	        options.yAxis[1].min = 0;
	        if (do_realtime){
	            realtimeplot['rainplot'][5] = [0];
	            for (var i = options.series[0].data.length-1; i > 0; i--)
	                if (options.series[0].data[options.series[0].data.length-1][0] -3600*1000 < options.series[0].data[i][0])
	                    realtimeplot['rainplot'][5][0] += options.series[0].data[i][1];
	                else break;
	        }
	    }
	    options.yAxis[0].title.text = "(" + units.rain + ")";
	    options.yAxis[0].min = 0;
	    return options;
	};
	
	function create_rain_month_chart(options, span, seriesData, units){
	    var data = convert_rain(seriesData[0].rainplot.units, units.rain, reinflate_time(seriesData[0].rainplot.rainsum));
	    var index = 0;
	    var month_data = [];
	    var month_name = [];
	    month_name[index] = getTranslation(monthNames[new Date(data[0][0]).getMonth()]);
	    month_data[index] = data[0][1];
	    for (var i = 1; i < data.length; i++){
	        var new_month = getTranslation(monthNames[new Date(data[i][0]).getMonth()]);
	        if (month_name[index] != new_month){
	            index  +=1;
	            month_name[index] = new_month;
	            month_data[index] = data[i][1];
	        }
	        else
	           month_data[index] +=  data[i][1];
	    }
	    options = create_chart_options(options, 'column', 'Monthly Rainfall', units.rain,[['Rainfall', 'column']], month_name);
	    options.series[0].data = convert_rain(seriesData[0].rainplot.units, units.rain, month_data);
	    options.yAxis[0].title.text = "(" + units.rain + ")";
	    options.yAxis[0].min = 0;
	    options.yAxis[0].tickInterval = 1;
	    options.yAxis[0].allowDecimals = true;
	    options.xAxis[0].minTickInterval =0;
	    options.xAxis[0].type ='category';
	    options.xAxis[0].labels = {formatter: function (){return month_name[this.value]}};
	    return options;
	};
	
	function setStrikeSmall(options) {
	    options.chart.marginBottom = 20;
	    options.yAxis[0].height = "295";
	    $("#"+plot_div).css("height", 325);
	    return options;
	};

	function create_strike_chart(options, span, seriesData, units){
	    options = create_chart_options(options, 'column', 'Strikes Count', null, [['Strikes Count', 'column']]);
	    options.series[0].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.strikeCount));
	    options.yAxis[0].min = 0;
	    options.yAxis[0].title.text = "Strikes";
	    options.yAxis[0].allowDecimals = false;
	    options.xAxis[0].minTickInterval =0;
	    return options;
	};
	
	function create_lightning_chart(options, span, seriesData, units){
	    if (span[0] == "yearly"){
	        options = create_chart_options(options, 'column', 'Lightning Distance/Strikes/Energy Max & Avg/Cnt', null, [['Distance Max', 'column',1], ['Distance Avg', 'column',1], ['Strikes Cnt', 'column'], ['Energy Max', 'column',2], ['Energy Avg', 'column',2]]);
	        options.series[0].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.distanceMax));
	        options.series[1].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.distanceAvg));
	        options.series[2].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.strikeCount));
	        options.series[3].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.energyMax));
	        options.series[4].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.energyAvg));
	    }else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'column', 'Lightning Strikes/Distance/Energy', null, [['Strikes', 'column'], ['Distance', 'column',1], ['Energy', 'column',2],['Strikes', 'column',,,,,1], ['Distance', 'column',1,,,,1], ['Energy', 'column',2,,,,1]]);
	        else
	            options = create_chart_options(options, 'column', 'Lightning Strikes/Distance/Energy', null, [['Strikes', 'column'], ['Distance', 'column',1], ['Energy', 'column',2]]);
	        options.series[0].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.strikeCountWeek));
	        options.series[1].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.distanceWeek));
	        options.series[2].data = remove_zero_dps(reinflate_time(seriesData[0].lightningplot.energyWeek));
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].lightningplot.strikeCountWeek);
	            options.series[3].data = remove_zero_dps(reinflate_time(seriesData[1].lightningplot.strikeCountWeek, options.series[0].data[0][0]));
	            options.series[4].data = remove_zero_dps(reinflate_time(seriesData[1].lightningplot.distanceWeek, options.series[0].data[0][0]));
	            options.series[5].data = remove_zero_dps(reinflate_time(seriesData[1].lightningplot.energyWeek, options.series[0].data[0][0]));
	        }
	    }
	    options.yAxis[0].min = 0;
	    options.yAxis[0].title.text = "Strikes";
	    options.yAxis[0].allowDecimals = false;
	    options.yAxis[1].min = 0;
	    options.yAxis[1].title.text = "Distance";
	    options.yAxis[1].allowDecimals = true;
	    options.yAxis[2].min = 0;
	    options.yAxis[2].title.text = "Energy";
	    options.yAxis[2].allowDecimals = true;
	    options.xAxis[0].minTickInterval =0;
	    return options;
	};
	
	function create_lightning_month_chart(options, span, seriesData, units){
	    var data = reinflate_time(seriesData[0].lightningplot.lightningsum);
	    var index = 0;
	    var month_data = [];
	    var month_name = [];
	    month_name[index] = getTranslation(monthNames[new Date(data[0][0]).getMonth()]);
	    month_data[index] = data[0][1];
	    for (var i = 1; i < data.length; i++){
	        var new_month = getTranslation(monthNames[new Date(data[i][0]).getMonth()]);
	        if (month_name[index] != new_month){
	            index  +=1;
	            month_name[index] = new_month;
	            month_data[index] = data[i][1];
	        }
	        else
	           month_data[index] +=  data[i][1];
	    }
	    options = create_chart_options(options, 'column', 'Monthly Lightning Strikes',null,[['Lightning Strikes', 'column']], month_name);
	    options.series[0].data = month_data;
	    options.plotOptions.column.pointWidth = 10;
	    options.yAxis[0].title.text = "Strikes";
	    options.yAxis[0].min = 0;
	    options.yAxis[0].allowDecimals = false;
	    options.xAxis[0].minTickInterval =0;
	    options.xAxis[0].type ='category';
	    options.xAxis[0].labels = {formatter: function (){return month_name[this.value]}};
	    return options;
	};
	
	function create_luminosity_chart(options, span, seriesData, units){
	    if (span[0] == "yearly"){
	        options = create_chart_options(options, 'column', 'Luminosity Spectrum/Lux/Infrared Max & Avg', null, [['Spectrum Max', 'column'], ['Spectrum Avg', 'column'], ['Lux Max', 'column'], ['Lux Avg', 'column'], ['Infrared Max', 'column'], ['Infrared Avg', 'column']]);
	        options.series[0].data = reinflate_time(seriesData[0].uvplot.full_spectrumMax);
	        options.series[1].data = reinflate_time(seriesData[0].uvplot.full_spectrumAvg);
	        options.series[2].data = reinflate_time(seriesData[0].uvplot.luxMax);
	        options.series[3].data = reinflate_time(seriesData[0].uvplot.luxAvg);
	        options.series[4].data = reinflate_time(seriesData[0].uvplot.infraredMax);
	        options.series[5].data = reinflate_time(seriesData[0].uvplot.infraredAvg);
	    }else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Luminosity Spectrum/Lux/Infrared', null, [['Spectrum', 'spline'], ['Lux', 'spline'], ['Infrared', 'spline'],['Spectrum', 'spline',,,,,1], ['Lux', 'spline',,,,,1], ['Infrared', 'spline',,,,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Luminosity Spectrum/Lux/Infrared', null, [['Spectrum', 'spline'], ['Lux', 'spline'], ['Infrared', 'spline']]);
	        options.series[0].data = reinflate_time(seriesData[0].uvplot.full_spectrumWeek);
	        options.series[1].data = reinflate_time(seriesData[0].uvplot.luxWeek);
	        options.series[2].data = reinflate_time(seriesData[0].uvplot.infraredWeek);
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].uvplot.full_spectrumWeek);
	            options.series[3].data = reinflate_time(seriesData[1].uvplot.full_spectrumWeek, options.series[0].data[0][0]);
	            options.series[4].data = reinflate_time(seriesData[1].uvplot.luxWeek, options.series[0].data[0][0]);
	            options.series[5].data = reinflate_time(seriesData[1].uvplot.infraredWeek, options.series[0].data[0][0]);
	        }
	    }
	    options.yAxis[0].min = 0;
	    options.yAxis[0].allowDecimals = true;
	    options.xAxis[0].minTickInterval =0;
	    return options;
	};
	
	function setRadSmall(options) {
	    options.yAxis[0].height = "255";
	    $("#"+plot_div).css("height", 285);
	    return options;
	};
	
	function create_radiation_chart(options, span, seriesData, units){
	    if (span[0] == "yearly"){
	        options = create_chart_options(options, 'column', 'Solar Radiation Maximum & Average','W/m\u00B2', [['Max Solar Radiation', 'column'], ["Avg Solar Radiation", 'column'], ['Max UVAWm', 'column',,false,false], ["Avg UVAWm", 'column',,false,false], ['Max UVBWm', 'column',,false,false], ["Avg UVBWm", 'column',,false,false]]);
	        options.series[0].data = reinflate_time(seriesData[0].radiationplot.radiationmax);
	        options.series[1].data = reinflate_time(seriesData[0].radiationplot.radiationaverage);
	        if ("uvaWmMax" in seriesData[0].radiationplot){
	            options.series[2].data = reinflate_time(seriesData[0].radiationplot.uvaWmMax);
	            options.series[2].visible = true;
	            options.series[2].showInLegend = true;
	        }
	        if ("uvaWmAvg" in seriesData[0].radiationplot){
	            options.series[3].data = reinflate_time(seriesData[0].radiationplot.uvaWmAvg);
	            options.series[3].visible = true;
	            options.series[3].showInLegend = true;
	        }
	        if ("uvbWmMax" in seriesData[0].radiationplot){
	            options.series[4].data = reinflate_time(seriesData[0].radiationplot.uvbWmMax);
	            options.series[4].visible = true;
	            options.series[4].showInLegend = true;
	        }
	        if ("uvbWmAvg" in seriesData[0].radiationplot){
	            options.series[5].data = reinflate_time(seriesData[0].radiationplot.uvbWmAvg);
	            options.series[5].visible = true;
	            options.series[5].showInLegend = true;
	        }
	    }
	    else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Solar Radiation','W/m\u00B2', [['Solar Radiation', 'spline'], ["Insolation", 'spline',,false,false],["UVAWm", 'spline',,false,false],["UVBWm", 'spline',,false,false],['Solar Radiation', 'spline',,,,,1], ["Insolation", 'spline',,false,false,,1],["UVAWm", 'spline',,false,false,,1],["UVBWm", 'spline',,false,false,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Solar Radiation','W/m\u00B2', [['Solar Radiation', 'spline'], ["Insolation", 'spline',,false,false],["UVAWm", 'spline',,false,false],["UVBWm", 'spline',,false,false]]);
	        options.series[0].data = reinflate_time(seriesData[0].radiationplot.radiation);
	        if ("insolation" in seriesData[0].radiationplot) {
	            options.series[1].data = reinflate_time(seriesData[0].radiationplot.insolation);
	            options.series[1].visible = true;
	            options.series[1].showInLegend = true;
	        }
	        if ("uvaWmWeek" in seriesData[0].radiationplot){
	            options.series[2].data = reinflate_time(seriesData[0].radiationplot.uvaWmWeek);
	            options.series[2].visible = true;
	            options.series[2].showInLegend = true;
	        }
	        if ("uvbWmWeek" in seriesData[0].radiationplot){
	            options.series[3].data = reinflate_time(seriesData[0].radiationplot.uvbWmWeek);
	            options.series[3].visible = true;
	            options.series[3].showInLegend = true;
	        }
	        if (compare_dates){
	            options.series[0].data = reinflate_time(seriesData[0].radiationplot.radiation);
	            create_compare_days_ts(options.series[0].data, seriesData[1].radiationplot.radiation);
	            options.series[4].data = reinflate_time(seriesData[1].radiationplot.radiation, options.series[0].data[0][0]);
	            if ("insolation" in seriesData[1].radiationplot) {
	                options.series[5].data = reinflate_time(seriesData[1].radiationplot.insolation, options.series[0].data[0][0]);
	                options.series[5].visible = true;
	                options.series[5].showInLegend = true;
	            }
	            if ("uvaWmWeek" in seriesData[1].radiationplot){
	                options.series[6].data = reinflate_time(seriesData[1].radiationplot.uvaWmWeek, options.series[0].data[0][0]);
	                options.series[6].visible = true;
	                options.series[6].showInLegend = true;
	            }
	            if ("uvbWmWeek" in seriesData[1].radiationplot){
	                options.series[7].data = reinflate_time(seriesData[1].radiationplot.uvbWmWeek, options.series[0].data[0][0]);
	                options.series[7].visible = true;
	                options.series[7].showInLegend = true;
	            }
	        }
	    }
	    options.yAxis[0].min = 0;
	    options.yAxis[0].title.text = "(" + seriesData[0].radiationplot.units + ")";
	    return options;
	};
	
	function create_raduv_chart(options, span, seriesData, units){
	    if (span[0] == "yearly"){
	        options = create_chart_options(options, 'spline', 'Solar Radiation/UV Index Max & Avg', null, [['Solar Radiation Max', 'spline',,,,{valueSuffix: ' W/m\u00B2'}],['Solar Radiation Avg', 'spline',,,,{valueSuffix: ' W/m\u00B2'}],["UV Index Max", 'spline',1],["UV Index Avg", 'spline',1]]);
	        options.series[0].data = reinflate_time(seriesData[0].radiationplot.radiationmax);
	        options.series[1].data = reinflate_time(seriesData[0].radiationplot.radiationaverage);
	        options.series[2].data = reinflate_time(seriesData[0].uvplot.uvmax);
	        options.series[3].data = reinflate_time(seriesData[0].uvplot.uvaverage);
	    }
	    else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Solar Radiation UV Index', null, [['Solar Radiation', 'spline'], ['UV Index', 'spline',1], ['Solar Radiation', 'spline',,,,,1], ['UV Index', 'spline',1,,,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Solar Radiation UV Index', null, [['Solar Radiation', 'spline'], ['UV Index', 'spline',1]]);
	        options.series[0].data = reinflate_time(seriesData[0].radiationplot.radiation);
	        options.series[1].data = reinflate_time(seriesData[0].uvplot.uv);
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].radiationplot.radiation);
	            options.series[2].data = reinflate_time(seriesData[1].radiationplot.radiation, options.series[0].data[0][0]);
	            options.series[3].data = reinflate_time(seriesData[1].uvplot.uv, options.series[0].data[0][0]);
	        }
	    }
	    options.yAxis[0].title.text = "(" + seriesData[0].radiationplot.units + ")";
	    options.yAxis[1].title.text = "(" + seriesData[0].uvplot.units + ")";
	    options.yAxis[0].min = 0;
	    options.yAxis[1].max = 20;
	    return options;
	};
	
	function setUvSmall(options) {
	    options.yAxis[0].height = "255";
	    $("#"+plot_div).css("height", 285);
	    return options
	};
	
	function create_uv_chart(options, span, seriesData, units){
	    if (span[0] == "yearly"){
	        options = create_chart_options(options, 'column', 'UV Index Maximum & Average', null, [['UV Max', 'column'], ['UV Avg', 'column'], ['UVA Max', 'column',, false, false], ['UVA Avg', 'column',, false, false], ['UVB Max', 'column',, false, false], ['UVB Avg', 'column',, false, false]]);
	        options.series[0].data = reinflate_time(seriesData[0].uvplot.uvmax);
	        options.series[1].data = reinflate_time(seriesData[0].uvplot.uvaverage);
	        if ("uvaMax" in seriesData[0].uvplot){
	            options.series[2].data = reinflate_time(seriesData[0].uvplot.uvaMax);
	            options.series[2].visible = true;
	            options.series[2].showInLegend = true;
	        }
	        if ("uvaAvg" in seriesData[0].uvplot){
	            options.series[3].data = reinflate_time(seriesData[0].uvplot.uvaAvg);
	            options.series[3].visible = true;
	            options.series[3].showInLegend = true;
	        }
	        if ("uvbMax" in seriesData[0].uvplot){
	            options.series[4].data = reinflate_time(seriesData[0].uvplot.uvbMax);
	            options.series[4].visible = true;
	            options.series[4].showInLegend = true;
	        }
	        if ("uvbAvg" in seriesData[0].uvplot){
	            options.series[5].data = reinflate_time(seriesData[0].uvplot.uvbAvg);
	            options.series[5].visible = true;
	            options.series[5].showInLegend = true;
	        }
	    }
	    else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'UV Index', null, [['UV Index', 'spline'], ['UVA Index', 'spline',,false,false],['UVB Index', 'spline',,false,false], ['UV Index', 'spline',,,,,1],['UVA Index', 'spline',,false,false,,1],['UVB Index', 'spline',,false,false,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'UV Index', null, [['UV Index', 'spline'],['UVA Index', 'spline',,false,false],['UVB Index', 'spline',,false,false]]);
	        options.series[0].data = reinflate_time(seriesData[0].uvplot.uv);
	        if ("uvaWeek" in seriesData[0].uvplot){
	            options.series[1].data = reinflate_time(seriesData[0].uvplot.uvaWeek);
	            options.series[1].visible = true;
	            options.series[1].showInLegend = true;
	        }
	        if ("uvbWeek" in seriesData[0].uvplot){
	            options.series[2].data = reinflate_time(seriesData[0].uvplot.uvbWeek);
	            options.series[2].visible = true;
	            options.series[2].showInLegend = true;
	        }
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].uvplot.uv);
	            options.series[3].data = reinflate_time(seriesData[1].uvplot.uv, options.series[0].data[0][0]);
	            if ("uvaWeek" in seriesData[1].uvplot){
	                options.series[4].data = reinflate_time(seriesData[1].uvplot.uvaWeek, options.series[0].data[0][0]);
	                options.series[4].visible = true;
	                options.series[4].showInLegend = true;
	            }
	            if ("uvbWeek" in seriesData[1].uvplot){
	                options.series[5].data = reinflate_time(seriesData[1].uvplot.uvbWeek, options.series[0].data[0][0]);
	                options.series[5].visible = true;
	                options.series[5].showInLegend = true;
	            }
	        }
	    }
	    options.yAxis[0].min = 0;
	    options.yAxis[0].max = 20;
	    options.yAxis[0].minorTickInterval = 1;
	    options.yAxis[0].tickInterval = 4;
	    options.yAxis[0].title.text = "(" + seriesData[0].uvplot.units + ")";
	    return options;
	};
	
	function create_aq_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(reinflate_time(seriesData[0].aqplot.pm2_5Max));
	        dataMinMax.push(reinflate_time(seriesData[0].aqplot.pm10_0Max));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['PM 2.5', 'PM 10.0'], aqcolors);
	    } else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'column', 'Air Quality Maximum & Average', null, [['PM 2.5 Max', 'column'], ['PM 2.5 Avg', 'column'], ['PM 10.0 Max', 'column'], ['PM 10.0 Avg', 'column']]);
	        options.series[0].data = reinflate_time(seriesData[0].aqplot.pm2_5Max);
	        options.series[1].data = reinflate_time(seriesData[0].aqplot.pm2_5Avg);
	        options.series[2].data = reinflate_time(seriesData[0].aqplot.pm10_0Max);
	        options.series[3].data = reinflate_time(seriesData[0].aqplot.pm10_0Avg);
	    }
	    else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'spline', 'Air Quality', null, [['PM 2.5', 'spline'], ['PM 10.0', 'spline'], ['PM 2.5', 'spline',,,,,1],['PM 10.0', 'spline',,,,,1]]);
	        else
	            options = create_chart_options(options, 'spline', 'Air Quality', null, [['PM 2.5', 'spline'],['PM 10.0', 'spline']]);
	        options.series[0].data = reinflate_time(seriesData[0].aqplot.pm2_5Week);
	        options.series[1].data = reinflate_time(seriesData[0].aqplot.pm10_0Week);
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].aqplot.pm2_5Week);
	            options.series[2].data = reinflate_time(seriesData[1].aqplot.pm2_5Week, options.series[0].data[0][0]);
	            options.series[3].data = reinflate_time(seriesData[1].aqplot.pm10_0Week, options.series[0].data[0][0]);
	        }
	    }
	    options.yAxis[0].min = 0;
	    options.yAxis[0].minorTickInterval = 1;
	    options.yAxis[0].title.text = "(μg/㎥)";
	    return options;
	};
	
	function create_cloudcover_chart(options, span, seriesData, units){
	    if (do_radial && span[0] == "yearly"){
	        var dataMinMax = [];
	        dataMinMax.push(reinflate_time(seriesData[0].cloudcoverplot.cloudcoverMax));
	        return do_radial_chart(options, dataMinMax, 'columnrange', ['Cloud Cover'], humcolors);
	    }
	    else if (span[0] == "yearly"){
	        options = create_chart_options(options, 'column', 'Cloud Cover Maximum & Average', null, [['Cloud Cover Max', 'column'], ['Cloud Cover Avg', 'column']]);
	        options.series[0].data = reinflate_time(seriesData[0].cloudcoverplot.cloudcoverMax);
	        options.series[1].data = reinflate_time(seriesData[0].cloudcoverplot.cloudcoverAvg);
	    }
	    else if (span[0] == "weekly"){
	        if (compare_dates)
	            options = create_chart_options(options, 'area', 'Cloud Cover', null, [['Cloud Cover', 'area'], ['Cloud Cover', 'area',,,,,1]]);
	        else
	            options = create_chart_options(options, 'area', 'Cloud Cover', null, [['Cloud Cover', 'area']]);
	        options.series[0].data = reinflate_time(seriesData[0].cloudcoverplot.cloudcoverWeek);
	        if (compare_dates){
	            create_compare_days_ts(options.series[0].data, seriesData[1].cloudcoverplot.cloudcoverWeek);
	            options.series[1].data = reinflate_time(seriesData[1].cloudcoverplot.cloudcoverWeek, options.series[0].data[0][0]);
	        }
	    }
	    options.yAxis[0].min = 0;
            options.yAxis[0].max = 100
	    options.yAxis[0].minorTickInterval = 25;
	    options.yAxis[0].title.text = "(%)";
            options.yAxis[0].plotBands = [{
                             color: Highcharts.theme=='white'?Highcharts.theme:'transparent',
                             from: 0,
                             to: 7,
                             label: {
                                 text: 'Clear',
                                 style: {color: Highcharts.theme=='white'?'black':'white'}
                                 }
                             },{
                             color: Highcharts.theme=='white'?Highcharts.theme:'transparent',
                             from: 7,
                             to: 32,
                             label: {
                                 text: 'Scattered Clouds',
                                 style: {color: Highcharts.theme=='white'?'black':'white'}
                                 }
                             },{
                             color: Highcharts.theme=='white'?Highcharts.theme:'transparent',
                             from: 32,
                             to: 70,
                             label: {
                                 text: 'Partly Cloudy',
                                 style: {color: Highcharts.theme=='white'?'black':'white'}
                                 }
                             },{
                             color: Highcharts.theme=='white'?Highcharts.theme:'transparent',
                             from: 70,
                             to: 95,
                             label: {
                                 text: 'Mostly Cloudy',
                                 style: {color: Highcharts.theme=='white'?'black':'white'}
                                 }
                             },{
                             color: Highcharts.theme=='white'?Highcharts.theme:'transparent',
                             from: 95,
                             to: 100,
                             label: {
                                 text: 'Overcast',
                                 style: {color: Highcharts.theme=='white'?'black':'white'}
                                 }
                             }];
            options.plotOptions = {
                            area: {
                                fillColor: {
                                    linearGradient: {
                                        x1: 0,
                                        y1: 0,
                                        x2: 0,
                                        y2: 1
                                        },
                                    stops: [
                                        [0, Highcharts.getOptions().colors[0]],
                                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]]
                                },
                                marker: {radius: 2},
                                lineWidth: 2,
                                threshold: null
                            }
                        }
	    return options;
	};
	
	function do_radial_chart(options, dataMinMax, type, names, colors){
            if (type == 'columnrange'){
    	        minMax = [];
	        for (var k = 0; k < dataMinMax.length; k++){
	            minMax[k] = [];
	            for (var i = 0; i < dataMinMax[k].length; i++){
	                var date = new Date(dataMinMax[k][i][0]);
	                for (var j = 0; j < colors.length; j++){
	                    if (dataMinMax[k][i][dataMinMax[k][i].length == 2?1:2] <= colors[j][0] || j == colors.length -1){
	                        if (dataMinMax[k][i].length == 2)
	                            minMax[k].push({x:dataMinMax[k][i][0], low:0, high:dataMinMax[k][i][1], name:date.getFullYear() + "-" + (date.getMonth()+1) +"-" + date.getDate(), color:colors[j][1]});
	                        else
	                            minMax[k].push({x:dataMinMax[k][i][0], low:dataMinMax[k][i][1], high:dataMinMax[k][i][2], name:date.getFullYear() + "-" + (date.getMonth()+1) +"-" + date.getDate(), color:colors[j][1]});
	                        break;
	                    }
	                }
	            }
	        }
	        options.plotOptions.series = {stacking: "normal"};
	        options.yAxis = { lineWidth: 1, showLastLabel: false, showFirstLabel: false }
	        for (var k = 0; k < minMax.length; k++){
	            options.series[k] = [];
	            options.series[k].name = getTranslation(names[k]);
	            options.series[k].data = minMax[k];
	        }
	    }
            else{
	        options.series[0].name = getTranslation(names[0]);
	        options.series[0].data = dataMinMax;
            }
	    options.xAxis[0].showLastLabel = true;
	    options.xAxis[0].showFirstLabel = true;
	    options.xAxis[0].type = "datetime";
            options.chart.polar = true;
            options.chart.type = type;
            options.tooltip.formatter = function() {return custom_tooltip(this, 'date', options.chart.type == 'line'?false:true)};
	    options.title = {text: getTranslation(names.join(' '))};
            options.xAxis[0].events= {
                setExtremes: function(e) {
                   this.update({
                       tickPositioner: function() {
                           var positions = [];
                           info = this.tickPositions.info;
                           crop_start = e.target.series[0].cropStart;
                           while ((e.target.series[0].xData.length - crop_start)%15 != 0) crop_start++; 
                           for (var x = e.target.series[0].cropStart; x < e.target.series[0].xData.length; x += (e.target.series[0].xData.length - crop_start)/15)
                              positions.push(e.target.series[0].xData[x]);
                           positions.info = info;
                           return positions;
                       }
                   }, false)
                }
            };
	    return options;
	};
	
	function do_realtime_update(chart, plot_type, units){
	    if (!do_realtime){
	        if (timer2 != null){
	            clearInterval(timer2);
	            timer2 = null;
	        }
	        return;
	    }
	    if (realtimeplot[plot_type][0].length == 0){
	       $.ajax({url:'getDayChart.php',method:'get',
	           data:{plot_info:pathjsondayfiles+","+jsonfileforplot[plot_type][0].join(":")+","+weereportcmd, epoch:0},
	           success:function(data){setTimeout(display_chart,0,units,realtimeplot[plot_type][3],['weekly'],plot_div,false,false,reload_plot_type+":"+reload_span,true,false)},
	           error:function(data){$("#"+plot_div).load("../404.html")}
	       });
	       return;
	    }
            $.ajax({
            url: "../" + realtimefilename,
            async: false,
            success: function (data){
	        try{
	            var parts = data.split(" ");
	            if (parts[0] + parts[1] == prevrealtime) return;
	            else prevrealtime = parts[0] + parts[1];
	            if (plot_type =='windroseplot' || plot_type =='windrosegustplot'){
	                var compassindex = 0, speedindex = 0; speed = 0;
	                for (compassindex = 0; compassindex < categories.length; compassindex++)
	                    if ((isNaN(parts[realtimeplot[plot_type][0][1]])?parts[realtimeplot[plot_type][0][1]]:compassdirections[Math.round((parts[realtimeplot[plot_type][0][1]]%360)/22.5)+1]) == categories[compassindex])
	                        break;
	                speed = parseFloat(window[realtimeplot[plot_type][2][0]](parts[realtimeplot[plot_type][1][0]],units[realtimeplot[plot_type][2][0].split("_")[1]],parts[realtimeplot[plot_type][0][0]]));
	                windrosesamples += 1;
	                if (windrosesamples == 60*(60/realtimeinterval)+60){
	                    clearTimeout(timer2);
	                    setTimeout(display_chart, 0, units, realtimeplot[plot_type][3], 'weekly',plot_div,false,false,reload_plot_type+":"+reload_span, true);
	                    return;
	                }
	                if (speed > 0){
                            if (plot_type == "windrosegustplot" && speed == prev_speed && compassindex == prev_compassindex)
                                return;
                            else{
                                prev_speed = speed;
                                prev_compassindex = compassindex;
                            } 
	                    chart.setTitle(null,{text: speed +" "+units[realtimeplot[plot_type][2][0].split("_")[1]] + " " + categories[compassindex]});
	                    for (var j = windrosespeeds.length-1; j > -1; j-=2)
	                        if (speed < windrosespeeds[j-1] && speed <= windrosespeeds[j]){
	                            speedindex = (j-1)/2 +1;
	                            break;
	                        }
	                    if (chart.series[speedindex].data[compassindex] != undefined){
	                        var newdata = [];
	                        for (var i = 0; i < chart.series.length; i++){
	                            newdata[i] = [];
	                            for (var j = 0; j < chart.series[i].data.length; j++)
	                                newdata[i].push(chart.series[i].data[j].y/100.0*(windrosesamples-1));
	                        }
	                        newdata[speedindex][compassindex] += 1;
	                        for (var i = 0; i < newdata.length; i++){
	                            for (var j = 0; j < newdata[i].length; j++)
	                               newdata[i][j] = (newdata[i][j]/windrosesamples*100.0);
	                            chart.series[i].setData(newdata[i],false,false,false);
	                        }
	                        chart.redraw();
	                        convertlegend(chart, chart.series, units, true);
	                    }
	                }else chart.setTitle(null,{text: getTranslation("Calm")});
	            }else{
	                var tparts = (parts[0]+" "+parts[1]).match(/(\d{2})\/(\d{2})\/(\d{2}) (\d{2}):(\d{2}):(\d{2})/);
	                var x = Date.UTC(+"20"+tparts[3],tparts[2]-1,+tparts[1],+tparts[4],+tparts[5],+tparts[6]) + (utcoffset *60);
	                for (var j = 0; j < realtimeplot[plot_type][0].length; j++)
	                    if (chart.series[j] != undefined && chart.series[j].data.length > realtimeinterval*realtimeXscaleFactor)
	                        chart.series[j].setData(chart.series[j].data.slice(-realtimeinterval*realtimeXscaleFactor));
	                for (var j = 0; j < realtimeplot[plot_type][0].length; j++)
	                    if (realtimeplot[plot_type][2][j] == null)
	                        chart.series[j].addPoint([x, check_for_delta_change(plot_type, j, parseFloat(parts[realtimeplot[plot_type][0][j]]))], true, true);
	                    else
	                        chart.series[j].addPoint([x, check_for_delta_change(plot_type, j, parseFloat(window[realtimeplot[plot_type][2][j]](parts[realtimeplot[plot_type][1][j]],units[realtimeplot[plot_type][2][j].split("_")[1]],parts[realtimeplot[plot_type][0][j]])))], true, true);
	            }
	        }catch(err) {console.log(err)}
             }
	    });
	};
	
	function check_for_delta_change(plot_type, index, value){
	    var ret_value = value;
	    if (realtimeplot[plot_type][5] != undefined && realtimeplot[plot_type][5][index] != undefined){
	        ret_value = value - realtimeplot[plot_type][5][index];
	        realtimeplot[plot_type][5][index] = value;
	    }
	    return ret_value;
	}
	    
	function do_auto_update(units, plot_type, span, buttonReload){       
	    if (buttonReload)
	        setTimeout(display_chart, 0, units, reload_plot_type == null ? plot_type : reload_plot_type, reload_span == null ? span : reload_span, plot_div);
	    else
	        setTimeout(display_chart, 0, units, plot_type, span, plot_div);
	};
	
	function setup_plots(seriesData, units, options, plot_type, span){
	    utcoffset = seriesData[0].utcoffset;
	    for (var i = 0; i < (span[0] == "weekly" ? createweeklyfunctions[plot_type].length : createyearlyfunctions[plot_type].length); i++)
	       options = (span[0] == "weekly" ? createweeklyfunctions[plot_type][i](options, span, seriesData, units, plot_type) : createyearlyfunctions[plot_type][i](options, span, seriesData, units, plot_type));
	    return options
	};
	
	function display_chart(units, ptype, span, plt_div, dplots = false, cdates = false, reload_plot_type_span = null, realtime = false, radial = false){
	    if (!Array.isArray(span)) span = [span];
	    console.log(units, ptype, span, dplots, cdates, reload_plot_type_span, realtime, radial, plt_div);
	    day_plots = dplots;
	    url_units = units;
	    plot_type = ptype;
	    compare_dates = cdates;
	    reload_plot_type = plot_type;
	    reload_span = span;
	    do_realtime = realtime;
	    do_radial = radial
	    plot_div = plt_div;
	    if (reload_plot_type_span != null){
	        reload_plot_type = reload_plot_type_span.split(":")[0];
	        reload_span = reload_plot_type_span.split(":")[1];
	    }
	    Highcharts.setOptions({global:{timezoneOffset: 0,}});
	    Highcharts.setOptions({lang:{rangeSelectorZoom: ""}});
	    var results, files = [], index = 0;
	    if (!jsonfileforplot.hasOwnProperty(plot_type) || !(span[0] == "weekly" || span[0] == "yearly")){alert("Bad plot_type (" + plot_type + ") or span (" + span[0] + ")"); return};
	    for (var i = 0; i < jsonfileforplot[plot_type][span[0] == "weekly" ? 0 : 1].length; i++,index++)
	        files[index] = (day_plots || compare_dates ? pathjsondayfiles : pathjsonfiles) + jsonfileforplot[plot_type][span[0] == "weekly" ? 0 : 1][i];
	    for (var i = 0; i < jsonfileforplot[plot_type][0].length; i++,index++)
	        if (compare_dates && compareplots.includes(plot_type))
	            files[index] = pathjsondayfiles + jsonfileforplot[plot_type][0][i].split(".")[0] + "1.json";
	    jQuery.getMultipleJSON(...files).done(function(...results){
	        //var options = setup_plots(results.flat(), units, create_common_options(), plot_type, span); //Correct Way
	        var options = setup_plots(results.reduce((acc, val) => acc.concat(val), []), units, create_common_options(), plot_type, span); //Microsoft Way
	        if (options == null){
	            $("#"+plot_div).load("../404.html");
	            return;
	        }
	        options.chart.renderTo = plot_div; 
	        function fullscreen_callback(){return function(){chart.fullscreen.toggle()}};
	        function export_callback(){return function(){chart.exportChart()}};
	        function callback(units, plot_type, span, buttonReload){return function(){
	                                     if (buttonReload){
	                                         do_realtime = false;
	                                         auto_update = false;
	                                     }
	                                     else {
	                                         if (do_realtime) return;
	                                         auto_update = !auto_update;
	                                     }
	                                     if (timer1 != null){
	                                         clearInterval(timer1);
	                                         timer1 = null;
	                                     }                                
	                                     setTimeout(display_chart, 0, units, plot_type,span,plot_div,false,false,reload_plot_type+":"+reload_span, false)}}
	         function realtime_callback(){return function(){add_realtime_button(units, plot_type)}}
	         function radial_callback(dplot=false,span = ['yearly']){return function(){
	                                     if (auto_update) return;
	                                     if (do_realtime) return;
	                                     setTimeout(display_chart, 0, units, plot_type,span,plot_div,dplot,false,reload_plot_type+":"+reload_span, false, true)}}                                    
	         function compare_callback(){return function(){
	                                     if (auto_update) return;
	                                     if (do_realtime) return;
	                                     var epoch  = (new Date($('input.highcharts-range-selector:eq(0)').val()).getTime()/1000);
	                                     var epoch1 = (new Date($('input.highcharts-range-selector:eq(1)').val()).getTime()/1000);
	                                     if (isNaN(epoch) || isNaN(epoch1)) return;
	                                     chart.showLoading('Loading data from database...');
	                                     $.ajax({url:'getDayChart.php',method:'get',
	                                         data:{plot_info:pathjsondayfiles+","+jsonfileforplot[plot_type][0].join(":")+","+weereportcmd, epoch:epoch, epoch1:epoch1},
	                                         success:function(data){setTimeout(display_chart,0,units,plot_type,['weekly'],plot_div,false,true,reload_plot_type+":"+reload_span,false,false)},
	                                         error:function(data){$("#"+plot_div).load("../404.html")}
	                                      });
	         }};
	         options.exporting.buttons.toggle.menuItems.push({text: "View in full screen", onclick: fullscreen_callback()});
	         options.exporting.buttons.toggle.menuItems.push({text: "Export Chart", onclick: export_callback()});
	         options.exporting.buttons.toggle.menuItems.push({text: "Reload Chart", onclick: callback(units, plot_type, span, true)});
	         options.exporting.buttons.toggle.menuItems.push({text: "Auto Update Chart", onclick: callback(units, plot_type, span, false)});
	         if (realtimeplot.hasOwnProperty(plot_type))
	             options.exporting.buttons.toggle.menuItems.push({text: "Realtime Update", onclick: realtime_callback()});
	         if (radialplots.includes(plot_type))
	             options.exporting.buttons.toggle.menuItems.push({text: "Radial Chart", onclick: radial_callback()});
	         if (day_plots && plot_type == 'windplot')
	             options.exporting.buttons.toggle.menuItems.push({text: "Hays Chart", onclick: radial_callback(true,['weekly'])});
	         if (compareplots.includes(plot_type) && !disable_day_plots)
	             options.exporting.buttons.toggle.menuItems.push({text: "Compare Dates", onclick: compare_callback()});
	        chart = new Highcharts.StockChart(options,function(chart){setTimeout(function(){$('input.highcharts-range-selector',$('#'+options.chart.renderTo)).datepicker()},0)});
                chart.options.zoomType = 'x';
	        chart.pointer.zoomX = true;
	        chart.pointer.zoomHor = true;
 chart.update({
        chart:{xAxis:{min:400}}});
	        if (postcreatefunctions.hasOwnProperty(plot_type))
	            for (var i = 0; i < postcreatefunctions[plot_type].length; i++)
	                postcreatefunctions[plot_type][i](chart);
	        if (do_realtime || do_radial){
	            if (do_realtime && (plot_type != 'windroseplot' && plot_type != 'windrosegustplot'))
	                remove_range_selector(chart);
	            if (do_realtime){ 
	                for (var j =0; j < realtimeplot[plot_type][0].length; j++)
	                    chart.series[j].setData(options.series[j].data.slice(-realtimeinterval*realtimeXscaleFactor));
	                timer2 = setInterval(do_realtime_update, (realtimeplot[plot_type][0].length == 0 ? realtimeplot[plot_type][4]*1000 : realtimeinterval*1000), chart, plot_type, units);
	            }
	            return;
	        }
	        if (auto_update && timer1 == null){
	            timer1 = setInterval(do_auto_update, autoupdateinterval*1000, units, plot_type, span, false);
	            return;
	        }
	        if (!plotsnoswitch.includes(plot_type)){
	            for (var i = 0; i < chart.series.length; i++){
	                chart.series[i].update({
	                    cursor: 'pointer',
	                    point: {
	                       events: {click: function(e){
	                            if (day_plots) 
	                                setTimeout(display_chart, 0, units, plot_type, ['weekly'], plot_div); 
	                            else if (span[0] == 'yearly'){
	                                if (disable_day_plots){
	                                    setTimeout(display_chart, 0, units, plot_type, ['weekly'], plot_div);
                                            return;
                                        }
	                                var epoch = 0;
	                                for (var i= 0; i < this.series.xData.length; i++)
	                                    if (this.series.xData[i] == this.x){
	                                       epoch = this.series.xData[i];
	                                       break;
	                                     }
	                                chart.showLoading('Loading data from database...');
	                                $.ajax({url:'getDayChart.php',method:'get',
	                                    data:{plot_info:pathjsondayfiles+","+jsonfileforplot[plot_type][0].join(":")+","+weereportcmd, epoch:epoch/1000},
	                                    success:function(data){setTimeout(display_chart,0,units,plot_type,['weekly'],plot_div,true,false,reload_plot_type+":"+reload_span,false,do_radial)},
	                                    error:function(data){$("#"+plot_div).load("../404.html")}
	                                 });
	                            }
	                            else
	                                setTimeout(display_chart, 0, units, plot_type, ['yearly'], plot_div)}}
	                    }
	                });
	            }
	            return;
	        }
	    }).fail(function(){
	        $("#"+plot_div).load("../404.html");
	        return;
	    });
	};
	$.datepicker.setDefaults({
	    dateFormat: 'yy-mm-dd',
	    onSelect: function(dateText) {
                if (do_radial){
                   this.onchange();
                   this.onblur();
                   return;
                }
                if (disable_day_plots) return;
	        chart.showLoading('Loading data from database...');
	        $.ajax({url:'getDayChart.php',method:'get',
	            data:{plot_info:pathjsondayfiles+","+jsonfileforplot[plot_type][0].join(":")+","+weereportcmd, epoch:+(new Date(this.value).getTime()/1000)},
	            success:function(data){setTimeout(display_chart,0,units,plot_type,['weekly'],plot_div,true,false,reload_plot_type+":"+reload_span,false,do_radial)},
	            error:function(data){$("#"+plot_div).load("../404.html")}
	        });
	    }
	});
display_chart(units, ptype, span, plt_div, dplots, cdates, reload_plot_type_span, realtime, radial);
}

