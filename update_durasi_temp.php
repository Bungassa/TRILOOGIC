<?php
\App\Models\Layanan::whereBetween('id', [6, 12])->update(['durasi' => 30]);
\App\Models\Layanan::where('id', 1)->update(['durasi' => 60]);
\App\Models\Layanan::where('id', 2)->update(['durasi' => 90]);
\App\Models\Layanan::whereIn('id', [3, 4, 5])->update(['durasi' => 45]);
echo "Durasi updated.\n";
