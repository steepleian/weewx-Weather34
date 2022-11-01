/**
 * @license Highcharts JS v7.1.2 (2019-06-03)
 *
 * (c) 2009-2019 Torstein Honsi
 *
 * License: www.highcharts.com/license
 */
        // Load the fonts
Highcharts.createElement('link', {
            href: 'https://fonts.googleapis.com/css?family=Unica+One',
            rel: 'stylesheet',
            type: 'text/css'
        }, null, document.getElementsByTagName('head')[0]);

Highcharts.theme = {
            colors: ['rgba(255, 124, 57, 0.8)', '#1ABECE', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
                '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
            chart: {
                backgroundColor: 'rgba(40, 45, 52,.4)',
                style: {
                    fontFamily: '\'arial\', sans-serif'
                },
                plotBorderColor: '#606063'
            },
            title: {
                style: {
                    color: '#ccc',
                    textTransform: 'none',
                    fontSize: '18px'
                }
            },
            subtitle: {
                style: {
                    color: '#ccc',
                    textTransform: 'none'
                }
            },
            xAxis: {
              	crosshair: {
            	width: 1,
            	color: '#009bab',
            	dashStyle: 'shortdash'
        	},
              //gridLineDashStyle: 'shortdot',
              	//gridLineWidth: 1, 
              	//gridLineColor: 'RGBA(64, 65, 66, 0.8)',
                labels: {
                    style: {
                        color: '#ccc'
                    }
                },
                lineColor: '#707073',
                minorGridLineColor: 'RGBA(64, 65, 66, 0.8)',
                tickColor: '#707073',
                title: {
                    style: {
                        color: '#ccc'

                    }
                }
            },
          		
            yAxis: {
                crosshair: {
            	width: 1,
            	color: '#ff832f',
            	dashStyle: 'shortdash'
        		},
    			gridLineDashStyle: 'shortdot',
              	gridLineWidth: 1,
              	gridLineColor: 'silver',
                labels: {
                    style: {
                        color: '#ccc'
                    }
                },
                lineColor: '#707073',
                minorGridLineColor: 'silver',
                tickColor: '#707073',
                tickWidth: 1,
                title: {
                    style: {
                        color: '#ccc'
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(37, 41, 45, 0.65)',
                style: {
                    color: '#F0F0F0'
                }
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        color: '#ccc'
                    },
                    marker: {
                        lineColor: '#333'
                    }
                },
                boxplot: {
                    fillColor: '#505053'
                },
                candlestick: {
                    lineColor: 'white'
                },
                errorbar: {
                    color: 'white'
                }
            },
            legend: {
                itemStyle: {
                    color: '#ccc'
                },
                itemHoverStyle: {
                    color: '#FFF'
                },
                itemHiddenStyle: {
                    color: '#606063'
                }
            },
            credits: {
                style: {
                    color: '#666'
                }
            },
            labels: {
                style: {
                    color: '#ccc'
                }
            },

            drilldown: {
                activeAxisLabelStyle: {
                    color: '#F0F0F3'
                },
                activeDataLabelStyle: {
                    color: '#F0F0F3'
                }
            },

            exporting: {
        	buttons: {
            
            
              
                          toggle: {
                                align: 'left',
                                x:20,
                                y: 0,
                                height: 18,
                                theme: {
                                    'stroke-width': 1,
                                    style:{color: '#FFFFFF'},
                                    r: 8,
                                    states: {
                                       hover: {
                                           fill: '#FFFFFF',
                                           style:{color: '#000003'},
                                       },
                                       select: {
                                           fill: '#FFFFFF',
                                           style:{color: '#000003'},
                                       }
                                    }
                                }
                            }
                      }
                },			
          	navigation: {
                buttonOptions: {
                    symbolStroke: 'transparent',
                    align: 'left',
                    x: -10,
                  
                    theme: {
                        fill: 'transparent'
                    }
                }
            },

            // scroll charts
            rangeSelector: {
                buttonTheme: {
                    fill: '#AAAAAA',
                    stroke: '#000000',
                    r:8,
                    style: {
                        color: '#333333'
                    },
                    states: {
                        hover: {
                            fill: '#707073',
                            stroke: '#000000',
                            style: {
                                color: 'white'
                            }
                        },
                        select: {
                            fill: '#000003',
                            stroke: '#000000',
                            style: {
                                color: '#CCCCCC'
                            }
                        },
                        disabled: {
                            fill: '#000003',
                            stroke: '#000000',
                            style: {
                                color: 'white'
                            }
                        }
                    }
                },
                inputBoxBorderColor: '#505053',
                inputStyle: {
                    backgroundColor: '#333',
                    color: 'silver'
                },
                labelStyle: {
                    color: 'silver'
                }
            },

            navigator: {
              enabled: false,  
              handles: {
                    backgroundColor: '#666',
                    borderColor: '#AAA'
                },
                outlineColor: '#CCC',
                maskFill: 'rgba(255,255,255,0.1)',
                series: {
                    color: '#7798BF',
                    lineColor: '#A6C7ED'
                },
                xAxis: {
                    gridLineColor: '#505053'
                }
            },

            scrollbar: {
              	enabled: false,  
              	barBackgroundColor: '#808083',
                barBorderColor: '#808083',
                buttonArrowColor: '#CCC',
                buttonBackgroundColor: '#606063',
                buttonBorderColor: '#606063',
                rifleColor: '#FFF',
                trackBackgroundColor: '#404043',
                trackBorderColor: '#404043'
            },

            // special colors for some of the
            legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
            background2: '#505053',
            dataLabelsColor: '#B0B0B3',
            textColor: '#C0C0C0',
            contrastTextColor: '#F0F0F3',
            maskColor: 'rgba(255,255,255,0.3)'
};
Highcharts.setOptions(Highcharts.theme);
