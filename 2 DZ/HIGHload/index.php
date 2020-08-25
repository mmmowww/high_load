<?php
namespace MMMOWWW;

require_once "vendor/autoload.php";
require_once "Run/Run.php";
require_once "classRealisation/User.php";
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$time_start_Varieble = time();
$var = 1;
$time_end_Varieble = time();

$time_start_Class = time();
$class = new ClassRealisation\User(123);
var_dump($class->getId());
$time_end_Class = time();

$log = new Logger('time');
$log->pushHandler(new StreamHandler('log/time.log', Logger::DEBUG));

$log->debug($time_end_Varieble - $time_start_Varieble);
$log->info('Время жизни перемнных');
$log->debug($time_end_Class - $time_start_Class);
$log->info('Время на создание класса');
//echo phpinfo();