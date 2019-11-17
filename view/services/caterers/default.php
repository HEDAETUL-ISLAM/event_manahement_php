<?php

include_once "../../../controller/serviceController/CaterersController.php";

$result = getAllCaterers();
// for Table row==========================================================
if (isset($_POST["bookPackage"])) {
    if (isset($_SESSION["shoppingCart"])) {
        $item_array_id = array_column($_SESSION["shoppingCart"], "itemId");
        if (!in_array($_POST["hiddenPackageId"], $item_array_id)) {
            $count = count($_SESSION["shoppingCart"]) + 1;
            $item_array = array(
                'itemId' => $_POST["hiddenPackageId"],
                'itemName' => $_POST["hiddenPackageName"],
                'itemPrice' =>  $_POST["hiddenPrice"],
                'itemTransportCost' => $_POST["hiddenTransportCost"],
                'itemVendor' =>  $_POST["hiddenVendor"]
            );
            $_SESSION["shoppingCart"][$count] = $item_array;
        } else {
            @include_once "../../errors/alreadyAddedPackage.php";
        }
    } else {
        $item_array = array(
            'itemId' => $_POST["hiddenPackageId"],
            'itemName' => $_POST["hiddenPackageName"],
            'itemPrice' => $_POST["hiddenPrice"],
            'itemTransportCost' => $_POST["hiddenTransportCost"],
            'itemVendor' => $_POST["hiddenVendor"]
        );
        $_SESSION["shoppingCart"][0] = $item_array;
    }
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rating = $row["rating"] * 20;
        echo '<div class="venues-slide first">';
        echo '<form method="post"  >';
        echo '<div class="img">';
        echo "<img src=" . $row["image"] . ">";
        echo '</div>';
        echo '<div class="text">';
        echo     "<h3>" . $row["package_name"] . "</h3>";
        echo "      <input type=hidden name=hiddenPackageName value=" . $row["package_name"] . " >";
        echo "      <input type=hidden name=hiddenPackageId value=" . $row["id"] . " >";
        echo "    <div class=reviews>" . $row["rating"] . "<div class=star>";
        echo "        <div class=fill style=width:" . $rating . "% ></div>";
        echo '        </div>reviews</div>';
        echo '    <div class="outher-info">';
        echo '        <div class="info-slide first">';
        echo '            <label>Price</label>';
        echo             "<span>" . $row["price"] . "</span>";
        echo "           <input type=hidden name=hiddenPrice value=" . $row["price"] . " >";
        echo '        </div>';
        echo '        <div class="info-slide">';
        echo '            <label>Transport cost</label>';
        echo             "<span>" . $row["transport_cost"] . "<small>  (Onwards)</small></span>";
        echo "           <input type=hidden name=hiddenTransportCost value=" . $row["transport_cost"] . " >";
        echo '        </div>';
        echo '        <div class="info-slide">';
        echo '            <label>Available</label>';
        echo              "<span>" . $row["available_status"] . "<small>  (set)</small></span>";
        echo '            <input type="hidden" name="hiddenAvailableStatus" />';
        echo '        </div>';
        echo '    </div>';
        echo '    <div class="outher-link">';
        echo           "<span>" . $row["vendor_username"] . "<small>   (vendor)</small></span>";
        echo "         <input type=hidden name=hiddenVendor value=" . $row["vendor_username"] . " >";
        echo '    </div>';
        echo '    <div class="button">';
        echo '        <input type="submit" class="btn" name="bookPackage" value="Book Now" />';
        echo '    </div>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo "Empty";
}
?>;