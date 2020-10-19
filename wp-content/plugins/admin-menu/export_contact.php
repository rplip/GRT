<?php
/**
 * Plugin Name: Contact-treatment
**/

if (isset($_POST['id'])) {

    session_start();

    $ID = $_POST['id'];

    $pdo = new PDO('mysql:host=extranetmgrtdev.mysql.db;dbname=extranetmgrtdev', 'extranetmgrtdev', 'JQshzVbUJFG48xBF');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $newContact = [];

    foreach ($ID as $key => $value) {
        $sql = 'SELECT * FROM `wp_contacts` WHERE ID = '. intval($value) .';';
        $select = $pdo->prepare($sql);
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $newContact[] = $select->fetchAll();
    }

    $excel = "";
    $excel .=  "Id\tNom\tPrénom\tFonction\tEmail\tOjet\tMessage\tDate\n";

    foreach($newContact as $row) {
        $rowID = intval($row[0]['ID']);
        $rowname = $row[0]['name'];
        $rowfirstname = $row[0]['firstname'];
        $rowposition = $row[0]['position'];
        $rowemail = $row[0]['email'];
        $rowobject = $row[0]['object'];
        $rowmessage = trim($row[0]['message']);
        $rowcreatedat = $row[0]['created_at'];

        $excel .= "$rowID\t$rowname\t$rowfirstname\t$rowposition\t$rowemail\t$rowobject\t$rowmessage\t$rowcreatedat\n";
    }

    var_dump($excel);
    $_SESSION[tabExportExcel] = $excel;
    echo json_encode($excel);
    exit;

    }

?>