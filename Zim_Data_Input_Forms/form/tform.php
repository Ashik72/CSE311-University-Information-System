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

$PHouse = $_POST['phno'];
$PLocation = $_POST['pln'];
$PStreet = $_POST['psrt'];
$PThana = $_POST['ptn'];
$PDistrict = $_POST['pdt'];
$PPost = $_POST['ppt'];

$Date = $_POST['dob'];
//academic
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
//graduation
$GDegree = $_POST['gnd1'];
$GMajor = $_POST['gmjr1'];
$GMinor = $_POST['gmnr1'];
$GInstitute = $_POST['gins1'];
$GYear = $_POST['gyr1'];
$GResult = $_POST['grslt1'];

$GDegree2 = $_POST['gnd2'];
$GMajor2 = $_POST['gmjr2'];
$GMinor2 = $_POST['gmnr2'];
$GInstitute2 = $_POST['gins2'];
$GYear2 = $_POST['gyr2'];
$GResult2 = $_POST['grslt2'];

$GDegree3 = $_POST['gnd3'];
$GMajor3 = $_POST['gmjr3'];
$GMinor3 = $_POST['gmnr3'];
$GInstitute3 = $_POST['gins3'];
$GYear3 = $_POST['gyr3'];
$GResult3 = $_POST['grslt3'];
//experience
$Position = $_POST['pos1'];
$Organization = $_POST['org1'];
$From_time = $_POST['ft1'];
$To_time = $_POST['tt1'];
$Remarks = $_POST['rs1'];

$Position2 = $_POST['pos2'];
$Organization2 = $_POST['org2'];
$From_time2 = $_POST['ft2'];
$To_time2 = $_POST['tt2'];
$Remarks2 = $_POST['rs2'];

$Position3 = $_POST['pos3'];
$Organization3 = $_POST['org3'];
$From_time3 = $_POST['ft3'];
$To_time3 = $_POST['tt3'];
$Remarks3 = $_POST['rs3'];

$Position4 = $_POST['pos4'];
$Organization4 = $_POST['org4'];
$From_time4 = $_POST['ft4'];
$To_time4 = $_POST['tt4'];
$Remarks4 = $_POST['rs4'];

$Position5 = $_POST['pos5'];
$Organization5 = $_POST['org5'];
$From_time5 = $_POST['ft5'];
$To_time5 = $_POST['tt5'];
$Remarks5 = $_POST['rs5'];
//research
$Aulist = $_POST['al'];
$Autype = $_POST['at'];
$Pubinfo = $_POST['pi'];
$Page = $_POST['pn'];
$Rpyear = $_POST['rpyr'];

$Aulist2 = $_POST['al2'];
$Autype2 = $_POST['at2'];
$Pubinfo2 = $_POST['pi2'];
$Page2 = $_POST['pn2'];
$Rpyear2 = $_POST['rpyr2'];

$Aulist3 = $_POST['al3'];
$Autype3 = $_POST['at3'];
$Pubinfo3 = $_POST['pi3'];
$Page3 = $_POST['pn3'];
$Rpyear3 = $_POST['rpyr3'];
//graduate work
$Gwdegree = $_POST['gwd'];
$Gwthesis = $_POST['gwtt'];
$Gwrarea = $_POST['gwra'];
$Gmonth = $_POST['gwm'];
$Gwyear = $_POST['gwyr'];

$Gwdegree2 = $_POST['gwd2'];
$Gwthesis2 = $_POST['gwtt2'];
$Gwrarea2 = $_POST['gwra2'];
$Gmonth2 = $_POST['gwm2'];
$Gwyear2 = $_POST['gwyr2'];

$sql1 = "INSERT INTO teacher (First_name, Middle_name, Last_name, Father_name, Mother_name, Pre_hno, Pre_location, Pre_street, Pre_thana, Pre_district, Pre_post_code, Per_hno, Per_location, Per_street, Per_thana, Per_district, Per_post_code, Dob)
 VALUES ('$First', '$Middle', '$Last', '$Father', '$Mother', '$House', '$Location', '$Street', '$Thana', '$District', '$Post', '$PHouse', '$PLocation', '$PStreet', '$PThana', '$PDistrict', '$PPost','$Date')";
//academic

if(!mysqli_query($con, $sql1))
  die(mysqli_error($con));

$teacher_id =  mysqli_insert_id($con);


$sql2 = "INSERT INTO tea_aca (T_id,Degree_name, Institute, Board, Year, Result) VALUES ('$teacher_id','$Degree', '$Institute', '$Board', '$Year', '$Result'),
('$teacher_id','$Degree2', '$Institute2', '$Board2', '$Year2', '$Result2'),('$teacher_id','$Degree3', '$Institute3', '$Board3', '$Year3', '$Result3')";

//graduation
$sql3 = "INSERT INTO tea_gra (id,T_id,Degree_name, Major, Minor, Institute, Year, Result)
 VALUES (null,'$teacher_id','$GDegree', '$GMajor', '$GMinor', '$GInstitute', '$GYear', '$GResult'),
 (null,'$teacher_id','$GDegree2', '$GMajor2', '$GMinor2', '$GInstitute2', '$GYear2', '$GResult2'),(null,'$teacher_id','$GDegree3', '$GMajor3', '$GMinor3', '$GInstitute3', '$GYear3', '$GResult3')";

 //experience
 $sql4 = "INSERT INTO tea_exp (T_id,Position, Organization, From_time, To_time, Remarks)
 VALUES ('$teacher_id','$Position', '$Organization', '$From_time', '$To_time', '$Remarks'),('$teacher_id','$Position2', '$Organization2', '$From_time2', '$To_time2', '$Remarks2'),
 ('$teacher_id','$Position3', '$Organization3', '$From_time3', '$To_time3', '$Remarks3'),('$teacher_id','$Position4', '$Organization4', '$From_time4', '$To_time4', '$Remarks4'),
 ('$teacher_id','$Position5', '$Organization5', '$From_time5', '$To_time5', '$Remarks5')";
 //research
  $sql5 = "INSERT INTO tea_res_pub (T_id,Author_list, Author_type, Pub_info, Page_no, Year)
 VALUES ('$teacher_id','$Aulist', '$Autype', '$Pubinfo', '$Page', '$Rpyear'),('$teacher_id','$Aulist2', '$Autype2', '$Pubinfo2', '$Page2', '$Rpyear2'),
 ('$teacher_id','$Aulist3', '$Autype3', '$Pubinfo3', '$Page3', '$Rpyear3')";
 //graduate work
$sql6 = "INSERT INTO tea_gra_wrk (T_id,Degree, Thesis_title, Research_area, Month, Year)
 VALUES ('$teacher_id','$Gwdegree', '$Gwthesis', '$Gwrarea', '$Gmonth', '$Gwyear'),('$teacher_id','$Gwdegree2', '$Gwthesis2', '$Gwrarea2', '$Gmonth2', '$Gwyear2')";

print_r($_POST);

 if(!mysqli_query($con, $sql2))
   var_dump(mysqli_error($con));

   if(!mysqli_query($con, $sql3))
     var_dump(mysqli_error($con));

     if(!mysqli_query($con, $sql4))
       var_dump(mysqli_error($con));

       if(!mysqli_query($con, $sql5))
         var_dump(mysqli_error($con));

         if(!mysqli_query($con, $sql6))
           var_dump(mysqli_error($con));



die();
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
	echo 'not inserted Second query';
}
else
{
	echo 'inserted second query';
}
echo '<br>';
if(!mysqli_query($con, $sql3))
{
	echo 'not inserted third query';
}
else
{
	echo 'inserted third query';
}
echo '<br>';
if(!mysqli_query($con, $sql4))
{
	echo 'not inserted forth query';
}
else
{
	echo 'inserted forth query';
}
echo '<br>';
if(!mysqli_query($con, $sql5))
{
	echo 'not inserted fifth query';
}
else
{
	echo 'inserted fifth query';
}
echo '<br>';
if(!mysqli_query($con, $sql6))
{
	echo 'not inserted sixth query';
}
else
{
	echo 'inserted sixth query';
}
//header("refresh:3; url=teacher.html");
