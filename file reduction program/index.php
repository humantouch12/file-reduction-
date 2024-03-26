<?php





$con= mysqli_connect("localhost","root","","purple_charteau");
if(mysqli_connect_error()){
    die("connection to database failed");
}

require_once('function.php');
if(isset($_POST['submit'])){
    $main = $_POST["main"];
$mains = implode("\n",$main);


$target = "images/";
$targets = "main/";
$target =$target . basename($_FILES['image']['name']);
/////
$targets =$targets . basename($_FILES['{$main}']['name']);
/////



$photo_name = ($_FILES['image']['name']);
/////
$photo_names = ($_FILES['{$main}']['name']);
/////
$imageFileType = pathinfo($target, PATHINFO_EXTENSION);
/////
$imageFileTypes = pathinfo($targets, PATHINFO_EXTENSION);

/////

$file = $photo_name;
/////
$files = $photo_names;
/////

$query ="INSERT INTO photos(image1, image) VALUES ('{$file},{$files}')" ;                         ;

$result = mysqli_query($con, $query);

if($result && compress($_FILES['image,main']['tmp_name'] , $target, 30)){
echo "<script> 

alert('done done ');
</script>";

} else {
echo 
"<script> 

alert('it has happen  ');
</script>";

}





}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>compressor </title>
</head>
<body>
<div class="container mt-3"> 
<form action="index.php" method="post"  enctype="multipart/form-data">

<div class="form-group">
    <label for="image">Main image selection </label>
    <input type="file" name="image" id="image" class="form-control" required  accept="image/*"> 
</div>

<div class="form-group">
    <label for="image">select image </label>
    <input type="file" name="main[]" id="main" class="form-control" required multiple accept="image/*"> 
</div>


<input type="submit" class="btn btn-primary"value="upload image" name="submit">




</form>




</div>

<div id=""> 
<?php
$cons= mysqli_connect("localhost","root","","purple_charteau");
if(mysqli_connect_errno()){
    die("connection to database failed");
}







$querys ="SELECT * from photos";
$results = mysqli_query($cons, $querys);  
while ($data = mysqli_fetch_assoc($results)){


    ?>
    <img src="./images/<?php echo $data['image1']; ?>">
    <?php
}
?>



</div>





</body>
</html>