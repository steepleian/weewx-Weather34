# Change Log

**Version W34-HC-IMJD-2.0.0**

1. Changes for WeeWX 4.0 new extended database schema
2. Protection code for empty strings
3. Added energy to lightning module display
4. CSS additions in preparation for future planned air quality module options
5. Updated settings.php to next version code **W34-HC-IMJD-2.0.0**
6. Added lightning chart links to index.php
7. Code cleanup lightning variables & css tweaks for lightning
8. Added lightning monthly chart
9. Add missing y axis label for lightning
10. Additional lightning label changes
11. Readme up issue
12. Removed duplicated documents in www folder
13. Adjust location of miles widget
14. Reduce race condition on update section
15. wind_gust_60min missing and wind conversions in the wrong file
16. Cloud height display reversed
17. CSS adjustment for airqualitymodule.php
18. Corrected issues with RT windrose chart
19. Further air quality module CSS adjustments
20. Air Quality Module updated
21. AQI info pop up added (aqipopup.php, aqi_info.php)
22. World AQI Top Row Module added (worldaqitop.php)
23. UK AQI Top Row added (daqitop.php)
24. Added cloudbase data to archivedata.php.tmpl
25. w34CombineData.php now uses WeeWX cloud base data 26 Fixed cloud base unit conversion in currentconditions.w34.php
26. Use lasttime for lightning strike
27. Created airqualitydata.php.tmpl
28. Added [[[AIRQUALITYDATA]]] to Weather34 skin.conf
29. Dual windrose plots on one iframe
30. Day plots for multiple plots per page
31. Cloudbase calculation works on US units database also
32. Month/Year Windrose Gust use GustSpeed from db
33. Windrose Gust tweaks and using 10min gust for display
34. Fix chk_lightning_count option
35. Remove unused config entry
36. Weewx IP in realtime.txt for day plots
37. Remove weewxbinpath from plots_config.js
38. Change to make lightning time ago correct
39. Round 2 Day Plots communication
40. Use 10min dir avg and 10min gust avg for rose
41. Config option to disable day plots
42. New Cloud Cover percent display
43. New Cloud Cover Chart
44. Misc changes for Cloud Cover and chmod for sat images
45. Added cloud cover unit to settings.php
46. Renamed RemoteWebServer and realtime.txt
47. Added text to cloud cover chart
48. Added additional hidden fields for new hidden variables to ensure they are not removed from settings1.php when settings page is saved.
49. Remove scroll bar from temp almanac
50. Corrected path in Weather34CloudCover stanza in the install config files
51. Added % cloud cover chart link to current conditions module
52. Rsync w34realtime.txt to remote web servers
53. Rsync of json directory is now possible
54. Remove duplicate filename config entries in W34 sections
55. Added green, yellow, orange and red advisory alert triangles to shared.php
56. Inserted space in cloud cover link index.php
57. Fixed white plot background for cloud cover chart
58. Buttons styles
59. W34 WebServer always enabled remove config section from weewx conf
60. Send webserver ip address on index.php page load
61. currentconditionsw34.php adjusted layout
62. Support multiple remote web servers for one weewx machine
63. Auto theme for dark and light theme based on sunrise & sunset
64. Added delete of config entries to w34 installer
65. Added advisory_extended.php
66. Added alert fields to easyW34skinSetup.php
67. $lat and $lon added to auto theme index.php
68. settings1.default.php additional variables for Meteoalarm added
69. Additional updates to easyW34skinSetup.php for Meteoalarm filelds
70. Hayes wind speed chart and range selector for radial charts
71. index.php edited module links
72. Protection code around lightningSum_json
73. Protection code for degrees to compass value
74. Cloud Cover Radial chart added
75. readme.md Updated screen shots
76. Updated radial chart screen shot
77. Added polar chart for tempallplot
78. Use either weewx 3.x or 4.x logging
79. Allow polar charts to use different dates using input selector
80. User is now prompted with the Python Version the install will be run
81. Re-worked cloud cover
82. Added night and day icon selection to cloud conditions
83. easyW34skinSetup.php MB platform not required
84. Added $theme1 and $al_ip to settings1.default.php
85. Added missing cloud cover variable to w34CombinedData.php
86. Current conditions module Icons and descriptions now match
87. Addition of oktas to cloud coverage in current conditions module
88. Readme and installation instructions updated
