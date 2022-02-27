<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              
// 	                                                                                                				#
//###################################################################################################################
include_once('settings1.php');
include_once('common.php');
include('w34CombinedData.php');

date_default_timezone_set($TZ);


if ($theme === "dark")
{
    echo '<style>.dot {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  border: 2px solid;
  color: rgba(230, 232, 239, .2);
}
.clock .hand {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -100%);
  transform-origin: center bottom;
  border-radius: 40px;
}
.clock .s-hand {
  height: 20px;
  width: 1px;
  background-color: #ff7c39;
  z-index: 5;
}
.clock .m-hand {
  height: 19px;
  width: 2px;
  background-color: rgba(170,170,170,1);
  z-index: 4;
}
.clock .h-hand {
  height: 16px;
  width: 3.5px;
  background-color: rgba(170,170,170,1);
  z-index: 3;
}
.clock .center {
  background-color: #ff7c39;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 6;
}
    </style>';
}
else if ($theme === "light")
{
    echo '<style>.dot {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  border: 2px #e6e8ef solid;
}
.clock .hand {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -100%);
  transform-origin: center bottom;
  border-radius: 40px;
}
.clock .s-hand {
  height: 20px;
  width: 1px;
  background-color: #ff7c39;
  z-index: 5;
}
.clock .m-hand {
  height: 19px;
  width: 2px;
  background-color: rgba(170,170,170,1);
  z-index: 4;
}
.clock .h-hand {
  height: 16px;
  width: 3.5px;
  background-color: rgba(170,170,170,1);
  z-index: 3;
}
.clock .center {
  background-color: #ff7c39;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 6;
    </style>';
}
?>

<div class="calendar34" style="padding-top: 10px" ><svg id="weather34clock icon" width="60pt" height="60pt" viewBox="0 0 720 720" version="12-10-21" ></svg>
</div><span id="theTime"></span></div>

<div class="clock"  width="48" height="48" style="position:relative; top: 27px; left: 5px;">
	<div class="dot"></div>
	<div class="s-hand hand"></div>
	<div class="m-hand hand"></div>
	<div class="h-hand hand"></div>
	<div class="center"></div>
</div>

  <script>
  $(document).ready(function() {
	
	setInterval(function(){
		getTime();
	}, 50);
	
	function getTime() {
			
	var now = new Date();
	
	var yourTimeZoneFrom = <?php echo $UTC_offset?>;
	
	var tzDifference = yourTimeZoneFrom * 60 + now.getTimezoneOffset();
	var offset = tzDifference * 60 * 1000;
	
	var now2 = new Date(new Date().getTime() + offset);
		
		var s = now2.getSeconds() + (now2.getMilliseconds() / 1000);
		var m = now2.getMinutes();
		var h = hour12();
		
		$(".s-hand").css("transform", "translate(-50%, -100%) rotate(" + s * 6 + "deg)");
		$(".m-hand").css("transform", "translate(-50%, -100%) rotate(" + m * 6 + "deg)");
		$(".h-hand").css("transform", "translate(-50%, -100%) rotate(" + (h * 30 + m * 0.5) + "deg)");
		
		function hour12() {
			var hour = now2.getHours();

			if(hour >= 12) {
				hour = hour - 12;
			}

			if(hour == 0) {
				h = 12;
			}
			return hour;
		}
	}
});
  
</script>
