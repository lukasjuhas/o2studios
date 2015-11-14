<?php  get_header(); ?>

<main class="main" role="main">
    <div class="container">

        <?php while ( have_posts() ) : the_post(); ?>
            <section class="section section--main">
                <article <?php post_class(); ?>>
                  <div class="row row--gutterless">
                    <div class="col col--xs-12 col--sm-12 col--md-7 col--lg-7">
                        <?php $content = apply_filters('the_content',get_the_content());
                        echo get_the_multicol_content($content);
                        ?>
                    </div>
                    <div class="feature feature--right col col--xs-12 col--sm-12 col--md-5 col--lg-5">
                        <div class="container">
                            <?php the_post_thumbnail('section-thumbnail'); ?>
                        </div>
                    </div>
                  </div>
                </article>
            </section>

            <?php if( have_rows('content_section') ):
              while ( have_rows('content_section') ) : the_row(); ?>
                <section class="section">
                  <div class="row row--gutterless">
                    <div class="feature col col--xs-12 col--sm-12 col--md-5 col--lg-5">
                      <div class="container">
                        <?php $image = wp_get_attachment_image(get_sub_field('featured_image'), 'section-thumbnail'); ?>
                        <?php echo $image; ?>
                      </div>
                    </div>
                    <div class="col col--xs-12 col--sm-12 col--md-7 col--lg-7">
                      <div class="container">
                        <?php $content = apply_filters('the_content', get_sub_field('content'));
                        echo get_the_multicol_content($content); ?>
                      </div>
                    </div>
                  </div>
                </section>
              <?php endwhile;
            endif;?>
        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>
