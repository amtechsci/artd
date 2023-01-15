<?php
include 'config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $qty = $_GET['qty'];
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $uf = towquery("SELECT * FROM users WHERE md5(`mobile`)='$user'");
        $ufa = towfetch($uf);
        if(townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}' AND pro_id=$id")) > 0){
            towquery("UPDATE carts SET `qty`='$qty' WHERE customer_id='{$ufa['id']}' AND pro_id=$id");
            $total = townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}'"));
            print_r(json_encode(['status'=>1,'total'=>$total]));
        }else{
        if(towquery("INSERT INTO `carts`(`customer_id`, `pro_id`, `qty`) VALUES ('{$ufa['id']}',$id,1)")){
            $total = townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}'"));
            print_r(json_encode(['status'=>1,'total'=>$total]));
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
            print_r(json_encode(['status'=>1,'total'=>$total]));
        }else{
        if(towquery("INSERT INTO `carts`(`customer_id`, `pro_id`, `qty`) VALUES ('{$ufa['id']}',$id,1)")){
            $total = townum(towquery("SELECT id FROM carts WHERE customer_id='{$ufa['id']}'"));
            print_r(json_encode(['status'=>1,'total'=>$total]));
        }else{
            print_r(json_encode(['status'=>0]));
        }}
    }else{
        if(!isset($_COOKIE['cart'])){
            $cookie_value[] = ['pro_id'=>$id,'qty'=>1];
        }else{
        $cartdata = json_decode($_COOKIE['cart'],true);
        $n = ['pro_id'=>$id,'qty'=>1];
        $ale = 0;
        if(empty($cartdata)){
            $cookie_value[] = ['pro_id'=>$id,'qty'=>1];
        }else{
        foreach($cartdata as $a){
            if($a['pro_id'] == $id){
            $a['qty'] = $a['qty']+1;
            $cookie_value[] = $a;
            $ale = 1;
            }else{
            $cookie_value[] = $a;
            }
        }
        if($ale != 1){
        $cookie_value[] = $n;
        }
        }
        }
        // print_r($cookie_value);
        if(setcookie('cart', json_encode($cookie_value), time() + (86400 * 30), "/")){
            $total = count($cookie_value);
            print_r(json_encode(['status'=>1,'total'=>$total]));
        }else{
            print_r(json_encode(['status'=>0]));
        }
    }
}
?>