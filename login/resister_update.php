<?php
$mb_id = $_POST['login_id2']; //아이디
$mb_pw = $_POST['login_password2']; //비밀번호
$mb_pw2 = $_POST['login_password3']; //비밀번호2
$mb_name = $_POST['mb_name']; //이름
$mb_email = $_POST['mb_email']; //이메일
$mb_job = $_POST['mb_job']; // 직업
$mb_gender = $_POST['mb_gender']; // 성별
$mb_lg= $_POST['mb_language']; //언어

echo $mb_id . "<br>";
echo $mb_pw  . "<br>";
echo $mb_pw2  . "<br>";
echo $mb_name  . "<br>";
echo $mb_email  . "<br>";
echo $mb_job  . "<br>";
echo $mb_gender  . "<br>";
echo $mb_lg  . "<br>";
?>