<?php
/**
 * Created by PhpStorm.
 * User: arman
 * Date: 05.04.2018
 * Time: 13:51
 */

class myDB
{

    var $dbLogin = "postgres";
    var $dbpass = "лщзьфшт01";
    var $db = "lab3web";
    var $dbhost = "localhost";

    var $link;
    var $query;
    var $err;
    var $result;
    var $data;
    var $fetch;

    function connect() {
        $this->link = pg_connect("host=localhost port=5432 dbname=lab3web user=postgres password=лщзьфшт01");
    }

    function close() {
        pg_close($this->link);
    }

    function run($query) {
        $this->query = $query;
        $this->result = pg_query($this->query, $this->link);
        $this->err = pg_errormessage();
    }

    function row() {
        $this->data = pg_fetch_assoc($this->result);
    }

    function fetch() {
        while ($this->data = pg_fetch_assoc($this->result)) {
            $this->fetch = $this->data;
            return $this->fetch;
        }
    }

    function stop() {
        unset($this->data);
        unset($this->result);
        unset($this->fetch);
        unset($this->err);
        unset($this->query);
    }

    function getAllTeachers(){
        $result = pg_query("SELECT * from teachers where active = true");
        return pg_fetch_all($result);
    }

    function addTeacher($name, $surname, $email, $phone){
        $query = "INSERT INTO TEACHERS (id, name, surname, email, phone) VALUES (default , $1, $2, $3, $4)";
        $values = array($name, $surname, $email, $phone);

        $result = pg_query_params($this->link, $query, $values);

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function deleteTeacher($id){
        $query = "UPDATE Teachers SET active = false WHERE id = $1";
        $result = pg_query_params($this->link, $query, array($id));

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function updateTeacher($id, $name, $surname, $email, $phone){
        $query = "UPDATE teachers SET name = $2, surname = $3, email = $4, phone = $5, active = true WHERE id = $1";

        $values = array($id, $name, $surname, $email, $phone);
        $result = pg_query_params($this->link, $query, $values);

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function getAllPackages(){
        $result = pg_query("SELECT * from packages where active = true");
        return pg_fetch_all($result);
    }

    function addPackage($name, $number, $price){
        $query = "INSERT INTO packages (id, name, number, price) VALUES (default , $1, $2, $3)";
        $values = array($name, $number, $price);
        $result = pg_query_params($this->link, $query, $values);

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function deletePackage($id){
        $query = "UPDATE packages SET active = false WHERE id = $1";
        $result = pg_query_params($this->link, $query, array($id));

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function updatePackage($id, $name, $number, $price){
        $query = "UPDATE packages SET name = $2, number = $3, price = $4, active = true WHERE id = $1";
        $values = array($id, $name, $number, $price);
        $result = pg_query_params($this->link, $query, $values);

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function getAllClients(){
        $result = pg_query("SELECT c.id, c.name, c.email, p.name as package_name, p.id as package_id, c.active FROM clients c 
                                      LEFT JOIN packages p on c.package_id = p.id WHERE c.active = true;");
        return pg_fetch_all($result);
    }

    function addClient($name, $email, $packageID){
        $query = "INSERT INTO clients (id, name, email, package_id, active) VALUES (default , $1, $2, $3, default)";
        $values = array($name, $email, $packageID);
        $result = pg_query_params($this->link, $query, $values);

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function deleteClient($id){
        $query = "UPDATE clients SET active = false WHERE id = $1";
        $result = pg_query_params($this->link, $query, array($id));

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function updateClient($id, $name, $email, $packageID){
        $query = "UPDATE clients SET name = $2, email = $3, package_id = $4, active = true WHERE id = $1";
        $values = array($id, $name, $email, $packageID);
        $result = pg_query_params($this->link, $query, $values);

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function getAllClasses(){
        $result = pg_query("SELECT c.id, c.name, c.day, c.time, CONCAT(t.name, ' ', t.surname) as teacher_name, t.id as teacher_id, c.active FROM classes c 
                                      LEFT JOIN teachers t on c.teacher_id = t.id WHERE c.active = true AND t.active = true;");
        return pg_fetch_all($result);
    }

    function addClass($name, $day, $time, $teacherId){
        $query = "INSERT INTO classes (id, name, day, time, teacher_id) VALUES (default , $1, $2, $3, $4)";
        $values = array($name, $day, $time, $teacherId);
        $result = pg_query_params($this->link, $query, $values);

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function deleteClass($id) {
        $query = "UPDATE classes SET active = false WHERE id = $1";
        $result = pg_query_params($this->link, $query, array($id));

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }

    function updateClass($id, $name, $day, $time, $teacherId){
        $query = "UPDATE classes SET name = $2, day = $3, time = $4, teacher_id = $5, active = true WHERE id = $1";
        $values = array($id, $name, $day, $time, $teacherId);
        $result = pg_query_params($this->link, $query, $values);

        if(!$result){
            echo false;
        } else {
            echo true;
        }
    }


    function isAdminExists($login, $password){
        $query = "SELECT * from admins where admins.login = $1 AND admins.password = $2";
        $values = array($login, $password);
        $result = pg_query_params($this->link, $query, $values);
        $admin = pg_fetch_all($result);

        if($admin[0]['login'] == $login && $admin[0]['password'] == $password){
            session_start();
            $_SESSION['admin_login'] = $login;
            $_SESSION['admin_name'] = $admin[0]['name'];
            echo true;
        } else {
            echo false;
        }

    }



}