<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊會員</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script>
function checkForm(){
	if(document.formJoin.m_username.value==""){		
		alert("請填寫帳號!");
		document.formJoin.m_username.focus();
		return false;
	}else{
		uid=document.formJoin.m_username.value;
		if(uid.length<6 || uid.length>12){
			alert( "您的帳號長度只能6至12個字元!" );
			document.formJoin.m_username.focus();
			return false;
		}
		for(idx=0;idx<uid.length;idx++){
			if(!(( uid.charAt(idx)>='a'&&uid.charAt(idx)<='z')||(uid.charAt(idx)>='0'&& uid.charAt(idx)<='9')||( uid.charAt(idx)=='_')||( uid.charAt(idx)>='A'&&uid.charAt(idx)<='Z'))){
				alert( "您的帳號只能是數字,英文字母及「_」等符號,其他的符號都不能使用!" );
				document.formJoin.m_username.focus();
				return false;
			}
			if(uid.charAt(idx)=='_'&&uid.charAt(idx-1)=='_'){
				alert( "「_」符號不可相連 !\n" );
				document.formJoin.m_username.focus();
				return false;				
			}
		}
	}
	if(!check_passwd(document.formJoin.m_passwd.value,document.formJoin.m_passwdrecheck.value)){
		document.formJoin.m_passwd.focus();
		return false;
	}	
	if(document.formJoin.m_name.value==""){
		alert("請填寫姓名!");
		document.formJoin.m_name.focus();
		return false;
	}
	if(document.formJoin.m_birthday.value==""){
		alert("請填寫生日!");
		document.formJoin.m_birthday.focus();
		return false;
	}
	if(document.formJoin.m_email.value==""){
		alert("請填寫電子郵件!");
		document.formJoin.m_email.focus();
		return false;
	}
	if(!checkmail(document.formJoin.m_email)){
		document.formJoin.m_email.focus();
		return false;
	}
	return confirm('確定送出嗎？');
}
function check_passwd(pw1,pw2){
	if(pw1==''){
		alert("密碼不可以空白!");
		return false;
	}
	for(var idx=0;idx<pw1.length;idx++){
		if(pw1.charAt(idx) == ' ' || pw1.charAt(idx) == '\"'){
			alert("密碼不可以含有空白或雙引號 !\n");
			return false;
		}
		if(pw1.length<8 || pw1.length>12){
			alert( "密碼長度只能8到12個字母 !\n" );
			return false;
		}
		if(pw1!= pw2){
			alert("密碼二次輸入不一樣,請重新輸入 !\n");
			return false;
		}
	}
	return true;
}
function checkmail(MyEmail) {
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(filter.test(MyEmail.value)){
		return true;
	}
	alert("電子郵件格式不正確");
	return false;
}
</script>
</head>

<body>
<?php if(isset($_GET["loginStats"]) && ($_GET["loginStats"]=="1"))?>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td class="tdbline" id="top"><img src="images/mlogo.jpg" alt="會員" width="100" height="100"></td>
  </tr>
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
          <p class="title">加入會員</p>
		  <?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
          <div class="errDiv">帳號 <?php echo $_GET["username"];?> 已經有人使用！</div>
          <?php }?>
          <div class="dataDiv">
            <hr size="1" />
            <p class="heading" align="center">帳號資料</p>
            <p><strong>帳號</strong>：
                <input name="m_username" type="text" class="normalinput" id="m_username">
                <font color="#FF0000">*</font><br>
                <span class="smalltext">請填入6~12個字元以內的大小寫英文字母、數字、以及_ 符號。</span></p><br />
            <p><strong>密碼</strong>：
                <input name="m_passwd" type="password" class="normalinput" id="m_passwd">
                <font color="#FF0000">*</font><br>
                <span class="smalltext">請填入8~12個字元以內的英文字母、數字、以及各種符號組合，</span></p><br />
            <p><strong>確認密碼</strong>：
                <input name="m_passwdrecheck" type="password" class="normalinput" id="m_passwdrecheck">
                <font color="#FF0000">*</font> <br>
                <span class="smalltext">再輸入一次密碼</span></p>
            <hr size="1" />
            <p class="heading" align="center">個人資料</p><br />
            <p><strong>真實姓名</strong>：
                <input name="m_name" type="text" class="normalinput" id="m_name">
                <font color="#FF0000">*</font> </p><br />
            <p><strong>性　　別
              </strong>：
              <input name="m_sex" type="radio" value="男" checked>男
  						<input name="m_sex" type="radio" value="女">女 <font color="#FF0000">*</font></p><br />
            <p><strong>生　　日</strong>：
                <input name="m_birthday" type="date" class="normalinput" id="m_birthday">
                <font color="#FF0000">*</font> <br>
                <span class="smalltext">為西元格式(YYYY/MM/DD)。</span></p><br />
            <p><strong>電子郵件</strong>：
                <input name="m_email" type="text" class="normalinput" id="m_email">
                <font color="#FF0000">*</font> </p>
						<p class="smalltext">請確定此電子郵件為可使用狀態，以方便未來系統使用，如補寄會員密碼信。</p><br />
						<p><strong>住　　址</strong>：
                <select name="m_city">
									<option value="choose">--請選擇--</option>
									<option value="Keelung">基隆市</option>
									<option value="Taipei">臺北市</option>
									<option value="NewTaipei">新北市</option>
									<option value="Taoyuan">桃園市</option>
									<option value="Yilan">宜蘭縣</option>
									<option value="HsinchuCountry">新竹縣</option>
									<option value="Hsinchu">新竹市</option>
									<option value="Miaoli">苗栗縣</option>
									<option value="Taichung">臺中市</option>
									<option value="Changhua">彰化縣</option>
									<option value="Nantou">南投縣</option
									<option value="Yunlin">雲林縣</option>>
									<option value="Chiayi">嘉義市</option>
									<option value="ChiayiCountry">嘉義縣</option>
									<option value="Tainan">臺南市</option>
									<option value="Kaohsiung">高雄市</option>
									<option value="Pingtung">屏東縣</option>
									<option value="Hualien">花蓮縣</option>
									<option value="Taitung">臺東縣</option>
									<option value="Penghu">澎湖縣</option>
									<option value="Kinmen">金門縣</option>
									<option value="Matsu">馬祖縣</option>
									<option value="Other">其他</option>
								</select>
								<input type="text" name="location" size="40">
                <font color="#FF0000">*</font> <br>
                <p class="smalltext">請確定此地址為收件地址，以方便未來取得購物內容。</p><br />
            <p> <font color="#FF0000">*</font>為必填欄位</p>
          </div>
          <hr size="1" />
          <p align="center">
            <input name="action" type="hidden" id="action" value="join">
            <input type="submit" name="Submit2" value="送出申請">
            <input type="reset" name="Submit3" value="重設資料">
            <input type="button" name="Submit" value="回上一頁" onClick="window.history.back();">
          </p>
        </form></td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox">
          <p class="heading"><strong>填寫資料注意事項：</strong></p>
          <ol>
            <li> 請提供您本人正確、最新及完整的資料。 </li><br />
            <li> 在欄位後方出現「*」符號表示為必填的欄位。</li><br />
            <li>填寫時請您遵守補助說明。</li><br />
            <li>關於您的會員註冊以及其他特定資料，本系統不會向任何人出售或出借你所填寫的個人資料。</li><br />
            <li>在註冊成功後，除了「	帳號」外您可以在會員專區內修改您所填寫的個人資料。</li>
          </ol>
          </div>
        <div class="boxbl"></div><div class="boxbr"></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark">© 2017 TEAM5 All Rights Reserved.</td>
  </tr>
</table>
</body>
</html>

<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
if(isset($_POST["action"])&&($_POST["action"]=="join")){
	//找尋帳號是否已經註冊
	$query_RecFindUser = "SELECT `m_username` FROM `memberdata` WHERE `m_username`='".$_POST["m_username"]."'";
	$RecFindUser=mysql_query($query_RecFindUser);
	if (mysql_num_rows($RecFindUser)>0){
		header("Location: member_join.php?errMsg=1&username=".$_POST["m_username"]);
	}else{
	//若沒有執行新增的動作	
		$query_insert = "INSERT INTO `memberdata` (`m_name` ,`m_username` ,`m_passwd` ,`m_sex` ,`m_birthday` ,`m_email`,`m_url`,`m_phone`,`m_address`,`m_jointime`) VALUES (";
		$query_insert .= "'".$_POST["m_name"]."',";
		$query_insert .= "'".$_POST["m_username"]."',";
		$query_insert .= "'".md5($_POST["m_passwd"])."',";
		$query_insert .= "'".$_POST["m_sex"]."',";
		$query_insert .= "'".$_POST["m_birthday"]."',";
		$query_insert .= "'".$_POST["m_email"]."',";
		$query_insert .= "'".$_POST["m_url"]."',";	
		$query_insert .= "'".$_POST["m_phone"]."',";
		$query_insert .= "'".$_POST["m_address"]."',";	
		$query_insert .= "NOW())";
		mysql_query($query_insert);
		header("Location: member_join.php?loginStats=1");
	}
}
?>
