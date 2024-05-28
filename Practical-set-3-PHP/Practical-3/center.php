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
 <form action="<?php $_SERVER['PHP_SELF'] ?>" class="form"
method="post">
 <input type="text" name="n"/>
 <button type="submit">Submit</button>
 </form>
 <?php
 if(isset($_POST["n"])){
 $num = $_REQUEST['n'];
$nums = explode(" ",$num);
for($i=0 ; $i<count($nums) ;$i++){
 $nums[$i] = floatval($nums[$i]);
 }
$min = min($nums);
$max = max($nums);
 }
 ?>
 <div class="num">
 <div class="min box">
 <div class="title">min()</div>:
<div class="ans"><?php if (isset($min)) { echo "$min"; }
?></div>
 </div>
 <div class="max box">
 <div class="title">max()</div>:
<div class="ans"><?php if (isset($max)) { echo "$max"; }
?></div>
 </div>
 </div>
 </div>
</body>
</html>
