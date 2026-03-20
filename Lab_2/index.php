<?php
$title = 'Деген С.В. Группа 241-351 — ЛР 2, вариант 4';
$layoutType = $_GET['type'] ?? 'A';

$x = -10;   
$count = 20;    
$step = 1;     
$minStop = -1000; 
$maxStop = 1000;  

function f_value($x) {
    if ($x <= 10) {
        // защита от деления на ноль: 1 - x/5 = 0 => x = 5
        if (abs(1 - $x / 5) < 1e-9) {
            return 'error';
        }
        return (5 - $x) / (1 - $x / 5);
    } elseif ($x < 20) {
        return $x * $x / 4 + 7;
    } else {
        return 2 * $x - 21;
    }
}

// табулирование
$data = [];
$sum = 0;
$cntNumeric = 0;
$minF = null;
$maxF = null;

for ($i = 0; $i < $count; $i++, $x += $step) {
    $f = f_value($x);

    if ($f !== 'error') {
        $f = round($f, 3);
        // статистика
        $sum += $f;
        $cntNumeric++;
        if ($minF === null || $f < $minF) $minF = $f;
        if ($maxF === null || $f > $maxF) $maxF = $f;

        if ($f <= $minStop || $f >= $maxStop) {
            $data[] = ['x' => $x, 'f' => $f];
            break;
        }
    }
    $data[] = ['x' => $x, 'f' => $f];
}

$avgF = $cntNumeric ? round($sum / $cntNumeric, 3) : null;

function layoutName($t) {
    switch ($t) {
        case 'A': return 'Простая текстовая верстка';
        case 'B': return 'Маркированный список';
        case 'C': return 'Нумерованный список';
        case 'D': return 'Табличная верстка';
        case 'E': return 'Блочная верстка';
        default:  return 'Неизвестный тип';
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
        <div>Циклические алгоритмы. Табулирование функции.</div>
    </div>
</header>

<main>
    <h1>ЛР‑2: Табулирование функции на PHP</h1>

    <h2>Параметры табулирования</h2>
    <p>Начальное значение X: <?= $x ?></p>
    <p>Количество точек: <?= $count ?></p>
    <p>Шаг: <?= $step ?></p>

    <h2>Тип верстки (A–E)</h2>
    <p>
        <a href="?type=A">A</a> |
        <a href="?type=B">B</a> |
        <a href="?type=C">C</a> |
        <a href="?type=D">D</a> |
        <a href="?type=E">E</a>
    </p>

    <h2>Результаты f(x)</h2>

    <?php if ($layoutType === 'A'): ?>

        <?php foreach ($data as $row): ?>
            <?= 'f('.$row['x'].') = '.$row['f'] ?><br>
        <?php endforeach; ?>

    <?php elseif ($layoutType === 'B'): ?>

        <ul>
            <?php foreach ($data as $row): ?>
                <li><?= 'f('.$row['x'].') = '.$row['f'] ?></li>
            <?php endforeach; ?>
        </ul>

    <?php elseif ($layoutType === 'C'): ?>

        <ol>
            <?php foreach ($data as $row): ?>
                <li><?= 'f('.$row['x'].') = '.$row['f'] ?></li>
            <?php endforeach; ?>
        </ol>

    <?php elseif ($layoutType === 'D'): ?>

        <table>
            <tr>
                <th>#</th>
                <th>x</th>
                <th>f(x)</th>
            </tr>
            <?php foreach ($data as $i => $row): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $row['x'] ?></td>
                    <td><?= $row['f'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php elseif ($layoutType === 'E'): ?>

        <div class="blocks-wrap">
            <?php foreach ($data as $row): ?>
                <div class="block-item">
                    <?= 'f('.$row['x'].') = '.$row['f'] ?>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <h2>Статистика по значениям функции</h2>
    <p>Минимум: <?= $minF === null ? '—' : $minF ?></p>
    <p>Максимум: <?= $maxF === null ? '—' : $maxF ?></p>
    <p>Среднее арифметическое: <?= $avgF === null ? '—' : $avgF ?></p>
    <p>Сумма: <?= $cntNumeric ? round($sum, 3) : '—' ?></p>
</main>

<footer>
    Тип верстки: <?= layoutName($layoutType) ?>.
    Сформировано <?= date('d.m.Y') ?> в <?= date('H:i:s') ?>.
</footer>

</body>
</html>
