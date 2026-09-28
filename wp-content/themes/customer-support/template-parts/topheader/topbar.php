<?php
/**
 * Displays the dark utility top bar (location, email, phone, social icons)
 *
 * @package Customer Support
 */

$customer_support_topbar_location = get_theme_mod( 'customer_support_topbar_location', __( 'US - Los Angeles', 'customer-support' ) );
$customer_support_topbar_email    = get_theme_mod( 'customer_support_topbar_email', 'info@example.com' );
$customer_support_topbar_phone    = get_theme_mod( 'customer_support_topbar_phone', '00123 456 789' );

$customer_support_topbar_socials = array(
    'facebook'  => 'fab fa-facebook-f',
    'twitter'   => 'fab fa-twitter',
    'instagram' => 'fab fa-instagram',
    'linkedin'  => 'fab fa-linkedin-in',
    'youtube'   => 'fab fa-youtube',
);
?>
<div class="topbar-wrap">
    <div class="container">
        <div class="row align-items-center g-2">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 topbar-col">
                <?php if ( $customer_support_topbar_location ) : ?>
                    <div class="topbar-item">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        <span><?php esc_html_e( 'Location : ', 'customer-support' ); ?><?php echo esc_html( $customer_support_topbar_location ); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 topbar-col">
                <?php if ( $customer_support_topbar_email ) : ?>
                    <div class="topbar-item">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <span><?php esc_html_e( 'Email : ', 'customer-support' ); ?><a href="<?php echo esc_url( 'mailto:' . $customer_support_topbar_email ); ?>"><?php echo esc_html( $customer_support_topbar_email ); ?></a></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 topbar-col">
                <?php if ( $customer_support_topbar_phone ) : ?>
                    <div class="topbar-item">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <span><?php esc_html_e( 'Call Us : ', 'customer-support' ); ?><a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $customer_support_topbar_phone ) ); ?>"><?php echo esc_html( $customer_support_topbar_phone ); ?></a></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 topbar-col topbar-col-socials">
                <div class="topbar-socials d-flex">
                    <?php foreach ( $customer_support_topbar_socials as $customer_support_social_key => $customer_support_social_icon ) :
                        $customer_support_social_url = get_theme_mod( 'customer_support_topbar_' . $customer_support_social_key, '#' );
                        if ( empty( $customer_support_social_url ) ) {
                            continue;
                        }
                        ?>
                        <a href="<?php echo esc_url( $customer_support_social_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( ucfirst( $customer_support_social_key ) ); ?>">
                            <i class="<?php echo esc_attr( $customer_support_social_icon ); ?>" aria-hidden="true"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
