<?php
    class Car
    {
        private $package_height;
        private $package_width;
        private $package_length;
        private $package_weight;

        function __construct($parcel_height, $parcel_width, $parcel_length, $parcel_weight)
        {
            $this->package_height = $parcel_height;
            $this->package_width = $parcel_width;
            $this->package_length = $parcel_length;
            $this->package_weight = $parcel_weight;
        }
        function setHeight($new_height)
        {
            $height = (float) $new_height;
        }

        function getHeight()
        {
            return $this->package_height;
        }

        function setWidth($new_width)
        {
            $width = (float) $new_width;
        }

        function getWidth()
        {
            return $this->package_width;
        }

        function setLength($new_lenght)
        {
            $length = (float) $new_length;
        }

        function getLength()
        {
            return $this->package_length;
        }

        function setWeight($new_weight)
        {
            $weight = (float) $new_weight;
        }

        function getWeight()
        {
            return $this->package_weight;
        }

        function worthBuying($max_price)
        {
            return $this->make_price < ($max_price + 100);
        }
    }

    $porsche = new Car("2014 Porsche 911", 114991, 7861, "images/porsche.jpg");
    $ford = new Car("2011 Ford F450", 55995, 14241, "images/ford.jpg");
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "images/lexus.jpg");
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "images/mercedes.jpg");

    $cars = array($porsche, $ford, $lexus, $mercedes);

    $cars_matching_search = array();
    foreach ($cars as $car) {
        if ($car->worthBuying($_GET["price"]) && ($car->worthBuying($_GET["miles"]))) {
            array_push($cars_matching_search, $car);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Parcel Shipping Cost</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Parcel Shipping Cost</h1>
        <ul>
            <?php
                if (empty($cars_matching_search)) {
                    echo "Sorry, there are no cars available.";
                } else {
                    foreach ($cars_matching_search as $car) {
                        $car_make = $car->getMake();
                        $car_price = $car->getPrice();
                        $car_miles = $car->getMiles();
                        echo "<li><img class='img-rounded' src='$car->make_photo'></li>";
                        echo "<li> $car_make </li>";
                        echo "<ul>";
                            echo "<li> $car_price </li>";
                            echo "<li> Miles: $car_miles </li>";
                        echo"</ul>";

                    }
                }
            ?>
        </ul>
     </div>
</body>
</html>
