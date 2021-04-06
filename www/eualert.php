<?php header('content-type: application/json; charset=utf-8');
error_reporting(0);
# Adapted for weewx-Weather34 by David Marshall and Ian Millard
# https://github.com/steepleian/weewx-Weather34
# Based on original work by Wayne D Grant
# Copyright 2018 Wayne D Grant (www.waynedgrant.com)
# https://github.com/waynedgrant/meteo-alarm-weather-warnings
# Licensed under the MIT License

/* do not change any code below this line
/* ----------------------------------------------------------------------------------------
Date: Thu, 11 Sep 2008 11:39:52 +0200
From: karin buchauer <karin.buchauer@zamg.ac.at>
Organization: zamg

Dear Mr True,

you are quite right:
you can use the material featured on the website, without modifying it, providing the source (link) as well as time and date of issue of the data, as stipulated in the Terms & Conditions.

With best regards,
Karin Buchauer



Ken True schrieb:
> Dear Sirs,
>
> I am an amateur weather enthusiast who also writes scripting for other weather enthusiasts to incorporate weather data into their personal, non-commercial weather websites.  Many of my scripts (which I write as a hobby, and are distributed gratis) are in use on personal weather websites worldwide.
>
> I've had requests to package the excellent data from www.meteoalarm.eu for weather advisories in EU countries, and before I generate a script for that purpose, I'd like to have your permission to proceed.
>
> Your Terms and Conditions page (http://www.meteoalarm.eu/terms.asp?lang=EN ) says:
>
> "The material featured on this site is the common property of the Meteoalarm partners, and is subject to copyright protection.
> The ownership and intellectual rights on all operational and updated awareness and warning information delivered to the Meteoalarm system remain with the Meteoalarm partners who originally delivered this information. The information on this web site may be used freely by the public.
> Before using information obtained from this server special attention should be given to the date & time of the data and products being displayed.
> In case this information is re-used: This information shall not be modified in content and the source of the information has always to be displayed as EUMETNET - MeteoAlarm, or if a single country, the providing national Institute (for internet application in all cases in the form of a link to: www.meteoalarm.eu). The time of issue at www.meteoalarm.eu must be count.
>
> Third parties producing copyrighted works consisting predominantly of the material of this website must provide notice with such work(s) identifying the source of material incorporated and stating that such material is not subject to copyright protection. Further information can be obtained from this following address: meteoalarm@zamg.ac.at"
>
> My reading of this implies that you do permit re-use/publishing of the information with attribution and an active link to the source page for the data on your site, and a note that the data is copyrighted by the data providing organization (and not subject to copyright by the 3rd-party website including/displaying the data).  Is that correct?
>
> Is it ok with you for me to generate a script for displaying national/regional weather alerts using your data from www.meteoalarm.eu with the appropriate attribution.
>
> Please feel free to examine other scripts I've written which use NOAA, Environment Canada, US Geological Services, and temis.nl as data sources (http://saratoga-weather.org/scripts.php ).
>
> Thank you in advance for your response,
>
> Best regards,
> Ken True
> webmaster@saratoga-weather.org
> Saratoga, California, USA

-- 
*/


//Config

class Config {

    private static $country;
    private static $region;
    private static $dateTimeFormat = 'd M H:i'; 
    private static $timeZone = 'Europe/London';

    public static function getCountry() {
        return self::$country;
    }

    public static function setCountry($country) {
        self::$country = $country;
    }

    public static function getRegion() {
        return self::$region;
    }

    public static function setRegion($region) {
        self::$region = $region;
    }

    public static function getDateTimeFormat() {
        return self::$dateTimeFormat;
    }

    public static function setDateTimeFormat($dateTimeFormat) {
        self::$dateTimeFormat = $dateTimeFormat;
    }

    public static function getTimeZone() {
        return self::$timeZone;
    }

    public static function setTimeZone($timeZone) {
        self::$timeZone = $timeZone;
    }
}

// Result

class Result {

    const SERVICE_VERSION = '0.1';
    const GITHUB_PROJECT_LINK = 'https://github.com/steepleian/weewx-Weather34';
    const CREDIT_NOTICE = 'maintainer';

    public function __construct($rss) {
        $this->warnings = new Warnings($rss);
    }

    private function createServiceUrl() {
        return 'http'.(!empty($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }

    public function serialize() {
        return [
            'endpoint' => [
                'url' => $this->createServiceUrl(),
                'version' => self::SERVICE_VERSION,
                'github_project' => self::GITHUB_PROJECT_LINK,
                'credits' => self::CREDIT_NOTICE
            ],
            'warnings' => $this->warnings->serialize()
        ];
    }
}

// Warnings

class Warnings {

    public function __construct($rss) {
        
        $rss_channel = $rss->channel;
        $this->link = (string)$rss_channel->link;

        if (count($rss_channel->item) > 1) { 
            for ($i=0; $i < count($rss_channel->item); $i++) {
                if ($i !== 0) { 
                    $this->regions[] = new Region($rss_channel->item[$i]);
                }
            }
        } else { 
            $this->regions[] = new Region($rss_channel->item);
        }
    }

    public function serialize() {
        foreach ($this->regions as $region) {
            $regions[] = $region->serialize();
        }

        return [
            'country' => Config::getCountry(),
            'regions' => $regions
        ];
    }
}

// Region

class Region {

    const DATE_TIME_FORMAT = 'D, d M Y H:i:s T';

    public function __construct($rss_item) {

        $this->name = (string)$rss_item->title;
        $this->link = (string)$rss_item->link;
        $this->code = $this->parseRegionCodeFromLink();

        $description_html = (string)$rss_item->description;

        $this->parseWarningsFromDescription($description_html);

        $parsed_pub_date = date_create_from_format(self::DATE_TIME_FORMAT, (string)$rss_item->pubDate);
        date_timezone_set($parsed_pub_date, new DateTimeZone(Config::getTimeZone()));
        $this->published = $parsed_pub_date->format(Config::getDateTimeFormat());
    }

    private function parseRegionCodeFromLink() {
        // e.g. extract '013' from http://web.meteoalarm.eu/en_UK/0/0/UK013.html
        $start = strripos($this->link, Config::getCountry()) + strlen(Config::getCountry());
        $length = strripos($this->link, '.html') - $start;

        return substr($this->link, $start, $length);
    }

    private function parseWarningsFromDescription($description_html) {
        
        $description_dom = new DOMDocument();
        $description_dom->loadHTML($description_html);
        
        $rows = $description_dom->getElementsByTagName('tr');
        $tomorrows_row_index = $this->findTomorrowsRowIndex($rows);

        $this->todaysWarnings = $this->parseWarningsFromRows($rows, 1, $tomorrows_row_index);
        $this->tomorrowsWarnings = $this->parseWarningsFromRows($rows, $tomorrows_row_index+1, $rows->length);
    }

    private function findTomorrowsRowIndex($rows) {
        for ($i = 0; $i < $rows->length; $i++) { 
            $row = $rows->item($i);

            if (($row->childNodes->length === 1) && ($row->childNodes->item(0)->nodeName === 'th'))  {

                if (trim($row->childNodes->item(0)->textContent) === 'Tomorrow') {
                    $tomorrows_row_index = $i;
                    break;
                }
            }
        }

        return $tomorrows_row_index;
    }

    private function parseWarningsFromRows($rows, $start_index, $end_index) {
        $warnings = array();

        for ($i = $start_index; ($i + 2) <= $end_index; $i+=2) {
            $awarness_period_row = $rows->item($i);
            $description_row = $rows->item($i+1);
            $warnings[] = new Warning($awarness_period_row, $description_row);
        }

        return $warnings;
    }
	
    public function serialize() {
        foreach ($this->todaysWarnings as $warning) {
            $todaysWarnings[] = $warning->serialize();
        }

        foreach ($this->tomorrowsWarnings as $warning) {
            $tomorrowsWarnings[] = $warning->serialize();
        }

        return [
            'name' => $this->name,
            'code' => $this->code,
            'link' => $this->link,
            'today' => $todaysWarnings,
            'tomorrow' => $tomorrowsWarnings,
            'published' => $this->published
        ];
    }
}

parse_parameters();
$rss_link = generate_rss_link();
$rss = @file_get_contents($rss_link);

if (!$rss) {
    $response_code = parse_response_code($http_response_header);
    respond($response_code, create_error_json('Response code ' . $response_code . ' returned by ' . $rss_link));
}

$rss = mb_convert_encoding($rss, 'HTML-ENTITIES', 'UTF-8'); 
$rss = fix_rss_ampersand_escaping($rss);
$result = new Result(simplexml_load_string($rss));
$json = json_encode($result->serialize());

respond(200, $json);

function parse_parameters() {
    if (!isset($_GET['country'])) {
        respond(400, create_error_json('GET parameter country is required'));
    }

    Config::setCountry(strtoupper($_GET['country']));

    if (isset($_GET['region'])) {
        Config::setRegion($_GET['region']);
    }

    if (isset($_GET['date_time_format'])) {
        Config::setDateTimeFormat($_GET['date_time_format']);
    }

    if (isset($_GET['time_zone'])) {
        Config::setTimeZone($_GET['time_zone']);
    }
}

function generate_rss_link() {
    if (!is_null(Config::getRegion())) {
        
        return sprintf('http://meteoalarm.eu/documents/rss/%s/%s%s.rss', strtolower(Config::getCountry()), Config::getCountry(), Config::getRegion());
    } else {
        
        return sprintf('http://www.meteoalarm.eu/documents/rss/%s.rss', strtolower(Config::getCountry()));
    }
}

function parse_response_code($headers) {
    foreach ($headers as $k=>$v) {
        if (preg_match( "#HTTP/[0-9\.]+\s+([0-9]+)#", $v, $out)) {
            $response_code = intval($out[1]);
            break;
        }
    }
    return $response_code;
}

function fix_rss_ampersand_escaping($rss) {
    
    $rss = str_replace('&', '&amp;', $rss);
    $rss = str_replace('&amp;amp;', '&amp;', $rss);
    return $rss;
}

function create_error_json($error_message) {
    return json_encode(array(
        'error' => $error_message
    ));
}

function respond($code, $json) {
    header('Status: ' . $code);
    echo isset($_GET['callback']) ? "{$_GET['callback']}($json)" : $json;
    die();
}

// Warning

class Warning {

    public function __construct($awarness_period_row, $description_row) {
      
        $awareness_cell = $awarness_period_row->getElementsByTagName('td')->item(0);
        $this->awareness = new Awareness($awareness_cell);

        $period_cell = $awarness_period_row->getElementsByTagName('td')->item(1);
        $this->period = new Period($period_cell);

        $description_cell = $description_row->getElementsByTagName('td')->item(1);
        $this->description = new Description($description_cell);
    }

    public function serialize() {
        return [
            'awareness' => $this->awareness->serialize(),
            'period' => $this->period->serialize(),
            'description' => $this->description->text
        ];
    }
}

// Awareness

class Awareness {

    public function __construct($awareness_cell) {
    
        $img = $awareness_cell->getElementsByTagName('img')->item(0);

        $this->icon = $img->getAttribute('src');

        $img_alt = $img->getAttribute('alt');

        $this->parse_awareness_level($img_alt);
        $this->parse_awareness_type($img_alt);
    }

    private function parse_awareness_level($img_alt) {
 
        $start_awareness_level_index = strrpos($img_alt, ':') + 1;
        $awareness_level_length = strlen($img_alt) - $start_awareness_level_index;
        $this->awarenessLevel = new AwarenessLevel(intval(substr($img_alt, $start_awareness_level_index, $awareness_level_length)));
    }

    private function parse_awareness_type($img_alt) {
        if ($this->awarenessLevel->serialize()['level'] == AwarenessLevel::GREEN) {
            $this->awarenessType = new AwarenessType(AwarenessType::NO_WARNINGS); 
        } else {
            // e.g. awt value from "awt:4 level:3"
            $start_awareness_type_index = strpos($img_alt, ':') + 1;
            $awareness_type_length = strpos($img_alt, ' ') - $start_awareness_type_index;
            $this->awarenessType = new AwarenessType(intval(substr($img_alt, $start_awareness_type_index, $awareness_type_length)));
        }
    }

    public function serialize() {
        return [
            'icon' => $this->icon,
            'awareness_type' => $this->awarenessType->serialize(),
            'awareness_level' => $this->awarenessLevel->serialize()
        ];
    }
}

// AwarenessLevel

class AwarenessLevel {

    const WHITE = 0;
    const GREEN = 1;
    const YELLOW = 2;
    const ORANGE = 3;
    const RED = 4;

    private $colours = ['White', 'LightGreen', 'Yellow', 'Orange', 'Red'];
    private $descriptions = [
        'Unknown',
        'No particular awareness of the weather is required.',
        'The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.',
        'The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.',
        'The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.'
    ];

    public function __construct($level) {
        if ($level < 0 or $level >= sizeof($this->colours)) {
            throw new InvalidArgumentException('Awareness level ' . $level . ' is not supported.');
        }

        $this->level = $level;
        $this->colour = $this->colours[$level];
        $this->description = $this->descriptions[$level];
    }

    public function serialize() {
        return [
            'level' => $this->level,
            'colour' => $this->colour,
            'description' => $this->description
        ];
    }
}

// AwarenessType

class AwarenessType {

    const NO_WARNINGS = 0;
    const WIND = 1;
    const SNOW_ICE = 2;
    const THUNDERSTORMS = 3;
    const FOG = 4;
    const EXTREME_HIGH_TEMPERATURES = 5;
    const EXTREME_LOW_TEMPERATURES = 6;
    const COASTAL_EVENT = 7;
    const FOREST_FIRE = 8;
    const AVALANCHE = 9;
    const RAIN = 10;
    const UNAVAILABLE = 11;
    const FLOODING = 12;
    const RAIN_FLOODING = 13;

    private $descriptions = [
        'No Warnings',
        'Wind',
        'Snow/Ice',
        'Thunderstorms',
        'Fog',
        'Extreme High Temperatures',
        'Extreme Low Temperatures',
        'Costal Event',
        'Forest Fire',
        'Avalanche',
        'Rain',
        'Unavailable',
        'Flooding',
        'Rain/Flooding'
    ];

    public function __construct($type) {
        if ($type < 0 or $type >= sizeof($this->descriptions)) {
            throw new InvalidArgumentException('Awareness type ' . $type . ' is not supported.');
        }

        $this->type = $type;
        $this->description = $this->descriptions[$type];
    }

    public function serialize() {
        return [
            'type' => $this->type,
            'description' => $this->description
        ];
    }
}

// Period

class Period {

    const DATE_TIME_FORMAT = 'd.m.Y H:i T'; 

    public function __construct($period_cell) {
       
        if (trim($period_cell->textContent) !== '') {
            $from_date_text = $period_cell->getElementsByTagName('i')->item(0)->textContent;
            $until_date_text = $period_cell->getElementsByTagName('i')->item(1)->textContent;

            $this->from = $this->parseDateTime($from_date_text);
            $this->until = $this->parseDateTime($until_date_text);
        }
    }

    private function parseDateTime($date_text) {
        $date = date_create_from_format(self::DATE_TIME_FORMAT, $date_text);
        date_timezone_set($date, new DateTimeZone(Config::getTimeZone()));
        return $date->format(Config::getDateTimeFormat());
    }

    public function serialize() {
        return [
            'from' => $this->from,
            'until' => $this->until
        ];
    }
}

// Description

class Description {

    public function __construct($description_cell) {
        
        if (trim($description_cell->textContent) !== '') {
            $this->text = $description_cell->textContent;
        }
    }

    public function text() {
        return $this->text;
    }
}

?>
