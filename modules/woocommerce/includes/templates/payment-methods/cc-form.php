<?php
/**
 * The Template for Credit Card payment in Braspag
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/braspag/payment-methods/cc-form.php.
 *
 * HOWEVER, on occasion Woo Checkout Braspag will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. Just like WooCommerce.
 *
 * @var $description                string  The gateway description
 * @var $methods                    array   Array of payment methods: { code => name }
 *
 * @version 1.0.0
 */
?>

<p class="form-row form-row-braspag_payment_cc_number">
    <label><?php esc_html_e( apply_filters( 'wc_checkout_braspag_payment_cc_number_label', 'Credit Card Number' ), WCB_TEXTDOMAIN ); ?></label>
    <span class="woocommerce-input-wrapper">
        <input class="<?php esc_attr( apply_filters( 'wc_checkout_braspag_payment_cc_number_html_class', 'input-text' ) ); ?>" type="text" name="braspag_payment_cc_number" required autocomplete="cc-number">
    </span>
</p>

<p class="form-row form-row-braspag_payment_cc_holder">
    <label><?php esc_html_e( apply_filters( 'wc_checkout_braspag_payment_cc_holder_label', 'Holder Name' ), WCB_TEXTDOMAIN ); ?></label>
    <span class="woocommerce-input-wrapper">
        <input class="<?php esc_attr( apply_filters( 'wc_checkout_braspag_payment_cc_holder_html_class', 'input-text' ) ); ?>" type="text" name="braspag_payment_cc_holder" required autocomplete="cc-name">
    </span>
</p>

<p class="form-row form-row-braspag_payment_cc_expiration_date">
    <label><?php esc_html_e( apply_filters( 'wc_checkout_braspag_payment_cc_expiration_date_label', 'Expiration Date' ), WCB_TEXTDOMAIN ); ?></label>
    <span class="woocommerce-input-wrapper">
        <input class="<?php esc_attr( apply_filters( 'wc_checkout_braspag_payment_cc_expiration_date_html_class', 'input-text' ) ); ?>" type="text" name="braspag_payment_cc_expiration_date" required autocomplete="cc-exp">
    </span>
</p>

<p class="form-row form-row-braspag_payment_cc_security_code">
    <label><?php esc_html_e( apply_filters( 'wc_checkout_braspag_payment_cc_security_code_label', 'Security Code' ), WCB_TEXTDOMAIN ); ?></label>
    <span class="woocommerce-input-wrapper">
        <input class="<?php esc_attr( apply_filters( 'wc_checkout_braspag_payment_cc_security_code_html_class', 'input-text' ) ); ?>" type="text" name="braspag_payment_cc_security_code" required autocomplete="cc-csc">
    </span>
</p>

<p class="form-row form-row-braspag_payment_cc_brand">
    <label><?php esc_html_e( apply_filters( 'wc_checkout_braspag_payment_cc_brand_label', 'Brand' ), WCB_TEXTDOMAIN ); ?></label>
    <span class="woocommerce-input-wrapper">
        <input class="<?php esc_attr( apply_filters( 'wc_checkout_braspag_payment_cc_brand_html_class', 'input-text' ) ); ?>" type="text" name="braspag_payment_cc_brand">
    </span>
</p>

<p class="form-row form-row-braspag_payment_cc_installments">
    <label><?php esc_html_e( apply_filters( 'wc_checkout_braspag_payment_cc_installments_label', 'Installments' ), WCB_TEXTDOMAIN ); ?></label>
    <span class="woocommerce-input-wrapper">
        <select class="<?php esc_attr( apply_filters( 'wc_checkout_braspag_payment_cc_installments_html_class', 'input-text' ) ); ?>" style="-webkit-appearance: menulist-button;" name="braspag_payment_cc_installments">
            <?php
                /**
                 * Filter for valid installments
                 * Default is array from 1 to 12
                 */
                $installments = apply_filters( 'wc_checkout_braspag_cc_max_installments', range( 1, 12 ) );
                foreach ( $installments as $installment ) {
                    /**
                     * Filter for installment text
                     */
                    $label = apply_filters( 'wc_checkout_braspag_cc_installment_text', esc_html( $installment ) );
                    echo '<option value="' . (int) esc_attr( $installment ) . '">' . $label . '</option>';
                }
            ?>
        </select>
    </span>
</p>

