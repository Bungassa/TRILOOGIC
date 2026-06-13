<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$updates = [
    1 => 60,
    2 => 90,
    3 => 75,
    4 => 80,
    5 => 105,
    6 => 30,
    7 => 30,
    8 => 30,
    9 => 30,
    10 => 15,
    11 => 15,
];

foreach ($updates as $id => $durasi) {
    \App\Models\Layanan::where('id', $id)->update(['durasi' => $durasi]);
}
echo "Durasi updated.\n";
