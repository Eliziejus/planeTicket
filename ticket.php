<?php include('inc/function.php');

$data=($_POST);
//$data = $item[$_GET['rez']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="style2.css">
    <title>Ticket</title>
</head>
<body>
<div class="container">

    <div class="box">
        <div class="border">
            <div class="color"><h2> Bilietas</h2>
        </div>
            
            <div class="data1">
                <h3><?= $data['0']?>      <?= $data['1']?></h3>
                <h4>Asmens kodas: <?=$data['2']?></h4>
            </div>
            <div class="data2">
                <h4>Skrydžio <?=$data['3']?>Nr</h4>
                <h4>Svoris:<?=$data['4']?>kg</h4>
                <?php
                if($data['4']=="20"){
                    $kaina=$data['7'];
                    $sum=$data['7']+30;
                    echo"<h4>Kaina:$sum</h4>";
                    
                }else{
                    $kaina=$data['7'];
                    echo "<h4>Kaina: $kaina </h4>";
                }
        
                ?>
                
            </div>
            <div class="data3">
                <h4>Atvykimo vieta: <?= $data['6'] ?> </h4>
                <h4>Išvykos vieta:<?=$data['5']?></h4>

            </div>
            <div class="data4">
                <h4>Pastaba:</h4>
                <p><?=$data['8']?></p>
            </div>
        </div>

    </div>
</div>
</body>
</html>
