<?php 

session_start();

$id = 0;
$update = false;
$studname = '';
$yearsec = '';
$datetoday = '';
$tin = '';
$touT = '';

$mysqli = new mysqli ('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $studname = $_POST['studname'];
    $yearsec = $_POST['yearsec'];
    $datetoday = $_POST['datetoday'];
    $tin = $_POST['tin'];
    $tout = $_POST['tout'];

    $mysqli->query("INSERT INTO studinfo (studname, yearsec, datetoday, tin, tout) VALUES ('$studname', '$yearsec', '$datetoday', '$tin',  '$tout')") or die($mysqli->error);

}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM studinfo WHERE id=$id") or die($mysqli->error);

}


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true; 
    $result = $mysqli->query("SELECT * FROM studinfo WHERE id=$id") or die($mysqli->error);
    if ($result->num_rows == 1) {
        $row = $result->fetch_array();
        $name = $row['studname'];
        $yearsec = $row['yearsec'];
        $datetoday = $row['datetoday'];
        $tin = $row['tin'];
        $tout = $row['tout'];
    }
}


if (isset($_POST['update'])){
    $id = $_POST['id'];
    $studname = $_POST['studname'];
    $yearsec = $_POST['yearsec'];
    $datetoday = $_POST['datetoday'];
    $tin = $_POST['tin'];
    $tout = $_POST['tout'];

    $mysqli->query("UPDATE studinfo SET studname='$studname', yearsec='$yearsec', datetoday='$datetoday', tin='$tin', tout='$tout' WHERE id=$id")
    or die($mysqli->error);

    header('location: crud.php');
    exit();

}