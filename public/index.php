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
        </form>
    </div>
</body>
</html>