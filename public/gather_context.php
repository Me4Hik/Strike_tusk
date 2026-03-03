<?php
// cursor by Me4Hik START - Сбор контекста проекта в один файл для передачи нейросети
$root = dirname(__DIR__);
$outFile = __DIR__ . '/project_snapshot.txt';
$skipDirs = ['.git', '.osp', 'node_modules', '.cursor'];
$exts = ['php', 'ini', 'html', 'css', 'js', 'txt'];

$iter = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

$buf = '';
foreach ($iter as $path) {
    if (!$path->isFile()) continue;
    $rel = str_replace('\\', '/', substr($path->getPathname(), strlen($root) + 1));
    $parts = explode('/', $rel);
    if (array_intersect($parts, $skipDirs)) continue;
    if (!in_array(strtolower($path->getExtension()), $exts)) continue;
    $content = @file_get_contents($path->getPathname());
    if ($content === false) continue;
    $buf .= "--- FILE: $rel ---\n" . $content . "\n--- END OF FILE ---\n\n";
}

file_put_contents($outFile, $buf);
// cursor by Me4Hik START - Вывод: в браузере HTML, в консоли — текст
if (php_sapi_name() === 'cli') {
    echo "Готово. Снимок: $outFile\n";
} else {
    echo "<p>Готово. Снимок проекта: <a href=\"project_snapshot.txt\">project_snapshot.txt</a></p>";
}
// cursor by Me4Hik END
