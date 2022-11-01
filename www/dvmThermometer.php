<?php
// Based on an idea by Dave Dupplaw BSc. PhD. http://david.dupplaw.me.uk/developer/jquery-thermometer (MIT License Applies)
// Adapted for use with the weewx-DivumWX template by Ian Millard and Sean Balfour from Team Divum
include('dvmCombinedData.php');include('common.php');include('settings1.php');
//$temp["outside_now"] = 40;
if ($theme === "dark")
{$ttcolor = "silver";}
else if ($theme === "light")
{$ttcolor = "#000000";}


$toptext = 50;
$bottext = -30;
$freezing = 0;
$maxvalue = $toptext;
$minvalue = $bottext;

if ($temp["units"] == 'F')
{
$toptext = 125;
$bottext = -25;
$freezing = 32;
$maxvalue = $toptext;
$minvalue = $bottext;
}

if(anyToC($temp["outside_now"])<=-10){$tempcolor = "#8781bd";}
else if(anyToC($temp["outside_now"])<=0){$tempcolor = "#487ea9";}
else if(anyToC($temp["outside_now"])<=5){$tempcolor = "#3b9cac";}
else if(anyToC($temp["outside_now"])<10){$tempcolor = "#9aba2f";}
else if(anyToC($temp["outside_now"])<20){$tempcolor = "#e6a141";}
else if(anyToC($temp["outside_now"])<25){$tempcolor = "#ec5a34";}
else if(anyToC($temp["outside_now"])<30){$tempcolor = "#d05f2d";}
else if(anyToC($temp["outside_now"])<35){$tempcolor = "#d65b4a";}
else if(anyToC($temp["outside_now"])<40){$tempcolor = "#dc4953";}
else if(anyToC($temp["outside_now"])<100){$tempcolor = "#e26870";}


?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

		<script type="text/javascript" src="js/jquery.thermometer.js"></script>
		<script type="text/javascript">
			$(document).ready( function() {
				// http://stackoverflow.com/questions/5560248/programmatically-lighten-or-darken-a-hex-color-or-rgb-and-blend-colors
				function blendColors(c0, c1, p) {
					var f=parseInt(c0.slice(1),16),t=parseInt(c1.slice(1),16),R1=f>>16,G1=f>>8&0x00FF,B1=f&0x0000FF,R2=t>>16,G2=t>>8&0x00FF,B2=t&0x0000FF;
					return "#"+(0x1000000+(Math.round((R2-R1)*p)+R1)*0x10000+(Math.round((G2-G1)*p)+G1)*0x100+(Math.round((B2-B1)*p)+B1)).toString(16).slice(1);
				}

				$('#fixture').thermometer( {
					textColour: '<?php echo $ttcolor;?>',
			                tickColour: '<?php echo $ttcolor;?>',
                                        startValue: <?php echo $temp["outside_now"];?>,
					height: 145,
					width: "auto",
					bottomText: "<?php echo $bottext;?>",
					topText: "<?php echo $toptext;?>",
					animationSpeed: 30,
					maxValue: <?php echo $maxvalue;?>,
					minValue: <?php echo $minvalue;?>,
					liquidColour: "<?php echo $tempcolor;?>",
					valueChanged: function(value) {
						$('#value').text(value.toFixed(1));
      					}

				});

				window.setInterval( function() {
					var m = "<?php echo $temp["outside_now"];?>";
					$('#fixture').thermometer( 'setValue', m );
				}, 2000 );
			} );
		</script>

		<style type="text/css">
			#tempnow { width: 40px; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: 600; color: #555555}
                        #freezing { width: 40px; text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: <?php echo $ttcolor;?>}
                        #tempStats { position: relative; width: 100%; text-align: left; font-family: Arial; font-size: 10px; color: <?php echo $ttcolor;?>}
      		</style>
	</head>

	<body>
                <div id="fixture" style="position: absolute; top: 5px; left: 0px; border: 2px; border-color: rgba(201, 76, 76, 0.3);"; z-index: auto;"></div>
		<div id="tempnow" style="position: absolute; top: 117px; left: 9px; border: none";><?php echo $temp["outside_now"];?>
                <!--<div id="freezing" style="position: absolute; top: -50px; left: 46px; border: none";><?php echo $freezing;?></div>--></div>
                

                
	</body>
</html>

