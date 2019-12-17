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
    'session_engine'    => \OpenCart\System\Library\Session\DB::class,
    'session_name'      => 'OCSESSID',

    // Template
    'template_engine'    => \OpenCart\System\Library\Template\Twig::class,
    'template_directory' => '',

    // Autoload Libraries
    'library_autoload'   => array(),

    // Actions
    'action_pre_action'  => array(
        [\OpenCart\Catalog\Controller\Startup\ControllerStartupStartup::class, 'index'],     // 'startup/startup'
        [\OpenCart\Catalog\Controller\Startup\ControllerStartupMarketing::class, 'index'],   // 'startup/marketing'
        [\OpenCart\Catalog\Controller\Startup\ControllerStartupError::class, 'index'],       // 'startup/error'
        [\OpenCart\Catalog\Controller\Startup\ControllerStartupEvent::class, 'index'],       // 'startup/event'
        [\OpenCart\Catalog\Controller\Startup\ControllerStartupSass::class, 'index'],        // 'startup/sass'
        [\OpenCart\Catalog\Controller\Startup\ControllerStartupMaintenance::class, 'index'], // 'startup/maintenance'
        [\OpenCart\Catalog\Controller\Startup\ControllerStartupSeoUrl::class, 'index'],      // 'startup/seo_url'
    ),

    // Action Events
    'action_event'       => array(
        'catalog/controller/*/before' => array(
            [\OpenCart\Catalog\Controller\Event\ControllerEventLanguage::class, 'before'], // 'event/language/before'
        ),
        'catalog/controller/*/after' => array(
            [\OpenCart\Catalog\Controller\Event\ControllerEventLanguage::class, 'after'], //'event/language/after'
        ),
        'catalog/view/*/before' => array(
            [\OpenCart\Catalog\Controller\Event\ControllerEventTheme::class, 'index'], // 'event/theme'
            [\OpenCart\Catalog\Controller\Event\ControllerEventLanguage::class, 'index'], // 'event/language'
        ),
        'catalog/language/*/after' => array(
            [\OpenCart\Catalog\Controller\Event\ControllerEventTranslation::class, 'index'], // 'event/translation'
        )
    ),
];
