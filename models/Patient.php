<?php

class Patient extends model
{

    public function verifyLogin()
    {

        if (!isset($_SESSION['logged']) || (isset($_SESSION['logged']) && empty($_SESSION['logged']))) {
            header("Location: " . BASE_URL . "login");
            exit;
        }

    }

    public function addPatient($name, $cpf, $sex, $birthdate, $address, $phone, $health_insurance, $number_covenant)
    {

        $sql = "SELECT * FROM patients WHERE cpf = '$cpf'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() == 0) {

            $sql = "INSERT INTO patients SET name = '$name', cpf = '$cpf', sex = '$sex', birthdate = '$birthdate', address = '$address', 
            phone = '$phone', health_insurance = '$health_insurance', number_covenant = '$number_covenant'";
            $sql = $this->db->query($sql);

            header("Location: " . BASE_URL);

        } else {
            return "CPF já se encontra cadastrado!";
        }
    }

    public function getPatients($page, $per_page)
    {
        $offset = ($page - 1) * $per_page;

        $array = array();


        $sql = $this->db->prepare("SELECT * FROM patients p " . " ORDER BY id DESC LIMIT $offset, $per_page");

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getPatientById($id)
    {
        $array = array();

        $sql = "SELECT * FROM patients
                WHERE id = '$id'";

        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;

    }

    public function getTotalPatients()
    {
        $array = array();

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM patients");

        $sql->execute();
        $row = $sql->fetch();

        return $row['c'];
    }

    public function editPatient($id, $name, $sex, $birthdate, $address, $phone, $health_insurance, $number_covenant)
    {
        $sql = "SELECT id FROM patients WHERE id = '$id'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        $sql = "UPDATE patients SET name = '$name', sex = '$sex', birthdate = '$birthdate', address = '$address', 
            phone = '$phone', health_insurance = '$health_insurance', number_covenant = '$number_covenant' WHERE id = '$id'";

        $sql = $this->db->query($sql);

        header("Location: " . BASE_URL . "patient");
    }

    public function deletePatient($id)
    {
        $sql = "DELETE FROM patients WHERE id = '$id'";

        $sql = $this->db->query($sql);
    }

}