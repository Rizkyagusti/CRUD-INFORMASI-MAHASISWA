<?php

namespace Krispachi\KrisnaLTE\Controller;

use Exception;
use Krispachi\KrisnaLTE\App\FlashMessage;
use Krispachi\KrisnaLTE\App\View;
use Krispachi\KrisnaLTE\Model\UserModel;

class UserController
{
    public function index()
    {
        View::render("user/index");
    }

    public function addUser()
    {

        $data = [
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "confirm_password" => $_POST["confirm_password"]
        ];

        if (empty(trim($data["username"])) || empty(trim($data["email"])) || empty(trim($data["password"])) || empty(trim($data["confirm_password"]))) {
            FlashMessage::setFlashMessage("error", "Form tidak boleh kosong");
            $this->sendFormInput($data);
            header("Location: /user");
            exit(0);
        }

        if ($data["password"] != $data["confirm_password"]) {
            FlashMessage::setFlashMessage("error", "Konfirmasi password salah");
            $this->sendFormInput($data);
            header("Location: /user");
            exit(0);
        }

        $model = new UserModel();
        try {
            $model->addUser($data);
            FlashMessage::setFlashMessage("success", "User berhasil di tambahkan");
            header("Location: /user");
            exit(0);
        } catch (Exception $exception) {
            FlashMessage::setFlashMessage("error", $exception->getMessage());
            $this->sendFormInput($data);
            header("Location: /user");
            exit(0);
        }
    }

    public function editbyadmin()
    {
        // Ambil data pengguna berdasarkan ID dari model
            $model = new UserModel();
            

        
            // Lakukan validasi dan update data pengguna di dalam model
            try {
                // Ambil data yang dikirim dari formulir
                $editedData = [
                    'id' => $_POST['id'],
                    'username' => $_POST['edited_username'],
                    'email' => $_POST['edited_email'],
                    'password' => $_POST['edited_password'],
                    // Tambahkan field lainnya sesuai kebutuhan
                ];

                // Panggil method di model untuk melakukan update
                $model->editUser($editedData);

                // Redirect ke halaman yang sesuai setelah berhasil
                FlashMessage::setFlashMessage("success", "User berhasil di ubah");
                header("Location: /user");
            } catch (Exception $exception) {
                // Tangani kesalahan jika diperlukan
                FlashMessage::setFlashMessage("error", $exception->getMessage());
            }
        

        // Tampilkan view edit dengan data pengguna yang akan diubah
        // Misalnya: $this->render('users/edit', ['user' => $user]);
    }


    public function sendFormInput(array $data): void
    {
        $_SESSION["form-input"] = [];
        foreach ($data as $key => $input) {
            if (!empty(trim($input))) {
                $_SESSION["form-input"] += [
                    "$key" => trim($input)
                ];
            }
        }
    }
}
