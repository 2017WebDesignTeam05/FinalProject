<?php
    extract($_POST);
    $id = $username;
    $pw = $passwd;
    $pwck = $passwdchk;
    $name = $Name;
    $sex = $Sex;
    $email = $Email;
    $bthday=$Birthday;
    $loc = $city + $location;

    /*Check the form*/
    //username
    if(strlen($id)<6 || strlen($id)>12){
        $a = strlen($id);
        echo "<script>alert('帳號長度要在6~12位元之間！');history.go(-1);</script>";  
    }else if(!ereg("^[a-zA-Z0-9]",$id)){
        echo "<script>alert('帳號僅限英文、數字！');history.go(-1);</script>";          
    }
    //password
    if(strlen($pw)<8 || strlen($pw)>12){
        echo "<script>alert('密碼長度要在8~12位元之間！');history.go(-1);</script>";  
    }
    else if(!ereg("^[a-zA-Z0-9]",$pw)){
        echo "<script>alert('帳號僅限英文、數字！');history.go(-1);</script>";          
    }
    else if($pw != $pwck){
        echo "<script>alert('兩次輸入的密碼不正確！');history.go(-1);</script>";  
    }
    // other form 
    //name
    if(strlen($name) == 0){
        echo "<script>alert('請輸入姓名！');history.go(-1);</script>";  
    }
    //email
    if(strlen($email) == 0){
        echo "<script>alert('請輸入電子郵件！');history.go(-1);</script>";  
    }
    if(!ereg ("[a-zA-Z0-9\._\+]+@([a-zA-Z0-9\.-]\.)*[a-zA-Z0-9\.-]+", $email)){
        echo "<script>alert('請輸入正確的電子郵件！');history.go(-1);</script>";  
    }
    //birthday
    if($bthday == ""){
        echo "<script>alert('請選擇生日！');history.go(-1);</script>";  
    }
    //location
    if(!strcmp($city,"choose")){
        echo "<script>alert('請選擇城市！');history.go(-1);</script>";  
    }
    if(strlen($location) == 0){
        echo "<script>alert('請填入地址！');history.go(-1);</script>";  
    }
    /*If the form is OK*/
    ini_set("display_errors","On");
    require_once connMysql.php;
    $sql = "INSERT INTO member (username,password,name,email,birthday,location) 
                            VALUES($id,$pw,$name,$email,$bthday,$loc)";
    if(mysql_query($sql)){
        echo '註冊成功！';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';   //之後更改位置
    }
    else{
        echo '新增失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
?>