<?php

class User extends model
{

    public function verifyLogin()
    {

        if (!isset($_SESSION['logged']) || (isset($_SESSION['logged']) && empty($_SESSION['logged']))) {
            header("Location: " . BASE_URL . "login");
            exit;
        }

    }

    public function login($email, $password)
    {

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            $_SESSION['logged'] = $sql['id'];

            header("Location: " . BASE_URL);
            exit;
        } else {
            return "E-mail e/ou senha errados!";
        }

    }

    public function addUser($email, $name, $specialty, $crm, $password)
    {

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() == 0) {

            $sql = "INSERT INTO users SET email = '$email', name = '$name', specialty = '$specialty', crm = '$crm', password = MD5('$password')";
            $sql = $this->db->query($sql);

            $id = $this->db->lastInsertId();
            $_SESSION['logged'] = $id;

            header("Location: " . BASE_URL);

        } else {
            return "E-mail já se encontra cadastrado!";
        }
    }
}