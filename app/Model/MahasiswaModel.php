<?php

namespace Krispachi\KrisnaLTE\Model;

use Exception;
use Krispachi\KrisnaLTE\App\Database;

class MahasiswaModel {
    private $table = "mahasiswa_kampus";
    private $table2 = "mahasiswa_pribadi";
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllMahasiswa() {
        $this->database->query("SELECT * FROM {$this->table}");
        return $this->database->resultSet();
    }

    public function getMahasiswaById($id) {
        
        $this->database->query("SELECT * FROM {$this->table} WHERE id_mahasiswa = :id_mahasiswa");
        $this->database->bind("id_mahasiswa", $id);
        return $this->database->single();
    }
    

    public function createMahasiswa($data) {
        $result = $this->getMahasiswaByNim($data["nim"]);
        if(!empty($result)) {
            throw new Exception("NIM sudah tersedia");
        }
        
        $query = "INSERT INTO {$this->table} ( nim, nama,jenis_kelamin,jurusan,kelas,  asal_sekolah,tahun_ajaran,  no_hp, email) VALUES( :nim, :nama,:gender,:id_jurusan,:kelas,:asal_sekolah,:tahun_ajaran,:telepon,:email)";
        $this->database->query($query);

        $this->database->bind("nim", $data["nim"]);
        $this->database->bind("nama", $data["nama"]);
        $this->database->bind("gender", $data["gender"]);
        $this->database->bind("email", $data["email"]);
        $this->database->bind("telepon", $data["no_hp"]);
        $this->database->bind("id_jurusan", $data["id_jurusan"]);
        $this->database->bind("asal_sekolah", $data["asal_sekolah"]);
        $this->database->bind("kelas", $data["kelas"]);
        $this->database->bind("tahun_ajaran", $data["tahun_ajaran"]);
        $this->database->execute();
    }

    public function deleteMahasiswa($id) {
        // Cek ada atau tidak di database
        if(empty($this->getMahasiswaById($id))) {
            throw new Exception("Mahasiswa tidak ditemukan");
        }
        
        $query = "DELETE FROM {$this->table} WHERE id_mahasiswa = :id";
        $this->database->query($query);

        $this->database->bind("id", $id);

        $this->database->execute();
    }

    public function updateMahasiswa($data) {
      
        // Cek ada atau tidak di database
        if (empty($this->getMahasiswaById($data["id_mahasiswa"]))) {
            throw new Exception("Mahasiswa tidak ditemukan");
        }
    
        // Cek apakah ada nim itu? atau apakah nimnya sama dengan sebelumnya
        $result = $this->getMahasiswaByNim($data["nim"]);
        if (!empty($result)) {
            // Cek apakah nim dari database = nim dari data
            if ($result[0]["id_mahasiswa"] != $data["id_mahasiswa"]) {
                throw new Exception("NIM sudah tersedia");
            }
        }
    
        $query = "UPDATE {$this->table} SET nim = :nim, nama = :nama, jenis_kelamin = :gender, jurusan = :id_jurusan, kelas = :kelas, asal_sekolah = :asal_sekolah, tahun_ajaran = :tahun_ajaran, no_hp = :telepon, email = :email WHERE id_mahasiswa = :id_mahasiswa";
        $this->database->query($query);
    
        $this->database->bind("nim", $data["nim"]);
        $this->database->bind("nama", $data["nama"]);
        $this->database->bind("gender", $data["gender"]);
        $this->database->bind("id_jurusan", $data["id_jurusan"]);
        $this->database->bind("asal_sekolah", $data["asal_sekolah"]);
        $this->database->bind("kelas", $data["kelas"]);
        $this->database->bind("tahun_ajaran", $data["tahun_ajaran"]);
        $this->database->bind("telepon", $data["no_hp"]);
        $this->database->bind("email", $data["email"]);
        $this->database->bind("id_mahasiswa", $data["id_mahasiswa"]);
    
        $this->database->execute();
    }
    

    public function getMahasiswaByNim($nim) {
        $query = "SELECT * FROM {$this->table} WHERE nim = :nim";
        $this->database->query($query);
        $this->database->bind("nim", $nim); 
    
        return $this->database->resultSet();
    }
    

    public function getJumlahMahasiswaByKelas($idKelas) {
        $query = "SELECT COUNT(*) as jumlah FROM {$this->table} WHERE id_jurusan = :id_kelas";
        $this->database->query($query);
    
        $this->database->bind("id_kelas", $idKelas);
    
        $result = $this->database->single();
    
        return $result['jumlah'];
    }


    public function getAllMahasiswaPribadi()
    {
        $this->database->query("SELECT * FROM {$this->table2}");
        return $this->database->resultSet();
    }
    
    
}