<?php
$title = 'Деген С.В. Группа 241-351 | ЛР А-1. Контакты';
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

    <?php $name='Главная'; $link='index.php'; $current_page=false; ?>
    <a href="<?php echo $link; ?>"
       <?php if($current_page) echo 'class="selected_menu"'; ?>>
       <?php echo $name; ?>
    </a>

    <?php $name='О технологиях'; $link='page2.php'; $current_page=false; ?>
    <a href="<?php echo $link; ?>"
       <?php if($current_page) echo 'class="selected_menu"'; ?>>
       <?php echo $name; ?>
    </a>

    <?php $name='Контакты'; $link='page3.php'; $current_page=true; ?>
    <a href="<?php echo $link; ?>"
       <?php if($current_page) echo 'class="selected_menu"'; ?>>
       <?php echo $name; ?>
    </a>
</header>

<main>
    <h1>Контактная информация</h1>

    <h2>Об авторе</h2>
    <p>
        Данный учебный сайт создан студентом второго курса специальности «Информационная
        безопасность» в рамках лабораторной работы по дисциплине «Веб-разработка».
        Цель работы — освоение базовых принципов PHP-программирования, конвертация
        статического HTML-контента в динамический, а также получение навыков работы
        с FTP-сервером и средой программирования. Все материалы носят учебный характер.
    </p>

    <h2>Реквизиты</h2>
    <p>
        Для связи с автором сайта можно воспользоваться следующими каналами: электронная
        почта, социальные сети или телефон. Ответ на обращение будет дан в течение
        одного рабочего дня. Пожелания по улучшению сайта и замечания приветствуются —
        это поможет сделать проект лучше.
    </p>

    <table>
        <?php echo '<tr><th>Способ связи</th><th>Адрес / Номер</th><th>Время ответа</th></tr>'; ?>
        <tr>
            <td><?php echo 'Email'; ?></td>
            <td><?php echo 'svet.degen@gmail.com'; ?></td>
            <td><?php echo '1 рабочий день'; ?></td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td>+7 (917) 533-22-31</td>
            <td>В рабочее время</td>
        </tr>
        <tr>
            <td>Telegram</td>
            <td>@svet_degen</td>
            <td>До 2 часов</td>
        </tr>
    </table>

    <h2>Местоположение</h2>
    <p>
        Учебное заведение расположено по адресу: г. Москва, ул. Примерная, д. 1.
        Режим работы деканата: понедельник–пятница, с 9:00 до 17:00. Консультации
        преподавателей проводятся по расписанию, которое публикуется на официальном
        сайте учебного заведения в начале каждого семестра.
    </p>

    <div class="photo-block">
        <?php
        if (date('s') % 2 === 0)
            $name = '1';
        else
            $name = '2';
        echo '<img src="fotos/foto' . $name . '.jpg" alt="Меняющаяся фотография">';
        ?>
        <?php
        if (date('s') % 2 === 0)
            $name2 = '2';
        else
            $name2 = '1';
        echo '<img src="fotos/foto' . $name2 . '.jpg" alt="Меняющаяся фотография 2">';
        ?>
    </div>
</main>

<footer>
    Сформировано <?php echo date('d.m.Y') . ' в ' . date('H-i:s'); ?>
</footer>

</body>
</html>
