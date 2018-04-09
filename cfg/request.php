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



