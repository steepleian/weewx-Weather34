<?php


include ('serverdata/archivedata.php');


?>

<div class="weather34admin">
  
  <!-- Top Bar -->
  <header class="weather34admin__header">
    <div class="weather34toolbar">
      <div class="weather34toolbar__left">
        <button class="weather34btn weather34btn--primary"></button>
      </div>
      <div class="weather34toolbar__center">
        <button class="weather34btn weather34btn--primary">
          <weather34toptitle><?php echo $sta['location']; ?>&nbsp; Weather Station</weather34toptitle>
        </button>
      </div>
      <div class="weather34toolbar__right">
        <weather34mbuptime>
          <?php echo "Server " . (shell_exec('uptime -p')); ?>
        </weather34mbuptime>
          <?php if ($units != 'us')
{ ?>
            <a href="./?units=us" title="select Imperial"><topbarimperial>&deg;F</topbarimperial></a>
          <?php
}
else
{ ?>
            <a href="./?units=metric" title="select Metric"><topbarmetric>&deg;C</topbarmetric></a>
          <?php
} ?>
      </div>
    </div>
  </header>


  <!-- Side Menu -->
  <input type="checkbox" class="openweather34sidebarMenu" id="openweather34sidebarMenu"/>
  <label for="openweather34sidebarMenu" class="weather34sidebarIconToggle">
    <div class="weather34spinner weather34cross part-1"></div>
    <div class="weather34spinner weather34horizontal"></div>
    <div class="weather34spinner weather34cross part-2"></div>
  </label>
  <div id="weather34sidebarMenu">
    <ul class="weather34sidebarMenuInner">
      <br/>
      <br/>
      <br/>
      
      
      <li class="header">ADMIN</li>
      <li>
        <a href="templateSetup.php" target="_blank" title="WEATHERSTATION SETTINGS PAGE">
          <weather34menumarkeryellow></weather34menumarkeryellow> <?php echo $lang['Settings']; ?>
        </a>
      </li>
      <li>
        <a href="index.php" title="WEATHERSTATION HOME PAGE">
          <weather34menumarkergreen></weather34menumarkergreen> Home
        </a>
      </li>
      
      
      <li class="header">UI THEME</li>
      <li>
        <a href="<?php echo ($theme == 'dark') ? '?theme=light' : '?theme=dark'; ?>">
          <?php if ($theme == 'dark')
{ ?>
            <weather34menumarkerlight></weather34menumarkerlight> Light Theme
          <?php
}
else
{ ?>
            <weather34menumarkerbluegrey></weather34menumarkerbluegrey> Dark Theme
          <?php
} ?>
        </a>
      </li>
      
      
      <li class="header">UNITS</li>
      <?php if ($units != Null && $units != 'default')
{ ?>
        <li>
          <a href="./?units=default"><weather34menumarkerred></weather34menumarkerred> Default Units
            <?php if ($tempunit == 'F')
    { ?>
              <topbarimperialf>&deg;F</topbarimperialf>
            <?php
    }
    else
    { ?>
              <topbarmetricc>&deg;C</topbarmetricc>
            <?php
    } ?>
          </a>
        </li>
      <?php
}
if ($units != 'us')
{ ?>
        <li>
          <a href="./?units=us"><weather34menumarkerorange></weather34menumarkerorange> Imperial <topbarimperialf>&deg;F</topbarimperialf></a>
        </li>
      <?php
}
if ($units != 'metric')
{ ?>
        <li>
          <a href="./?units=metric"><weather34menumarkerblue></weather34menumarkerblue> Metric <topbarmetricc>&deg;C</topbarmetricc></a>
        </li>
      <?php
}
if ($units != 'uk')
{ ?>
        <li>
          <a href="./?units=uk"><weather34menumarkeryellow></weather34menumarkeryellow> UK (MPH) <topbarmetricc>&deg;C</topbarmetricc></a>
        </li>
      <?php
}
if ($units != 'scandinavia')
{ ?>
        <li>
          <a href="./?units=scandinavia"><weather34menumarkerred></weather34menumarkerred> M/S <topbarmetricc>&deg;C</topbarmetricc></a>
        </li>
      <?php
}
if ($units != 'ca')
{ ?>
        <li>
          <a href="./?units=ca"><weather34menumarkerred></weather34menumarkerred> CA (kPa) <topbarmetricc>&deg;C</topbarmetricc></a>
        </li>
      <?php
}

if ($extralinks == 'yes')
{ ?>
      <li class="header sub">LINKS <img class="menuimg" src="img/arrow34iconlink.svg" alt=""/>
        <ul>
          <?php if ($linkWU == 'yes')
    { ?>
            <li>
              <?php # if its linkWUNew is either yes or missing, use the new WU Site, else use the old site
         ?>
              <a href="<?php echo ($linkWUNew == 'yes' || empty($linkWUNew) ? 'https://www.wunderground.com/dashboard/pws/' : 'https://www.wunderground.com/personal-weather-station/dashboard?id=') . $id; ?>" title="<?php echo $id; ?> on Weather Underground" target="_blank">
                <img class="menuimg" src="img/wulogo.svg" style="width:30px" alt=""/>
                <?php echo $id; ?> on WU
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkCWOPID))
    { ?>
            <li>
              <a href="https://weather.gladstonefamily.net/site/<?php echo $linkCWOPID; ?>" title="<?php echo $linkCWOPID; ?> on CWOP" target="_blank">
                <img class="menuimg" src="img/arrow34iconlink.svg" alt=""/>
                <?php echo $linkCWOPID; ?> on CWOP
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkFindUID))
    { ?>
            <li>
              <a href="http://www.findu.com/cgi-bin/wxpage.cgi?call=<?php echo $linkFindUID; ?>&last=48" title="<?php echo $linkFindUID; ?> on Findu.com" target="_blank">
                <img class="menuimg" src="img/arrow34iconlink.svg" alt=""/>
                <?php echo $linkFindUID; ?> on FindU.com
              </a>
            </li>
          <?php
    } ?>
          <?php if (($linkNOAA == 'yes') && (!empty($linkCWOPID) && (empty($linkNOAAID))))
    { ?>
            <li>
              <a href="https://www.wrh.noaa.gov/mesowest/getobext.php?wfo=lox&sid=<?php echo $linkCWOPID; ?>" title="<?php echo $linkCWOPID; ?> on NOAA Meso West" target="_blank">
                <img class="menuimg" src="img/noaa.svg" style="max-width:30px" alt=""/>
                <?php echo $linkCWOPID; ?> on NOAA
              </a>
            </li>
          <?php
    } ?>
         <?php if ($linkNOAA == 'yes' && !empty($linkNOAAID))
    { ?>
            <li>
              <a href="https://www.wrh.noaa.gov/mesowest/getobext.php?wfo=lox&sid=<?php echo $linkNOAAID; ?>" title="<?php echo $linkNOAAID; ?> on NOAA Meso West" target="_blank">
                <img class="menuimg" src="img/noaa.svg" style="max-width:30px" alt=""/>
                <?php echo $linkNOAAID; ?> on NOAA
              </a>
            </li>
          <?php
    } ?>
          <?php if ($linkMADIS == 'yes' && !empty($linkCWOPID))
    { ?>
            <li>
              <a href="https://madis-data.ncep.noaa.gov/MadisSurface/?CenterLAT=<?php echo $lat; ?>&CenterLON=<?php echo $lon; ?>&Zoom=11.00&StationID=<?php echo $linkCWOPID; ?>" title="<?php echo $linkCWOPID; ?> on MADIS Map" target="_blank">
                <img class="menuimg" src="img/noaa.svg" style="max-width:30px" alt=""/>
                <?php echo $linkCWOPID; ?> on NOAA MADIS Map
              </a>
            </li>
          <?php
    } ?>
          <?php if (($linkMesoWest == 'yes') && (!empty($linkCWOPID) && (empty($linkMesoWestID))))
    { ?>
            <li>
              <a href="https://mesowest.utah.edu/cgi-bin/droman/meso_base.cgi?stn=<?php echo $linkCWOPID; ?>" title="<?php echo $linkCWOPID; ?> on Meso West" target="_blank">
                <img class="menuimg" src="img/mesowest.svg" alt=""/>
                <?php echo $linkCWOPID; ?> on Meso West
              </a>
            </li>
          <?php
    } ?>
          <?php if ($linkMesoWest == 'yes' && !empty($linkMesoWestID))
    { ?>
            <li>
              <a href="https://mesowest.utah.edu/cgi-bin/droman/meso_base.cgi?stn=<?php echo $linkMesoWestID; ?>" title="<?php echo $linkMesoWestID; ?> on Meso West" target="_blank">
                <img class="menuimg" src="img/mesowest.svg" alt=""/>
                <?php echo $linkMesoWestID; ?> on Meso West
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkWeatherCloudID))
    { ?>
            <li>
              <a href="https://app.weathercloud.net/<?php echo $linkWeatherCloudID; ?>" title="View on WeatherCloud" target="_blank">
                <img class="menuimg" src="img/weathercloud.svg" style="width:21px" alt=""/> 
                View on WeatherCloud
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkWindyID))
    { ?>
            <li>
              <a href="https://www.windy.com/station/pws-<?php echo $linkWindyID . "?" . $lat . "," . $lon; ?>,8" title="View on Windy.com" target="_blank">
                <img class="menuimg" src="img/windy.svg" style="width:21px" alt=""/>
                View on Windy.com
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkAWEKASID))
    { ?>
            <li>
              <a href="https://www.awekas.at/en/instrument.php?id=<?php echo $linkAWEKASID; ?>" title="View on AWEKAS" target="_blank">
                <img class="menuimg" src="img/awekas.svg" alt=""/>
                View on AWEKAS
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkAmbientWeatherID))
    { ?>
            <li>
              <a href="https://dashboard.ambientweather.net/devices/public/<?php echo $linkAmbientWeatherID; ?>" title="Ambient Weather" target= "_blank">
                <img class="menuimg" src="img/ambientweather.svg" alt=""/>
                View on Ambient Weather
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkPWSWeatherID))
    { ?>
            <li>
              <a href="https://www.pwsweather.com/obs/<?php echo $linkPWSWeatherID; ?>.html" title="PWS Weather" target="_blank">
                <img style="background-color:white" class="menuimg" src="img/pwslogo.svg" alt=""/>
                View on PWS Weather
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkMetOfficeID))
    { ?>
            <li>
              <a href="http://wow.metoffice.gov.uk/observations/details?site_id=<?php echo $linkMetOfficeID; ?>" title="MetOffice/WoW" target="_blank">
                <img class="menuimg" src="img/metoffice.svg" alt=""/>
                View on MetOffice/WoW
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkCustom1Title))
    { ?>
            <li>
              <a href="<?php echo $linkCustom1URL; ?>" title="<?php echo $linkCustom1Title; ?>" target="_blank">
                <img class="menuimg" src="img/arrow34iconlink.svg" alt=""/>
                <?php echo $linkCustom1Title; ?>
              </a>
            </li>
          <?php
    } ?>
          <?php if (!empty($linkCustom2Title) && !empty($linkCustom2URL))
    { ?>
            <li>
              <a href="<?php echo $linkCustom2URL; ?>" title="<?php echo $linkCustom2Title; ?>" target="_blank">
                <img class="menuimg" src="img/arrow34iconlink.svg" alt=""/>
                <?php echo $linkCustom2Title; ?>
              </a>
            </li>
          <?php
    } ?>
        </ul>
      </li>
      <?php
} ?>
      <li class="header">EXTRAS</li>
      <?php if ($weatherflowoption == "yes")
{ ?>
        <li>
          <a href="https://tempestwx.com/map/<?php echo $lat . '/' . $lon . '/' . $weatherflowmapzoom; ?>" data-lity title='see your weather station on official weatherflow map'>
            <weather34menumarkerblue></weather34menumarkerblue> Weatherflow Map
          </a>
        </li>
      <?php
}
if (!empty($webcamurl) && $webcamurl != ' ' && $webcamurl != 'Null' && $webcamurl != 'null')
{ ?>
        <li><!--webcam-->
          <a href="cam.php" data-lity title="WEATHERSTATION WEBCAM"><weather34menumarkeryellow></weather34menumarkeryellow> Web Cam</a>
        </li>
      <?php
} ?>
      <li><!--contact info-->
        <a href="bio.php" data-lity title="Weather Station Owner Contact Card Info"><weather34menumarkerorange></weather34menumarkerorange> Contact Card</a>
      </li>
      <li><!--hardware info-->
        <a href="stationinfo.php" data-lity title="Hardware Weather Station Hardware Info"><weather34menumarkerred></weather34menumarkerred> Hardware Info</a>
      </li>
      <?php if (!empty($extraLinkTitle) && !empty($extraLinkURL) && !empty($extraLinkColor))
{ ?>
        <li>
          <a href="<?php echo $extraLinkURL; ?>" title="<?php echo $extraLinkTitle; ?>" target="_blank">
            <?php if ($extraLinkColor == 'white')
    { ?>
              <weather34menumarkerlight></weather34menumarkerlight>
            <?php
    }
    else if ($extraLinkColor == 'red')
    { ?>
              <weather34menumarkerred></weather34menumarkerred>
            <?php
    }
    else if ($extraLinkColor == 'grey')
    { ?>
              <weather34menumarkerbluegrey></weather34menumarkerbluegrey>
            <?php
    }
    else if ($extraLinkColor == 'green')
    { ?>
              <weather34menumarkergreen></weather34menumarkergreen>
            <?php
    }
    else if ($extraLinkColor == 'yellow')
    { ?>
              <weather34menumarkeryellow></weather34menumarkeryellow>
            <?php
    }
    else if ($extraLinkColor == 'blue')
    { ?>
              <weather34menumarkerblue></weather34menumarkerblue>
            <?php
    }
    else
    { ?>
              <weather34menumarkerorange></weather34menumarkerorange>
            <?php
    }
    echo $extraLinkTitle; ?>
          </a>
        </li>
      <?php
} ?>
      <!--languages-->
      <?php if ($languages == "yes")
{ ?>
        <li class="header"><?php echo $lang["language"]; ?></li>
        <li class="flagstop">
          <a href="index.php?lang=en"><img src="img/flags/en.svg" title="English" class="flags" alt="en"/></a>&nbsp;
          <a href="index.php?lang=dk"><img src="img/flags/dk.svg" title="Danish" class="flags" alt="dk"/></a>&nbsp;
          <a href="index.php?lang=gr"><img src="img/flags/gr.svg" title="Greek" class="flags" alt="gr"/></a>&nbsp;
          <a href="index.php?lang=it"><img src="img/flags/it.svg" title="Italian" class="flags" alt="it"/></a>&nbsp;
          <a href="index.php?lang=fr"><img src="img/flags/fr.svg" title="French" class="flags" alt="fr"/></a>&nbsp;
        </li>

        <li class="flagsmiddle">
          <a href="index.php?lang=dl"><img src="img/flags/dl.svg" title="German" class="flags" alt="dl"/></a>&nbsp;
          <a href="index.php?lang=nl"><img src="img/flags/nl.svg" title="Dutch" class="flags" alt="nl"/></a>&nbsp;
          <a href="index.php?lang=cat"><img src="img/flags/cat.svg" title="Catalan" class="flags" alt="cat"/></a>&nbsp;
          <a href="index.php?lang=sp"><img src="img/flags/sp.svg" title="Spanish" class="flags" alt="sp"/></a>&nbsp;
          <a href="index.php?lang=tr"><img src="img/flags/tr.svg" title="Turkish" class="flags" alt="tr"/></a>&nbsp;
        </li>

        <li class="flagsbottom">
          <a href="index.php?lang=hu"><img src="img/flags/hu.svg" title="Hungary" class="flags" alt="hu"/></a>&nbsp;
          <a href="index.php?lang=pl"><img src="img/flags/pl.svg" title="Polish" class="flags" alt="pl"/></a>&nbsp;
          <a href="index.php?lang=sp"><img src="img/flags/ar.svg" title="Argentina" class="flags" alt="ar"/></a>&nbsp;
          <a href="index.php?lang=dl"><img src="img/flags/ch.svg" title="Switzerland" class="flags" alt="ch"/></a>&nbsp;
          <a href="index.php?lang=no"><img src="img/flags/no.svg" title="Norwegian" class="flags" alt="no"/></a>&nbsp;
        </li>
      <?php
} ?>
      <!--credits | download info-->
      <?php // please do not remove this and if so no support is given and your domain will be blacklisted from support it is not much to ask //
 ?>
      <li>
        <a href="https://www.chrisalemany.ca/2021/02/24/installing-the-weather34-skin-on-weewx-with-remote-web-server-2021-edition/" title="remote setup" target="_blank">
          <weather34menumarkerbluegrey></weather34menumarkerbluegrey> Remote Setup Guide
        </a>
      </li>
      <li>
        <a href="https://github.com/steepleian/weewx-Weather34/" title="weewx-Weather34 on Github" target="_blank">
          <weather34menumarkerbluegrey></weather34menumarkerbluegrey> Download weewx-Weather34 skin
        </a>
      </li>
      <li>
        <a href="https://steepleian.github.io/weewx-Weather34/" title="Web Services Setup Page" target="_blank">
          <weather34menumarkerbluegrey></weather34menumarkerbluegrey> Web Services Setup Page
        </a>
      </li>
      <li>
        <a href="mailto://steepleian@gmail.com" title="Email Steepleian for Support" target="_blank">
          <weather34menumarkerbluegrey></weather34menumarkerbluegrey> Maintained by Ian Millard (Steepleian)
        </a>
      </li>
      <li>
        <a href="https://weather34.com/homeweatherstation/" title="Weather34" target="_blank">
          <weather34menumarkerbluegrey></weather34menumarkerbluegrey> Designed by weather34.com
        </a>
      </li>
      <!-- USA WeatherFinder -->
      <?php if (!empty($USAWeatherFinder))
{ ?>
        <li>
          <a href="https://usaweatherfinder.com/index.php?a=stats&u=<?php echo $USAWeatherFinder; ?>" title="<?php echo $USAWeatherFinder; ?>'s Weather Finder" target="_blank">
            <img src="https://usaweatherfinder.com/button.php?u=<?php echo $USAWeatherFinder; ?>" alt="USA Weather Finder" border="0" />
          </a>
        </li>
      <?php
} ?>
    </ul>
  </div>
</div>

