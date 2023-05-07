<?php
if ($cart) {
    // echo "<pre>";
    // var_dump($cart);
    $this->import_template('cart', ['cart' => $cart]);
    return;
}
echo 'no item in the cart'; 

