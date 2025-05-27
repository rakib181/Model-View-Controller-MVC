<?php

namespace Core;

class Authenticator
{
    public function attempts($email, $password): bool
    {
        $db = App::getContainer()->resolve(Database::class);
        $data = $db->query("SELECT * FROM users WHERE email = :email", ['email' => $email])->find();
        $result = password_verify($password, $data['password'] ?? '');
        if ($result) {
            $this->login($data);
            return true;
        }
        return false;
    }

    public function login($data): void
    {

        Session::put('user', [
            "id" => $data["id"],
            "name" => $data["name"],
            "email" => $data["email"],
        ]);
        Session::refresh();
    }

    public function logout(): void
    {
        Session::flush();

        Session::destroy();

        header("Location: /" . 'create');
    }


}