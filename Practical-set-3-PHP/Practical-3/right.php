<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="container">
 <form action="<?php $_SERVER['PHP_SELF'] ?>" class="form" method="post">
 <input type="text" name="n" />
 <button type="submit">Submit</button>
 </form>
 <?php
 if(isset($_POST["n"])){
 $num = $_REQUEST['n'];
$nums = explode(" ",$num);
for($i=0 ; $i<2 ;$i++){
 $nums[$i] = floatval($nums[$i]);
 }
   $pow = pow($nums[0],$nums[1]);
 }
 ?>
 <div class="num">
 <div class="pow box">
 <div class="title">pow()</div>:
 <div class="ans"><?php if (isset($pow)) { echo "$pow"; } ?></div>
 </div>
 </div>
 </div>
</body>
</html>
