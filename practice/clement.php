<?php
    // include 'mayors_project.php';
    include 'sk.php';

    $clement_brand = new Brand('RCCG', 'Living Hope');
    // echo $clement_brand->showcase();
    

    $daniel_brand = new Sk_Brand('App Agency', 'revenueWallet', '$100');
    echo $daniel_brand->showcase();
    echo $daniel_brand->get_price()
?>