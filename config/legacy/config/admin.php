<?php

return [
    // Site
    'site_url'          => HTTP_SERVER,

    // Database
    'db_autostart'      => true,
    'db_engine'         => DB_DRIVER, // mpdo, mssql, mysql, mysqli or postgre
    'db_hostname'       => DB_HOSTNAME,
    'db_username'       => DB_USERNAME,
    'db_password'       => DB_PASSWORD,
    'db_database'       => DB_DATABASE,
    'db_port'           => DB_PORT,

    // Session
    'session_autostart' => false,
    'session_engine'    => \OpenCart\System\Library\Session\File::class,

    // Error
    'error_display'     => true,

    // Actions
    'action_pre_action' => array(
        [\OpenCart\Admin\Controller\Startup\ControllerStartupStartup::class, 'index'], // 'startup/startup'
        [\OpenCart\Admin\Controller\Startup\ControllerStartupError::class, 'index'], // 'startup/error'
        [\OpenCart\Admin\Controller\Startup\ControllerStartupEvent::class, 'index'], // 'startup/event'
        [\OpenCart\Admin\Controller\Startup\ControllerStartupSass::class, 'index'], // 'startup/sass'
        [\OpenCart\Admin\Controller\Startup\ControllerStartupLogin::class, 'index'], // 'startup/login'
        [\OpenCart\Admin\Controller\Startup\ControllerStartupPermission::class, 'index'], // 'startup/permission'
    ),

    // Actions
    'action_default' => [\OpenCart\Admin\Controller\Common\ControllerCommonDashboard::class, 'index'], // 'common/dashboard'

    // Action Events
    'action_event' => array(
        'controller/*/before' => array(
            [\OpenCart\Admin\Controller\Event\ControllerEventLanguage::class, 'before'], // 'event/language/before'
        ),
        'controller/*/after' => array(
            [\OpenCart\Admin\Controller\Event\ControllerEventLanguage::class, 'after'], // 'event/language/after'
        ),
        'view/*/before' => array(
            [\OpenCart\Admin\Controller\Event\ControllerEventLanguage::class, 'index'], // 'event/language'
        ),
    ),
];
