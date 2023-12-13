<?php

namespace Krispachi\KrisnaLTE\Model;

use Exception;
use Krispachi\KrisnaLTE\App\Database;

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
}
