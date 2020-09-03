<?php

require_once "vendor/autoload.php";
require_once "views/cargo/index.php";

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$log = new Logger('time');
$log->pushHandler(new StreamHandler('log/time.log', Logger::DEBUG));
//$MCashe = new Memcached();
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->set("Page", $SITE);

$Start_Site_Rendore = time();
echo "</br>START!</br>";
require_once "views/landio-html/Lando.php";
echo $SITE;
$Finish_Site_Rendore = time();
$Itog = $Finish_Site_Rendore - $Start_Site_Rendore;

echo "<div class = 'text-danger bg-dark'></br></br></br></br>Время рендора сотавило :" . $Itog . "</br></br></br></br></div>";

$Start_Site_Rendore_Redis = time();
echo "</br>START!</br>";
$Syte = $redis->get("Page");
echo $Syte;
$Finish_Site_Rendore_Redis = time();
$Itog = $Finish_Site_Rendore_Redis - $Start_Site_Rendore_Redis;

echo "<div class = 'text-danger bg-dark'></br></br></br></br>Время рендора сотавило :" . $Itog . "</br></br></br></br></div>";