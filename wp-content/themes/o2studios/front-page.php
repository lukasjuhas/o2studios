<?php  get_header(); ?>

<main class="main" role="main">
    <div class="container">

        <?php while ( have_posts() ) : the_post(); ?>
            <section class="section-pairs">
                <div class="row">
                    <div class="col col--xs-12 col--sm-12 col--md-6 col--lg-6">
                      <section class="section section--main">
                          <article <?php post_class(); ?>>
                            <div class="row row--gutterless">
                              <div class="col col--xs-12 col--sm-12 col--md-12 col--lg-12">
                                  <div class="container">
                                    <h2>Game Audio</h2>
                                    <p>Stuff goes here.</p>
                                  </div>
                              </div>
                            </div>
                          </article>
                      </section>
                    </div>
                    <div class="col col--xs-12 col--sm-12 col--md-6 col--lg-6">
                      <section class="section section--main">
                          <article <?php post_class(); ?>>
                            <div class="row row--gutterless">
                              <div class="col col--xs-12 col--sm-12 col--md-12 col--lg-12">
                                  <div class="container">
                                    <h2>Commercial Audio</h2>
                                    <p>Stuff goes here.</p>
                                  </div>
                              </div>
                            </div>
                          </article>
                      </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col col--xs-12 col--sm-12 col--md-6 col--lg-6">
                      <section class="section section--main">
                          <article <?php post_class(); ?>>
                            <div class="row row--gutterless">
                              <div class="col col--xs-12 col--sm-12 col--md-12 col--lg-12">
                                  <div class="container">
                                    <h2>Film Audio</h2>
                                    <p>Stuff goes here.</p>
                                  </div>
                                </div>
                            </div>
                          </article>
                      </section>
                    </div>
                    <div class="col col--xs-12 col--sm-12 col--md-6 col--lg-6">
                      <section class="section section--main">
                          <article <?php post_class(); ?>>
                            <div class="row row--gutterless">
                              <div class="col col--xs-12 col--sm-12 col--md-12 col--lg-12">
                                  <div class="container">
                                    <h2>Music</h2>
                                    <p>Stuff goes here.</p>
                                  </div>
                                </div>
                            </div>
                          </article>
                      </section>
                    </div>
                </div>
            </section>

            <section class="section section--main">
                <article <?php post_class(); ?>>
                  <div class="row row--gutterless">
                    <div class="col col--xs-12 col--sm-12 col--md-12 col--lg-12">
                        <div class="container">
                          <h2>Highlighted Projects</h2>
                          <p>Stuff goes here.</p>
                        </div>
                      </div>
                  </div>
                </article>
            </section>

            <section class="section section--main">
                <article <?php post_class(); ?>>
                  <div class="row row--gutterless">
                    <div class="col col--xs-12 col--sm-12 col--md-12 col--lg-12">
                        <div class="container">
                          <h2>Recent Projects</h2>
                          <p>Stuff goes here.</p>
                        </div>
                  </div>
                </article>
            </section>
        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>
