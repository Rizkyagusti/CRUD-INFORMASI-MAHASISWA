<?php

namespace Krispachi\KrisnaLTE\Model;

use Exception;
use Krispachi\KrisnaLTE\App\Database;
use Krispachi\KrisnaLTE\App\FlashMessage;

class KelasModel {
    private $table = "kelas";
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllKelas()
    {
        try {
            $query = "SELECT * FROM kelas";
            $result = $this->database->query($query);
            
            // Mengembalikan hasil sebagai array asosiatif
            return $this->database->resultSet();
        } catch (\PDOException $e) {
            // Handle kesalahan jika terjadi
            die("Error: " . $e->getMessage());
        }
    }
    public function getKelasByJurusanId($idJurusan) {
        try {
            $query = "SELECT * FROM {$this->table} WHERE id_jurusan = :idJurusan ORDER BY id_jurusan";
            $this->database->query($query);
            $this->database->bind(':idJurusan', $idJurusan);
            
            return $this->database->resultSet();
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getKelasById($id) {
        $this->database->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->database->bind("id", $id);
        return $this->database->single();
    }

    public function getKelasByNama($nama) {
        $query = "SELECT * FROM {$this->table} WHERE kelas = :nama";
        $this->database->query($query);

        $this->database->bind("nama", "$nama");

        return $this->database->resultSet();
    }


    public function tambahKelas($datakelas)
    {
        try {
            // Periksa apakah kelas sudah ada
            $cekQuery = "SELECT COUNT(*) as total FROM {$this->table} WHERE id_jurusan = :idJurusan AND kelas = :kelas";
            $this->database->query($cekQuery);
            $this->database->bind(':idJurusan', $datakelas["id_jurusan"]);
            $this->database->bind(':kelas', $datakelas["nama"]);
            $result = $this->database->single(); // Menggunakan single() karena kita hanya membutuhkan satu nilai (total)

            // Jika kelas sudah ada, kembalikan pesan atau nilai khusus
            if ($result['total'] > 0) {
                FlashMessage::setFlashMessage("error", "Kelas sudah ada");
                return false;
        }

            $query = "INSERT INTO {$this->table} (id_jurusan, kelas) VALUES (:idJurusan, :kelas)";
            $this->database->query($query);
            $this->database->bind(':idJurusan',$datakelas["id_jurusan"] );
            $this->database->bind(':kelas', $datakelas["nama"]);
            $this->database->execute();
            return true;
        }catch (Exception $exception) {
            throw $exception;
        }
    }

    public function hapusKelas($dataKelas)
    {
        try {
            // Query untuk menghapus kelas berdasarkan ID
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $this->database->query($query);
            $this->database->bind(':id', $dataKelas["id_kelas"]);
            $this->database->execute();
            
            // Tambahkan kondisi tambahan jika diperlukan

            return true;
        } catch (\Exception $exception) {
            // Tangani kesalahan jika terjadi
            throw $exception;
        }
    }

    public function updateKelas($data) {
        // Cek ada atau tidak di database
        if(empty($this->getKelasById($data["id_kelas"]))) {
            throw new Exception("Kelas tidak ditemukan");
        }

        // Cek apakah ada nama itu? atau apakah namanya sama dengan sebelumnya
        $result = $this->getKelasByNama($data["kelas"]);
        if(!empty($result)) {
            // Cek apakah nama dari database = nama dari data
            if($result[0]["id"] != $data["id"]) {
                throw new Exception("Nama Kelas sudah tersedia");
            }
        }
        
        try {
            $this->database->beginTransaction();
            
                      

            // Update di jurusans
            $query = "UPDATE {$this->table} SET kelas = :nama WHERE id = :id";
            $this->database->query($query);
            $this->database->bind("nama", $data["kelas"]);
            $this->database->bind("id", $data["id_kelas"]);
            $this->database->execute();

            $this->database->commit();
        } catch (Exception $exception) {
            $this->database->rollback();
            throw $exception;
        }
    }


   
    
}
