<?php
require_once 'helpers.php';

$is_auth = rand(0, 1);
$user_name = 'Рамиль'; // укажите здесь ваше имя

//Функция форматирования цены
function format_price($price)
{
    // округляем в большую сторону
    $price = ceil($price);

    // форматируем с разделением пробелами
    if ($price >= 1000) {
        $price = number_format($price, 0, '', ' ');
    }

    // добавляем знак рубля
    return $price . ' ₽';
}

$categories = [
    'boards' => 'Доски и лыжи',
    'attachment' => 'Крепления',
    'boots' => 'Ботинки',
    'clothing' => 'Одежда',
    'tools' => 'Инструменты',
    'other' => 'Разное'
];

$goods = [
    [
        'title' => '2014 Rossignol District Snowboard',
        'category' => $categories['boards'],
        'price' => 10999,
        'url' => 'img/lot-1.jpg',
        'expiration_date' => '2025-10-16', // завтра
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => $categories['boards'],
        'price' => 15999,
        'url' => 'img/lot-2.jpg',
        'expiration_date' => '2025-10-18',
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => $categories['attachment'],
        'price' => 8000,
        'url' => 'img/lot-3.jpg',
        'expiration_date' => '2025-10-14', // истекает сегодня
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => $categories['boots'],
        'price' => 10999,
        'url' => 'img/lot-4.jpg',
        'expiration_date' => '2025-10-17',
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => $categories['clothing'],
        'price' => 7500,
        'url' => 'img/lot-5.jpg',
        'expiration_date' => '2025-10-20',
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => $categories['other'],
        'price' => 5400,
        'url' => 'img/lot-6.jpg',
        'expiration_date' => '2025-10-15',
    ],
];

// --- Генерация шаблонов ---
$page_content = include_template('main.php', [
    'categories' => $categories,
    'goods' => $goods
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'YetiCave',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'categories' => $categories
]);

print($layout_content);