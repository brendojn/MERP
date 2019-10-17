<?php

class Consultation extends model
{

    public function verifyLogin()
    {

        if (!isset($_SESSION['logged']) || (isset($_SESSION['logged']) && empty($_SESSION['logged']))) {
            header("Location: " . BASE_URL . "login");
            exit;
        }

    }


}