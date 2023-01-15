<?php include 'head.php';
if (isset($_SESSION['user'])) {
print_r("<script>window.location.replace('/');</script>");
}elseif (isset($_COOKIE['user'])) {
print_r("<script>window.location.replace('/');</script>");
}else{}

if(isset($_POST['customer'])){
$ext = towrealarray2($_POST['customer']);
$a = towquery2("INSERT INTO `users`(`first_name`, `last_name`, `password`, `email`, `mobile`) VALUES ('{$ext['first_name']}','{$ext['last_name']}','{$ext['password']}','{$ext['email']}','{$ext['mobile']}')");
$mobile = md5($ext['mobile']);
        $_SESSION['user'] = $mobile;
        setcookie('user', $mobile, time() + (86400 * 30), "/");
if(isset($_COOKIE['cart'])){
    $cartdata = $_COOKIE['cart'];
    if(isset($cartdata) and !empty($cartdata)){
        $cartdata = json_decode($cartdata,true);
        foreach($cartdata as $cada){
             towquery("INSERT INTO `carts`(`customer_id`, `pro_id`, `qty`) VALUES ('$a',{$cada['pro_id']},{$cada['qty']})");
        }
    }
}
print_r("<script>window.location.replace('/');</script>");
}
?>
<div class="breadcrumb-container" style="background:#e9e8eb;">
    <nav class="breadcrumbs page-width breadcrumbs-empty">
        <h3 class="head-title">customers/register </h3>
        <a href="/" title="Back to the frontpage">Home</a>
          <span class="divider">&dash;</span>
          <span>Create Account</span>
    </nav>
</div>


	  
      <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
             
            <div class="page-width">
  <div class="grid">
    <div class="grid__item login-page">

      <div class="form-vertical card-block">
        <form method="post" action="" id="create_customer" accept-charset="UTF-8">
          <h1 class="text-center">CREATE ACCOUNT</h1>
          <div class="js-address-form">
            
            <label for="FirstName" class="required">First Name</label>
            <input type="text" name="customer[first_name]" placeholder="Enter Your First Name" id="FirstName"  autofocus>

            <label for="LastName" class="required">Last Name</label>
            <input type="text" name="customer[last_name]" id="LastName"  placeholder="Enter Your Last Name">

            <label for="Email">Email</label>
            <input type="email" name="customer[email]" id="Email" class=""  placeholder="Your Email Address"  autocapitalize="off">

            <label for="mobile">mobile</label>
            <input type="number" name="customer[mobile]" id="mobile" class=""  placeholder="Your Mobile"  autocapitalize="off">

            <label for="CreatePassword">Password</label>
            <input type="password" name="customer[password]" id="CreatePassword" class="" placeholder="Enter Your Password">

            <p class="text-center">
              <input type="submit" value="Create" class="btn">
            </p>

            <p class="new-account">
              <span>Already Have an Account ?</span> <a href="login.php" id="customer_login_link">Log in</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

            
        </main>
<?php include 'foot.php';?>