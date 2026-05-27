<?php
$target = __DIR__ . '/../storage/app/public';
$shortcut = __DIR__ . '/storage';

if (file_exists($shortcut)) {
    echo "Symlink sudah ada.";
} else {
    symlink($target, $shortcut);
    echo "Symlink berhasil dibuat.";
}
