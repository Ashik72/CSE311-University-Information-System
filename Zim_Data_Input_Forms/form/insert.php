<?php

require_once "header.php";

$Course = $_POST['username'];
$Semester = $_POST['email'];
$Year= $_POST['year'];
$Id = $_POST['id1'];
$Last = $_POST['name1'];
$Grade = $_POST['grade1'];
$Id2 = $_POST['id2'];
$Last2 = $_POST['name2'];
$Grade2 = $_POST['grade2'];
$Id3 = $_POST['id3'];
$Last3 = $_POST['name3'];
$Grade3 = $_POST['grade3'];

$sql = "INSERT INTO person (Course_id, Semester, Year, Id, Lastname, Grade) VALUES ('$Course', '$Semester', '$Year', '$Id', '$Last', '$Grade')";
$sql2 = "INSERT INTO person (Course_id, Semester, Year, Id, Lastname, Grade) VALUES ('$Course', '$Semester', '$Year', '$Id2', '$Last2', '$Grade2')";
$sql3 = "INSERT INTO person (Course_id, Semester, Year, Id, Lastname, Grade) VALUES ('$Course', '$Semester', '$Year', '$Id3', '$Last3', '$Grade3')";
if(!mysqli_query($con, $sql))
{
	echo 'not inserted first query';
}
else
{
	echo 'inserted first query';
}
echo '<br>';
if(!mysqli_query($con, $sql2))
{
	echo 'not inserted second query';
}
else
{
	echo 'inserted  second query';
}
echo '<br>';
if(!mysqli_query($con, $sql3))
{
	echo 'not inserted third query';
}
else
{
	echo 'inserted  third query';
}

header("refresh:2; url=grade.html");
?>
