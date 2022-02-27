<?php include('settings.php');?>
<script src="js/jquery.js"></script>
<script>
(function(a){a(document).ready(function(){a.ajaxSetup({cache:false,success:function(){a("#position1").show()}});var c=a("#position1");c.load("<?php echo $position1 ?>");var b=setInterval(function(){c.load("<?php echo $position1 ?>")},60000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position2").show()}});var c=a("#position2");c.load("<?php echo $position2 ?>");var b=setInterval(function(){c.load("<?php echo $position2 ?>")},73000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position3").show()}});var c=a("#position3");c.load("<?php echo $position3 ?>");var b=setInterval(function(){c.load("<?php echo $position3 ?>")},76000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position4").show()}});var c=a("#position4");c.load("<?php echo $position4 ?>");var b=setInterval(function(){c.load("<?php echo $position4 ?>")},10000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position5").show()}});var c=a("#position5");c.load("<?php echo $position5 ?>");var b=setInterval(function(){c.load("<?php echo $position5 ?>")},10500)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position6").show()}});var c=a("#position6");c.load("<?php echo $position6 ?>");var b=setInterval(function(){c.load("<?php echo $position6 ?>")},10000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position7").show()}});var c=a("#position7");c.load("<?php echo $position7 ?>");var b=setInterval(function(){c.load("<?php echo $position7 ?>")},50000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position8").show()}});var c=a("#position8");c.load("<?php echo $position8 ?>");var b=setInterval(function(){c.load("<?php echo $position8 ?>")},160000 )})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position9").show()}});var c=a("#position9");c.load("<?php echo $position9 ?>");var b=setInterval(function(){c.load("<?php echo $position9 ?>")},120000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position10").show()}});var c=a("#position10");c.load("<?php echo $position10 ?>");var b=setInterval(function(){c.load("<?php echo $position10 ?>")},80000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position11").show()}});var c=a("#position11");c.load("<?php echo $position11 ?>");var b=setInterval(function(){c.load("<?php echo $position11 ?>")},72000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position12").show()}});var c=a("#position12");c.load("<?php echo $position12 ?>");var b=setInterval(function(){c.load("<?php echo $position12 ?>")},69000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#position13").show()}});var c=a("#position13");c.load("<?php echo $position13 ?>");var b=setInterval(function(){c.load("<?php echo $position13 ?>")},1113000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#data-updated").show()}});var c=a("#data-updated");c.load("data-updated.php");
var b=setInterval(function(){c.load("data-updated.php")},10000)})})(jQuery);//10 seconds

//hidden updated module for forecast awareness 
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#forecastalert").show()}});var c=a("#forecastalert");c.load("forecastalert.php");
var b=setInterval(function(){c.load("forecastalert.php")},900000)})})(jQuery);//15 minutes
</script>
<script>
var clockID;var yourTimeZoneFrom='<?php echo $UTC?>';var d=new Date();
var weekdays=[];
var months=[];
//calculte the weather34 date-time UTC
var tzDifference=yourTimeZoneFrom*60+d.getTimezoneOffset();
var offset=tzDifference*60*1000;
function UpdateClock(){
var e=new Date(new Date().getTime()+offset);
var a=e.getMinutes();
var g=e.getSeconds();
var f=e.getFullYear();
var h=months[e.getMonth()];
var b=e.getDate();
<?php if($clockformat=='12') {echo "if(e.getHours()<12){amorpm=' am'}else{amorpm=' pm'}";} else {echo "amorpm='';";}?>
// add the weather34 date prefix
var suffix = "";switch(b) {case 1: case 21: case 31: suffix = 'st'; break;case 2: case 22: suffix = 'nd'; break;case 3: case 23: suffix = 'rd'; break;default: suffix = 'th';}
var i=weekdays[e.getDay()];if(a<10){a="0"+a}if(g<10){g="0"+g}if(c<10){c="0"+c}
//weather34 option to use 24/12 hour format
var c=e.getHours()
<?php if ($clockformat == '12') { echo '% 12 || 12';} else { echo '% 24 || 00';}?>;
document.getElementById("weather34clock4").innerHTML="<div class='clock3'><time> "+c+":"+a+":"+g+
"<?php if($clockformat=='12') {echo "".date('a')."";} else {echo "";}?>"}
function StartClock(){clockID=setInterval(UpdateClock,500)}
function KillClock(){clearTimeout(clockID)}window.onload=function(){StartClock()}(jQuery);</script>

