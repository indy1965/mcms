<?php
/**
 * index admin panel
 */
define('WUO_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ENV', 'Admin');
define('ENV_DIR', WUO_ROOT . '/' . strtolower(ENV ));
define('THEME_DIR', WUO_ROOT . '/content/themes' );
define('SYS_DIR', WUO_ROOT . '/system' );


require_once(WUO_ROOT . '/config.php');
require_once(SYS_DIR . '/load.php');
