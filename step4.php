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
                $guessed = $_POST["guessed"];
                $step = $_POST["step"];
                $choose = $_POST["choose"];
                $diapasonstart = $_POST["diapasonstart"];
                if($comp == $choose){
                    $points += 15;
                }else{
                    $points -= 2;
                }
                echo("<h2>Your points now are : ".$points."</h2>");
            ?>
            <form method="post" action="<?php 
                if($comp == $choose ){
                    echo("hardguess.php");
                }else {
                    echo("results.php");
                } 
                ?>">
                <h1>TRY TO GUESS CORRECT NUMBER</h1>
                <?php
                    if($comp == $choose){
                        echo("<p>You choosed correct number!<br>Congrats!!</p>");
                    }else{
                        echo("<p>Luck wasn't on your side this time!<br>
                            You have one more guess left</p>");
                        if($choose > $comp){
                            echo("<p>Your picked number ".$choose." is BIGGER than high powers choosed</p>");
                        }else{
                            echo("<p>Your picked number ".$choose." is SMALLER than high powers choosed</p>");
                        }
                        echo("<select name='choose'>");
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
                <input class="submit" type="submit" name="submit" value="<?php echo  ($comp == $choose) ? "PLAY AGAIN" : "PLAY"?>" />
            </form>
        </div>
    </div>
</body>

</html>