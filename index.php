<?php
/**
 * plugin name: SingleProcuct
 * description:  woocommerce wc singleprocuct shortcode. use it as [a_product id=x] where x is the id of your product
 * version: 1.2
 * author: nima habib
 * license: nimam2001-2 att yahoo.com
 */
include "wp_db.php";
add_shortcode( 'a_product', 'SingleProcuct_Add2Cart' );
function SingleProcuct_Add2Cart( $atts ) {
 
   $id= $atts['id'];
   $a=SingleProcuct_func_wpPost($id)[0];

  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction12345678']))
  {
   
    WC()->cart->add_to_cart( $_POST['SingleProcuct_pid12345678'] );
    $cart_url =wc_get_cart_url ();
    echo "<meta http-equiv='refresh' content='0;url=$cart_url' />";
    wp_redirect($cart_url);
  };
  echo "
  <style>
  .cards {
    display: inline;
    flex-type:wrap;
    text-align:center;
    background-color:lightgray;
   }
  .card{
      text-align:center;
      background-color:red;
  }
  </style>
  <table class='cards'>
    <tr><td class='card'>"."</td></tr> 
    <tr><td  class='card'>
      <form method='post' action='' >
        <input type='hidden' id='SingleProcuct_pid12345678' name='SingleProcuct_pid12345678' value=".$a->ID.">
        <input type='submit' name='someAction12345678' class='card' 
        value='Buy `". $a->post_title."`  "
               . SingleProcuct_func_wpPostmeta($id,"_sale_price")." ".get_option('woocommerce_currency')." '>
      </form>
    </td><tr>
  </table>";


}