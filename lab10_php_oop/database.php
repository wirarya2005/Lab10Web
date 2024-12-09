<!-- <?php
class Database {
    private $host = 'localhost';
    private $dbName = 'latihan1';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Koneksi ke database
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }
    }

    // Menambah barang ke dalam database
    public function addBarang($nama, $kategori, $harga_jual, $harga_beli, $stok, $gambar) {
        $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) 
                VALUES (:nama, :kategori, :harga_jual, :harga_beli, :stok, :gambar)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':harga_jual', $harga_jual);
        $stmt->bindParam(':harga_beli', $harga_beli);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':gambar', $gambar);
        $stmt->execute();
    }

    // Mengambil semua barang dari database
    public function getAllBarang() {
        $sql = "SELECT * FROM data_barang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mengupload gambar
    public static function uploadGambar($file) {
        // Pastikan folder gambar ada dan dapat diakses
        $folderPath = dirname(__FILE__) . '/gambar/';
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);  // Membuat folder gambar jika tidak ada
        }

        // Mengganti spasi pada nama file
        $filename = str_replace(' ', '_', $file['name']);
        $destination = $folderPath . $filename;

        // Pastikan file berhasil dipindahkan
        if ($file['error'] == 0 && move_uploaded_file($file['tmp_name'], $destination)) {
            return $filename;
        }
        return null;
    }
}
?> -->
