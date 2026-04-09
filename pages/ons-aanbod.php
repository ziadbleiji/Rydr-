<?php require "includes/header.php" ?>
<?php require "database/connection.php" ?>

<div class="ons-aanbod">
    <div class="filter-bar">
        <h2>Filters</h2>
        <form class="checkbox">
            <div class="filter-option-1">
                <p>Type</p>
                <label>
                    <input type="checkbox" name="cartype" value="Hypercar">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `cartype` = 'Hypercar'");
                        $count->execute();
                        $count1 = $count->fetchAll(); ?>
                    Hypercar <?= "(" . $count1[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="cartype" value="Supercar">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `cartype` = 'Supercar'");
                        $count->execute();
                        $count2 = $count->fetchAll(); ?>
                    Supercar <?= "(" . $count2[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="cartype" value="Luxury">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `cartype` = 'Luxury'");
                        $count->execute();
                        $count3 = $count->fetchAll(); ?>
                    Luxury <?= "(" . $count3[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="cartype" value="SUV">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `cartype` = 'SUV'");
                        $count->execute();
                        $count4 = $count->fetchAll(); ?>
                    SUV <?= "(" . $count4[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="cartype" value="Hatchback">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `cartype` = 'Hatchback'");
                        $count->execute();
                        $count5 = $count->fetchAll(); ?>
                    Hatchback <?= "(" . $count5[0][0] . ")" ?>
                    </label><br><br>
            </div>
            <div class="filter-option-2">
                <p>Capacity</p>
                <label>
                    <input type="checkbox" name="seats" value="2 Personen">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `seats` = '2 Personen'");
                        $count->execute();
                        $count6 = $count->fetchAll(); ?>
                    2 Personen <?= "(" . $count6[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="seats" value="4 Personen">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `seats` = '4 Personen'");
                        $count->execute();
                        $count7 = $count->fetchAll(); ?>
                    4 Personen <?= "(" . $count7[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="seats" value="5 Personen">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `seats` = '5 Personen'");
                        $count->execute();
                        $count8 = $count->fetchAll(); ?>
                    5 Personen <?= "(" . $count8[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="seats" value="7 Personen">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `seats` = '7 Personen'");
                        $count->execute();
                        $count9 = $count->fetchAll(); ?>
                    7 Personen <?= "(" . $count9[0][0] . ")" ?>
                </label><br><br>
            </div>
            <div class="filter-option-3">
                <p>Price</p>
                <label>
                    <input type="range" name="priceday" min="0" max="300" value="300">
                </label><br><br>
            </div>
            <input type="submit">
        </form>
    </div>
    <main>
        <div class="cars">
            <?php

                if(isset($_GET['cartype'],$_GET['seats'],$_GET['priceday'])){

                    $cartype = $_GET['cartype'];
                    $seats = $_GET['seats'];
                    $priceday = $_GET['priceday'];
    
                    $car = $conn->prepare("SELECT * FROM cars 
                    WHERE cartype = :c AND seats = :s AND priceday < :p");
                    $car->execute([
                        "c" => $cartype,
                        "s" => $seats,
                        "p" => $priceday
                    ]);
                    $data = $car->fetchAll();

                } else if(isset($_GET['cartype'],$_GET['priceday'])) {

                    $cartype = $_GET['cartype'];
                    $priceday = $_GET['priceday'];

                    $car = $conn->prepare("SELECT * FROM cars 
                    WHERE cartype = :c AND priceday < :p");
                    $car->execute([
                        "c" => $cartype,
                        "p" => $priceday
                    ]);
                    $data = $car->fetchAll();

                } else if(isset($_GET['seats'],$_GET['priceday'])){

                    $seats = $_GET['seats'];
                    $priceday = $_GET['priceday'];
    
                    $car = $conn->prepare("SELECT * FROM cars 
                    WHERE seats = :s AND priceday < :p");
                    $car->execute([
                        "s" => $seats,
                        "p" => $priceday
                    ]);
                    $data = $car->fetchAll();
                    
                } else {
                    $car = $conn->prepare("SELECT * FROM cars");
                    $car->execute();
                    $data = $car->fetchAll();
                    }

                foreach($data as $car){
                    ?>
                    <div class="car-details">
                        <div class="car-brand">
                            <h3><?= $car['brand'];?></h3>
                            <div class="car-type">
                                <?= $car['cartype'] ?>
                            </div>
                        </div>
                        <img src='<?= $car['img'] ?>'>
                        <div class="car-specification">
                            <span><img src="assets/images/icons/gas-station.svg" alt=""><?= $car['gas-tank-volume'] ?></span>
                            <span><img src="assets/images/icons/car.svg" alt=""><?= $car['gearbox'] ?></span>
                            <span><img src="assets/images/icons/profile-2user.svg" alt=""><?= $car['seats'] ?></span>
                        </div>
                        <div class="rent-details">
                            <span><span class="font-weight-bold">€<?= $car['priceday'] ?></span> / dag</span>
                            <a href="/car-detail/?id=<?= $car['id'] ?>" class="button-primary">Bekijk nu</a>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </main>
</div>
<?php require "includes/footer.php" ?>