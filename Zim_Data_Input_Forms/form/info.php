<?php
require_once "header.php";

$First = $_POST['fname'];
$Middle = $_POST['mname'];
$Last = $_POST['lname'];
$Father = $_POST['bap'];
$Mother = $_POST['ma'];
$House = $_POST['hno'];
$Location = $_POST['ln'];
$Street = $_POST['srt'];
$Thana = $_POST['tn'];
$District = $_POST['dt'];
$Post = $_POST['pt'];

//permanent
$House2 = $_POST['ab'];
$Location2 = $_POST['bc'];
$Street2 =$_POST['cd'];
$Mosa2 = $_POST['de'];
$District2 = $_POST['ef'];
$Post2 = $_POST['fg'];

$Date = $_POST['dob'];

$Degree = $_POST['nd1'];
$Institute = $_POST['ins1'];
$Board = $_POST['brd1'];
$Year = $_POST['yr1'];
$Result = $_POST['rslt1'];

$Degree2 = $_POST['nd2'];
$Institute2 = $_POST['ins2'];
$Board2 = $_POST['brd2'];
$Year2 = $_POST['yr2'];
$Result2 = $_POST['rslt2'];

$Degree3 = $_POST['nd3'];
$Institute3 = $_POST['ins3'];
$Board3 = $_POST['brd3'];
$Year3 = $_POST['yr3'];
$Result3 = $_POST['rslt3'];


$sql = "INSERT INTO student (First_name, Middle_name, Last_name, Father_name, Mother_name, H_no, Location, Street, Thana, District, Post_code, Per_hno, Per_location, Per_street, Per_thana, Per_district, Per_post_code, Dob)
 VALUES ('$First', '$Middle', '$Last', '$Father', '$Mother', '$House', '$Location', '$Street', '$Thana', '$District', '$Post', '$House2', '$Location2', '$Street2','$Mosa2', '$District2', '$Post2', '$Date')";


mysqli_query($con, $sql);
$student_id =  mysqli_insert_id($con);

$sql2 = "INSERT INTO stu_aca (S_id,Degree_name, Institute, Board, Year, Result) VALUES ('$student_id','$Degree', '$Institute', '$Board', '$Year', '$Result'),('$student_id','$Degree2', '$Institute2', '$Board2', '$Year2', '$Result2'),('$student_id','$Degree3', '$Institute3', '$Board3', '$Year3', '$Result3')";

//$sql3 = "INSERT INTO stu_aca (Degree_name, Institute, Board, Year, Result) VALUES ('$Degree2', '$Institute2', '$Board2', '$Year2', '$Result2')";

//$sql4 = "INSERT INTO stu_aca (Degree_name, Institute, Board, Year, Result) VALUES ('$Degree3', '$Institute3', '$Board3', '$Year3', '$Result3')";

//$sql3 = "INSERT INTO person (Course_id, Semester, Year, Id, Lastname, Grade) VALUES ('$Course', '$Semester', '$Year', '$Id3', '$Last3', '$Grade3')";
if(!mysqli_query($con, $sql2))
{
	echo 'not inserted first query';
  var_dump(mysqli_error($con));
}
// echo '<br>';
// if(!mysqli_query($con, $sql3))
// {
// 	echo 'not inserted third query';
// }
// else
// {
// 	echo 'inserted third query';
// }
// echo '<br>';
// if(!mysqli_query($con, $sql4))
// {
// 	echo 'not inserted forth query';
// }
// else
// {
// 	echo 'inserted forth query';
// }

//header("refresh:2; url=student.html");
?>
