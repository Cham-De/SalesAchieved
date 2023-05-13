<?php
$root = substr(dirname(__FILE__), strlen($_SERVER['DOCUMENT_ROOT']));
define('APP_ROOT_PATH', str_replace("\\", "/", $root));
define('APP_VIEW_PATH', APP_ROOT_PATH . "/View");
define('APP_CONTROLLER_PATH', APP_ROOT_PATH . "/Controller");
define('APP_STYLES_PATH', APP_VIEW_PATH . "/styles");
define('APP_ASSETS_PATH', APP_VIEW_PATH . "/assets");
