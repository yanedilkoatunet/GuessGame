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
            <form method="post" action="index.php">
                <h1>TRY TO GUESS CORRECT NUMBER</h1>
                    <?php
                        if($_POST){
                            $choose = $_POST["choose"];
                            $comp = $_POST["comp"];
                            $attempt = $_POST["attempt"];
                            if ($comp == $choose){
                                echo ("<span>Congatulations! You picked correct number</span>");
                                $attempt = 0;
                                $comp = rand(1, 10); 
                            }else{
                                switch ($attempt++){
                                    case 0:
                                        echo("<p>Try again...You have two more guess<p>");
                                    break;
                                    case 1:
                                        echo("<p>Try again...You have one more guess<p>");
                                    break;
                                    case 2:
                                        echo("<span>You lost... High powers choosed " .$comp."</span>");
                                        $comp = rand(1, 10); 
                                        $attempt = 0;
                                    break;
                                }
                            }
                        }else{
                            echo ("<h2> WELCOME PLAYER </h2>");
                            $comp = rand(1, 10); 
                            $attempt = 0;
                        }
                        echo("
                            <p>Choose your number</p>
                            <select name='choose'>
                        ");
                        for($i = 1; $i <= 10; $i++){
                            echo("<option value='".$i."'>".$i."</option>");
                        }
                        echo("</select>");
                    ?>
                <input type ="hidden" name="attempt" value="<?=$attempt?>">
                <input type ="hidden" name="comp" value="<?=$comp?>">
                <input class="submit" type="submit" name="submit" value="Play" />
            </form>
        </div>
    </div>

</body>

</html>