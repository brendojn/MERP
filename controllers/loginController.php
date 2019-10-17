<?php

class loginController extends controller {

    public function index() {
        $data = array();
        
        $this->loadView('login', $data);
    }

    public function enter() {
    	$data = array('erro'=>'');

    	if(isset($_POST['email']) && !empty($_POST['email'])) {
    		$user = addslashes($_POST['email']);
    		$password = md5($_POST['password']);

    		$u = new User();
    		$data['erro'] = $u->login($user, $password);
    	}

    	$this->loadView('login_entrar', $data);
    }

    public function add() {
    	$data = array();

    	if(isset($_POST['email']) && !empty($_POST['email'])) {
    		$email = addslashes($_POST['email']);
    		$name = addslashes($_POST['name']);
    		$specialty = addslashes($_POST['specialty']);
    		$crm = addslashes($_POST['crm']);
    		$password = addslashes($_POST['password']);

    		$u = new User();
    		$data['erro'] = $u->addUser($email, $name, $specialty, $crm, $password);
    	}

    	$this->loadView('login_cadastrar', $data);
    }

    public function sair() {
    	unset($_SESSION['logged']);
    	header("Location: ". BASE_URL);
    }

}