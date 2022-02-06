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
            <form action="hardguess.php" method="post">
                <?php
                    $points = $_POST['points'];
                    $comp = $_POST["comp"];
                    $guessed = $_POST["guessed"];
                    $step = $_POST["step"];
                    $choose = $_POST["choose"];
                    $diapasonstart = $_POST["diapasonstart"];
                    if($comp == $choose){
                        $points += 10;
                    }else{
                        $points -= 2;
                    }
                    echo("<h2>Your points now are : ".$points."</h2>");
                    ?>
                <h1>TRY TO GUESS CORRECT NUMBER</h1>
                <?php
                    if($comp == $choose){
                        echo("<p>Finally!!!You choosed correct number!<br>Congrats!!</p>");
                    }else{
                        echo("<p>Sorry but you lost<br>
                        You have no more guesses left<br>
                        Correct number was ".$comp."<br>
                        You can play again</p>");
                    }
                ?>
            <input class="submit" type="submit" value="PLAY AGAIN">
            <input type="hidden" name="points" value="<?=$points?>">
            <input type="hidden" name="guessed" value="<?=$guessed?>">
            <input type="hidden" name="step" value="<?=$step?>">
            <input type="hidden" name="diapasonstart" value="<?=$diapasonstart?>">
            <input type="hidden" name="comp" value="<?=$comp?>">
            </form>
        </div>
    </div>
</body>

</html>