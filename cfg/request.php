<?
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");
session_start();
$db = new myDB();

if (isset($_REQUEST["login"])) {
    $db->connect();

	$login = $_REQUEST["name"];
	$pass = $_REQUEST["pass"];
	$res = $db->isAdminExists($login, $pass);

	$db->close();

	return $res;
}

if (isset($_REQUEST["logout"])) {
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_login']);
    return $res;
}

if (isset($_REQUEST["update-client"])) {
    $db->connect();

    $clientId = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $packageId = $_REQUEST["package"];
    $email = $_REQUEST["email"];
    $res = $db->updateClient($clientId, $name, $email, $packageId);

    $db->close();

    return $res;
}

if (isset($_REQUEST["delete-client"])) {
    $db->connect();

    $clientId = $_REQUEST["id"];
    $res = $db->deleteClient($clientId);

    $db->close();

    return $res;
}

if (isset($_REQUEST["add-class"])) {
    $db->connect();

    $name = $_REQUEST["name"];
    $day = $_REQUEST["day"];
    $time = $_REQUEST["time"];
    $teacher_id = $_REQUEST["teacher_id"];
    $res = $db->addClass($name, $day, $time, $teacher_id);

    $db->close();

    return $res;
}

if (isset($_REQUEST["update-class"])) {
    $db->connect();

    $classId = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $day = $_REQUEST["day"];
    $time = $_REQUEST["time"];
    $teacher_id = $_REQUEST["teacher_id"];

    $res = $db->updateClass($classId, $name, $day, $time, $teacher_id);

    $db->close();
    return $res;
}

if (isset($_REQUEST["delete-class"])) {
    $db->connect();

    $classId = $_REQUEST["id"];
    $res = $db->deleteClass($classId);

    $db->close();
    return $res;
}

if (isset($_REQUEST["add-teacher"])) {
    $db->connect();

    $name = $_REQUEST["name"];
    $surname = $_REQUEST["surname"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $res = $db->addTeacher($name, $surname, $email, $phone);

    $db->close();

    return $res;
}

if (isset($_REQUEST["update-teacher"])) {
    $db->connect();

    $teacherId = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $surname = $_REQUEST["surname"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];

    $res = $db->updateTeacher($teacherId, $name, $surname, $email, $phone);

    $db->close();
    return $res;
}

if (isset($_REQUEST["delete-teacher"])) {
    $db->connect();

    $teacherId = $_REQUEST["id"];
    $res = $db->deleteTeacher($teacherId);

    $db->close();
    return $res;
}

if (isset($_REQUEST["add-package"])) {
    $db->connect();

    $name = $_REQUEST["name"];
    $number = $_REQUEST["number"];
    $price = $_REQUEST["price"];
    $res = $db->addPackage($name, $number, $price);

    $db->close();

    return $res;
}

if (isset($_REQUEST["update-package"])) {
    $db->connect();

    $packageId = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $number = $_REQUEST["number"];
    $price = $_REQUEST["price"];
    $res = $db->updatePackage($packageId, $name, $number, $price);

    $db->close();

    return $res;
}

if (isset($_REQUEST["delete-package"])) {
    $db->connect();

    $packageId = $_REQUEST["id"];
    $res = $db->deletePackage($packageId);

    $db->close();
    return $res;
}



