<?php

require_once "functions.php";

//aystex grelu em im filmer@ , showfilms

function showfilm($user)
{
    if (file_exists("$user.jpg"))
        echo "<img src='$user.jpg' style='float:left;width: 350px'>";
}

if(isset($_GET['view'])) {
    $view = $_GET['view'];
    echo "<h1> $view </h1>";

    showfilm($view);
    $result = $conn->query("SELECT * FROM `mycinema` Where name='$view'");
    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; $j++) {

        $result->data_seek($j);
        echo "<li>category:" . htmlspecialchars($result->fetch_assoc()['Category']) . "<br>";
        $result->data_seek($j);
        echo "<li>producer:" . htmlspecialchars($result->fetch_assoc()['producer']) . "<br>";
        $result->data_seek($j);
        echo "<li>reating:" . htmlspecialchars($result->fetch_assoc()['reating']) . "<br>";
        $result->data_seek($j);
        echo "<li>year:" . htmlspecialchars($result->fetch_assoc()['year']) . "<br>";
        $result->data_seek($j);
        echo "<h1>About:" . htmlspecialchars($result->fetch_assoc()['Description']) ;

    }
}
?>


