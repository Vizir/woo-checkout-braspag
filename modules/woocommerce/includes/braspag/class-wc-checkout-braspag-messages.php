<?php

/**
 * WC_Checkout_Braspag_Messages
 * Model for Braspag classes
 *
 * @package         Woo_Checkout_Braspag
 * @subpackage      WC_Checkout_Braspag_Messages
 * @since           1.0.0
 *
 */

// If this file is called directly, call the cops.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( ! class_exists( 'WC_Checkout_Braspag_Messages' ) ) {

    class WC_Checkout_Braspag_Messages {

        /**
         * Payment Status from Braspag
         * Message for Shop
         *
         * @since    1.0.0
         */
        public static function payment_status_note( $code ) {
            switch ( $code ) {
                case WC_Checkout_Braspag_Api::TRANSACTION_STATUS_NOT_FINISHED:
                    return __( 'Braspag: fail when processing the payment.', WCB_TEXTDOMAIN );
                case WC_Checkout_Braspag_Api::TRANSACTION_STATUS_AUTHORIZED:
                    return __( 'Braspag: payment method can be captured (credit/debit card) or paid (bank slip).', WCB_TEXTDOMAIN );
                case WC_Checkout_Braspag_Api::TRANSACTION_STATUS_PAYMENT_CONFIRMED:
                    return __( 'Braspag: payment confirmed.', WCB_TEXTDOMAIN );
                case WC_Checkout_Braspag_Api::TRANSACTION_STATUS_DENIED:
                    return __( 'Braspag: payment denied (credit card and debit - eletronic transfer).', WCB_TEXTDOMAIN );
                case WC_Checkout_Braspag_Api::TRANSACTION_STATUS_VOIDED:
                    return __( 'Braspag: payment canceled.', WCB_TEXTDOMAIN );
                case WC_Checkout_Braspag_Api::TRANSACTION_STATUS_REFUNDED:
                    return __( 'Braspag: payment canceled/refund.', WCB_TEXTDOMAIN );
                case WC_Checkout_Braspag_Api::TRANSACTION_STATUS_PENDING:
                    return __( 'Braspag: waiting for bank (credit card and debit - eletronic transfer).', WCB_TEXTDOMAIN );
                case WC_Checkout_Braspag_Api::TRANSACTION_STATUS_ABORTED:
                    return __( 'Braspag: payment aborted because processing failed.', WCB_TEXTDOMAIN );

                default:
                    break;
            }

            return '';
        }

        /**
         * Payment Reason Code from Braspag
         * Message for User
         *
         * Updated: 05-02-2019
         * @link https://braspag.github.io/manual/braspag-pagador#lista-de-reasoncode/reasonmessage
         *
         * @since    1.0.0
         */
        public static function payment_error_message( $reason_code ) {
            switch ( $reason_code ) {
                case 7:
                    return __( 'Your payment was denied. Please try again with another method.', WCB_TEXTDOMAIN );
                    break;

                case 12:
                case 13:
                case 14:
                case 15:
                    return __( 'There was a problem with your credit card. Please try again with another one.', WCB_TEXTDOMAIN );
                    break;

                case 18:
                    return __( 'There was a problem with your payment. Please try again.', WCB_TEXTDOMAIN );
                    break;

                case 21:
                    return __( 'Your credit card number is invalid. Please check it and try again.', WCB_TEXTDOMAIN );
                    break;

                default:
                    break;
            }

            return '';
        }

    }

}
