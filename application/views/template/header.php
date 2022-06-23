<div>
    <?php
    // print_($_SESSION[_LOGINUSER]);
    if (isset($_SESSION[_LOGINUSER])) { ?>
        <a href="<?= _MVCFOLER ?>/board/write">글쓰기</a>
        <a href="<?= _MVCFOLER ?>/user/logout">로그아웃</a>
    <?php } else {   ?>
        <a href="<?= _MVCFOLER ?>/user/login">로그인</a>
        <a href="<?= _MVCFOLER ?>/user/join">회원가입</a>
    <?php    } ?>
    <a href="<?= _MVCFOLER ?>/board/list">리스트</a>

</div>