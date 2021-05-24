<?php
$seconds = date_offset_get(new DateTime);
print $seconds / 3600;
// returns pos/neg decimal (eg. -7 if in PST and DST is active.)
// remember there are time zones with 30 and 45 min offsets
// http://en.wikipedia.org/wiki/Time_zone
?>