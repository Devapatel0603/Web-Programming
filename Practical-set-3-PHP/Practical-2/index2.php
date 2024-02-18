<!--
Write a PHP program to print following patterns.

1
0 1
1 0 1
0 1 0 1
1 0 1 0 1

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            width: 100dvw;
            height: 100dvh;
        }

        .container{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container form{
            position: absolute;
            top: 20%;
            width: 50%;
            display: flex;
            flex-wrap : wrap;
            justify-content: center;
            align-items: center;
            gap: 1%;
        }

        .form input{
            width: 100%;
            height: 30px;
            margin-bottom : 2%;
            padding-left: 8px;
        }

        .form button{
            width: 30%;
            height: 30px;
            cursor: pointer;
            background-color: plum;
            border : 1.5px solid black;
            border-radius: 50px;
            transition: scale 0.2s linear;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .form button:hover{
            box-shadow : 0 0 5px black;
            scale: 1.05;
        }   

        input[type=number]:hover{
            box-shadow: 0 0 5px black;
        }

        .container .num{
            position: fixed;
            top: 40%;
            width: 50%;
            background: plum;
            height: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid black;
            border-radius: 50px;
            color: aliceblue;
            font-size: 1.5rem;
        }

        .container .num:hover{
            box-shadow: 0 0 5px black;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" class="form" method="post">
            <input type="number" name="n"/>
            <button type="submit">Submit</button>
        </form>
        <div class="num">
            <?php
                if(isset($_POST["n"])){
                    $num = $_REQUEST['n'];
                    for($r=1; $r<6 ; $r++){
                        $i = 0;
                        $j = 1;
                        for($c=1 ; $c<=$r ; $c++){
                            if($r%2 == 0){
                                echo($i." ");
                                if($i==0){
                                    $i++;
                                }
                                else{
                                    $i--;
                                }
                            }
                            else{
                                echo($j." ");
                                if($j==1){
                                    $j--;
                                }
                                else{
                                    $j++;
                                }
                            }
                        }
                        echo "<br>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
