<?php
if (!defined('ABSPATH')) {
      exit;
}
if(!function_exists('payuAdminFields')){
      function payuAdminFields(){
            $site_url = get_site_url();
            $payu_payment_success_webhook_url = $site_url . '/wp-json/payu/v1/get-payment-success-update';
            $payu_payment_failed_webhook_url = $site_url . '/wp-json/payu/v1/get-payment-failed-update';
            $payu_payment_refund_webhook_url = $site_url . '/wp-json/payu/v1/refund-status-update';
            $form_fields = array(
                  'enabled' => array(
                        'title' => __('Enable/Disable', 'payubiz'),
                        'type' => 'checkbox',
                        'label' => __('Enable PayUBiz', 'payubiz'),
                        'default' => 'no'
                  ),
                  'checkout_express' => array(
                        'title' => __('Select Checkout Experience', 'payubiz'),
                        'type' => 'select',
                        'options' => array(
                              'redirect' => 'PayU Redirect',
                              'bolt' => 'Bolt',
                              'checkout_express' => 'CommercePro' 
                        ),
                        'default' => 'redirect'
                  ),
                  'dynamic_charges_flag' => array(
                        'title' => __('Fetch Shipping Charges from Store', 'payubiz'),
                        'type' => 'checkbox',
                        'label' => __('Fetch Shipping Charges from Store', 'payubiz'),
                        'default' => 'true'
                  ),
                  
                  'description' => array(
                        'title' => __('Description:', 'payubiz'),
                        'type' => 'textarea',
                        'description' => __(
                              'This controls the description which the user sees during checkout.',
                              'payubiz'),
                        'default' => __(
                              'Pay securely by Credit or Debit card or net banking through PayUBiz.',
                              'payubiz')
                  ),
                  'gateway_module' => array(
                        'title' => __('Gateway Mode', 'payubiz'),
                        'type' => 'select',
                        'options' => array("0" => "Select", "sandbox" => "Sandbox", "production" => "Production"),
                        'description' => __('Mode of gateway subscription.', 'payubiz')
                  ),
                  'disable_checkout' => array(
                        'title' => __('Disable Checkout Page', 'payubiz'),
                        'type' => 'checkbox',
                        'label' => __('Disable Checkout Page', 'payubiz'),
                        'default' => 'yes'
                  ),
                  'enable_refund' => array(
                        'title' => __('Allow users to cancel orders & initiate refunds from email and payment confirmation page', 'payubiz'),
                        'type' => 'checkbox',
                        'label' => __('Allow users to cancel orders & initiate refunds from email and payment confirmation page', 'payubiz'),
                        'default' => 'yes'
                  ),
                  'enable_webhook' => array(
                        'title' => __('Webhoook URLs', 'payubiz'),
                        'type' => 'hidden',
                        'description' => __('Please add the following URLs to the PayU dashboard webhook settings:
                        <br> <span style="font-weight:700;">Refund URL:</span> '. $payu_payment_refund_webhook_url.'<br>
                        <span style="font-weight:700;">Success URL:</span> ' .$payu_payment_success_webhook_url.'<br>
                        <span style="font-weight:700;">Failed URL:</span> '.$payu_payment_failed_webhook_url,'payubiz'),
                  ),
                  'currency1_payu_key' => array(
                        'title' => __('PayUBiz Key for Currency', 'payubiz'),
                        'type' => 'text',
                        'description' =>  __('PayUBiz merchant key.', 'payubiz')
                  ),
                  'currency1_payu_salt' => array(
                        'title' => __('PayUBiz Salt for Currency', 'payubiz'),
                        'type' => 'text',
                        'description' =>  __('PayUBiz merchant salt.', 'payubiz')
                  ),
                  'verify_payment' => array(
                        'title' => __('Verify Payment', 'payubiz'),
                        'type' => 'select',
                        'options' => array("0" => "Select", "yes" => "Yes", "no" => "No"),
                        'description' => __('Verify Payment at server.', 'payubiz')
                  ),
                  'redirect_page_id' => array(
                        'title' => __('Return Page'),
                        'type' => 'select',
                        'options' => payu_get_pages('Select Page'),
                        'description' => "Post payment redirect URL for which payment is not successful."
                  )
            );
            return apply_filters(
                  'wc_payu_settings',
                  $form_fields
            );
            
      }
      
}
