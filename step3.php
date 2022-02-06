<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carrois+Gothic+SC&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php
                $points = $_POST['points'];
                $comp = $_POST["comp"];
                $step = $_POST["step"];
                $choose = $_POST["choose"];
                $guessed = $_POST["guessed"];
                $diapasonstart = $_POST["diapasonstart"];
                if($comp == $choose){
                    $points += 20;
                }else{
                    $points -= 2;
                }
                if($guessed == $comp){
                    $points += 30;
                    echo("<h2>YOU ARE REAL PSYCHIC!!!<br>
                    You guessed BOTH range and number</h2>");
                }
                echo("<h2>Your points now are : ".$points."</h2>");
            ?>
            <form method="post" action="<?php 
                if($comp == $choose ){
                    echo("hardguess.php");
                }else {
                    echo("step4.php");
                } 
                ?>">
                <h1>TRY TO GUESS CORRECT NUMBER</h1>
                <?php
                    if($comp == $choose){
                        echo("<p>No way!!!You choosed correct number!<br>Congrats!!</p>");
                    }else{
                        echo("<p>Luck wasn't on your side this time!<br>
                            You have two more guesses</p>");
                        echo("<select name='choose'>");
                        if($diapasonstart + 5 <= $comp){
                            $diapasonstart += 5;
                        }
                        for($m = $diapasonstart; $m < $diapasonstart + 5; ++$m){
                            echo("<option value='$m'>".$m."</option>)");
                        }
                        echo("</select>");
                    }
                ?>
                <input type="hidden" name="points" value="<?=$points?>">
                <input type="hidden" name="guessed" value="<?=$guessed?>">
                <input type="hidden" name="step" value="<?=$step?>">
                <input type="hidden" name="diapasonstart" value="<?=$diapasonstart?>">
                <input type="hidden" name="comp" value="<?=$comp?>">
                <input class="submit" type="submit" name="submit" value="<?php echo  ($comp == $choose) ? "PLAY AGAIN" : "PLAY"?>"/>
            </form>
        </div>
    </div>
</body>

</html>