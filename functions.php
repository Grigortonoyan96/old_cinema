<?php

    $conn=new mysqli('localhost','root','','cinema');

/*$result=$conn->query("SELECT * FROM `mycinema` ");
$rows=$result->num_rows;

for ($j=0;$j<$rows;$j++){
    $result->data_seek($j);
    echo  "<h3>name:" . htmlspecialchars($result->fetch_assoc()['name']) . "<br>";
    $result->data_seek($j);
    echo "year" . "<li>" .htmlspecialchars($result->fetch_assoc()['year']) . "</li>";
}*/


function showProfile($user)
{
    if (file_exists("$user.jpg"))
        echo "<img src='$user.jpg' style='float:left;width: 150px'>";

}


