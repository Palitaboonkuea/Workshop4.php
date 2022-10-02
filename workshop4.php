<html>
<head>
    <meta charset="utf-8">
    <style>
        div{ display:block; padding: 10px;}
        form{ margin: 20px;}
        img{ margin: 10px;}
        span{ font-weight: bold;}
    </style>
<head>
<body>
<form action="workshop4.php" method="get">
    <input type="text" name="getusername" placeholder="กรอก username">
    <input type="submit" value="ค้นหา">
</form>
<div>
<?php
    $pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
    if (!empty($_GET)) 
    $value = '%' . $_GET["getusername"] . '%';
    $stmt->bindParam(1, $value);
    $stmt->execute();
?>
<?php while ($row = $stmt->fetch()) : ?>
   <div>
   <img src='member_photo/<?=$row["username"]?>.jpg' width='100'><br>
   <span>Username: <?=$row ["username"]?></span><br>
        ชื่อสมาชิก: <?=$row ["name"]?><br>
        ที่อยู่: <?=$row ["address"]?><br>
        อีเมล์: <?=$row ["email"]?><hr>
   </div>
<?php endwhile; ?>
</div>
</body>
</html>