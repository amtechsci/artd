<?php
include 'config.php';
if (isset($_SESSION['user'])) {
print_r("<script>window.location.replace('/');</script>");
}elseif (isset($_COOKIE['user'])) {
print_r("<script>window.location.replace('/');</script>");
}else{}
if(isset($_POST['email'])){
    $ext = towrealarray($_POST);
    extract($ext);
    $query = towquery("SELECT * FROM users WHERE email='$email' AND password='$password' AND active=1");
    // print_r($query);exit;
    if(townum($query) == 1){
        $getuser = towfetch($query);
        $mobile = $getuser['mobile'];
        $mobile = md5($mobile);
        $_SESSION['user'] = $mobile;
        setcookie('user', $mobile, time() + (86400 * 30), "/");
        if(isset($_COOKIE['cart'])){
    $cartdata = $_COOKIE['cart'];
    if(!empty($cartdata)){
        $cartdata = json_decode($cartdata,true);
        foreach($cartdata as $cada){
             towquery("INSERT INTO `carts`(`customer_id`, `pro_id`, `qty`) VALUES ('{$getuser['id']}',{$cada['pro_id']},{$cada['qty']})");
        }
    }
}
        header('location: /');
    }else{
        $mess = "Wrong Mobile OR Password";
    }
}
include 'head2.php';
?>
<div class="breadcrumb-container" style="background:#e9e8eb;">
    <nav class="breadcrumbs page-width breadcrumbs-empty">
       
        <h3 class="head-title">customers/login </h3>
        
        <a href="../index.html" title="Back to the frontpage">Home</a>
        
          <span class="divider">&dash;</span>
          <span>Account</span>
        
    </nav>
</div>


	  
      <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
             
            <div class="page-width">
  <div class="grid">

    <div class="grid__item login-page">
      <div class="note form-success hide" id="ResetSuccess">
        We&#39;ve sent you an email with a link to update your password.
      </div>

      <div id="CustomerLoginForm" class="form-vertical card-block">
        <form method="post" action="" id="customer_login" accept-charset="UTF-8">
          <h1 class="text-center">LOGIN</h1>
          <div class="js-address-form">
            <label for="CustomerEmail" class="required">Email</label>
            <input type="email" name="email"  id="CustomerEmail" class="" placeholder="Your Email Address" autocapitalize="off" autofocus>
              <label for="CustomerPassword" class="required">Password</label>
              <input type="password" value="" name="password" id="CustomerPassword" class="" placeholder="Enter Your Password">
            <div class="text-center">
                <p class="forgot"><a href="#recover" id="RecoverPassword">Forget Your Password?</a></p>
              <input type="submit" class="btn" value="LOG IN">
              <p class="new-account">
                <span>New to Artdarshan? </span> <a href="register.php" id="customer_register_link" style="color:blue;">Create account</a>
              </p>
            </div>
          </div>
        </form>
      </div>
      <div id="RecoverPasswordForm" class="hide form-vertical card-block">
        <div class="text-center">
          <h2>Reset your password</h2>
          <p>We will send you an email to reset your password.</p>
        </div>
        <div class="js-address-form">
          <form method="post" action="#" accept-charset="UTF-8"><input type="hidden" name="form_type" value="recover_customer_password" /><input type="hidden" name="utf8" value="✓" />
            <label for="RecoverEmail">Email</label>
            <input type="email" value="" name="email" id="RecoverEmail" class="input-full" autocapitalize="off">
            <div class="text-center">
              <input type="submit" class="btn" value="Submit">
              <button type="button" id="HideRecoverPasswordLink" class="text-link">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

            
        </main>
<?php
include 'foot.php';
?>