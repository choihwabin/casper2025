<?php
include('./sub/header.php');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  
  a{text-decoration:none;}
  body{background: #ddd;}
  #header > h1{padding-left:20px}
  .container{background: #fff;margin: 50px auto 119px auto; width: 600px;}
  .container a{text-decoration:none; color:#333; border-right:1px solid #333; padding-right: 4px; font-size:14px;}
  a:last-child{border:none;}
  .btn-success{width: 100%;}
  header{background: #fff;}
  header > h1{padding:0px}
  footer{height: 200px;}
  address{font-size:14px}
  .gnb{margin:-30px auto 0 auto;}
  </style>
</head>
<body>
<form action="login_check.php" method='post' name='' class='container border border-3 rounded pb-5 shadow' onsubmit="return form_check()">
  <h1 class='text-center mt-4'>로그인</h1>
  <label for="login_id" class='mt-4'>아이디</label>
  <input type="text" id='login_id' placeholder='아이디를 입력하세요.' class='form-control mb-4'>
  <label for="login_password">비밀번호</label>
  <input type="password" id='login_password' placeholder='비밀번호를 입력하세요.' class='form-control mb-4'>
  <input type="checkbox" class='form-check-input mb-4'><label>아이디저장</label>
  <div>
  <input type='submit' title='로그인' class='btn btn-success py-3' value='로그인'>
</div>

  <div class='id mt-4'>
    <a href="#" title='아이디 찾기'>아이디찾기</a>
    <a href="#" title='비밀번호 재설정'>비밀번호 재설정</a>
    <a href="register.php" title='회원가입'>회원가입</a>
  </div>

  <a href="../index.html" title='메인페이지로 바로가기' style='float:right;'>
    <img src="./images/logo-casper_black.png" alt="홈페이지 바로가기">
  </a>
  </form>

  <script>
    function form_check(){
      if(!document.getElementById('login_id').value){
        alert('아이디를 입력하세요.');
        login_id.focus();
        return false;
      }
      if(!document.getElementById('login_password').value){
        alert('비밀번호를 입력하세요.');
        login_password.focus();
        return false;
      }
      return true;
    };
  </script>
</body>
</html>
<?php
include('./sub/footer.php');
?>