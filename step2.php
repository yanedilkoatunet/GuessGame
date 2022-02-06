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
                $comp = rand(1,100);
                $points = $_POST['points'];
                $step = $_POST["step"];
                $choose = $_POST["choose"];
                $guessed = 0;
                var_dump($comp);
                for($i = 1, $k = $step; $i <= 100 && $k <= 100; $i += $step, $k += $step){
                    if($i <= $comp && $k >= $comp){
                        $diapasonstart = $i;
                        $diapasonend = $diapasonstart + 9;
                        if($diapasonstart == $choose){
                            $points += 25;
                            $guessed = $comp;
                        }else{
                            $points -= 2;
                        }
                    }
                }      
                echo("<h2>Your points now are : ".$points."</h2>");
            ?>
            <form method="post" action="step3.php">
                <h1>TRY TO GUESS CORRECT NUMBER</h1>
                <?php
                    if($diapasonstart == $choose){
                        echo("<p>You choosed correct range!Congrats!!</p>");
                    }else{
                        echo("<p>Luck wasn't on your side this time!<br>
                        Correct range was: ".$diapasonstart."...".$diapasonend."<br>
                        You have three more attempts</p>");
                    }
                    echo("<select name='choose'>");
                    for($i = 1, $k = $step; $i <= 100 && $k <= 100; $i += $step, $k += $step){
                        if($i <= $comp && $k >= $comp){
                            for($m = $diapasonstart; $m <= $k; ++$m){
                                echo("<option value='$m'>".$m."</option>)");
                            }
                            echo("</select>");
                        }
                    }
                    ?>
                <input type="hidden" name="points" value="<?=$points?>">
                <input type="hidden" name="guessed" value="<?=$guessed?>">
                <input type="hidden" name="step" value="<?=$step?>">
                <input type="hidden" name="diapasonstart" value="<?=$diapasonstart?>">
                <input type="hidden" name="comp" value="<?=$comp?>">
                <input class="submit" type="submit" name="submit" value="<?php echo  ($comp == $choose) ? "PLAY AGAIN" : "PLAY"?>">
            </form>
        </div>
    </div>
</body>

</html>

