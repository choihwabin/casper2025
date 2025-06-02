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
      user-select:none;
    }
    div label{margin-right:10px;}
    div input{margin-right:3px;}
  </style>
</head>
<body>
  <form action="resister_update.php" method='post' name='join' class='container border border-3 rounded shadow mt-4 pb-4' onsubmit="return form_check()">
    <h1 class='text-center my-4'>회원가입</h1>
    <p>*(필수입력)</p>
    <label for="login_id2">*아이디</label>
    <input type="text" id='login_id2' name='login_id2' placeholder='사용하실 아이디를 입력하세요.' class='form-control mb-4' maxlength='20'>

    <label for="login_password2">*비밀번호</label>
    <input type="password" id='login_password2' name='login_password2' placeholder='특수문자,영어,숫자 세가지로 8자 이상' class='form-control mb-4' maxlength='20'>

    <label for="login_password3">*비밀번호 확인</label>
    <input type="password" id='login_password3' name='login_password3' placeholder='비밀번호를 재입력해주세요.' class='form-control mb-4' maxlength='20'>

    <label for="mb_name">*이름</label>
    <input type="text" id='mb_name' name='mb_name' class='form-control mb-4' placeholder='이름을 입력하세요.' maxlength='15'>

    <label for="mb_email">*이메일</label>
    <input type="email" id='mb_email' name='mb_email' placeholder='예) asdf@domain.com' class='form-control mb-4'>

    <label for="mb_job">*직업</label>
    <select name="mb_job" id="mb_job" class='form-select mb-4'>
      <option value="">선택하세요.</option>
      <option value="학생">학생</option>
      <option value="직장인">직장인</option>
      <option value="자영업자">자영업자</option>
      <option value="주부">주부</option>
      <option value="취업준비생">취업준비생</option>
    </select>
    <label>*성별</label>
    <div class='form-check mb-4'>
      <label for="man" class='form-check-label'><input type="radio" id='man' name='mb_gender' class='from-check-input'>남자</label>
      <label for="women" class='form-check-label'><input type="radio" id='women' name='mb_gender' class='from-check-input'>여자</label>
    </div>

    <label for="">*관심언어</label>
    <div class='form-check mb-4'>
      <label for="language1" class='form-check-label'><input type="checkbox" id='language1' name='mb_language' class='from-check-input' value='HTML'>HTML</label>
      <label for="language2" class='form-check-label'><input type="checkbox" id='language2' name='mb_language' class='from-check-input' value='CSS'>CSS</label>
      <label for="language3" class='form-check-label'><input type="checkbox" id='language3' name='mb_language' class='from-check-input' value='PHP'>PHP</label>
      <label for="language4" class='form-check-label'><input type="checkbox" id='language4' name='mb_language' class='from-check-input' value='MySQL'>MySQL</label>
    </div>
    <input type="submit" value='회원가입' class='btn btn-warning text-light'>
    <a href="index.php" title='로그인 화면 바로가기' class='btn btn-success'>로그인 바로가기</a>
    <input type="reset" value='취소' class='btn btn-danger'>

  </form>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    function form_check(){
      if(!document.getElementById('login_id2').value){
        alert('아이디를 입력하세요.');
        login_id2.focus();
        return false;
      }
      if(!document.getElementById('login_password2').value){
        alert('비밀번호를 입력하세요.');
        login_password2.focus();
        return false;
      }
      if(!document.getElementById('login_password3').value){
        alert('비밀번호를 입력하세요.');
        login_password3.focus();
        return false;
      }
      if(!document.getElementById('mb_name').value){
        alert('이름을 입력하세요.');
        mb_name.focus();
        return false;
      }
      if(!document.getElementById('mb_email').value){
        alert('이메일을 입력하세요.');
        mb_email.focus();
        return false;
      }
      if(!document.getElementById('mb_job').value){
        alert('직업을 선택하세요.');
        mb_job.focus();
        return false;
      }

      // 성별 라디오 버튼
      let str ='';
      let f = false; //선택하지 않은 경우의 변수값
      for (let i=0;i<join.mb_gender.length;i++){ //초기값;조건식;증감식
        if(join.mb_gender[i].checked){  
        str += join.mb_gender[i].value; 
        f = true;
        break;
        }
      }
      if(f==false){
        alert('성별을 선택하세요.');
        return false;
      }

      // 관심언어 체크박스
      let str2=''; //초기화 시키는 변수
      let f2=false; //선택하지 않은 경우의 변수값
      let languages = document.getElementsByName('mb_language');

      for(let e=0;e<languages.length; e++){
        if(languages[e].checked){
          str2 += languages[e].value;
          f2 = true;
          break;
        }
      }
      if(!f2){
        alert('관심언어를 선택하세요.');
        return false;
      }
      return true;


    };

  </script>
</body>
</html>