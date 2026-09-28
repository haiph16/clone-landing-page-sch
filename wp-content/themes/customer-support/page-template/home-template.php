<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">

  <?php if ( get_theme_mod( 'customer_support_top_slider_setting', false ) != false ) :
    $customer_support_slider_bg = get_theme_mod( 'customer_support_slider_bg_image', '' );
  ?>
    <section id="top-slider" class="top-slider" <?php if ( $customer_support_slider_bg ) : ?> style="background-image: url('<?php echo esc_url( $customer_support_slider_bg ); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"<?php endif; ?>>
      <div class="container">
        <div class="row align-items-center">

          <!-- Left column: heading, copy, stats, CTA -->
          <div class="col-lg-7 col-md-12 banner-text-col">

            <span class="slider-badge"><?php esc_html_e( 'Reliable Customer Support Solutions', 'customer-support' ); ?></span>

            <?php if ( get_theme_mod( 'customer_support_banner_heading', '' ) !== '' ) : ?>
              <h2 class="slide_main_head"><?php echo esc_html( get_theme_mod( 'customer_support_banner_heading' ) ); ?></h2>
            <?php endif; ?>

            <?php if ( get_theme_mod( 'customer_support_banner_content', '' ) !== '' ) : ?>
              <p class="slide_content"><?php echo esc_html( get_theme_mod( 'customer_support_banner_content' ) ); ?></p>
            <?php endif; ?>

            <?php
              $customer_support_stats_num   = get_theme_mod( 'customer_support_banner_stats_number', '2025+K' );
              $customer_support_stats_label = get_theme_mod( 'customer_support_banner_stats_label', __( 'Happy Customer', 'customer-support' ) );
              $customer_support_stats_avatars = array(
                get_theme_mod( 'customer_support_banner_stats_avatar_1', '' ),
                get_theme_mod( 'customer_support_banner_stats_avatar_2', '' ),
                get_theme_mod( 'customer_support_banner_stats_avatar_3', '' ),
                get_theme_mod( 'customer_support_banner_stats_avatar_4', '' ),
              );
              $customer_support_stats_avatars = array_filter( $customer_support_stats_avatars );
            ?>
            <?php if ( $customer_support_stats_avatars || $customer_support_stats_num || $customer_support_stats_label ) : ?>
              <div class="banner-stats-inline d-flex align-items-center">
                <?php if ( $customer_support_stats_avatars ) : ?>
                  <div class="stats-avatars" aria-hidden="true">
                    <?php foreach ( $customer_support_stats_avatars as $customer_support_stats_avatar ) : ?>
                      <img src="<?php echo esc_url( $customer_support_stats_avatar ); ?>" alt="">
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
                <div class="stats-text">
                  <?php if ( $customer_support_stats_num ) : ?>
                    <strong class="stats-number"><?php echo esc_html( $customer_support_stats_num ); ?></strong>
                  <?php endif; ?>
                  <?php if ( $customer_support_stats_label ) : ?>
                    <p class="stats-label"><?php echo esc_html( $customer_support_stats_label ); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if ( get_theme_mod( 'customer_support_slider_button_text_2', '' ) !== '' ) : ?>
              <div class="slide-btns">
                <div class="slide-btn-2">
                  <a href="<?php echo esc_url( get_theme_mod( 'customer_support_slider_button_text_2_url', '#' ) ? get_theme_mod( 'customer_support_slider_button_text_2_url' ) : '#' ); ?>">
                    <?php echo esc_html( get_theme_mod( 'customer_support_slider_button_text_2' ) ); ?>
                  </a>
                </div>
              </div>
            <?php endif; ?>

          </div><!-- .banner-text-col -->

          <!-- Right column: support request form card -->
          <?php if ( get_theme_mod( 'customer_support_hero_form_setting', true ) ) : ?>
            <div class="col-lg-5 col-md-12 banner-form-col">
              <div class="hero-support-form">
                <?php
                  $customer_support_hero_form_heading    = get_theme_mod( 'customer_support_hero_form_heading', __( 'Whether You Need On Site Support', 'customer-support' ) );
                  $customer_support_hero_form_subheading  = get_theme_mod( 'customer_support_hero_form_subheading', __( 'Lorem ipsum dolor sit amit.', 'customer-support' ) );
                  $customer_support_hero_form_shortcode   = get_theme_mod( 'customer_support_hero_form_shortcode', '' );
                ?>
                <?php if ( $customer_support_hero_form_heading ) : ?>
                  <h3 class="hero-support-form-title"><?php echo esc_html( $customer_support_hero_form_heading ); ?></h3>
                <?php endif; ?>
                <?php if ( $customer_support_hero_form_subheading ) : ?>
                  <p class="hero-support-form-subtitle"><?php echo esc_html( $customer_support_hero_form_subheading ); ?></p>
                <?php endif; ?>

                <?php if ( $customer_support_hero_form_shortcode ) : ?>
                  <?php echo do_shortcode( $customer_support_hero_form_shortcode ); ?>
                <?php endif; ?>
              </div>
            </div><!-- .banner-form-col -->
          <?php endif; ?>

        </div><!-- .row -->
      </div><!-- .container -->
    </section><!-- #top-slider -->
  <?php endif; ?>

<?php if ( get_theme_mod( 'customer_support_services_section_setting', false ) ) : ?>
<section id="features-section" class="py-5">
    <div class="container">

        <!-- Section Heading -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-7 text-center">
                <?php
                $customer_support_feat_sec_badge = get_theme_mod( 'customer_support_services_section_badge', __( 'What We Do', 'customer-support' ) );
                $customer_support_feat_sec_title = get_theme_mod( 'customer_support_services_section_title', '' );

                ?>

                <?php if ( $customer_support_feat_sec_badge ) : ?>
                    <span class="slider-badge features-badge"><?php echo esc_html( $customer_support_feat_sec_badge ); ?></span>
                <?php endif; ?>

                <?php if ( $customer_support_feat_sec_title ) : ?>
                    <h2 class="features-section-title">
                        <?php echo esc_html( $customer_support_feat_sec_title ); ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="row features-cards-row">
            <?php
            $customer_support_feat_icon_defaults = array(
                1 => 'fab fa-whatsapp',
                2 => 'fas fa-wrench',
                3 => 'fas fa-headset',
            );
            for ( $i = 1; $i <= 3; $i++ ) :

                $customer_support_feat_title = get_theme_mod( 'customer_support_feature_' . $i . '_title', '' );
                $customer_support_feat_desc  = get_theme_mod( 'customer_support_feature_' . $i . '_desc', '' );
                $customer_support_feat_url   = get_theme_mod( 'customer_support_feature_' . $i . '_url', '#' );
                $customer_support_feat_img   = get_theme_mod( 'customer_support_feature_' . $i . '_image', '' );
                $customer_support_feat_icon  = get_theme_mod( 'customer_support_feature_' . $i . '_icon', $customer_support_feat_icon_defaults[ $i ] );

                $customer_support_feat_is_image = ! empty( $customer_support_feat_img );
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">

                        <?php if ( $customer_support_feat_is_image ) : ?>
                            <div class="feature-card-media">
                                <img src="<?php echo esc_url( $customer_support_feat_img ); ?>"
                                    alt="<?php echo esc_attr( $customer_support_feat_title ); ?>">
                            </div>
                        <?php else : ?>
                            <div class="feature-card-media feature-card-media-solid"></div>
                        <?php endif; ?>

                        <div class="feature-card-overlay">
                            <?php if ( $customer_support_feat_icon ) : ?>
                                <span class="feature-card-icon-wrap">
                                    <i class="<?php echo esc_attr( $customer_support_feat_icon ); ?>" aria-hidden="true"></i>
                                </span>
                            <?php endif; ?>

                            <?php if ( $customer_support_feat_title ) : ?>
                                <h3 class="feature-card-title">
                                    <?php echo esc_html( $customer_support_feat_title ); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ( $customer_support_feat_desc ) : ?>
                                <p class="feature-card-desc">
                                    <?php echo esc_html( $customer_support_feat_desc ); ?>
                                </p>
                            <?php endif; ?>

                            <a href="<?php echo esc_url( $customer_support_feat_url ? $customer_support_feat_url : '#' ); ?>"
                                class="feature-card-readmore">
                                <?php esc_html_e( 'Read More', 'customer-support' ); ?>
                            </a>
                        </div>

                    </div>
                </div>
            <?php endfor; ?>
        </div>

    </div>
</section>
<?php endif; ?>

  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
