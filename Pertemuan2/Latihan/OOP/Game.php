<?php
require_once 'produk.php';
require_once 'Komik.php';

class Game extends produk
{
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;

    }

    public function getInfoproduk()
    {
        $str = "game : " . parent::getLabel() . " | (RP. " . $this->harga . ") - {$this->waktuMain} jam. ";
        return $str;
    }
}

$produk1 = new Game("The Witcher 3", "CD projek red", "CD project", 30000, 100);
$produk2 = new komik("Naruto", "Masahi kimoto", "shonen jump", 20000, 350);

echo $produk1->getInfoproduk();
echo "<br>";
echo $produk2->getInfoproduk();
