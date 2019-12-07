<?php error_reporting(E_ALL ^ E_NOTICE) ?>

<?php
include_once "../../../controller/serviceController/CaterersController.php";

$result = getCaterersByLowPrice();

?>

<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rating = $row["rating"] * 20;
        ?>
        <div class="venues-slide first" style="margin-bottom: 10px;">
            <div class="img" style=max-height:260px>
                <img src="<?php echo $row["image"]; ?>" style=max-height:260px>
            </div>
            <div class="text">
                <h3 class="package_name"><?php echo $row["package_name"]; ?></h3>
                <div class=reviews> <?php echo $row["rating"]; ?>
                    <div class=star>
                        <div class=fill style="width: <?php echo   $rating; ?>%"></div>
                    </div>reviews</div>
                <div class="outher-info">
                    <div class="info-slide first">
                        <label>Price</label>
                        <span class="package_price"> <?php echo $row["price"]; ?> </span>
                    </div>
                    <div class="info-slide">
                        <label>Transport cost</label>
                        <span class="package_transportCost"> <?php echo $row["transport_cost"]; ?> </span><small> (Your)</small>
                    </div>
                    <div class="info-slide">
                        <label>Available</label>
                        <span> <?php echo $row["available_status"]; ?> <small> </small></span>
                    </div>
                </div>
                <div class="outher-link">
                    <label>Description : </label>
                    <span><?php echo  $row["description"] ?><small> (quantity)</small></span> <br>
                    <span class="package_vendor"> <?php echo $row["vendor_username"]; ?> </span><small> (vendor)</small>
                </div>
                <?php
                        if ($row["available_status"] == "yes" || $row["available_status"] == "Yes") {
                            ?>
                    <div class="button">
                        <button type="button" class="btn btn_book package_id" id="<?php echo $row["id"]; ?>" name="bookPackage" value="<?php echo $row["id"]; ?>">Book Now</button>
                    </div>
                <?php
                        }

                        ?>
            </div>
        </div>
<?php
    }
} else {
    include_once "../../errors/spinner.php";
}
?>

<script>
    var addToCartButtons = document.getElementsByClassName('btn_book');

    for (var i = 0; i < addToCartButtons.length; i++) {
        var buttonAdd = addToCartButtons[i];
        buttonAdd.addEventListener('click', addToCartClicked);
    }

    function addToCartClicked(event) {
        var button = event.target;
        var package = button.parentElement.parentElement;
        var packageName = package.getElementsByClassName('package_name')[0].innerText;
        var packagePrice = package.getElementsByClassName('package_price')[0].innerText;
        var packageId = package.getElementsByClassName('package_id')[0].value;
        var transportCost = package.getElementsByClassName('package_transportCost')[0].innerText;
        var vendor = package.getElementsByClassName('package_vendor')[0].innerText;

        $('#' + button.id).load('../packageCartSession.php', {
            packageName: packageName,
            packagePrice: packagePrice,
            packageId: packageId,
            transportCost: transportCost,
            vendor: vendor
        });


    }
</script>