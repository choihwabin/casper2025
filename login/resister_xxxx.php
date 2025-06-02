<?php
include('./db/dbconn.php'); //db연결을 위한 dbconn.php 파일을 인클루드함.

// 세션이 있다면, 회원 정보를 가져오고 회원수정 mode로 설정
if(isset($_SESSION['ss_mb_id'])) {
  $mb_id = $_SESSION['ss_mb_id'];
  // 회원 정보를 조회하는 SQL 문
  $sql = " SELECT * FROM member WHERE mb_id = '$mb_id' ";
  $result = mysqli_query($conn, $sql);
  $mb = mysqli_fetch_assoc($result);
  mysqli_close($conn); // 데이터베이스 접속 종료

  $mode = "modify";
  $title = "회원수정";
  $modify_mb_info = "readonly";
  $href = "./member_list.php";
} else {
  $mode = "insert";
  $title = "회원가입";
  $modify_mb_info = '';
  $href = "./index.php";
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입 폼</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body{
      width: 600px;
      margin: 0 auto;

    }
    div label{margin: 0px 10px;}
  </style>
</head>
<body>
  <form action="resister_update.php" method='post' name='join' class='container border border-3 rounded shadow mt-4 pb-4' onsubmit="return form_check()">
    <h1 class='text-center my-4'>회원가입</h1>
    <p>*(필수입력)</p>
    <label for="login_id2">*아이디</label>
    <input type="text" id='login_id2' name='login_id2' placeholder='사용하실 아이디를 입력하세요.' class='form-control mb-4' maxlength='20' value='<?php echo $mb['login_id2'] ??''?>'>

    <label for="login_password2">*비밀번호</label>
    <input type="password" id='login_password2' name='login_password2' placeholder='특수문자,영어,숫자 세가지로 8자 이상' class='form-control mb-4' maxlength='20'>

    <label for="login_password3">*비밀번호 확인</label>
    <input type="password" id='login_password3' name='login_password3' placeholder='비밀번호를 재입력해주세요.' class='form-control mb-4' maxlength='20'>

    <label for="mb_name">*이름</label>
    <input type="text" id='mb_name' name='mb_name' class='form-control mb-4' placeholder='이름을 입력하세요.' maxlength='15' value='<?php echo $mb['mb_name'] ??''?>'>

    <label for="mb_email">*이메일</label>
    <input type="email" id='mb_email' name='mb_email' placeholder='예) asdf@domain.com' class='form-control mb-4' value='<?php echo $mb['mb_email'] ?? ''?>'>

    <label for="mb_job">*직업</label>
    <select name="mb_job" id="mb_job" class='form-select mb-4'>
      <option value="">선택하세요.</option>
      <option value="학생"<?php echo ($mb['mb_job']=='학생')?'selected':'';?>>학생</option>
      <option value="직장인"<?php echo ($mb['mb_job']=='직장인')?'selected':'';?>>직장인</option>
      <option value="자영업자"<?php echo ($mb['mb_job']=='자영업자')?'selected':'';?>>자영업자</option>
      <option value="주부"<?php echo ($mb['mb_job']=='주부')?'selected':'';?>>주부</option>
      <option value="취업준비생"<?php echo ($mb['mb_job']=='취업준비생')?'selected':'';?>>취업준비생</option>
    </select>
    <label>*성별</label>
    <div class='form-check mb-4'>
      <label for="man" class='form-check-label'><input type="radio" id='man' name='mb_gender' class='form-check-input' value="남자"<?php echo ($mb['mb_gender']=='남자')?'checked':'';?>>남자</label>
      <label for="women" class='form-check-label'><input type="radio" id='women' name='mb_gender' class='form-check-input' value="여자"<?php echo ($mb['mb_gender']=='여자')?'checked':'';?>>여자</label>
    </div>

    <label for="">*관심언어</label>
    <div class='form-check mb-4'>
      <label for="language1" class='form-check-label'><input type="checkbox" id='language1' name='mb_language' class='form-check-input' value='HTML' value='<?php echo (str_contains($mb['mb_language'],'HTML') !==false)?'checked':'';?>'>HTML</label>
      <label for="language2" class='form-check-label'><input type="checkbox" id='language2' name='mb_language' class='form-check-input' value='CSS'  value='<?php echo (str_contains($mb['mb_language'],'CSS') !==false)?'checked':'';?>'>CSS</label>
      <label for="language3" class='form-check-label'><input type="checkbox" id='language3' name='mb_language' class='form-check-input' value='PHP'  value='<?php echo (str_contains($mb['mb_language'],'PHP') !==false)?'checked':'';?>'>PHP</label>
      <label for="language4" class='form-check-label'><input type="checkbox" id='language4' name='mb_language' class='form-check-input' value='MySQL'  value='<?php echo (str_contains($mb['mb_language'],'MySQL') !==false)?'checked':'';?>'>MySQL</label>
    </div>
    <input type="submit" value='회원가입' class='btn btn-warning text-light'>
    <a href="index.php" title='로그인 화면 바로가기' class='btn btn-success'>로그인 바로가기</a>
    <input type="reset" value='취소' class='btn btn-danger'>

  </form>

</body>
</html>