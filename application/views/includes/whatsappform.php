<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
  
 

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
    background-color: transparent !important ;
    color: green !important ;
    border: none !important ;
    cursor: pointer !important ;
    opacity: 0.8 !important ;
    position: fixed !important ;
    bottom: 2% !important ;
    right: 1% !important ;
    font-family: sans-serif;
}
.open-button:hover {
  background-color: transparent !important ;
    color: green !important ;
    border: none !important ;
    cursor: pointer !important ;
    opacity: 0.8 !important ;
    position: fixed !important ;
    bottom: 2% !important ;
    right: 1% !important ;
    font-family: sans-serif;
}
/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed !important ;
  bottom: 0% !important ;
  right: 1% !important ;
  border: 3px solid #f1f1f1 !important ;
  z-index: 9 !important ;
  border-radius: 8px !important ;
  border-color: #777777 !important ; 
  width: 25%;
  background-color: #ffffff;
  font-family: sans-serif;
}
textarea#message {
    z-index: auto !important;
    position: relative !important;
    line-height: 33.6px !important;
    transition: none 0s ease 0s !important;
    background: transparent !important !important;
    border: 1px solid #B2AEA3 !important;
    width: 95% !important;
    border-radius: 5px !important;
    font-size: 16px !important;
    margin:0% 0% 0% 1% !important ;
    border: 1px solid #f1f1f1 !important ;
  background: #fff !important ;
  font-family: sans-serif;
}
input#firstname {
    z-index: auto !important;
    position: relative !important;
    line-height: 33.6px !important;
    transition: none 0s ease 0s !important;
    background: transparent !important !important;
    border: 1px solid #B2AEA3 !important;
    width: 95% !important;
    border-radius: 5px !important;
    bottom: 10px;
    font-size: 16px !important;
     margin:0% 0% 0% 1% !important ;
    border: 1px solid #f1f1f1 !important ;
    background: #fff !important ;
    font-family: sans-serif;
}
/* Add some hover effects to buttons */
.button-closed {
    float: right !important ;
    background: transparent !important ;
    width: max-content !important ;
    padding: 0px 2px 0px 0px !important ;
    font-weight: 600 !important ;
    border: none !important ;
    font-family: sans-serif;
  }
 

.send-on-whatsapp {
    background-color: #696565 !important ;
    color: #fff !important ;
    font-size: 19px !important ;
   text-transform: uppercase !important ;
   font-family: sans-serif;
   margin: 16px 10px 16px 5px;
  padding: 1px 8px 0px 0px;
  }

.button-whatsapp-us {
    background-color: #5ed15e !important;
    padding: 0% 3% 5% 3% !important;
    margin: 4% 0% 0% 1% !important ;
    border-radius: 10px !important;
    font-family: sans-serif;
  }
 .label-whatsapp {
    display: inline-block !important;
    margin-bottom: 20px !important;
    font-weight: 800 !important ;
    font-size: 16px !important ;
    color: #777777 !important ;
    font-family: sans-serif;
    padding: 4px 2px 0px 3px;
}
 
input.button-whatsapp-us {
    background: none !important;
}
</style>
 
<?php
/**
 * Style - 99 - own image
 * user can add image
 * 
 * @var string $img_css  - adds css styles based on device, given width, height
 * @var string $own_image  - image url
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// $ccw_options_cs = get_option('ccw_options_cs');
$s99_img_height_desktop = esc_attr( $ccw_options_cs['s99_img_height_desktop'] );
$s99_img_width_desktop = esc_attr( $ccw_options_cs['s99_img_width_desktop'] );
$s99_img_height_mobile = esc_attr( $ccw_options_cs['s99_img_height_mobile'] );
$s99_img_width_mobile = esc_attr( $ccw_options_cs['s99_img_width_mobile'] );

// img url
// image - width, height based on device
$img_css = "";

if( 1 == $is_mobile ) {
    $own_image = $ccw_options_cs['s99_mobile_img'];

    if ( '' !== $s99_img_height_mobile ) {
        $img_css .= "height: $s99_img_height_mobile; ";
    }
    if ( '' !== $s99_img_width_mobile ) {
        $img_css .= "width: $s99_img_width_mobile; ";
    }
} else {
    $own_image = $ccw_options_cs['s99_desktop_img'];

    if ( '' !== $s99_img_height_desktop ) {
        $img_css .= "height: $s99_img_height_desktop; ";
    }
    
    if ( '' !== $s99_img_width_desktop ) {
        $img_css .= "width: $s99_img_width_desktop; ";
    }
}

?> 
<?php
$plugins_url = plugins_url();
?>
   
<button class="open-button" onclick="openForm()"><img class="img-icon ccw-analytics" id="openButtonFrom" data-ccw="style-1" style="height: 48px;"  src="<?php echo $plugins_url; ?>/whasapp_contact_form/assets/img/whatsapp.jpg" alt="WhatsApp chat"><br>Whatsapp</button>
<div class="form-popup" id="myForm">
      <div style="background-color: #696565;padding: 1%;border-radius: 2%;">
       <p class="send-on-whatsapp">Send On Whatsapp  <button onclick="closeForm()" class="button-closed">X</button></p></div> 
  <form action="" class="form-container" style="">
    <label for="Name" class="label-whatsapp"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required id="firstname" class="whatsapp-message" style="    border: 1px solid #777777!important; padding: 8px 0px 8px 5px !important;">
    <label for="psw" class="label-whatsapp" ><b>Message</b></label>
      <textarea  type="text" placeholder="Enter Your Message" name="psw" required id="message" class="whatsapp-message" style="    border: 1px solid #777777!important;
      padding: 8px 0px 8px 5px !important;">
      </textarea>
  <div>
      <input type="submit" value="Whatsapp Us" class="button-whatsapp-us" style="background-color: #5ed15e !important;  font-size: 16px; padding: 8px 10px 13px 8px !important;"  align="center" > 
  </div>
</form>
</div>

<script>
function openForm() {
   document.getElementById("myForm").style.display = "block"; 
   
    
  
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";

}
</script>






<script type="text/javascript">
$( "#myForm" ).submit(function( event ) {
var name  = document.getElementById("firstname").value;
var message  = document.getElementById("message").value;
 
 event.preventDefault();

 

if (name != undefined && name != null && message != undefined && message != null ) {
       window.location.href = "<?php echo $redirect_a ?>&text="+ "Name:-" + name  + ", Message:-" + message ;
}

});

 
</script>
