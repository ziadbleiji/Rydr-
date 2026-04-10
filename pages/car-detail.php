<?php require "includes/header.php" ?>
<?php require "database/connection.php" ?>
<?php

    //TODO: Implementeer dat de pagina de juiste auto laat zien op basis van de query paramater 'name'
    $name = $_GET['id'] ?? null;

    if ($name) {
        $car = $conn->prepare("SELECT * FROM cars WHERE id = :id");
        $car->execute([
            "id" => $name
        ]);
        $data = $car->fetchAll();
    } else {
        echo "Geen auto opgegeven.";
    }

?>
<?php foreach($data as $car) { ?>
    <main class="car-detail">
        <div class="grid">
            <div class="row">
                <div class="advertorial">
                    <h2>Sport auto met het beste design en snelheid</h2>
                    <p>Veiligheid en comfort terwijl je rijd in een futiristische en elante auto </p>
                    <img class="car-img" src="<?= $car['img'] ?>" alt="">
                    <img src="../assets/images/header-circle-background.svg" alt="" class="background-header-element">
                </div>
            </div>
            <div class="row white-background">
                <h2><?= $car['brand'] ?></h2>    
                <div class="rating">
                    <span class="<?= $car['stars'] ?>"></span>
                    <span><?= $car['reviews'] ?></span>
                </div>
                <p>NISMO is het toonbeeld geworden van Nissan's uitzonderlijke prestaties, geïnspireerd door het meest meedogenloze testterrein: het circuit.</p>
                <div class="car-type">
                    <div class="grid">
                        <div class="row"><span class="accent-color">Car Type</span><span><?= $car['cartype'] ?></span></div>
                        <div class="row"><span class="accent-color">Capacity</span><span><?= $car['seats'] ?></span></div>
                    </div>
                    <div class="grid">
                        <div class="row"><span class="accent-color">Gearbox</span><span><?= $car['gearbox'] ?></span></div>
                        <div class="row"><span class="accent-color">Fuel</span><span><?= $car['gas-tank-volume'] ?></span></div>
                    </div>
                    <div class="call-to-action">
                        <div class="row"><span class="font-weight-bold">€<?= $car['priceday'] ?></span> / dag</div>
                        <div class="row"><a href="" class="button-primary">Huur nu</a></div>
                    </div>

                </div>
            </div>
        </div>
    </main>
<?php } ?>
<?php require "includes/footer.php" ?>
