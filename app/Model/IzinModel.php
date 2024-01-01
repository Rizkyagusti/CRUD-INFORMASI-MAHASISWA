<?php

namespace Krispachi\KrisnaLTE\Model;

use Exception;
use Krispachi\KrisnaLTE\App\Database;

class IzinModel{
    private $table1 = "data_izin_1";
    private $table2 = "data_izin_2";
    private $database;

    public function __construct() {
        $this->database = new Database();
    }



    public function getAllIzin1()
    {
        try {
            $query = "SELECT * FROM data_izin_1 ORDER BY tanggal DESC";
            $result = $this->database->query($query);
            
            // Mengembalikan hasil sebagai array asosiatif
            return $this->database->resultSet();
        } catch (\PDOException $e) {
            // Handle kesalahan jika terjadi
            die("Error: " . $e->getMessage());
        }
    }

    public function getAllIzin2()
    {
        try {
            $query = "SELECT * FROM data_izin_2 ORDER BY tanggal DESC";
            $result = $this->database->query($query);
            
            // Mengembalikan hasil sebagai array asosiatif
            return $this->database->resultSet();
        } catch (\PDOException $e) {
            // Handle kesalahan jika terjadi
            die("Error: " . $e->getMessage());
        }
    }

    public function getIzin1ByNim($nim)
    {
        $query = "SELECT * FROM {$this->table1} WHERE nim = :nim ORDER BY tanggal DESC" ;
        $this->database->query($query);
        $this->database->bind("nim", $nim);

        return $this->database->resultSet();
    }
    public function getIzin1ById($id)
    {
        $query = "SELECT * FROM {$this->table1} WHERE id = :id " ;
        $this->database->query($query);
        $this->database->bind("id", $id);

        return $this->database->resultSet();
    }
    public function getIzin2ById($id)
    {
        $query = "SELECT * FROM {$this->table2} WHERE id = :id " ;
        $this->database->query($query);
        $this->database->bind("id", $id);

        return $this->database->resultSet();
    }

    public function getIzin2ByNim($nim)
    {
        $query = "SELECT * FROM {$this->table2} WHERE nim = :nim ORDER BY tanggal DESC";
        $this->database->query($query);
        $this->database->bind("nim", $nim);

        return $this->database->resultSet();
    }

   

    public function processApproval($izinId, $approvalStatus)
    {
        try {
            // Lakukan validasi atau pengecekan keamanan jika diperlukan

            // Lakukan update status persetujuan sesuai dengan izinId
            $query = "UPDATE data_izin_1 SET persetujuan2 = :approvalStatus WHERE id = :izinId";
            $this->database->query($query);
            $this->database->bind("approvalStatus",$approvalStatus);
            $this->database->bind("izinId",$izinId);
            $this->database->execute();

            return true; // Berhasil memproses persetujuan
        } catch (\PDOException $e) {
            // Tangani kesalahan jika terjadi
            die("Error: " . $e->getMessage());
            return false; // Gagal memproses persetujuan
        }
    }
    public function processApproval2($izinId, $approvalStatus)
    {
        try {
            // Lakukan validasi atau pengecekan keamanan jika diperlukan

            // Lakukan update status persetujuan sesuai dengan izinId
            $query = "UPDATE data_izin_2 SET persetujuan2 = :approvalStatus WHERE id = :izinId";
            $this->database->query($query);
            $this->database->bind("approvalStatus",$approvalStatus);
            $this->database->bind("izinId",$izinId);
            $this->database->execute();

            return true; // Berhasil memproses persetujuan
        } catch (\PDOException $e) {
            // Tangani kesalahan jika terjadi
            die("Error: " . $e->getMessage());
            return false; // Gagal memproses persetujuan
        }
    }

    public function createIzin($izinData)
    {
        try {
            // Lakukan validasi atau pengecekan keamanan jika diperlukan

            // Lakukan insert data izin ke dalam database
            $query = "INSERT INTO {$this->table1} (tanggal, nama,nim,kelas,jurusan, keperluan, persetujuan2, jam_keluar, jam_masuk) 
                      VALUES (:tanggal, :nama, :nim,:kelas,:jurusan, :keperluan, 'Menunggu' ,:jam_keluar,:jam_kembali)";
             $this->database->query($query);
             $this->database->bind("tanggal", $izinData["tanggal"]);
             $this->database->bind("nama",$izinData["nama"]);
             $this->database->bind("nim",$izinData["nim"]);
             $this->database->bind("kelas",$izinData["kelas"]);
             $this->database->bind("jurusan",$izinData["jurusan"]);
             $this->database->bind("keperluan",$izinData["keperluan"]);
             $this->database->bind("jam_keluar",$izinData["jam_keluar"]);
             $this->database->bind("jam_kembali",$izinData["jam_kembali"]);
             $this->database->execute();

            return true; // Berhasil menambahkan data izin
        } catch (\PDOException $e) {
            // Tangani kesalahan jika terjadi
            die("Error: " . $e->getMessage());
            return false; // Gagal menambahkan data izin
        }
    }

    public function createIzin2($izinData)
    {
        try {
            // Lakukan validasi atau pengecekan keamanan jika diperlukan

            // Lakukan insert data izin ke dalam database
            $query = "INSERT INTO {$this->table2} (nama, nim, kelas,jurusan, tanggal_izin, keperluan, bukti) 
          VALUES (:nama, :nim, :kelas,:jurusan, :tanggal, :keperluan, :bukti)";

            $this->database->query($query);
            $this->database->bind("nama", $izinData["nama"]);
            $this->database->bind("nim", $izinData["nim"]);
            $this->database->bind("kelas", $izinData["kelas"]);
            $this->database->bind("jurusan", $izinData["jurusan"]);
            $this->database->bind("tanggal", $izinData["tanggal"]);
            $this->database->bind("keperluan", $izinData["keperluan"]);
            $this->database->bind("bukti", $izinData["bukti"]);
            $this->database->execute();
  

            return true; // Berhasil menambahkan data izin
        } catch (\PDOException $e) {
            // Tangani kesalahan jika terjadi
            die("Error: " . $e->getMessage());
            return false; // Gagal menambahkan data izin
        }
    }

    public function getJumlahIzinByJurusan($jurusan)
    {
        $query = "SELECT COUNT(*) as jumlah FROM {$this->table2} WHERE jurusan = :jurusan";
        $this->database->query($query);
        $this->database->bind("jurusan", $jurusan);

        $result = $this->database->single();

        return $result['jumlah'];
    }

    public function updateIzin($data)  {
        $query = "UPDATE {$this->table1} SET nama = :nama, nim = :nim, kelas = :kelas, jurusan = :jurusan, keperluan = :keperluan, jam_keluar = :jam_keluar, jam_masuk = :jam_masuk WHERE id = :id";
        $this->database->query($query);

        $this->database->bind("nama", $data["nama"]);
        $this->database->bind("nim", $data["nim"]);
        $this->database->bind("id", $data["id"]);
        $this->database->bind("kelas", $data["kelas"]);
        $this->database->bind("jurusan", $data["jurusan"]);
        $this->database->bind("keperluan", $data["keperluan"]);
        $this->database->bind("jam_keluar", $data["jam_keluar"]);
        $this->database->bind("jam_masuk", $data["jam_masuk"]);

        $this->database->execute();
    }
    public function updateIzin2($data)  {
        $query = "UPDATE {$this->table2} SET nama = :nama, nim = :nim, kelas = :kelas, jurusan = :jurusan, keperluan = :keperluan, tanggal_izin = :tanggal_izin, bukti = :bukti WHERE id = :id";
        $this->database->query($query);

        $this->database->bind("nama", $data["nama"]);
        $this->database->bind("nim", $data["nim"]);
        $this->database->bind("id", $data["id"]);
        $this->database->bind("kelas", $data["kelas"]);
        $this->database->bind("jurusan", $data["jurusan"]);
        $this->database->bind("keperluan", $data["keperluan"]);
        $this->database->bind("tanggal_izin", $data["tanggal_izin"]);
        $this->database->bind("bukti", $data["bukti"]);

        $this->database->execute();
    }

    public function deleteIzin($id)
    {
        // Cek ada atau tidak di database
        if (empty($this->getIzin1ById($id))) {
            throw new Exception("Izin tidak ditemukan");
        }

        $query = "DELETE FROM {$this->table1} WHERE id = :id";
        $this->database->query($query);

        $this->database->bind("id", $id);

        $this->database->execute();
    }
    public function deleteIzin2($id)
    {
        // Cek ada atau tidak di database
        if (empty($this->getIzin2ById($id))) {
            throw new Exception("Izin tidak ditemukan");
        }

        $query = "DELETE FROM {$this->table2} WHERE id = :id";
        $this->database->query($query);

        $this->database->bind("id", $id);

        $this->database->execute();
    }

    

}

?>