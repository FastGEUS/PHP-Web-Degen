<?php
$title = 'Деген С.В. Группа 241-351 — ЛР 4, пользовательские функции';

$cols = 2; // если сделать 0 — будет сообщение об ошибке

// массив из >=10 структур таблиц
$structures = [
    'Имя*Фамилия*Город#Иван*Иванов*Москва#Пётр*Петров*Казань',
    'Товар*Цена*Склад#Монитор*12000*Основной#Клавиатура*2500*Резерв',
    'Язык*Тип*Область#PHP*Серверный*Web#JavaScript*Клиентский*Web',
    'День*Температура*Состояние#Пн*+5*Облачно#Вт*+7*Солнце',
    'Год*Фильм*Режиссёр#1999*Matrix*Wachowski#2001*LOTR*Jackson',
    'Город*Страна*Население#Амстердам*Нидерланды*821000',
    'Цвет*Код*Пример#Красный*#ff0000*Яркий',
    'OS*Тип*Ядро#Linux*UNIX‑like*Монолитное#Windows*Proprietary*Гибрид',
    'Протокол*Порт*Описание#HTTP*80*Web#HTTPS*443*Защищённый web',
    'Шрифт*Тип*Применение#Arial*Sans‑Serif*Интерфейсы'
];

//формирует одну строку таблицы с учётом числа колонок
function getTR($data, $cols) {
    $cells = array_filter(explode('*', $data), fn($v) => $v !== '');
    if (count($cells) === 0) {
        return ''; // строка без ячеек не выводится
    }

    // дополняем до нужного числа колонок
    while (count($cells) < $cols) {
        $cells[] = '';
    }
    if ($cols === 0) {
        return '';
    }

    $ret = '<tr>';
    for ($i = 0; $i < $cols; $i++) {
        $ret .= '<td>'.htmlspecialchars($cells[$i]).'</td>';
    }
    $ret .= '</tr>';
    return $ret;
}

// вывод одной таблицы по структуре
function outTable($structure, $index, $cols) {
    if ($cols <= 0) {
        echo '<p>Неправильное число колонок</p>';
        return;
    }

    $rows = array_filter(explode('#', $structure), fn($v) => $v !== '');
    if (count($rows) === 0) {
        echo '<p>Таблица №'.$index.': В таблице нет строк</p>';
        return;
    }

    $htmlRows = '';
    foreach ($rows as $row) {
        $tr = getTR($row, $cols);
        if ($tr !== '') {
            $htmlRows .= $tr;
        }
    }

    if ($htmlRows === '') {
        echo '<p>Таблица №'.$index.': В таблице нет строк с ячейками</p>';
        return;
    }

    echo '<h2>Таблица №'.$index.'</h2>';
    echo '<table>'.$htmlRows.'</table>';
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
        <div>Пользовательские функции. Вывод таблиц.</div>
    </div>
</header>

<main>
    <h1>ЛР‑4: Таблицы из строкового описания</h1>
    <p>Число колонок: <?= $cols ?></p>

    <?php
    foreach ($structures as $i => $structure) {
        outTable($structure, $i + 1, $cols);
    }
    ?>
</main>

<footer>
    Сформировано <?= date('d.m.Y') ?> в <?= date('H:i:s') ?>.
</footer>

</body>
</html>
