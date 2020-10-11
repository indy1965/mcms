<?php
/**
 * index file root
 */
define('WUO_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SYS_DIR', WUO_ROOT . '/system' );
define('ENV', 'Cms');
define('ENV_DIR', SYS_DIR . '/' . strtolower(ENV ));
define('THEME_DIR', WUO_ROOT . '/content/themes' );


require_once(WUO_ROOT . '/config.php');
require_once(SYS_DIR . '/load.php');
