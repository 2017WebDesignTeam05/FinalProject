<?php
    $new_password=randomkeys(10);
    //Receiver
    $to =" mail@xxx.com ";  
    $subject = "Your new password from onlai amusement part"; 
    $msg = "Your new password is".$new_password;
    //from
    $headers = "From: admin@onlai.com"; 
  
    if(mail("$to", "$subject", "$msg", "$headers"))
        echo "信件已經發送成功。";
    else
        echo "信件發送失敗！";

    function randomkeys($length){
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0;$i<$length;$i++){
            $key .= $pattern{rand(0,strlen($pattern)-1)};
        }
        return $key;
    }

?>