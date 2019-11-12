<?php
include_once "../../../controller/serviceController/CaterersController.php";

$result = getCaterersByLowPrice();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rating = $row["rating"] * 20;
        echo '<div class="venues-slide first">';
        echo '<div class="img">';
        echo "<img src=" . $row["image"] . ">";
        echo '</div>';
        echo '<div class="text">';
        echo     "<h3>" . $row["package_name"] . "</h3>";
        echo "    <div class=reviews>" . $row["rating"] . "<div class=star>";
        echo "        <div class=fill style=width:" . $rating . "% ></div>";
        echo '        </div>reviews</div>';
        echo '    <div class="outher-info">';
        echo '        <div class="info-slide first">';
        echo '            <label>Price</label>';
        echo             "<span>" . $row["price"] . "</span>";
        echo '        </div>';
        echo '        <div class="info-slide">';
        echo '            <label>Transport cost</label>';
        echo             "<span>" . $row["transport_cost"] . "<small>  (Onwards)</small></span>";
        echo '        </div>';
        echo '        <div class="info-slide">';
        echo '            <label>Quantity</label>';
        echo              "<span>" . $row["quantity"] . "<small>  (set)</small></span>";
        echo '        </div>';
        echo '    </div>';
        echo '    <div class="outher-link">';
        echo           "<span>" . $row["vendor_username"] . "<small>   (vendor)</small></span>";
        echo '    </div>';
        echo '    <div class="button">';
        echo '        <a type="submit" class="btn" name="bookPackage" >Book Now</a>';
        echo '    </div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Empty";
}
?>;