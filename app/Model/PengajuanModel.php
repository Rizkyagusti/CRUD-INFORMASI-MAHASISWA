<?php

namespace Krispachi\KrisnaLTE\Model;

use Exception;
use Krispachi\KrisnaLTE\App\Database;

class PengajuanModel
{
    private $table = "mahasiswa_pengajuan_1";
    private $table2 = "mahasiswa_pengajuan_2";
    private $tableasli = "mahasiswa_kampus";
    private $tableasli2 = "mahasiswa_pribadi";
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getAllMahasiswa()
    {
        $this->database->query("SELECT * FROM {$this->table}");
        return $this->database->resultSet();
    }

    public function getMahasiswaById($id)
    {

        $this->database->query("SELECT * FROM {$this->table} WHERE id_mahasiswa = :id_mahasiswa");
        $this->database->bind("id_mahasiswa", $id);
        return $this->database->single();
    }


    public function createMahasiswa($data, $dataPribadi)
    {
        // Validate if NIM is already taken
        // $result = $this->getMahasiswaByNim($data["nim"]);
        // if (!empty($result)) {
        //     throw new Exception("NIM sudah tersedia");
        // }

        // Insert into mahasiswa_kampus table
        $queryKampus = "INSERT INTO {$this->table} (nim, nama, jenis_kelamin, jurusan, kelas, asal_sekolah, tahun_ajaran, no_hp, email) 
                        VALUES (:nim, :nama, :gender, :id_jurusan, :kelas, :asal_sekolah, :tahun_ajaran, :telepon, :email)";
        $this->database->query($queryKampus);
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

        // Get the last inserted ID from mahasiswa_kampus table
        $mahasiswaId = $this->database->getConnection()->lastInsertId();

        // Insert into mahasiswa_pribadi table
        $queryPribadi = "INSERT INTO {$this->table2} (id_mahasiswa, nama, agama, nik, nama_ibu_kandung, npwp, no_bpjs, alamat, golongan_darah) 
                          VALUES (:mahasiswa_id, :nama, :agama, :nik, :nama_ibu_kandung, :npwp, :no_bpjs, :alamat, :golongan_darah)";
        $this->database->query($queryPribadi);
        $this->database->bind("mahasiswa_id", $mahasiswaId);
        $this->database->bind("nama", $dataPribadi["nama"]);
        $this->database->bind("agama", $dataPribadi["agama"]);
        $this->database->bind("nik", $dataPribadi["nik"]);
        $this->database->bind("nama_ibu_kandung", $dataPribadi["nama_ibu_kandung"]);
        $this->database->bind("npwp", $dataPribadi["npwp"]);
        $this->database->bind("no_bpjs", $dataPribadi["no_bpjs"]);
        $this->database->bind("alamat", $dataPribadi["alamat"]);
        $this->database->bind("golongan_darah", $dataPribadi["golongan_darah"]);
        $this->database->execute();
    }



    public function deleteMahasiswa($id)
    {
        // Pastikan ada di database
        $mahasiswa = $this->getMahasiswaById($id);

        if (empty($mahasiswa)) {
            throw new Exception("Mahasiswa tidak ditemukan");
        }

        try {
            // Hapus data dari mahasiswa_pribadi terlebih dahulu
            $this->deleteMahasiswaPribadi($id);

            // Setelah itu, hapus data dari mahasiswa_kampus
            $query = "DELETE FROM {$this->table} WHERE id_mahasiswa = :id";
            $this->database->query($query);
            $this->database->bind("id", $id);
            $this->database->execute();
        } catch (Exception $exception) {
            throw new Exception("Gagal menghapus mahasiswa: " . $exception->getMessage());
        }
    }

    // Tambahkan metode berikut untuk menghapus data dari mahasiswa_pribadi
    private function deleteMahasiswaPribadi($id)
    {
        $query = "DELETE FROM {$this->table2} WHERE id_mahasiswa = :id";
        $this->database->query($query);
        $this->database->bind("id", $id);
        $this->database->execute();
    }


    // Tambahkan metode berikut untuk menghapus data dari mahasiswa_pribadi



    public function updateMahasiswa($data)
    {
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

        // Update mahasiswa_kampus table
        $queryKampus = "UPDATE {$this->table} SET nim = :nim, nama = :nama, jenis_kelamin = :gender, jurusan = :id_jurusan, kelas = :kelas, asal_sekolah = :asal_sekolah, tahun_ajaran = :tahun_ajaran, no_hp = :telepon, email = :email WHERE id_mahasiswa = :id_mahasiswa";
        $this->database->query($queryKampus);
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
    public function updateMahasiswa2($dataPribadi)
    {
        // Cek ada atau tidak di database
        if (empty($this->getMahasiswaById($dataPribadi["id_mahasiswa"]))) {
            throw new Exception("Mahasiswa tidak ditemukan");
        }

        // Cek apakah ada nim itu? atau apakah nimnya sama dengan sebelumnya
        $result = $this->getMahasiswaByNim($dataPribadi["nim"]);
        if (!empty($result)) {
            // Cek apakah nim dari database = nim dari data
            if ($result[0]["id_mahasiswa"] != $dataPribadi["id_mahasiswa"]) {
                throw new Exception("NIM sudah tersedia");
            }
        }

        // Update mahasiswa_kampus table
        // $queryKampus = "UPDATE {$this->table} SET nim = :nim, nama = :nama, jenis_kelamin = :gender, jurusan = :id_jurusan, kelas = :kelas, asal_sekolah = :asal_sekolah, tahun_ajaran = :tahun_ajaran, no_hp = :telepon, email = :email WHERE id_mahasiswa = :id_mahasiswa";
        // $this->database->query($queryKampus);
        // $this->database->bind("nim", $data["nim"]);
        // $this->database->bind("nama", $data["nama"]);
        // $this->database->bind("gender", $data["gender"]);
        // $this->database->bind("id_jurusan", $data["id_jurusan"]);
        // $this->database->bind("asal_sekolah", $data["asal_sekolah"]);
        // $this->database->bind("kelas", $data["kelas"]);
        // $this->database->bind("tahun_ajaran", $data["tahun_ajaran"]);
        // $this->database->bind("telepon", $data["no_hp"]);
        // $this->database->bind("email", $data["email"]);
        // $this->database->bind("id_mahasiswa", $data["id_mahasiswa"]);
        // $this->database->execute();

        // Update mahasiswa_pribadi table
        $queryPribadi = "UPDATE {$this->table2} SET nama = :nama_pribadi, agama = :agama, nik = :nik, nama_ibu_kandung = :nama_ibu_kandung, npwp = :npwp, no_bpjs = :no_bpjs, alamat = :alamat, golongan_darah = :golongan_darah WHERE id_mahasiswa = :id_mahasiswa";
        $this->database->query($queryPribadi);
        $this->database->bind("nama_pribadi", $dataPribadi["nama_pribadi"]);
        $this->database->bind("agama", $dataPribadi["agama"]);
        $this->database->bind("nik", $dataPribadi["nik"]);
        $this->database->bind("nama_ibu_kandung", $dataPribadi["nama_ibu_kandung"]);
        $this->database->bind("npwp", $dataPribadi["npwp"]);
        $this->database->bind("no_bpjs", $dataPribadi["no_bpjs"]);
        $this->database->bind("alamat", $dataPribadi["alamat"]);
        $this->database->bind("golongan_darah", $dataPribadi["golongan_darah"]);
        $this->database->bind("id_mahasiswa", $dataPribadi["id_mahasiswa"]);
        $this->database->execute();
    }


    public function getMahasiswaByNim($nim)
    {
        $query = "SELECT * FROM {$this->table} WHERE nim = :nim";
        $this->database->query($query);
        $this->database->bind("nim", $nim);

        return $this->database->resultSet();
    }


    public function getJumlahMahasiswaByKelas($idKelas)
    {
        $query = "SELECT COUNT(*) as jumlah FROM {$this->table} WHERE kelas = :id_kelas";
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

    public function getMahasiswaPribadiById($idMahasiswa)
    {
        try {
            $query = "SELECT * FROM {$this->table2} WHERE id_mahasiswa = :id_mahasiswa";
            $this->database->query($query);
            $this->database->bind(':id_mahasiswa', $idMahasiswa);

            return $this->database->single();
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getJumlahMahasiswaPriaByJurusan($kelas)
    {
        $query = "SELECT COUNT(*) as jumlah FROM {$this->table} WHERE jenis_kelamin = 'Pria' AND kelas = :kelas";
        $this->database->query($query);
        $this->database->bind("kelas", $kelas);

        $result = $this->database->single();

        return $result['jumlah'];
    }

    public function getJumlahMahasiswaWanitaByJurusan($kelas)
    {
        $query = "SELECT COUNT(*) as jumlah FROM {$this->table} WHERE jenis_kelamin = 'Wanita' AND kelas = :kelas";
        $this->database->query($query);
        $this->database->bind("kelas", $kelas);

        $result = $this->database->single();

        return $result['jumlah'];
    }

    public function approveDataToDatabase($data,$data2)
    {   
        // var_dump($data['id_mahasiswa']);
        //     die;
        // Lakukan penyimpanan data ke dalam tabel
        // Sesuaikan query ini sesuai dengan struktur tabel Anda
        $query = "INSERT INTO {$this->tableasli} (nim, nama, jenis_kelamin, jurusan, kelas, asal_sekolah, tahun_ajaran, no_hp, email) VALUES (:nim, :nama, :jenis_kelamin, :jurusan, :kelas, :asal_sekolah, :tahun_ajaran, :no_hp, :email)";

        $query2 = "INSERT INTO {$this->tableasli2} (nama, agama, nik, nama_ibu_kandung, npwp, no_bpjs, alamat, golongan_darah) VALUES (:nama, :agama, :nik, :nama_ibu_kandung, :npwp, :no_bpjs, :alamat, :golongan_darah)";
        
        // Gunakan parameterized query untuk menghindari SQL injection
        $this->database->query($query);
        $this->database->bind("nim", $data['nim']);
        $this->database->bind("nama", $data['nama']);
        $this->database->bind("jenis_kelamin", $data['jenis_kelamin']);
        $this->database->bind("jurusan", $data['jurusan']);
        $this->database->bind("kelas", $data['kelas']);
        $this->database->bind("asal_sekolah", $data['asal_sekolah']);
        $this->database->bind("tahun_ajaran", $data['tahun_ajaran']);
        $this->database->bind("no_hp", $data['no_hp']);
        $this->database->bind("email", $data['email']);
        $this->database->execute();
        
        // Gunakan parameterized query untuk menghindari SQL injection
        $this->database->query($query2);
        $this->database->bind("nama", $data2['nama']);
        $this->database->bind("agama", $data2['agama']);
        $this->database->bind("nik", $data2['nik']);
        $this->database->bind("nama_ibu_kandung", $data2['nama_ibu_kandung']);
        $this->database->bind("npwp", $data2['npwp']);
        $this->database->bind("no_bpjs", $data2['no_bpjs']);
        $this->database->bind("alamat", $data2['alamat']);
        $this->database->bind("golongan_darah", $data2['golongan_darah']);
        $this->database->execute();


        $this->deleteMahasiswa($data['id_mahasiswa']);
        $this->deleteMahasiswaPribadi($data['id_mahasiswa']);
        
    }



}