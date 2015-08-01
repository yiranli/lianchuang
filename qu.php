<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>查询</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php
        $name=$_POST["name"];
        $cardid=$_POST["cardid"];
        $mylink=mysql_connect("localhost","root","liyiran") or die ('Error connecting to MySQL server');
        mysql_select_db("lianchuang",$mylink);
        $query="select cardid from mem_info where name='$name'";
        $result=mysql_query($query);
        $myarray=mysql_fetch_array($result);
        if($myarray&&$myarray['cardid']==$cardid){

    ?>
    <h2>招新查询</h2>
    <p>查询条件:</p>
    <form action="echo.php" method="post">
    <label for="name">姓名:</label>
    <input type="text" name="name" /><br />
    <label for="sex">性别:</label>
    <input type="radio" name="sex" value="男" id="sex" /> 男
    <input type="radio" name="sex" value="女" id="sex" /> 女<br />
    <label for="groups">报名组别:</label>
    <table>
    <tr>
    <td><input id="groups" name="groups" type="radio" value="Android组"
    /> Android组</td>
    <td><input id="groups" name="groups" type="radio" value="IT组" /> IT组</td>
    <td><input id="groups" name="groups" type="radio" value="Web组" /> Web组</td>
    <td><input id="groups" name="groups" type="radio" value="iOS组" /> iOS组</td>
    </tr>    
    <tr>
    <td><input id="groups" name="groups" type="radio" value="Design组" /> Design组</td>
    <td><input id="groups" name="groups" type="radio" value="PM组" /> PM组</td>
    <td><input id="groups" name="groups" type="radio" value="算法组" /> 算法组</td>
    <td><input id="groups" name="groups" type="radio" value="嵌入式组" /> 嵌入式组</td>
    </tr>
    </table>
    <input type="submit" value="查询" />
    </form>
    <?php
        }
        elseif($myarray){
            echo "学号与姓名不符";
            }
        else{
            echo "联创查无此人";
            }
    ?>
</body>
</html>
