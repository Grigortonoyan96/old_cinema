<?php

require_once "functions.php";
$name="";
if(isset($_POST['name']) && isset($_POST['Producer']) && $_POST['name'] !="" && $_FILES['image']['name'] !=""){
    $result=$conn->query("INSERT INTO `mycinema`(name,Category,year,Producer,reating,Description) VALUES ('".$_POST['name']."','".$_POST['Category']."','".$_POST['year']."',
    '".$_POST['Producer']."','".$_POST['reating']."','".$_POST['description']."')");
    ;
    $name=$_POST['name'];
}




if (isset($_FILES['image']['name'])) {
    $saveto = "$name.jpg";
    move_uploaded_file($_FILES['image']['tmp_name'], $saveto);

    switch ($_FILES['image']['type']) {
        case "image/gif":
            $src = imagecreatefromgif($saveto);
            break;
        case "image/jpeg":  // Both regular and progressive jpegs
        case "image/pjpeg":
            $src = imagecreatefromjpeg($saveto);
            break;
        case "image/png":
            $src = imagecreatefrompng($saveto);
            break;

    }
}


?>

<html>
<head>
<title>mycinema</title>
</head>
<body>
<?php
    $categories = "Select * from categories";
?>
<form data-ajax='false' method='post'
       enctype='multipart/form-data'>
    <label>Film name</label>
<input type="text" name="name" id="name"><br><br>
    <label>Category</label>
    <select name="Category" id="Category">
        <option value="Gangster">Gangster</option>
        <option value="Comedy">Comedy</option>
        <option value="Retro">Retro</option>
        <option value="melodrama">melodrama</option>
        <option value="triller">triller</option>
    </select>
    <label>Year</label>
    <select name="year">
        <?php
        for($i=1980;$i<2021;$i++){
            echo "<option value='".$i."'>".$i."</option>";
        }
        ?>
    </select><br><br>
    <label>Producer</label>
<input type="text" name="Producer"><br><br>
    <label>Reating</label>
    <select name="reating">
        <?php
        for($j=0;$j<11;$j++){
            echo "<option value='".$j."'>".$j."</option>";
        }
        ?>
    </select><br><br>
    <p><textarea rows="10" cols="45" name="description"></textarea></p><br>

    <input type='file' name='image'><br><br>

<input type="submit">

<br><br><br>
    <a href="index.php">Witch All films</a>
</form>
</body>
</html>


