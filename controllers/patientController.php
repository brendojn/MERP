<?php

class patientController extends controller {

    public function __construct()
    {
        $u = new User();
        $u->verifyLogin();
    }

    public function index() {
        $data = array();

        $patient = new Patient();

        $p = 1;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }

        $total_patients = $patient->getTotalPatients();

        $per_page = 6;
        $total_pages = ceil($total_patients / $per_page);

        $patients = $patient->getPatients($p, $per_page);

        $data['patients'] = $patients;
        $data['total_pages'] = $total_pages;

        $this->loadTemplate('patients', $data);
    }

    public function add() {
        $data = array();

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $cpf = addslashes($_POST['cpf']);
            $sex = addslashes($_POST['sex']);
            $birthdate = addslashes($_POST['birthdate']);
            $address = addslashes($_POST['address']);
            $phone = addslashes($_POST['phone']);
            $health_insurance = addslashes($_POST['health_insurance']);
            $number_covenant = addslashes($_POST['number_covenant']);

            $p = new Patient();
            $data['erro'] = $p->addPatient($name, $cpf, $sex, $birthdate, $address, $phone, $health_insurance, $number_covenant);
        }

        $this->loadTemplate('add-patients', $data);
    }

    public function edit($id) {
        $data = array();
        $p = new Patient();

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $sex = addslashes($_POST['sex']);
            $birthdate = addslashes($_POST['birthdate']);
            $address = addslashes($_POST['address']);
            $phone = addslashes($_POST['phone']);
            $health_insurance = addslashes($_POST['health_insurance']);
            $number_covenant = addslashes($_POST['number_covenant']);

            $p->editPatient($id, $name, $sex, $birthdate, $address, $phone, $health_insurance, $number_covenant);
            header("Location: " . BASE_URL . "patient");
        }

        $data['getPatient'] = $p->getPatientById($id);

        $this->loadTemplate('edit-patients', $data);
    }

    public function delete()
    {
        $p = new Patient();

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $p->deletePatient($_GET['id']);
        }

        header("Location: " . BASE_URL . "patient");
    }

}