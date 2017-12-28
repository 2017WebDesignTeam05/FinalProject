<?php session_start;?>
<?php
    include("connMysql.php");
    extract($_POST);
    $id=$username;
    $pw=$passwd;
    $sql="SELECT * FROM member WHERE username='$id'";
    $res=mysql_query($sql);
    $row=@mysql_fetch_row($res);
    if($id!=NULL && $pw!=NULL && $row[1]==$id && $row[2]==$pw){
        $_SESSION['username']=$id;
        echo "登入成功！<br>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>'; //member.php need to be created
    }
    else{
        echo "帳號或密碼錯誤<br>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
    }
?>