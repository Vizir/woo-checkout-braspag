<?php

/**
 * WC_Checkout_Braspag_Query
 * Class responsible to creat a request to Braspag API
 *
 * @package         Woo_Checkout_Braspag
 * @subpackage      WC_Checkout_Braspag_Query
 * @since           1.0.0
 *
 */

// If this file is called directly, call the cops.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( ! class_exists( 'WC_Checkout_Braspag_Query' ) ) {

    class WC_Checkout_Braspag_Query extends WC_Checkout_Braspag_Model {

        /**
         * The gateway to be used
         */
        protected $gateway;

        /**
         * Constructor
         *
         * @since    1.0.0
         *
         * @param    string     $gateway
         */
        public function __construct( $gateway ) {
            $this->gateway = $gateway;
        }

        /**
         * Get sale by MerchantOrderId.
         *
         * @since    1.0.0
         *
         * @param    WC_Order::get_id()  $merchantOrderId
         */
        public function get_sale_by_MerchantOrderId( $merchantOrderId ) {
            $endpoint = '/v2/sales?merchantOrderId=' . $merchantOrderId;
            $payments = $this->query( $endpoint );

            return $payments['Payments'] ?? [];
        }

        /**
         * Get transaction by PaymentId.
         *
         * @since    1.0.0
         *
         * @param    int $payment_id
         */
        public function get_transaction( $payment_id ) {
            $endpoint = '/v2/sales/' . $payment_id;

            return $this->query( $endpoint );
        }

        /**
         * Make get requests
         *
         * @since    1.0.0
         *
         * @param    string  $endpoint
         */
        private function query( $endpoint, $decode_json = true ) {
            /**
             * Filter request
             *
             * @var obj     $endpoint
             */
            $endpoint = $this->gateway->api->get_endpoint_api_query() . $endpoint;
            $request = apply_filters( 'wc_checkout_braspag_query_request', $endpoint );

            // Send the request
            $result = $this->gateway->api->make_request( $endpoint );

            $body = $result['body'] ?? '';
            return ( $decode_json ) ? json_decode( $body, true ) : $body;
        }

    }

}
