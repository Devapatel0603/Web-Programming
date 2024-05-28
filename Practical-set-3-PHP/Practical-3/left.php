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
 $num = floatval($_REQUEST['n']);
 $abs = abs($num);
 $round = round($num);
 $ceil = ceil($num);
 $floor = floor($num);
 $sqrt = sqrt($num);
 }
 ?>
 <div class="num">
 <div class="abs box">
 <div class="title">abs()</div>:
 <div class="ans"><?php if (isset($abs)) { echo "$abs"; } ?></div>
 </div>
 <div class="round box">
 <div class="title">round()</div>:
 <div class="ans"><?php if (isset($round)) { echo "$round"; }
?></div>
 </div>
 <div class="ceil box">
 <div class="title">ceil()</div>:
 <div class="ans"><?php if (isset($ceil)) { echo "$ceil"; } ?></div>
 </div>
 <div class="floor box">
 <div class="title">floor()</div>:
 <div class="ans"><?php if (isset($floor)) { echo "$floor"; }
?></div>
 </div>
 <div class="sqrt box">
 <div class="title">sqrt()</div>:
 <div class="ans"><?php if (isset($sqrt)) { echo "$sqrt"; } ?></div>
 </div>
 </div>
 </div>
</body>
</html>
