<?php

class homeController extends controller
{

    public function __construct()
    {
        $u = new User();
        $u->verifyLogin();
    }

    public function index()
    {
        header("Location: ". BASE_URL . "patient");
    }

}