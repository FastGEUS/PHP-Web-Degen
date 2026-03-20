<?php
$title = 'Деген С.В. Группа 241-351 — ЛР 3, виртуальная клавиатура';

$store      = isset($_GET['store']) ? $_GET['store'] : '';
$countFile  = 'clicks.txt'; // файл-счётчик рядом с index.php

// Читаем текущее значение из файла (или 0 если файла нет)
$clicks = file_exists($countFile) ? (int)file_get_contents($countFile) : 0;

if (isset($_GET['key'])) {
    if ($_GET['key'] === 'reset') {
        // Сброс только строки, clicks НЕ трогаем
        $store = '';
    } else {
        $store .= $_GET['key'];
        $clicks++; // увеличиваем
        file_put_contents($countFile, $clicks); // сохраняем в файл
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <img 
    src="https://cdn-ru.bitrix24.ru/b10891108/resize_cache/969372/f72cdc32ecc10461003d548dee4468d0/crm/button/52f98348e1140010f685f5d8e8b513ec.png"
    alt="Логотип вуза" class="logo";
    >
    <div class="title">
        <div><?= htmlspecialchars($title) ?></div>
        <div>Использование GET‑параметров в ссылках</div>
    </div>
</header>

<main>
    <h1>ЛР‑3: Виртуальная клавиатура на PHP</h1>

    <div class="result-window">
        <?= htmlspecialchars($store) ?>
    </div>

    <div class="keyboard">
        <?php
        for ($i = 1; $i <= 9; $i++) {
            $url = '?key='.$i.'&store='.urlencode($store).'&clicks='.$clicks;
            echo '<a class="key" href="'.$url.'">'.$i.'</a>';
        }
        $url0 = '?key=0&store='.urlencode($store).'&clicks='.$clicks;
        ?>
        <a class="key" href="<?= $url0 ?>">0</a>
        
        <a class='key reset' href="?key=reset&store=&clicks=' . $clicks . '">СБРОС</a>
    </div>
</main>

<footer>
    Общее число нажатий кнопок: <?= $clicks ?>.
    Сформировано <?= date_default_timezone_set('Europe/Moscow'); date('d.m.Y') ?> в <?= date('H:i:s') ?>.
</footer>

</body>
</html>
