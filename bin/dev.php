<?php
require dirname(__DIR__) . '/autoload.php';
$GLOBALS['context'] = 'dev-cli-api-app';
exit((require dirname(__DIR__) . '/bootstrap.php')($GLOBALS['context']));
