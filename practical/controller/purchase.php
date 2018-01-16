<?php 
    $discount = $_GET['discount'];
    $price = $_GET['price'];
    $item = $_GET['item'];
    $Total = 0;

    $Total = $price - ($price * $discount);

    echo "<script>window.location = 'http://localhost/sean/practical/view/purchaseForm.php?item=$item&Total=$Total&price=$price&discount=$discount'</script>"
?>