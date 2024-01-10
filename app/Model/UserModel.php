<?php

namespace Krispachi\KrisnaLTE\Model;

use Exception;
use Krispachi\KrisnaLTE\App\Database;

class UserModel
{
    private $table = "users";
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getAllUser()
    {
        $this->database->query("SELECT * FROM {$this->table}");
        return $this->database->resultSet();
    }

    public function getUserById($id)
    {
        $this->database->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->database->bind("id", $id);
        return $this->database->single();
    }

    public function getRoleUserById($id)
    {
        $this->database->query("SELECT role FROM {$this->table} WHERE id = :id");
        $this->database->bind("id", $id);
        return $this->database->single();
    }

    public function createUser($data)
    {
        $result = $this->getUserByUsername($data["username"]);
        if (!empty($result)) {
            throw new Exception("Username sudah tersedia");
        }

        $query = "INSERT INTO {$this->table} VALUES('', :username, :email, :password, null,:gambar)";
        $this->database->query($query);

        $this->database->bind("username", $data["username"]);
        $this->database->bind("email", $data["email"]);
        $this->database->bind("gambar", $data["gambar"]);
        $this->database->bind("password", password_hash($data["password"], PASSWORD_DEFAULT));

        $this->database->execute();
    }

    public function deleteUser($id)
    {
        // Cek ada atau tidak di database
        if (empty($this->getUserById($id))) {
            throw new Exception("User tidak ditemukan");
        }

        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $this->database->query($query);

        $this->database->bind("id", $id);

        $this->database->execute();
    }

    public function updateUser($data)
    {
        // Cek ada atau tidak di database
        if (empty($this->getUserById($data["id"]))) {
            throw new Exception("User tidak ditemukan");
        }

        // Cek apakah ada username itu? atau apakah usernamnya sama dengan sebelumnya
        $result = $this->getUserByUsername($data["username"]);
        if (!empty($result)) {
            // Cek apakah username dari database = username dari data
            if ($result[0]["id"] != $data["id"]) {
                throw new Exception("Username sudah tersedia");
            }
        }

        $query = "UPDATE {$this->table} SET username = :username, email = :email WHERE id = :id";
        $this->database->query($query);

        $this->database->bind("username", $data["username"]);
        $this->database->bind("email", $data["email"]);
        $this->database->bind("id", $data["id"]);

        $this->database->execute();
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM {$this->table} WHERE username = :username";
        $this->database->query($query);

        $this->database->bind("username", "$username");

        return $this->database->resultSet();
    }

    public function addUser($data)
    {
        $result = $this->getUserByUsername($data["username"]);
        if (!empty($result)) {
            throw new Exception("Username sudah tersedia");
        }

        $this->database->query("INSERT INTO {$this->table} (username, email, password, role, gambar) VALUES (:username, :email, :password, null , null)");
        $this->database->bind(':username', $data['username']);
        $this->database->bind(':email', $data['email']);
        $this->database->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));

        return $this->database->execute();
    }

    public function authUser($username, $password)
    {
        $users = $this->getUserByUsername($username);
        foreach ($users as $user) {
            if (password_verify($password, $user["password"])) {
                return $user;
                break;
            }
            return [];
        }
    }

    public function gantipassword($username, $password, $newPassword, $id)
    {   
        $users = $this->getUserByUsername($username);
        foreach ($users as $user) {
            if (password_verify($password, $user["password"])) {
                $query = "UPDATE {$this->table} SET password = :password WHERE id = :id";
                $this->database->query($query);
                $this->database->bind(':password', password_hash($newPassword, PASSWORD_DEFAULT));
                $this->database->bind("id", $id);
                return $this->database->execute();
                // return $user;
                // break;
            }
            return [];
        }
    }
    public function gantiPhoto($id, $gambar)
    {   
        if (empty($this->getUserById($id))) {
            throw new Exception("User tidak ditemukan");
        }
            
                $query = "UPDATE {$this->table} SET gambar = :gambar WHERE id = :id";
                $this->database->query($query);
                $this->database->bind('gambar',$gambar);
                $this->database->bind("id", $id);
                return $this->database->execute();
                // return $user;
                // break;
    }

    public function editUser($data)
    {
        // Implementasikan logika untuk mengupdate data pengguna di database
        // Contoh:
        $this->database->query("UPDATE users SET username = :username, email = :email , password = :password, role = :role WHERE id = :id");
        $this->database->bind(':username', $data['username']);
        $this->database->bind(':email', $data['email']);
        $this->database->bind(':id', $data['id']);
        $this->database->bind(':role', $data['role']);
        $this->database->bind(':password',  password_hash($data["password"], PASSWORD_DEFAULT));
        $this->database->execute();
        // Tambahkan logika untuk field lainnya sesuai kebutuhan
    }
}
