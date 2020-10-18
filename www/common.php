<?php
include('settings1.php');
date_default_timezone_set($TZ);
//translations for HOMEWEATHERSTATION TEMPLATE UPDATED 2nd November added set locale
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');
mb_regex_encoding('UTF-8');
ob_start('mb_output_handler');

if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];

// GET the session  set the cookie
$_SESSION['lang'] = $lang;

setcookie("lang", $lang, time() +3600);
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = $language;
}

switch ($lang) {
//english uk	
  case 'en':
  $lang_file = 'lang.en.php';
  $lang_flag = 'en';
  $lang_option = 'en';
  setlocale(LC_TIME, "en_EN");
  break;
  
  
  //english	 canada
  case 'can':
  $lang_file = 'lang.en.php';
  $lang_flag = 'can';
  $lang_option = 'en';
  setlocale(LC_TIME, "en_EN");
  break;
  
  //english	us
  case 'us':
  $lang_file = 'lang.en.php';
  $lang_flag = 'us';
  $lang_option = 'en';
  setlocale(LC_TIME, "en_US");
  break;
  
//danish
  case 'dk':
  $lang_file = 'lang.dk.php';
  $lang_flag = 'dk';
  $lang_option = 'en'; 
  setlocale(LC_TIME, 'danish', 'DK', 'da_DK.ISO8859-1', 'da_DK.utf-8');
  break;
  
  
  //dutch
  case 'nl':
  $lang_file = 'lang.nl.php';
  $lang_flag = 'nl';
  $lang_option = 'en';
  setlocale(LC_TIME, "nl_NL.UTF-8");
  break;
  
  
  //brazilian/south america
  case 'br':
  $lang_file = 'lang.br.php';
  $lang_flag = 'br';
  $lang_option = 'en';
  setlocale(LC_TIME, "pt_BR.UTF-8");
  break;
  
  //argentine
  case 'ar':
  $lang_file = 'lang.ar.php';
  $lang_flag = 'ar';
  $lang_option = 'en';
  setlocale(LC_TIME, "es_ES.UTF-8");
  break;
  
    
  //polish
  case 'pl':
  $lang_file = 'lang.pl.php';
  $lang_flag = 'pl';
  $lang_option = 'en';
  setlocale(LC_TIME, 'pl_PL', 'pl_PL.ISO8859-2', 'polish_pol');
  break;
  
  
//german
  case 'dl':
  $lang_file = 'lang.dl.php';
  $lang_flag = 'dl';
  $lang_option = 'en';
  setlocale(LC_TIME, "de_DE.UTF-8");
  break;
  
  //italian
  case 'it':
  $lang_file = 'lang.it.php';
  $lang_flag = 'it';
  $lang_option = 'en';
  setlocale(LC_TIME, "it_IT.UTF-8");
  break;
  
//spanish
  case 'sp':
  $lang_file = 'lang.sp.php';
  $lang_flag = 'sp';
  $lang_option = 'en';
  setlocale(LC_TIME, "es_ES.UTF-8");
  break;
  
  
  //catalan 
  case 'cat':
  $lang_file = 'lang.cat.php';
  $lang_flag = 'cat';
  $lang_option = 'en';
  setlocale(LC_TIME, "ca_ES");
  break; 
  
//french  
   case 'fr':
  $lang_file = 'lang.fr.php';
  $lang_flag = 'fr';
  $lang_option = 'en';
  setlocale(LC_TIME, "fr_FR.UTF-8");
  break;
  
//greek  
  case 'gr':
  $lang_file = 'lang.gr.php';
  $lang_flag = 'gr';
  $lang_option = 'en';
  setlocale(LC_TIME, "el_GR.UTF-8");
  break;

//turkish  
  case 'tr':
  $lang_file = 'lang.tr.php';
  $lang_flag = 'tr';
  $lang_option = 'en';
  setlocale(LC_TIME, "tr_TR.UTF-8");
  break;
  
  
  //hungarian 
  case 'hu':
  $lang_file = 'lang.hu.php';
  $lang_flag = 'hu';
  $lang_option = 'en';
  setlocale(LC_TIME, "tr_HU.UTF-8");
  break;

  //Norwegian
  case 'no':
  $lang_file = 'lang.no.php';
  $lang_flag = 'no';
  $lang_option = 'en';
  setlocale(LC_TIME, "no_NO.UTF-8");
  break;
  
//default
  default:
  $lang_file = 'lang.'.$defaultlanguage.'.php';
  $lang_flag = $defaultlanguage;
  $lang_option = 'en';
  setlocale(LC_TIME, "");
  }


//path to language files
include_once 'languages/'.$lang_file;
?>