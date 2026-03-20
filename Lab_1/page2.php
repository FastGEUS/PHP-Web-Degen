<?php
$title = 'Деген С.В. Группа 241-351 | ЛР А-1. О технологиях';
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

    <?php $name='О технологиях'; $link='page2.php'; $current_page=true; ?>
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
    <h1>Технологии современной веб-разработки</h1>

    <h2>Серверные технологии</h2>
    <p>
        Серверные языки программирования обрабатываются на стороне веб-сервера до того,
        как страница отправляется пользователю. К ним относятся PHP, Python (Django, Flask),
        Ruby on Rails, Node.js, Java (Spring), Go и другие. Каждый из них имеет свои сильные
        стороны: PHP прост и широко распространён, Python отличается читаемостью кода,
        Node.js позволяет использовать JavaScript как на фронтенде, так и на бэкенде.
    </p>

    <h2>Клиентские технологии</h2>
    <p>
        Клиентские технологии выполняются непосредственно в браузере пользователя.
        HTML задаёт структуру страницы, CSS отвечает за её внешний вид, а JavaScript
        обеспечивает интерактивность. Современные фреймворки — React, Vue.js, Angular —
        позволяют строить сложные одностраничные приложения (SPA). Разделение
        ответственности между сервером и клиентом — ключевой принцип современной
        веб-архитектуры.
    </p>

    <table>
        <?php echo '<tr><th>Язык/Фреймворк</th><th>Уровень</th><th>Популярность</th></tr>'; ?>
        <tr>
            <td><?php echo 'PHP'; ?></td>
            <td><?php echo 'Серверный'; ?></td>
            <td><?php echo 'Очень высокая'; ?></td>
        </tr>
        <tr>
            <td>JavaScript</td>
            <td>Клиентский / Серверный</td>
            <td>Наивысшая</td>
        </tr>
        <tr>
            <td>Python</td>
            <td>Серверный</td>
            <td>Высокая</td>
        </tr>
    </table>

    <h2>Базы данных</h2>
    <p>
        Большинство веб-приложений используют базы данных для хранения и получения
        информации. Реляционные СУБД — MySQL, PostgreSQL, SQLite — работают с таблицами
        и используют язык SQL. NoSQL-базы данных — MongoDB, Redis, Cassandra — хранят
        данные в виде документов, пар ключ-значение или графов. PHP имеет встроенную
        поддержку MySQL через расширение PDO и MySQLi.
    </p>

    <div class="photo-block">
        <?php
        if (date('s') % 2 === 0)
            $name = '1';
        else
            $name = '2';
        echo '<img src="fotos/foto' . $name . '.jpg" alt="Меняющаяся фотография">';
        ?>
    </div>
</main>

<footer>
    Сформировано <?php echo date('d.m.Y') . ' в ' . date('H-i:s'); ?>
</footer>

</body>
</html>
