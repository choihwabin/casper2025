<?php
  $mysql_host='localhost'; //db host명
  $mysql_user='root'; //db사용자
  $mysql_password='1234'; //db비밀번호
  $mysql_db='kdt'; //db명

  // db연결을 위한 변수선언
  $conn=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);

  //  db연결 오류시 메세지 띄워기
  if(!$conn){
    die ('연결실패 :'.mysqli_connect_error());
  }

  // db연결 성공시
  session_start(); //세션시작
?>