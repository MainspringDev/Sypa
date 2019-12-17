<?php

return [
    // Site
    'site_url'             => '',

    // Language
    'language_directory'   => 'en-gb',
    'language_autoload'    => array('en-gb'),

    // Date
    'date_timezone'        => 'UTC',

    // Database
    'db_autostart'         => false,
    'db_engine'            => \OpenCart\System\Library\Db\MySQLi::class, // mpdo, mssql, mysql, mysqli or postgre
    'db_hostname'          => 'localhost',
    'db_username'          => 'root',
    'db_password'          => '',
    'db_database'          => '',
    'db_port'              => 3306,

    // Mail
    'mail_engine'          => 'mail', // mail or smtp
    'mail_from'            => '', // Your E-Mail
    'mail_sender'          => '', // Your name or company name
    'mail_reply_to'        => '', // Reply to E-Mail
    'mail_smtp_hostname'   => '',
    'mail_smtp_username'   => '',
    'mail_smtp_password'   => '',
    'mail_smtp_port'       => 25,
    'mail_smtp_timeout'    => 5,
    'mail_verp'            => false,
    'mail_parameter'       => '',

    // Cache
    'cache_engine'         => \OpenCart\System\Library\Cache\File::class, // apc, file, mem or memcached
    'cache_expire'         => 3600,

    // Session
    'session_autostart'    => true,
    'session_engine'       => \OpenCart\System\Library\Session\File::class,
    'session_name'         => 'OCSESSID',
    'session_expire'       => 3600,

    // Template
    'template_engine'      => \OpenCart\System\Library\Template\Twig::class,
    'template_directory'   => '',
    'template_extension'   => '.twig',

    // Error
    'error_display'        => true,
    'error_log'            => true,
    'error_filename'       => 'error.log',

    // Response
    'response_header'      => array('Content-Type: text/html; charset=utf-8'),
    'response_compression' => 0,

    // Autoload Configs
    'config_autoload'      => array(),

    // Autoload Libraries
    'library_autoload'     => array(),

    // Autoload Models
    'model_autoload'       => array(),

    // Autoload Helpers
    'helper_autoload'      => array(),

    // Actions
    'action_default'       => 'common/home', // @todo
    'action_router'        => 'startup/router', // @todo
    'action_error'         => 'error/not_found', // @todo
    'action_pre_action'    => array(),
    'action_event'         => array()
];
