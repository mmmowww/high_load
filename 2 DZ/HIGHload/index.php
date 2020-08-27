<?php
namespace MMMOWWW;

require_once "vendor/autoload.php";
require_once "Run/Run.php";
require_once "classRealisation/User.php";
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$log = new Logger('time');
$log->pushHandler(new StreamHandler('log/time.log', Logger::DEBUG));
$DB = new PDO('mysql:host=localhost;dbname=friends', "root", "");
$ANSWER = $DB->query("SHOW TABLES");
var_dump($ANSWER);
die();
//echo phpinfo();