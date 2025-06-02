// 상단헤더 내비게이션 화면스크롤 동작시 h_act적용하기

// // 1. 자바스크립트로 구현하기
// const h = document.getElementById('header');

// // 화면스크롤 이벤트 = window scroll
// window.addEventListener('scroll', function(){
//   let sPos = window.scrollY;
//   if(sPos>0){
//   h.classList.add('h_act');
//   }else{
//     h.classList.remove('h_act');
//   }
// });


// 2. 제이쿼리로 구현하기
$(document).ready(function(){
  const h = $('header');
  // 원형 내비게이션 변수
  let nav = $("#m_nav ul li");

  // 내비게이션에 마우스 오버시 h_act서식 적용
  h.mouseenter(function(){
    h.addClass('h_act');
    $('header h1 img').attr('src', './images/logo-casper_black.png');
  });
  // 내비게이션에 마우스 아웃시 h_act서식 제거
  h.mouseleave(function(){
    h.removeClass('h_act');
    $('header h1 img').attr('src', './images/logo-casper-white.png');
  });

  // 스크롤 이벤트
  $(window).scroll(function(){
    let sPos = $(this).scrollTop();
    if(sPos>=1){
      h.addClass('h_act');
      $('header h1 img').attr('src', './images/logo-casper_black.png');
    }else{
      h.removeClass('h_act');
      $('header h1 img').attr('src', './images/logo-casper-white.png');
    }
  });
  //메뉴 클릭시 해당 아이디값을 찾아서 해당 section영역을 상단으로 scroll한다.
  nav.click(function(e){
    e.preventDefault(); //새로고침 방지
    // alert('dsada');
    let i = $(this).index();
    console.log(i); //몇번째 li태그인지 n값을 구해줌.
    // $('html, body').animate({scrollTop:'0px'}, 500); 맨위로 올리는 방법

    // 두번째 방법
    let id_name = $(this).find('a').attr('href');
    console.log(id_name);
    // 해당 id section을 선택하여 화면 위로 올리기
    let offTop = $(id_name).offset().top;
    $('html, body').animate({scrollTop:offTop}, 500);

  });

  // 원형 내비게이션 서식
  // $('#m_nav  ul li a').on("click",function(e){
  //   e.preventDefault();
    
  //   let target = $(this).attr('href');
  //   let tPos = $(target).offset().top;

  //   $('html, body').animate({scrollTop:tPos},500);
  // });
});


