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
            $query = "SELECT * FROM data_izin_1";
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
            $query = "SELECT * FROM data_izin_2";
            $result = $this->database->query($query);
            
            // Mengembalikan hasil sebagai array asosiatif
            return $this->database->resultSet();
        } catch (\PDOException $e) {
            // Handle kesalahan jika terjadi
            die("Error: " . $e->getMessage());
        }
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
            $query = "INSERT INTO {$this->table1} (tanggal, nama,nim, keperluan, persetujuan2, jam_keluar, jam_masuk) 
                      VALUES (:tanggal, :nama, :nim, :keperluan, 'Menunggu' ,:jam_keluar,:jam_kembali)";
             $this->database->query($query);
             $this->database->bind("tanggal", $izinData["tanggal"]);
             $this->database->bind("nama",$izinData["nama"]);
             $this->database->bind("nim",$izinData["nim"]);
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
            $query = "INSERT INTO {$this->table2} (nama, nim, kelas, tanggal_izin, keperluan, bukti) 
          VALUES (:nama, :nim, :kelas, :tanggal, :keperluan, :bukti)";

            $this->database->query($query);
            $this->database->bind("nama", $izinData["nama"]);
            $this->database->bind("nim", $izinData["nim"]);
            $this->database->bind("kelas", $izinData["kelas"]);
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

}

?>