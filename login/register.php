<?php
include("./db/dbconn.php"); // DB연결을 위한 dbconn.php 파일을 인클루드합니다.
// 세션(ss_mb_id)이 있다면, 회원 정보조회(select구문)하여 가져오고 회원수정 mode로 설정
if(isset($_SESSION['ss_mb_id'])){//세션 정보가 존재한다면 ==로그인한 경우
  $mb_id = $_SESSION['ss_mb_id'];

  $sql = 'select * from member where mb_id="$mb_id"';//회원정보를 조회
  $result = mysqli_query($conn, $sql); //조회된 결과를 변수에 저장

  $mb = mysqli_fetch_assoc($result); //조회결과가 저장된 자료 변수값
  mysqli_close($conn); //데이터베이스 접속종료
}

// if(isset($_SESSION['ss_mb_id'])) {
//     $mb_id = $_SESSION['ss_mb_id'];
//     // 회원 정보를 조회하는 SQL 문
//     $sql = " SELECT * FROM member WHERE mb_id = '$mb_id' ";
//     $result = mysqli_query($conn, $sql);
//     $mb = mysqli_fetch_assoc($result);
//     mysqli_close($conn); // 데이터베이스 접속 종료

//     $mode = "modify";
//     $title = "회원수정";
//     $modify_mb_info = "readonly";
//     $href = "./member_list.php";
// } else {
//     $mode = "insert";
//     $title = "회원가입";
//     $modify_mb_info = '';
//     $href = "./index.php";
// }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
<body>
<div class="container">
    <h4><?php echo $title ?></h4>

    <form action="./register_update.php" method="post">
        <input type="hidden" name="mode" value="<?php echo $mode ?>">

        <label for="mb_id">아이디</label>
        <div class="mb-3">
            <input type="text"
										id="mb_id"
										name="mb_id"
										
										value="<?php echo $mb['mb_id'] ?? '' ?>" <?php echo $modify_mb_info ?>>
        </div>

        <label for="mb_password">비밀번호</label>
        <div class="mb-3">
            <input type="password"
										id="mb_password"
										name="mb_password"
										>
        </div>

        <label for="mb_password_re">비밀번호 확인</label>
        <div class="mb-3">
            <input type="password"
										id="mb_password_re"
										name="mb_password_re"
										>
        </div>

        <label for="mb_name">이름</label>
        <div class="mb-3">
            <input type="text"
										id="mb_name"
										name="mb_name"
										
										value="<?php echo $mb['mb_name'] ?? '' ?>">
        </div>

        <label for="mb_email">이메일</label>
        <div class="mb-3">
            <input type="email"
										id="mb_email"
										name="mb_email"
										
										value="<?php echo $mb['mb_email'] ?? '' ?>">
        </div>

        <label>직업</label>
        <div class="mb-3">
					<select name="mb_job">
						<option value="">선택하세요</option>
						<option value="학생" <?php echo ($mb['mb_job']=="학생")?"selected":"";?>>학생</option>
						<option value="회사원" <?php echo ($mb['mb_job']=="회사원")?"selected":"";?>>회사원</option>
						<option value="공무원" <?php echo ($mb['mb_job']=="공무원")?"selected":"";?>>공무원</option>
						<option value="주부" <?php echo ($mb['mb_job']=="주부")?"selected":"";?>>주부</option>
						<option value="무직" <?php echo ($mb['mb_job']=="무직")?"selected":"";?>>무직</option>
					</select>
        </div>

        <label>성별</label>
        <div class="mb-3">
            <div>
                <input type="radio"
                    
                    name="mb_gender"
                    id="gender1"
                    value="남자" <?php echo ($mb['mb_gender'] == "남자") ? "checked" : "";?>>
                <label for="gender1">남자</label>
            </div>
            <div>
                <input type="radio"
                    
                    name="mb_gender"
                    id="gender2"
                    value="여자" <?php echo ($mb['mb_gender'] == "여자") ? "checked" : "";?>>
                <label for="gender2">여자</label>
            </div>
        </div>

        <label>관심언어</label>
        <div>
            <div>
                <input type="checkbox"
                    id="mb_language1"
                    name="mb_language[]"
                    value="HTML" <?php echo strpos($mb['mb_language'], 'HTML') !== false ?'checked':'' ?>>
                <label for="mb_language1">HTML</label>
            </div>
            <div>
                <input type="checkbox"
                    id="mb_language2"
                    name="mb_language[]"
                    value="CSS" <?php echo strpos($mb['mb_language'], 'CSS') !== false ?'checked':'' ?>>
                <label for="mb_language2">CSS</label>
            </div>
            <div>
                <input type="checkbox"
                    id="mb_language3"
                    name="mb_language[]"
                    value="PHP" <?php echo strpos($mb['mb_language'], 'PHP') !== false ?'checked':'' ?>>
                <label for="mb_language3">PHP</label>
            </div>
            <div>
                <input type="checkbox"
                    id="mb_language4"
                    name="mb_language[]"
                    value="MySQL" <?php echo strpos($mb['mb_language'], 'MySQL') !== false ?'checked':'' ?>>
                <label for="mb_language4">MySQL</label>
            </div>
        </div>

        <button type="submit" value='회원가입'><?php echo $title ?></button>
        <a href="<?php echo $href ?>">취소</a>
    </form>
</div>
</body>
</html>