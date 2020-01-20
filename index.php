<?php
require_once 'app/config/global_variable.php';
$url = $GLOBALS['BASE_URL'].'/transactions/index';
header("Location: $url");
