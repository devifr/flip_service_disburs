<?php
require_once 'app/config/global_variable.php';
$url = 'http://'.$_SERVER['HTTP_HOST'].'/flip_service_disburs/public/'.'/transactions/index';
header("Location: $url");
