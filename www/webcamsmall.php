<?php error_reporting(0);include_once('w34CombinedData.php');?>
<style>
.webcam{
-webkit-border-radius:4px;	-moz-border-radius:4px;	-o-border-radius:4px;	-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84, 85, 86, 1.00) 2px;width:275px;height:145px;margin:4px;}
</style>

<?php $file_headers = @get_headers($webcamurl); ?>
<div class="updatedtime"><span><?php if(file_exists($livedata2)&&time()- filemtime($livedata2)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></div>
</span></div>
<!-- HOMEWEATHER STATION TEMPLATE SIMPLE WEBCAM -add your url as shown below do NOT delete the class='webcam' !!! -->
<img src="<?php echo $webcamurl;?>" alt="weathercam" class="webcam">
</span>
