<?php
  include('../divumdev/dvmCombinedData.php');
  date_default_timezone_set($TZ);
  header('Content-type: text/html; charset=utf-8');
  error_reporting(0);
?>
<body>
  <div class="wfstrike">
    <?php
      //weather34 lightning
      echo "<wfstriketoday>".$lightning['strike_count_last_3hr']; ?>
    </wfstriketoday>
  </div>
  <div class="minwordl">Strikes</div></div>
  <div class="mintimedatex"><value>&nbsp;Last 3 Hrs<value></div>
  <div class='wflaststrike'>
  <?php
    //weather34 weather34 last detect
      echo "<spanfeelstitle>Last Strike: <orange> ".date("j M Y", $lightning['last_time'])." </orange> ";?><br />
  <?php
    if ($windunit == 'mph'){
      echo "<spanfeelstitle>Last Distance At:<orange> " .number_format($lightning['last_distance']*0.621371,1). "  </orange>miles";
    }else{
      echo "<spanfeelstitle>Last Distance At:<orange> " .$lightning['last_distance']. "  </orange>km";
    }
  ?><br />
  <?php
    //weather34 weather34 last detect
    echo "<spanfeelstitle>All-time Strike Total: <orange> ".$lightning["alltime_strike_count"]." </orange> ";?><br>
</div>
<div class="lightningicon">
<?php
  // display an icon when strike(s) are detected
  if ($lightning['strike_count_3hr'] > 0){
    echo '<img src="img/lightningalert.svg" width="20" height="20" align="right"/>';
  }?>
</div>
