<?php
// cursor by Me4Hik START - Логика калькулятора: результат в переменную, не echo сразу
$display      = null; // строка для экрана (null = первый запуск, экран скрыт)
$display_expr = '';   // выражение вида "3 + 5 ="

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a         = (float) $_POST['num1'];
    $b         = (float) $_POST['num2'];
    $operation = $_POST['operation'];
    $result    = 0;

    switch ($operation) { // зачем то создается пустая коробка куда ложится финальный результат
        case '+':   // какое то условие что если лежит плюсик в оперейшен. то есть там где мы вводим данные
            $result = $a + $b;  //ага во...тут мы складываем числа если вверху компилятор прошел и видит плюсик
            break; //какая то команда из джавы...типа когда остановка все окей дальше не идет.

        case '-':
            $result = $a - $b;
            break;

        case '*':
            $result = $a * $b;
            break;

        case '/':
            $result = ($b != 0) ? $a / $b : 'ERR: DIV/0';   // эту фигню курсор дописал...я хз че это типа функция результат равна функции переменной
            // переменной б которая не равна нулю ! это типа так вроде...в дажве...а тут хз. И потом какой то запрет на деление на ноль...и чет еще...
            break;

        default:
            $result = 'ERR';  //чут не ясное...типа может это для визуала...так как я там новые инпуты написал в хтмл...то нужно вводить такое. 
            break;
    }

    // Красиво форматируем число: убираем лишние нули после запятой
    $display_expr = htmlspecialchars($a . ' ' . $operation . ' ' . $b . ' =');
    $display      = is_numeric($result)
        ? rtrim(rtrim(number_format((float)$result, 8, '.', ''), '0'), '.')
        : $result;
        //ага...тут типа какая то фишка с визуалом...что б оно не рубило числа и было красиво. переменная дислей експ  непонятная хрениь перчисление переменныъ
        //а потом дисплей переменная и куда то отправляется....
}
// cursor by Me4Hik END   







?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор для Сергея</title>
    <!-- cursor by Me4Hik START - Подключение шрифта и внешнего CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- cursor by Me4Hik END -->
</head>
<body>
    <div>
        <h2>&#9881; Калькулятор &#9881;</h2>
        <form method="POST" action="">
            <input type="number" name="num1" placeholder="// Первое число" required>

            <select name="operation">
                <option value="+">[ + ]  Плюс</option>
                <option value="-">[ - ]  Минус</option>
                <option value="*">[ × ]  Умножить</option>
                <option value="/">[ ÷ ]  Разделить</option>
            </select>

            <input type="number" name="num2" placeholder="// Второе число" required>

            <button type="submit">&#9658; Посчитать</button>

            <!-- cursor by Me4Hik START - Экран результата: виден только после расчёта -->
            <?php if ($display !== null): ?>
            <div class="result-screen">
                <span class="result-expr"><?= $display_expr ?></span>
                <span class="result-value"><?= htmlspecialchars($display) ?></span>
            </div>
            <?php endif; ?>
            <!-- cursor by Me4Hik END -->

        </form>
    </div>
</body>
</html>