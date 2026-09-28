<?php
/**
 * Displays main header
 *
 * @package Customer Support
 */
?>

<div class="main-header text-center text-md-start">
    <div class="container">
        <div class="row nav-box">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5 col-12 align-self-center">
                <div class="navbar-brand text-center text-md-start">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $customer_support_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $customer_support_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('customer_support_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('customer_support_logo_title_text',true) != ''){ ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $customer_support_description = get_bloginfo( 'description', 'display' );
                            if ( $customer_support_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('customer_support_theme_description',false) != ''){ ?>
                            <p class="site-description"><?php echo esc_html($customer_support_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-3 col-sm-5 col-3 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6 col-9 btn-box align-self-center text-end">
                <?php
                $customer_support_header_btn_text = get_theme_mod( 'customer_support_header_btn_text', __( 'Get Support', 'customer-support' ) );
                $customer_support_header_btn_url  = get_theme_mod( 'customer_support_header_btn_url', '#' );
                ?>
                <div class="header-cta-wrap d-flex align-items-center justify-content-end">
                    <?php if ( get_theme_mod( 'customer_support_header_show_search', true ) ) : ?>
                        <div class="header-search-wrap">
                            <button type="button" class="header-search-toggle" aria-label="<?php esc_attr_e( 'Toggle search form', 'customer-support' ); ?>">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </button>
                            <div class="header-search-popup">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty( $customer_support_header_btn_text ) ) : ?>
                        <a href="<?php echo esc_url( ! empty( $customer_support_header_btn_url ) ? $customer_support_header_btn_url : '#' ); ?>"
                            class="header-quote-btn">
                            <?php echo esc_html( $customer_support_header_btn_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
