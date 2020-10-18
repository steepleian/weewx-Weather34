<?php
include('./settings1.php');
$sitebase=substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
$manifest = [
    "name" => $stationName.' Weather',
    "short_name" => $manifestShortName,
    "start_url" => $sitebase,
    "display" => "standalone",
    "background_color" => "#000000",
    "theme_color" => "#000000",
    "scope" => $sitebase,
    "prefer_related_applications" => false,
    "icons" => [
      [  
        "src" => "img/android-chrome-192x192.png",
        "sizes"=> "192x192",
        "type" => "image/png"
      ],
      [
        "src" => "img/android-chrome-512x512.png",
        "sizes" => "512x512",
        "type" => "image/png"
      ]
    ]
];

header('Content-Type: application/json');
echo json_encode($manifest);

?>