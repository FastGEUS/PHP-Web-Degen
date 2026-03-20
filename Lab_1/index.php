<?php
$title = 'Деген С.В. Группа 241-351 | ЛР 1. Простейшая программа на PHP';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <span class="logo">МойСайт</span>

    <?php $name='Главная'; $link='index.php'; $current_page=true; ?>
    <a href="<?php echo $link; ?>"
       <?php if($current_page) echo 'class="selected_menu"'; ?>>
       <?php echo $name; ?>
    </a>

    <?php $name='О технологиях'; $link='page2.php'; $current_page=false; ?>
    <a href="<?php echo $link; ?>"
       <?php if($current_page) echo 'class="selected_menu"'; ?>>
       <?php echo $name; ?>
    </a>

    <?php $name='Контакты'; $link='page3.php'; $current_page=false; ?>
    <a href="<?php echo $link; ?>"
       <?php if($current_page) echo 'class="selected_menu"'; ?>>
       <?php echo $name; ?>
    </a>
</header>

<main>
    <h1>Добро пожаловать на сайт о веб-разработке</h1>

    <h2>Что такое PHP?</h2>
    <p>
        PHP (Hypertext Preprocessor) — это широко используемый язык программирования
        общего назначения с открытым исходным кодом. Он специально разработан
        для веб-разработки и может быть встроен прямо в HTML-код. PHP работает на
        стороне сервера: сервер обрабатывает код и отдаёт браузеру готовый HTML.
        Это делает PHP одним из самых популярных инструментов для создания динамических
        веб-страниц. На PHP написаны такие системы, как WordPress, Drupal, Joomla и другие CMS.
    </p>
    <p>
        Основная задача PHP — динамически формировать HTML-код страницы. Программный код
        выступает в роли верстальщика, который непосредственно перед отправкой браузеру
        собирает страницу из компонентов. Это позволяет создавать сайты, содержимое которых
        зависит от данных пользователя, базы данных или любых других источников.
    </p>

    <h2>История языка</h2>
    <p>
        PHP был создан датским программистом Расмусом Лердорфом в 1994 году. Изначально
        он представлял собой набор простых скриптов для отслеживания посещений его
        онлайн-резюме. Со временем проект вырос и превратился в полноценный язык
        программирования. Сегодня PHP поддерживается огромным сообществом и стоит за
        более чем 75% всех сайтов, использующих серверные языки.
    </p>

    <h2>Сравнение технологий веб-разработки</h2>
    <table>
        <?php echo '<tr><th>Технология</th><th>Тип</th><th>Назначение</th></tr>'; ?>

        <tr>
            <td><?php echo 'PHP'; ?></td>
            <td><?php echo 'Серверный язык'; ?></td>
            <td><?php echo 'Генерация динамического HTML'; ?></td>
        </tr>
        <tr>
            <td>HTML</td>
            <td>Язык разметки</td>
            <td>Структура страницы</td>
        </tr>
        <tr>
            <td>CSS</td>
            <td>Язык стилей</td>
            <td>Оформление страницы</td>
        </tr>
    </table>

    <h2>Галерея</h2>
    <div class="photo-block">
        <?php
        // Фото 1: зависит от чётности секунды
        if (date('s') % 2 === 0)
            $name = '1';
        else
            $name = '2';
        echo '<img src="fotos/foto' . $name . '.jpg" alt="Меняющаяся фотография">';
        ?>
    </div>
</main>

<footer>
    
    Сформировано <?php date_default_timezone_set('Europe/Moscow'); echo date('d.m.Y') . ' в ' . date('H-i:s'); ?>
</footer>

</body>
</html>
