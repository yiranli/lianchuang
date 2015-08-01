<?php
$name=$_POST["name"];
$cardid=$_POST["cardid"];
$area=$_POST["area"];
$sex=$_POST["rasex"];
$college=$_POST["college"];
$class=$_POST["class"];
$tele=$_POST["tele"];
$email=$_POST["email"];
$groups=$_POST["groups"];
$intro=$_POST["intro"];
$mylink=mysql_connect("localhost","root","liyiran");
mysql_select_db("lianchuang",$mylink);
$sql="insert into applicant_info
(name,cardid,area,sex,college,class,tele,email,groups,intro) values
('$name','$cardid','$area','$sex','$college','$class','$tele','$email','$groups','$intro');";
$result = mysql_query($sql);
if($result==1) echo "报名成功 <br />";
else           echo "发生错误 <br />";
?>
