<?php

require_once "functions.php";
if(isset($_POST['filmcategory'])) {
    $Select = $_POST['filmcategory'];
    $result1 = $conn->query("SELECT * FROM `mycinema` WHERE Category='$Select'");
    $rows = $result1->num_rows;

    for ($j = 0; $j < $rows; $j++) {
        $result1->data_seek($j);
        $name = $result1->fetch_assoc()['name'];
        $result1->data_seek($j);
        echo "<h3>name:" . htmlspecialchars($result1->fetch_assoc()['name']) . "<br>";
        showProfile($name);
        echo "<br><br>" . "<br><br>" . "<br><br>";
        $result1->data_seek($j);
        echo "<h4>reating:" . htmlspecialchars($result1->fetch_assoc()['reating']) . "<br>";

        ?>
        <a href="films.php?view=<?php $result1->data_seek($j);
        echo $result1->fetch_assoc()['name']; ?>">About the movie</a>
        <?php
//add new comment fdsf
    }
}
else{

        $result = $conn->query("SELECT * FROM `mycinema` ");
        $rows = $result->num_rows;

        for ($j = 0; $j < $rows; $j++) {
            $result->data_seek($j);
            $name = $result->fetch_assoc()['name'];
            $result->data_seek($j);
            echo "<h3>name:" . htmlspecialchars($result->fetch_assoc()['name']) . "<br>";
            showProfile($name);
            echo "<br><br>" . "<br><br>" . "<br><br>";
            $result->data_seek($j);
            echo "<h4>reating:" . htmlspecialchars($result->fetch_assoc()['reating']) . "<br>";

            ?>
            <a href="films.php?view=<?php $result->data_seek($j);
            echo $result->fetch_assoc()['name']; ?>">About the movie</a>
            <?php
        }
}

echo<<<end

    <html>
    <br><br><br>
    <a href="upload_films.php">ADD new films</a>
</html> 

end;
?>
<html>
<form method="post">
    <label>Category</label>
    <select name="filmcategory" id="Category">
        <option value="Gangster">Gangster</option>
        <option value="Comedy">Comedy</option>
        <option value="Retro">Retro</option>
        <option value="melodrama">melodrama</option>
        <option value="triller">triller</option>
    </select>
    <input type="submit">

</form>

</html>
