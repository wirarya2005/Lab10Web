<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    /**
     * Program sederhana pendefinisian class dan pemanggilan class.
     **/
    class Mobil
    {
        private $warna;
        private $merk;
        private $harga;
        public function __construct()
        {
            $this->warna = "Biru";
            $this->merk = "BMW";
            $this->harga = "10000000";
        }
        public function gantiWarna($warnaBaru)
        {
            $this->warna = $warnaBaru;
        }
        public function tampilWarna()
        {
            echo "Warna mobilnya : " . $this->warna;
        }
    }
    // membuat objek mobil
    $a = new Mobil();
    $b = new Mobil();
    // memanggil objek
    echo "<b>Mobil pertama</b><br>";
    $a->tampilWarna();
    echo "<br>Mobil pertama ganti warna<br>";
    $a->gantiWarna("Merah");
    $a->tampilWarna();
    // memanggil objek
    echo "<br><b>Mobil kedua</b><br>";
    $b->gantiWarna("Hijau");
    $b->tampilWarna();
    ?>
</body>

</html>