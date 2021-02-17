<?php
$conn = mysqli_connect("localhost","root","","school");

$x = $_GET['stu_name'];
if(isset($x)){
$xxx = "SELECT * FROM students WHERE (`stu_name`  LIKE '%$x%')";
$result = mysqli_query($conn,$xxx);
$row = mysqli_fetch_assoc($result);
// $result = mysqli_query($conn, "SELECT * FROM students where stu_name={$_GET['stu_name']}");

if($row){
echo "<i class='fa fa-check'></i>";
}else{
    echo "";
}
//echo "<option>{$row['admin_email']}</option>";
}