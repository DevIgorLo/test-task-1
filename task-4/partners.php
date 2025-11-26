<?php
//Простой вариант
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши партнеры");

$APPLICATION->IncludeComponent(
    "custom:partners.dashboard",
    "",
    array(
        "IBLOCK_ID" => "12",
        "ELEMENTS_COUNT" => "12",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
    )
);
?>

<?php
//Более полный вариант
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Наши партнеры");

// Подключение компонента дашборда партнеров
$APPLICATION->IncludeComponent(
    "custom:partners.dashboard",           // Название компонента
    ".default",                             // Шаблон компонента
    array(
        "IBLOCK_TYPE_ID" => "lists",        // Тип инфоблока (универсальные списки)
        "IBLOCK_ID" => "12",                // ID универсального списка с партнерами
        "ELEMENTS_COUNT" => "12",           // Количество компаний на странице
        "SORT_BY" => "NAME",                // Поле для сортировки
        "SORT_ORDER" => "ASC",              // Направление сортировки
        "SHOW_LOGO" => "Y",                 // Показывать логотипы
        "SHOW_CONTACTS" => "Y",             // Показывать контактную информацию
        "CACHE_TYPE" => "A",                // Тип кеширования
        "CACHE_TIME" => "3600",             // Время кеширования (1 час)
        "CACHE_GROUPS" => "Y",              // Учитывать права доступа
    ),
    false                                   // Не использовать составной компонент
);
?>

