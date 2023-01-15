<?php
include 'config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $uf = towquery("SELECT * FROM users WHERE md5(`mobile`)='$user'");
        $ufa = towfetch($uf);
        if(towquery("DELETE FROM `carts` WHERE customer_id='{$ufa['id']}' AND pro_id='{$id}'")){
            print_r("<script>window.location.replace('/cart.php');</script>");
        }else{
            print_r("<script>window.location.replace('/cart.php');</script>");
        }
    }elseif (isset($_COOKIE['user'])) {
        $user = $_COOKIE['user'];
        $uf = towquery("SELECT * FROM users WHERE md5(`mobile`)='$user'");
        $ufa = towfetch($uf);
        if(towquery("DELETE FROM `carts` WHERE customer_id='{$ufa['id']}' AND pro_id='{$id}'")){
            print_r("<script>window.location.replace('/cart.php');</script>");
        }else{
            print_r("<script>window.location.replace('/cart.php');</script>");
        }
    }else{
        if(!isset($_COOKIE['cart'])){
            print_r("<script>window.location.replace('/cart.php');</script>");
        }else{
        $cartdata = json_decode($_COOKIE['cart'],true);
        $cookie_value = [];
        foreach($cartdata as $a){
            if(is_array($a)){
            if($a['pro_id'] == $id){
                
            }else{
            $cookie_value[] = $a;
            }
        }
        }
        }
        if(setcookie('cart', json_encode($cookie_value), time() + (86400 * 30), "/")){
            print_r("<script>window.location.replace('/cart.php');</script>");
        }else{
            print_r("<script>window.location.replace('/cart.php');</script>");
        }
    }
}
?>