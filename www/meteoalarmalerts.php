<?php include('settings.php');include('w34CombinedData.php'); include('common.php');



	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-18                                       #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	WEATHER34 METEOR SHOWER: 25TH JANUARY 2018  	                                               #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################

?>
<?php 
date_default_timezone_set($TZ);
$json_string             = file_get_contents("jsondata/al.txt");
$parsed_json             = json_decode($json_string);

$published =  $parsed_json->{'warnings'}->{"regions"}[0]->{"published"};
$region = $parsed_json->{'warnings'}->{"regions"}[0]->{"name"};
$alerttype      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[0]->{"awareness"}->{"awareness_type"}->{"description"};
$alertlevel      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[0]->{"awareness"}->{"awareness_level"}->{"colour"};
$description = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[0]->{"awareness"}->{"awareness_level"}->{"description"};
$description3 = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[0]->{"awareness"}->{"awareness_level"}->{"description"};
$alerttime      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[0]->{"period"}->{"until"};

$alertexp = $alerttime; 


$alertissued   = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[0]->{"period"}->{"from"};

$alerttype1      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[1]->{"awareness"}->{"awareness_type"}->{"description"};
$alertlevel1      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[1]->{"awareness"}->{"awareness_level"}->{"colour"};

$alerttime1      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[1]->{"period"}->{"until"};

$alertexp1 = $alerttime1; 


$alertissued1   = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[1]->{"period"}->{"from"};

$alerttype2      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[2]->{"awareness"}->{"awareness_type"}->{"description"};
$alertlevel2      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[2]->{"awareness"}->{"awareness_level"}->{"colour"};

$alerttime2      = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[2]->{"period"}->{"until"};

$alertexp2 = $alerttime2; 


$alertissued2   = $parsed_json->{'warnings'}->{"regions"}[0]->{"today"}[2]->{"period"}->{"from"};

$alerttype3      = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[0]->{"awareness"}->{"awareness_type"}->{"description"};
$alertlevel3      = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[0]->{"awareness"}->{"awareness_level"}->{"colour"};

$alerttime3      = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[0]->{"period"}->{"until"};

$alertexp3 = $alerttime3; 


$alertissued3   = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[0]->{"period"}->{"from"};

$alerttype4      = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[1]->{"awareness"}->{"awareness_type"}->{"description"};
$alertlevel4     = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[1]->{"awareness"}->{"awareness_level"}->{"colour"};

$alerttime4      = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[1]->{"period"}->{"until"};

$alertexp4 = $alerttime4; 


$alertissued4   = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[1]->{"period"}->{"from"};

$alerttype5      = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[2]->{"awareness"}->{"awareness_type"}->{"description"};
$alertlevel5      = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[2]->{"awareness"}->{"awareness_level"}->{"colour"};

$alerttime5      = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[2]->{"period"}->{"until"};

$alertexp5 = $alerttime5; 


$alertissued5   = $parsed_json->{'warnings'}->{"regions"}[0]->{"tomorrow"}[2]->{"period"}->{"from"};

$From = "From: ";
$To = "To: ";

$From1 = "From: ";
$To1 = "To: ";

$From3 = "From: ";
$To3 = "To: ";

$From4 = "From: "; 
$To4 = "To: ";

$textspace1 = "z-index:99;color:black;font-size:0.8em;margin-top:-220px; margin-left:-6px;";
$textspace3 = "z-index:99;color:black;font-size:0.8em;margin-top:-220px; margin-left:-6px;";
if ($alerttype == "No Warnings") {
$alerttype1 = $description;
$alertlevel1 = "LightGreen";
$From = " ";
$To = " ";
$From1 = " ";
$To1 = " ";
$textspace1 = "z-index:99;color:black;font-size:0.8em;margin-top:-110px; margin-left:-6px;";
}
if ($alerttype3 == "No Warnings") {
$alerttype4 =$description3;
$alertlevel4 = "LightGreen";
$From3 = " ";
$To3 = " ";
$From4 = " ";
$To4 = " ";
$textspace3 = "z-index:99;color:black;font-size:0.8em;margin-top:-110px; margin-left:-6px;";
}

if ($alerttype != "No Warnings" and $alerttype1 == NULL) {
$alerttype1 = $description;
$alertlevel1 = $alertlevel;
$From = "From:";
$To = "To:";
$From1 = " ";
$To1 = " ";
$textspace1 = "z-index:99;color:black;font-size:0.8em;margin-top:-110px; margin-left:-6px;";
}
if ($alerttype3 != "No Warnings" and $alerttype4 == NULL) {
$alerttype4 = $description3;
$alertlevel4 = $alertlevel3;
$From3 = "From:";
$To3 = "To:";
$From4 = " ";
$To4 = " ";
$textspace3 = "z-index:99;color:black;font-size:0.8em;margin-top:-110px; margin-left:-6px;";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Meteor Showers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <style>
@font-face{font-family:weathertext;src:url(css/fonts/sanfranciscodisplay-regular-webfont.woff) format("woff")}*,*:before,*:after{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0;padding:0}html,body{font-size:62.5%;font-family: "weathertext", Helvetica, Arial, sans-serif;
background:rgba(11, 12, 12, 0.4); background-repeat:no-repeat}body{color:#aaa;overflow:hidden;height:105vh;padding:10px}section{width:auto;max-width:64rem;min-width:58.9rem;max-height:300px;margin:0 auto;padding:10px}.weather34title{font-size:14px;font-weight:normal;padding-top:3px;font-family:'Arial',sans-serif;width:400px}.weather34cards{padding-top:2rem;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:5px}.weather34card{width:29rem;height:15.5rem;background-color:0;border-radius:4px;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;color:#aaa;font-size:11px;font-weight:normal;padding:10px;border:solid #444 1px}.weather34card__weather34-container{height:50%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;padding:10px;font-family:'weathertext',sans-serif}.weather34card__weather34-wrapper{width:8rem;font-family:'weathertext',sans-serif;font-weight:100}.weather34cardguide{width:27rem;height:16.5rem;background-color:#2a2e33;border-radius:4px;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;color:#aaa;font-size:11px;font-weight:normal;padding:10px;border:solid #444 1px}.weather34card__weather34-guide{width:3rem;font-family:'weathertext',sans-serif;font-weight:200;line-height:15px}.weather34card__count-container{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px;font-family:Arial,Helvetica,sans-serif}.weather34card__count-text{font-family:Arial,Helvetica,sans-serif;text-align:center}.weather34card__count-text--big{font-size:23px;font-weight:100;font-family:'weathertext',sans-serif}.weather34card__count-text--bigs{font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#aaa;text-align:center;line-height:15px}.date{font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#aaa;text-align:center;line-height:15px}weather34card__count-text--bigsa{font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#aaa;text-align:center}.weather34card__stuff-container{margin:0 auto;width:99%;height:16%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:15px;color:#aaa;background:RGBA(37,41,45,0);border:solid RGBA(156,156,156,0.1) 0;-webkit-border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;-o-border-radius:4px;border-radius:4px;font-family:Arial,Helvetica,sans-serif;text-align:center;font-size:14px}.weather34card:after{content:"";display:block;position:absolute;top:0;left:0;width:16rem;height:4.625rem;padding:10px}.weather34card--earthquake1:after{background-image:radial-gradient(to bottom,rgba(106,122,135,0.5),transparent 70%)}.weather34card--earthquake2:after{background-image:radial-gradient(to bottom,rgba(106,191,96,0.5),transparent 70%)}.weather34card--earthquake3:after{background-image:radial-gradient(to bottom,rgba(96,203,231,0.5),transparent 70%)}blue{color:#01a4b4}orange{color:#ff8841}orange1{position:relative;color:#ff8841;margin:0 auto;text-align:center;margin-left:15%}green{color:#9aba2f}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}time{color:#aaa;font-weight:normal;font-family:Arial,Helvetica,sans-serif}time span{color:#ff8841;font-weight:normal;font-family:Arial,Helvetica,sans-serif}a{color:#aaa;font-size:11px;top:5px;margin-top:10px;text-decoration:none}.provided{position:absolute;color:#aaa;font-size:11px;bottom:7px;text-decoration:none;margin-left:100px;}.weather34card__count-text--bigsb{font-size:26px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#444;text-align:center;line-height:15px}.weather34chart-btn.close:after,.weather34chart-btn.close:before{color:#ccc;position:absolute;font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:600}.weather34browser-header{flex-basis:auto;height:35px;background:#ebebeb;background:0;border-bottom:0;display:flex;margin-top:-20px;width:100%;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.weather34browser-footer{flex-basis:auto;height:35px;background:#ebebeb;background:rgba(56,56,60,1);border-bottom:0;display:flex;bottom:-20px;width:97.4%;-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.weather34chart-btns{position:absolute;height:35px;display:inline-block;padding:0 10px;line-height:38px;width:55px;flex-basis:auto;top:5px}.weather34chart-btn{width:14px;height:14px;border:1px solid rgba(0,0,0,.15);border-radius:6px;display:inline-block;margin:1px}.weather34chart-btn.close{background-color: rgba(255, 124, 57, 1.000)}.weather34chart-btn.close:before{content:"x";margin-top:-14px;margin-left:2px}.weather34chart-btn.close:after{content:"close window";margin-top:-13px;margin-left:15px;width:300px}a{color:#aaa;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:104%;max-height:30px;margin:auto;margin-top:-15px;margin-left:-20px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:14px;position:absolute;left:0;right:0;top:0;padding:2px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}


.weather34meteorcircle {  position: absolute;  width: 125px;  height: 125px;  top: 15px;  left: 80px;  background: #1d4253;  background: linear-gradient(to bottom, #1d4253 0%, rgba(59, 156, 172, 1.000) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1d4253', endColorstr='rgba(59, 156, 172, 1.000)',GradientType=0 );  border-radius: 50%;  overflow: hidden;  z-index:-1;
}


</style>
</head>
<body>
<div class="weather34darkbrowser" url="Weather Alerts for <?php echo $region ?> "></div> 
  
<span><span style="margin-left:80px; font-size:2.4em;"><b> TODAY </span>
<span><span style="margin-left:290px; font-size:2.4em;"> TOMORROW </b></span>
<section class="weather34cards">

   <div class="weather34card weather34card--earthquake1" style="background:<?php echo lcfirst($alertlevel) ?>">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big" ><span style="z-index:99"><center>
             <?php
                         if ($alerttype == "Snow/Ice") {
$alerttype = "Snow";
}	

                  $icon = $alerttype._.$alertlevel;
                   $image = "<img src='css/wrnImages/$icon.jpg' width='200px'>";
                  
                   echo $image;
	
?>
        
           </center> </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigsb"><span style="z-index:99;color:rgba(230, 232, 239, 1.000);font-size:0.55em;left:85px;font-weight:normal;margin-top:-50px;position:absolute;text-align:center;width:150px;">
  
                 </span>
            </div>
        </div>
        <div class="weather34card__stuff-container"><span style="z-index:99;color:black;font-size:0.8em;margin-top:-100px;margin-left:-6px;">
           
            <?php	
        echo $From;    
	echo  $alertissued;
	
	?>
	
	 
	   <?php	
        echo $To;     
	echo  $alertexp;
	
	?>
	 
        </div>
        <br>
        
              <div class="weather34card__stuff-container"><span style="z-index:99;color:black;font-size:0.8em;margin-top:-220px;margin-left:-6px;">
           
            <?php	
            
	echo $alerttype;
	
	?>
        </div>
        <br> 
        
    </div>
    <div class="weather34card weather34card--earthquake2" style="background:<?php echo lcfirst($alertlevel3) ?>">
                  <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big" ><span style="z-index:99"><center>
             <?php
             if ($alerttype3 == "Snow/Ice") {
$alerttype3 = "Snow";	
}
                  $icon = $alerttype3._.$alertlevel3;
                  
                   echo "<img src='css/wrnImages/$icon.jpg' width='200px'>";
                   
	
?>
        
           </center> </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigsb"><span style="z-index:99;color:rgba(230, 232, 239, 1.000);font-size:0.55em;left:85px;font-weight:normal;margin-top:-50px;position:absolute;text-align:center;width:150px;">
  
                 </span>
            </div>
        </div>
        <div class="weather34card__stuff-container"><span style="z-index:99;color:black;font-size:0.8em;margin-top:-100px;margin-left:-6px;">
           
       
            <?php	
        echo $From3;    
	echo  $alertissued3;
	
	?>
	
	 
	   <?php	
        echo $To3;  
	echo  $alertexp3;
	
	?>
	 
        </div>
        <br>
        
              <div class="weather34card__stuff-container"><span style="z-index:99;color:black;font-size:0.8em;margin-top:-220px;margin-left:-6px;">
           
            <?php	
            
	echo $alerttype3;
	
	?>
        </div>
        <br> 
        
    </div>
           
       
</section>



<section class="weather34cards">
   <div class="weather34card weather34card--earthquake1" style="background:<?php echo lcfirst($alertlevel1) ?>">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big" ><span style="z-index:99"><center>
             <?php
                         if ($alerttype1 == "Snow/Ice") {
$alerttype1 = "Snow";	
}
                  $icon = $alerttype1._.$alertlevel1;
                   $image = "<img src='css/wrnImages/$icon.jpg' width='200px'>";
                  if ($alerttype1 == $description) {
                  $image = NULL;
                  }
                   echo $image;
	
?>
        
           </center> </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigsb"><span style="z-index:99;color:rgba(230, 232, 239, 1.000);font-size:0.55em;left:85px;font-weight:normal;margin-top:-50px;position:absolute;text-align:center;width:150px;">
  
                 </span>
            </div>
        </div>
        <div class="weather34card__stuff-container"><span style="z-index:99;color:black;font-size:0.8em;margin-top:-100px;margin-left:-6px;">
           
          
            <?php	
         echo $From1;   
	echo  $alertissued1;
	
	?>
	

	   <?php	
         echo $To1;   
	echo  $alertexp1;
	
	?>
	 
        </div>
        <br>
        
              <div class="weather34card__stuff-container"><span style="<?php echo $textspace1 ?>">
           
            <?php	
            
	echo $alerttype1;
	
	?>
        </div>
        <br> 
 
       
    </div>
    <div class="weather34card weather34card--earthquake2" style="background:<?php echo lcfirst($alertlevel4) ?>">
                   <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big" ><span style="z-index:99"><center>
             <?php
             if ($alerttype4 == "Snow/Ice") {
$alerttype4 = "Snow";	
}
                  $icon = $alerttype4._.$alertlevel4;
                  $image = "<img src='css/wrnImages/$icon.jpg' width='200px'>";
                  if ($alerttype4 == $description3) {
                  $image = NULL;
                  }
                   echo $image;
                   
	
?>
        
           </center> </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigsb"><span style="z-index:99;color:rgba(230, 232, 239, 1.000);font-size:0.55em;left:85px;font-weight:normal;margin-top:-50px;position:absolute;text-align:center;width:150px;">
  
                 </span>
            </div>
        </div>
        <div class="weather34card__stuff-container"><span style="z-index:99;color:black;font-size:0.8em;margin-top:-100px;margin-left:-6px;">
   
            <?php	
        echo $From4;    
	echo  $alertissued4;
	
	?>
	

	   <?php	
        echo $To4;    
	echo  $alertexp4;
	
	?>
	 
        </div>
        <br>
        
              <div class="weather34card__stuff-container"><span style="<?php echo $textspace3 ?>">
           
            <?php	
            
	echo $alerttype4;
	
	?>
        </div>
        <br> 
        
    </div>
        
       
</section>




<div class="provided"> 
Published: <?php echo $published ?> Copyright © EUMETNET-METEOalarm. Used with permission. For the most up to date information<br>about alert levels as published by the participating National Meteorological Services 
please use <a href="https://www.meteoalarm.eu/auto/0/0/UK-United%20Kingdom.html" target="_blank">www.meteoalarm.eu</a></p>


</div>
</body>
</html>
