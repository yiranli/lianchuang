<html>
<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8" />
    <title>查询结果</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" language="javascript">
    function ChkAllClick(sonName,cbAllId){
            var arrSon=document.getElementsByName(sonName);
            var cdAll=document.getElementById(cbAllId);
            var tempState=cdAll.checked;
            for(i=0;i<arrSon.length;i++){
                if(arrSon[i].checked!=tempState)
                    arrSon[i].click();
                }
            }

    function ChkSonClick(sonName,cbAllId){
        var arrSon=document.getElementsByName(sonName);
        var cbAll=document.getElementById(cbAllId);
        for(var i=0;i<arrSon.length;i++){
            if(!arrSon[i].checked){
                cbAll.checked=false;
                return;
                }
            }
            cbAll.checked=true;
        }
    </script>
</head>
<body>
    <?php
        $name_result=$_POST['name'];
        $a='';
        $b='';
        $c='';
        $mylink=mysql_connect("localhost","root","liyiran") or die('Could not connect:'.mysql_error());
        mysql_select_db("my",$mylink);
        $sql="select * from men_info where (1=1)";
        if (isset($_POST['sex'])) {
            $a="and sex like '%$_POST[sex]%'";}
        if (isset($_POST['groups'])) {
            $c="and groups like '%$_POST[groups]%'";}

        if ($name_result!=null) {
            $b="and name like '%$name_result%'";}

        $sql.=$a;
        $sql.=$b;
        $sql.=$c;

        $result=mysql_query($sql,$mylink);
    ?>
    <form action="email.php" method="post">
    <center>
        <table border>
            <tr>
             <td width=80px>序号</td>
             <td width=120px>姓名</td>
             <td>性别</td>
             <td>发送邮件</td>   
            </tr>
            <?php
                while($myarray=mysql_fetch_array($result))
                {
            ?>
            <tr>
                <td><?php echo $myarray["id"]?></td>
                <td><?php echo $myarray["name"]?></td>
                <td><?php echo $myarray["sex"]?></td>
                <td colspan="2"><?php echo '<input type="checkbox" value="' .
                $myarray['id'] . '" name="email[]" />';?></td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td width="10%">
                <input type="checkbox" name="chkAll" name="chkAll" id="chkAll" title="全选" onclick="ChkAllClick('email[]','chkAll')" />全选</td>
            </tr>
        </table>
        考核轮数:
        <select name="test">
            <option value="笔试">笔试</option>
            <option value="第二轮面试">第二轮面试</option>
            <option value="第三轮面试">第三轮面试</option>
            <option value="熬夜测试">熬夜测试</option>
            <option value="最后一轮面试">最后一轮面试</option>
        </select>
        考核结果:
        <select name="res">
            <option value="pass">通过</option>
            <option value="fail">未通过</option>
        </select><br />
        <label for="time">下次考核(开会)时间:</label>
        <input type="text" id="time" name="time" />
        <label for="location">下次考核(开会)地点</label>
        <input type="text" id="location" name="location" /><br />
        <input type="submit" value="发送邮件" name="submit" />
    </center>
    </form>
</body>
</html>
