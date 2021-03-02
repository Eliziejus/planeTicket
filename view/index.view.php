
<html lang="en">
<head>
<link rel="stylesheet" href="view/style.css">

<title>Plane Ticket</title>
</head>
<body>
        <?php
if (isset($_POST['send'])) {
    if (empty(validate($_POST)) == false) {
        foreach (validate($_POST) as $err) {
            echo $err . "<br>";
        }
    } else {
        printData();
    }
}
?>

<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="name">Vardas</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
            <small class="small">Iveskite varda</small>
        </div>
        <div class="form-group">
            <label for="lastname">Pavarde</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp">
            <small class="small">iveskite pavarde</small>
        </div>
        <div class="form-group">
            <label for="code">Asmens kodas</label>
            <input type="number" class="form-control" id="code" name="code" aria-describedby="codeHelp">
            <small class="small">Iveeskite asmens kodas</small>
        </div>
        <div class="form-group1">
            <select class="form-control1" name="number">
                <option selected disabled>-- Pasirinkite skrydzio numeri</option>
                <?php foreach ($skrydziai as $fly): ?>
                <option value="<?=$fly;?>"><?=$fly;?></option>
                <?php endforeach;?>
            </select>
            <small class="small">Skrydžio numeri</small>
        </div>
        <div class="form-group1">
            <select class="form-control1" name="weight">
                <option selected disabled>-- Pasirinkite bagazo svori</option>
                <?php foreach ($bagazas as $items): ?>
                <option value="<?=$items;?>"><?=$items;?></option>
                <?php endforeach;?>
            </select>
            <small class="small">Iveskite bagazo svori</small>
        </div>
        <div class="form-group1">
            <select class="form-control1" name="inlocation">
                <?php foreach ($isvykimas as $bye): ?>
                <option value="<?=$bye;?>"><?=$bye;?></option>
                <?php endforeach;?>
                <option selected disabled>-- Pasirinkite isvykimo miesta</option>
            </select>
        </div>
        <div class="form-group1">
            <select class="form-control1" name="location">
            <option selected disabled>-- Pasirinkite atvykimo miesta</option>
                <?php foreach ($atvykimas as $miestas): ?>
                <option value="<?=$miestas;?>"><?=$miestas;?></option>
                <?php endforeach;?>
            </select>
            <small class="small">iveskite atvykimo vieta</small>
        </div>
        <div class="form-group">
                <label for="InputPrice">Kaina</label>
                <input type="number" class="form-control" id="InputPrice" name="price" aria-describedby="priceHelp">
                <small class="small">Iveskite kaina</small>
            </div>

            <div class="form-group">
                <label for="message">Pastabos</label>
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                <small class="small">Parasykite pastabos</small>
            </div>
            <button type="submit" class="button" name="send">Spausdinti</button>
        </form>
    </div>



    <h2>Skrydžio rezervacijos</h2>
    <div class="hello">

    <table>
    <tr>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Asmens kodas</th>
        <th>Skrydio numeris</th>
        <th>Bagažo svoris</th>
        <th>Išvykimas</th>
        <th>Atvykimas</th>
        <th>Kaina</th>
        <th>Pastabos</th>
        <th>Rezervacija</th>
    </tr>


    <?php
$items = getData();

$items = array_chunk($items, 9);

foreach ($items as $data) {
    echo "<tr>";
    echo "<form action='ticket.php' method='post'>";
    $i = 0;
    foreach($data as $reservation){
        echo '<input type="hidden" name="'.$i.'" value="'. $reservation .'">';
        echo "<th>$reservation</th>";
        $i++;
    }
    echo '<th><button type="submit"> Rezervacija </button></th>';
    echo '</form>';
    echo "</tr>";   
}

?>



</table>
</div>


</body>
</html>