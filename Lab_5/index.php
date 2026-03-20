<?php
$title = 'Деген С.В. Группа 241-351 — ЛР 5, таблица умножения';

$htmlType = $_GET['html_type'] ?? null;   // TABLE | DIV | null
$content  = isset($_GET['content']) ? (int)$_GET['content'] : null; // 2..9 или null (всё)


function outNumAsLink($x) {
    // Числа 2..9 — ссылка на таблицу умножения
    if ($x >= 2 && $x <= 9) {
        return '<a href="?content=' . $x . '">' . $x . '</a>';
    }
    return (string)$x;
}


// столбец таблицы умножения
// Строка столбца умножения (2..9 включительно)
function outRow($n) {
    $html = '';
    for ($i = 2; $i <= 9; $i++) {
        $html .= '<tr>'
               . '<td>' . outNumAsLink($n) . '</td>'
               . '<td>×</td>'
               . '<td>' . outNumAsLink($i) . '</td>'
               . '<td>=</td>'
               . '<td>' . outNumAsLink($i * $n) . '</td>'
               . '</tr>';
    }
    return $html;
}

// таблица в блочной форме
function outDivForm($content) {
    $wrapStyle  = 'display:flex; flex-wrap:wrap; gap:10px; padding:10px;';
    $blockStyle = 'border:2px solid green; padding:12px 20px; '
                . 'font-size:18px; font-weight:bold; '
                . 'background:#fff; border-radius:4px;';

    echo '<div style="' . $wrapStyle . '">';

    if ($content === null) {
        // Вся таблица — каждая формула отдельный блок
        for ($n = 2; $n <= 9; $n++) {
            for ($i = 2; $i <= 9; $i++) {
                echo '<div style="' . $blockStyle . '">'
                   . outNumAsLink($n) . ' × ' . outNumAsLink($i)
                   . ' = ' . outNumAsLink($i * $n)
                   . '</div>';
            }
        }
    } else {
        // Один столбец
        $n = (int)$content;
        for ($i = 2; $i <= 9; $i++) {
            echo '<div style="' . $blockStyle . '">'
               . outNumAsLink($n) . ' × ' . outNumAsLink($i)
               . ' = ' . outNumAsLink($i * $n)
               . '</div>';
        }
    }

    echo '</div>';
}

// таблица в табличной форме
function outTableForm($content) {
    $style = 'border-collapse:collapse; margin:10px 5px; display:inline-table; vertical-align:top;';
    $tdStyle = 'border:1px solid #333; padding:6px 10px; text-align:center;';
    $thStyle = 'border:1px solid #333; padding:6px 10px; background:#1a4a2e; color:#fff;';

    if ($content === null) {
        // Вся таблица — 8 колонок (2..9)
        for ($n = 2; $n <= 9; $n++) {
            echo '<table style="' . $style . '">';
            echo '<thead><tr>'
               . '<th style="' . $thStyle . '" colspan="1">× ' . $n . '</th>'
               . '</tr></thead>';
            echo '<tbody>';
            // Подставляем tdStyle в строки
            $rows = '';
            for ($i = 2; $i <= 9; $i++) {
                echo '<tr><td style="' . $tdStyle . '">'
                . outNumAsLink($n) . ' × ' . outNumAsLink($i) . ' = ' . outNumAsLink($i * $n)
                . '</td></tr>';
            }

            echo $rows;
            echo '</tbody></table>';
        }
    } else {
        // Один столбец
        $n = (int)$content;
        echo '<table style="' . $style . '">';
        echo '<thead><tr>'
           . '<th style="' . $thStyle . '" colspan="5">× ' . $n . '</th>'
           . '</tr></thead>';
        echo '<tbody>';
        for ($i = 2; $i <= 9; $i++) {
            echo '<tr>'
            . '<td style="' . $tdStyle . '">'
            . outNumAsLink($n) . ' × ' . outNumAsLink($i) . ' = ' . outNumAsLink($i * $n)
            . '</td>'
            . '</tr>';

        }
        echo '</tbody></table>';
    }
}

// выбор формы
function printTable($htmlType, $content) {
    if (!isset($htmlType) || $htmlType === 'TABLE') {
        outTableForm($content);
    } else {
        outDivForm($content);
    }
}

function footerInfo($htmlType, $content) {
    $typeText = (!isset($htmlType) || $htmlType === 'TABLE') ? 'табличная верстка' : 'блочная верстка';
    $tableText = 'полная таблица умножения';
    if ($content !== null && $content >= 2 && $content <= 9) {
        $tableText = 'таблица умножения на '.$content;
    }
    return [$typeText, $tableText];
}

[$typeText, $tableText] = footerInfo($htmlType, $content);
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
        <div>Динамическое формирование контента и меню. Таблица умножения.</div>
    </div>
</header>

<main>
    <h1>ЛР‑5: Таблица умножения на PHP</h1>

    <!-- Главное меню (тип верстки) -->
    <div id="main_menu">
        <?php
        echo '<a href="?html_type=TABLE';
        if (isset($_GET['content'])) {
            echo '&content='.$content;
        }
        echo '"';
        if (isset($htmlType) && $htmlType === 'TABLE') echo ' class="selected"';
        echo '>Табличная верстка</a>';

        echo ' ';

        echo '<a href="?html_type=DIV';
        if (isset($_GET['content'])) {
            echo '&content='.$content;
        }
        echo '"';
        if (isset($htmlType) && $htmlType === 'DIV') echo ' class="selected"';
        echo '>Блочная верстка</a>';
        ?>
    </div>

    <div class="layout">
        <!-- Основное меню (содержание) -->
        <div id="side_menu">
            <?php
            // Всё — без параметра content
            echo '<a href="';
            if (isset($htmlType)) {
                echo '?html_type='.$htmlType;
            } else {
                echo '?';
            }
            echo '"';
            if (!isset($_GET['content'])) echo ' class="selected"';
            echo '>Всё</a><br>';

            for ($i = 2; $i <= 9; $i++) {
                echo '<a href="?content='.$i;
                if (isset($htmlType)) {
                    echo '&html_type='.$htmlType;
                }
                echo '"';
                if (isset($_GET['content']) && $content === $i) echo ' class="selected"';
                echo '>×'.$i.'</a><br>';
            }
            ?>
        </div>

        <!-- Область содержимого -->
        <div id="content_area">
            <?php printTable($htmlType, $content); ?>
        </div>
    </div>
</main>

<footer>
    Тип верстки: <?= $typeText ?>; 
    <?= $tableText ?>; 
    Сформировано <?= date('d.m.Y') ?> в <?= date('H:i:s') ?>.
</footer>

</body>
</html>
