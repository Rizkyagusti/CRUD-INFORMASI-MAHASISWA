<?php

namespace Krispachi\KrisnaLTE\Model;

use Exception;
use Krispachi\KrisnaLTE\App\Database;

class BeritaModel{
    private $table = "berita";
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getAllBerita()
    {
        $this->database->query("SELECT * FROM {$this->table}");
        return $this->database->resultSet();
    }

    public function getBeritaById($id)
    {
        $this->database->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->database->bind("id", $id);
        return $this->database->single();
    }

    
    public function deleteBerita($id)
    {
        // Cek ada atau tidak di database
        if (empty($this->getBeritaById($id))) {
            throw new Exception("Berita tidak ditemukan");
        }

        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $this->database->query($query);

        $this->database->bind("id", $id);

        $this->database->execute();
    }

    public function updateBerita($data)
    {
        // Cek ada atau tidak di database
        if (empty($this->getBeritaById($data["id"]))) {
            throw new Exception("Berita tidak ditemukan");
        }
               

        $query = "UPDATE {$this->table} SET gambar = :gambar, headline = :headline, deskripsi = :deskripsi WHERE id = :id";
        $this->database->query($query);

        $this->database->bind("gambar", $data["gambar"]);
        $this->database->bind("headline", $data["headline"]);
        $this->database->bind("id", $data["id"]);
        $this->database->bind("deskripsi", $data["deskripsi"]);
        

        $this->database->execute();
    }
}