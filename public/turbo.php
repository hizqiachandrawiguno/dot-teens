<?php
// Tentukan lokasi folder cache
$cache_path = __DIR__ . '/bootstrap/cache/';

// Hapus semua file PHP di dalam folder cache tersebut
$files = glob($cache_path . '*.php');
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
    }
}

echo "<h1>BOOM! 💥</h1>";
echo "<p>Semua cache bandel sudah dibumihanguskan secara paksa!</p>";
echo "<p>Website dotsawangan.com sekarang sudah di-reset ingatannya dan harusnya lebih enteng. 🚀</p>";
?>