<?php

// HTTP
define('HTTP_SERVER', 'http://10.0.19.75/');

// HTTPS
define('HTTPS_SERVER', 'http://10.0.19.75/');

// APPLICATION
define('APPLICATION', 'catalog');

// DIR
define('DIR_APPLICATION', __DIR__ . '/../../../src/Legacy/catalog/');
define('DIR_SYSTEM', __DIR__ . '/../../../src/Legacy/system/');
define('DIR_IMAGE', __DIR__ . '/../../../public_html/media/image/');
define('DIR_STORAGE', __DIR__ . '/../../../var/');
define('DIR_CONFIG', __DIR__ . '/../../../config/legacy/config/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', \OpenCart\System\Library\Db\MySQLi::class);
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'glasweb');
define('DB_PORT', 3306);
define('DB_PREFIX', '');
