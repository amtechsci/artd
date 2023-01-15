<?php
include 'config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $qty = isset($_GET['qty']) ? $_GET['qty'] : 1;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $uf = towquery("SELECT * FROM users WHERE md5(`mobile`)='$user'");
        $ufa = towfetch($uf);
        if(townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}' AND pro_id=$id")) > 0){
            towquery("UPDATE carts SET `qty`='$qty' WHERE customer_id='{$ufa['id']}' AND pro_id=$id");
            $total = townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}'"));
            print_r("<script>window.location.replace('cart.php');</script>");
        }else{
        if(towquery("INSERT INTO `carts`(`customer_id`, `pro_id`, `qty`) VALUES ('{$ufa['id']}',$id,1)")){
            $total = townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}'"));
            print_r("<script>window.location.replace('cart.php');</script>");
        }else{
            print_r(json_encode(['status'=>0]));
        }}
    }elseif (isset($_COOKIE['user'])) {
        $user = $_COOKIE['user'];
        $uf = towquery("SELECT * FROM users WHERE md5(`mobile`)='$user'");
        $ufa = towfetch($uf);
        if(townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}' AND pro_id=$id")) > 0){
            towquery("UPDATE carts SET `qty`='$qty' WHERE customer_id='{$ufa['id']}' AND pro_id=$id");
            $total = townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}'"));
            print_r("<script>window.location.replace('cart.php');</script>");
        }else{
        if(towquery("INSERT INTO `carts`(`customer_id`, `pro_id`, `qty`) VALUES ('{$ufa['id']}',$id,1)")){
            $total = townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}'"));
            print_r("<script>window.location.replace('cart.php');</script>");
        }else{
            print_r(json_encode(['status'=>0]));
        }}
    }else{
        if(!isset($_COOKIE['cart'])){
            $cookie_value[] = ['pro_id'=>$id,'qty'=>1];
        }else{
        $cartdata = json_decode($_COOKIE['cart'],true);
        $n = ['pro_id'=>$id,'qty'=>1];
        foreach($cartdata as $a){
            $cookie_value[] = $a;
        }
        $cookie_value[] = $n;
        }
        // print_r($cookie_value);
        if(setcookie('cart', json_encode($cookie_value), time() + (86400 * 30), "/")){
            $total = count($cookie_value);
            print_r("<script>window.location.replace('cart.php');</script>");
        }else{
            print_r(json_encode(['status'=>0]));
        }
    }
}
?>