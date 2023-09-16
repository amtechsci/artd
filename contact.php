<?php include 'head.php';
if(isset($_POST['contact'])){
$ext = towrealarray2($_POST);
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <artdarshan info@artdarshan.com>' . "\r\n";
$to="artdarshancomp@gmail.com";
$message= json_encode($ext['contact']);
mail($to,"message",$message,$headers);          
}
?>
<div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
<div id="shopify-section-contact-page" class="shopify-section">
<div class="content" id="contact">
  <section id="contact-form">
    
      <div class="page-width"> 
        <div class="row"> 
          
          
          <div class="contact-form-information">
            
            <div class="contact-banner col-lg-6 col-md-12">
              <div class="image-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.9312934822774!2d77.26346511444395!3d28.51171479629099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce1fc0e6489e5%3A0x29f6ea8253a61e7e!2sArtdarshan!5e0!3m2!1sen!2sin!4v1662101799351!5m2!1sen!2sin" style="width:100%; height: 365px;" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            
            <div class="information-container col-lg-6 col-md-12">
              <div class="title-container">
                
                  <h3 class="heading" style="font-size:35px;">Feel free to contact us</h3>
                
                
                  <span class="subheading">We&#39;d Love to Hear From You, Lets Contat Us!</span>
                
              </div>
              <div class="list-contact-info col-xs-12">
                <div class="contact_info_item col-xs-6">
                 <h3>address</h3>
                  <p>35A, 6, Tughlakabad Extension, Tughlakabad, New Delhi, Delhi 110019</p>
                 
                </div>
                <div class="contact_info_item col-xs-6">
                  <h3>Phone</h3>
                  <p>+91 8745896437</p>
                  <p>+91 7065278066</p>
                </div>
                <div class="contact_info_item col-xs-6">
                  <h3>Email</h3>
                  <p>
                    <a href="mailto:info@gmail.com">
                      artdarshancomp@gmail.com
                    </a> 
                  </p>
                </div>
                
                  <div class="contact_info_item col-xs-6">
                    <h3>Additional Information</h3>
                    <p>We are open: Monday - Saturday, 10AM - 8PM and closed on Sunday.</p>
                  </div>
                   
                <div class="contact_info_item col-xs-12">
                  <h3>Social</h3>
                  <ul class="social-icons">
                    
                      <li class="facebook">
                        <a class="social-icons__link" href="https://www.facebook.com/artdarshan1?mibextid=LQQJ4d" title="Artdarshan Facebook" target="_blank">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                    
                    
                      <li class="twitter">
                        <a class="social-icons__link" href="https://twitter.com/artdarshan_" title="Artdarshan Twitter" target="_blank">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                    
                    
                    
                      <li class="instagram">
                        <a class="social-icons__link" href="https://instagram.com/the_artdarshan?igshid=Zjc2ZTc4Nzk=" title="Artdarshan Instagram" target="_blank">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                    

                    
                      <li class="youtube">
                        <a class="social-icons__link" href="https://youtube.com/@artdarshan8651" title="Artdarshan YouTube" target="_blank">
                          <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        </a>
                      </li>
                    
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    
    
    
      <div class="contact-form-bottom page-width">
        <div class="contact-form form-vertical">
            <div class="title-container">
              
                <h3 class="heading">leave us a message</h3>
              
              
                <span class="subheading">-good for nature, good for you-</span>
              
            </div>
          <form method="post" action="" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />

            
            
              <div class="row form-field">
                <div class="col-sm-4 col-xs-12">
                  <label for="ContactFormName" class="hidden">Name</label>
                  <input type="text" id="ContactFormName" name="contact[name]" value="" placeholder="Name">
                </div>
                <div class="col-sm-4 col-xs-12">
                  <label for="ContactFormEmail" class=" hidden">Email</label>
                  <input type="email" id="ContactFormEmail" name="contact[email]" autocapitalize="off" value="" class="" placeholder="Email">
                </div>
                <div class="col-sm-4 col-xs-12">
                    <label for="ContactFormPhone" class="hidden">Phone Number</label>
                    <input type="tel" id="ContactFormPhone" name="contact[phone]" pattern="[0-9\-]*" value="" placeholder="Phone Number">
                </div>              
              <div class="form-group-area col-xs-12">
                <label for="ContactFormMessage" class="hidden">Message</label>
                <textarea rows="10" id="ContactFormMessage" name="contact[body]" placeholder="your message"></textarea>
              </div>
              <div class="submit-button col-xs-12">
                <input type="submit" class="btn" value="Send">
              </div>
              </div>
          </form>
        </div>
      </div>
    
  </section>
</div>



</div>
            
</main>
<?php include 'foot.php' ?>