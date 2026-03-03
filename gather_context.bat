@echo off
REM cursor by Me4Hik START - Запуск сбора контекста через PHP OSPanel
set "PHP_EXE=C:\OSPanel\modules\php\PHP-8.2\php.exe"
if not exist "%PHP_EXE%" set "PHP_EXE=C:\OSPanel\modules\php\php.exe"
if not exist "%PHP_EXE%" (
    echo PHP не найден. Укажите путь к php.exe в этом .bat файле.
    pause
    exit /b 1
)
cd /d "%~dp0"
"%PHP_EXE%" public\gather_context.php
echo.
pause
REM cursor by Me4Hik END
