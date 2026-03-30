<?php require "includes/header.php";
    require "database/connection.php";
?>
    <header>
        <div class="advertorials">
            <div class="advertorial">
                <h2>Hét platform om een auto te huren</h2>
                <p>Snel en eenvoudig een auto huren. Natuurlijk voor een lage prijs.</p>
                <a href="#" class="button-primary">Huur nu een auto</a>
                <img src="assets/images/car-rent-header-image-1.png" alt="">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
            <div class="advertorial">
                <h2>Wij verhuren ook bedrijfswagens</h2>
                <p>Voor een vaste lage prijs met prettig voordelen.</p>
                <a href="#" class="button-primary">Huur een bedrijfswagen</a>
                <img src="assets/images/car-rent-header-image-2.png" alt="">
                <img src="assets/images/header-block-background.svg" alt="" class="background-header-element">

            </div>
        </div>
    </header>

    <main>
    <h2 class="section-title">Populaire auto's</h2>
    <div class="cars">
        <?php
            $car = $conn->prepare("SELECT * from cars LIMIT 4");
            $car->execute();
            $data = $car->fetchAll();

            foreach($data as $car){
                ?>
                <div class="car-details">
                    <div class="car-brand">
                        <h3><?= $car['brand'];?></h3>
                        <div class="car-type">
                            <?= $car['car-type'] ?>
                        </div>
                    </div>
                    <img src='<?= $car['img'] ?>'>
                    <div class="car-specification">
                        <span><img src="assets/images/icons/gas-station.svg" alt=""><?= $car['gas-tank-volume'] ?></span>
                        <span><img src="assets/images/icons/car.svg" alt=""><?= $car['gearbox'] ?></span>
                        <span><img src="assets/images/icons/profile-2user.svg" alt=""><?= $car['seats'] ?></span>
                    </div>
                    <div class="rent-details">
                        <span><span class="font-weight-bold">€<?= $car['price/day'] ?></span> / dag</span>
                        <a href="/car-detail" class="button-primary">Bekijk nu</a>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>

    <h2 class="section-title">Aanbevolen auto's</h2>
    <div class="cars">
        <?php 
            $car = $conn->prepare("SELECT * from cars WHERE id > 4 LIMIT 8");
            $car->execute();
            $data = $car->fetchAll();

            foreach($data as $car){ 
                ?>
                <div class="car-details">
                    <div class="car-brand">
                        <h3><?= $car['brand']?></h3>
                        <div class="car-type">
                            <?= $car['car-type'] ?>
                        </div>
                    </div>
                    <img src='<?= $car['img'] ?>'>
                    <div class="car-specification">
                        <span><img src="assets/images/icons/gas-station.svg" alt=""><?= $car['gas-tank-volume'] ?></span>
                        <span><img src="assets/images/icons/car.svg" alt=""><?= $car['gearbox'] ?></span>
                        <span><img src="assets/images/icons/profile-2user.svg" alt=""><?= $car['seats'] ?></span>
                    </div>
                    <div class="rent-details">
                        <span><span class="font-weight-bold">€<?= $car['price/day'] ?></span> / dag</span>
                        <a href="/car-detail" class="button-primary">Bekijk nu</a>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
    <div class="show-more">
        <a class="button-primary" href="#">Toon alle</a>
    </div>
    </main>

<?php require "includes/footer.php" ?>