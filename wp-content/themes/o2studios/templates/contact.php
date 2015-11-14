<?php

    /**
     * Template Name: Contact
     */
?>

<?php  get_header(); ?>

<main class="main" role="main">
    <div class="container">

        <?php while ( have_posts() ) : the_post(); ?>
            <section class="section section--main">
                <article <?php post_class(); ?>>
                  <div class="row row--gutterless">
                    <div class="col col--xs-12 col--sm-12 col--md-6 col--lg-6">
                        <?php $content = apply_filters('the_content',get_the_content());
                        echo get_the_multicol_content($content);
                        ?>
                    </div>
                    <div class="col col--xs-12 col--sm-12 col--md-6 col--lg-6">
                        <div class="container">
                            <?php $location = get_field('map');
                						if($location) { ?>
                  							<div class="map">
    				                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-zoom="10"></div>
                  							</div>
                						<?php } ?>
                        </div>
                    </div>
                  </div>
                </article>
            </section>

            <section class="section section--impressum">
              <a class="impressum__header">
                  <div class="container">
                      <h1>Impressum</h1>
                  </div>
              </a>
              <div class="impressum__content">
                <article <?php post_class(); ?>>
                    <div class="row row--gutterless">
                        <div class="col col--xs-12 col--sm-12 col--md-12 col--lg-12">
                            <?php $content = apply_filters('the_content', get_field('impressum'));
                            echo get_the_multicol_content($content); ?>
                        </div>
                    </div>
                </article>
              </div>
            </section>

        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>
