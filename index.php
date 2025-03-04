<?php
    // Подключаем автозагрузчик классов (если используется)
    //require_once __DIR__ . '/../app/core/autoload.php';

    // Подключаем роутер
    require_once __DIR__ . '/../app/core/router.php';

    // Запускаем роутер
    Router::route();