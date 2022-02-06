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
            <form method="post" action="step2.php">
                <?php
                    if(isset($_POST['points'])){
                        $points = $_POST['points'];
                        echo("<span>WELCOME BACK PLAYER<br>
                        Your points from last game are : ".$points."</span>");
                    }else{
                        $points = 0;
                        echo("WELCOME PLAYER");
                    }
                    echo("<h1>TRY TO GUESS CORRECT NUMBER</h1>");
                    $step = 10; 
                    echo("
                        <p>Choose range</p>
                        <select name='choose'>
                    ");
                    for($i = 1, $k = $step; $i <= 100 && $k <= 100; $i += $step, $k += $step){
                        echo("<option value='".$i."'>".$i." ... ".$k."</option>");
                    }
                    echo("</select>");
                    ?>
                    <input type="hidden" name="points" value="<?=$points?>">
                    <input type="hidden" name="step" value="<?=$step?>">
                <input class="submit" type="submit" name="submit" value="PLAY"/>
            </form>
        </div>
    </div>
</body>

</html>

