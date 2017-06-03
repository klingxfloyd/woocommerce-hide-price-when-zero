<?php
/**
 * This detects if a price is blank or zero and not display it..
 * Add this code to your theme's functions.php
 */

add_action('woocommerce_before_shop_loop_item','remove_if_price_zero');
function remove_if_price_zero(){
    global $product;
    if(!$product->price){
        remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_view_product_button', 10);
    }
    else {
        remove_action( 'woocommerce_after_shop_loop_item', 'bbloomer_view_product_button', 10);
        add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
    }
}