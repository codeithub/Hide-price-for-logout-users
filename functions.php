/**
 * @snippet       Hide Price & Add to Cart for Logged Out Users
 * @author        codeithub.com
 */
  
add_action( 'init', 'codeithub_hide_price_add_cart_not_logged_in' );
  
function codeithub_hide_price_add_cart_not_logged_in() {   
   if ( ! is_user_logged_in() ) {      
      remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
      remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );   
      add_action( 'woocommerce_single_product_summary', 'codeithub_print_login_to_see', 31 );
      add_action( 'woocommerce_after_shop_loop_item', 'codeithub_print_login_to_see', 11 );
   }
}
  
function codeithub_print_login_to_see() {
   echo '<a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __('Login to see prices', 'theme_name') . '</a>';
}
