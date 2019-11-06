<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1;dbname=admshop',
    'username' => 'db_user',
    'password' => 'Grid7Mran',
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    // Продолжительность кеширования схемы.
     'schemaCacheDuration' => 3600,

    // Название компонента кеша, используемого для хранения информации о схеме
     'schemaCache' => 'cache',

];
