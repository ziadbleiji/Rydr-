<?php require "includes/header.php" ?>
<?php require "database/connection.php" ?>

<div class="ons-aanbod">
    <div class="filter-bar">
        <h2>Filters</h2>
        <form class="checkbox">
            <div class="filter-option-1">
                <p>Type</p>
                <label>
                    <input type="checkbox" name="brand" value="Hypercar">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `car-type` = 'Hypercar'");
                        $count->execute();
                        $count1 = $count->fetchAll(); ?>
                    Hypercar <?= "(" . $count1[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="brand" value="Supercar">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `car-type` = 'Supercar'");
                        $count->execute();
                        $count2 = $count->fetchAll(); ?>
                    Supercar <?= "(" . $count2[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="brand" value="Luxury">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `car-type` = 'Luxury'");
                        $count->execute();
                        $count3 = $count->fetchAll(); ?>
                    Luxury <?= "(" . $count3[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="brand" value="SUV">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `car-type` = 'SUV'");
                        $count->execute();
                        $count4 = $count->fetchAll(); ?>
                    SUV <?= "(" . $count4[0][0] . ")" ?>
                </label><br><br>
                <label>
                    <input type="checkbox" name="brand" value="Hatchback">
                    <?php 
                        $count = $conn->prepare("SELECT COUNT(*) FROM `cars` WHERE `car-type` = 'Hatchback'");
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
                    <input type="range" name="price" min="0" max="300`">
                </label><br><br>
            </div>
            <input type="submit">
        </form>
    </div>
    <main>
        <div class="cars">
            <?php
                $car = $conn->prepare("SELECT * FROM cars");
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