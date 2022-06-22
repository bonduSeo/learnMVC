<!DOCTYPE html>
<html lang="en">
<?php include_once "application/views/template/head.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>디테일</h1>
    <div><button data-i_board="<?= $_GET['i_board'] ?>" id="btnMod">수정</button></div>
    <div><button data-i_board="<?= $_GET['i_board'] ?>" id="btnDel">삭제</button></div>
    <div>
        <?= "i_board : " . $this->data->i_board . "<br>" ?>
    </div>
    <div>
        <?= "title: " . $this->data->title . "<br>" ?>
    </div>
    <div>
        <?= "ctnt : " . $this->data->ctnt . "<br>" ?>
    </div>
    <div><?= "글쓴이:" . $this->data->nm ?></div>
    <div><?= "작성일시:" . $this->data->created_at ?></div>



</body>

</html>