<?php
$con = mysqli_connect('138.68.138.75', 'cse311', 'keCHy88lokIV5WWF');
if(!$con)
{
echo 'not connected';
}
if(!mysqli_select_db($con, 'cse311'))
{
echo 'db not selected';
}
