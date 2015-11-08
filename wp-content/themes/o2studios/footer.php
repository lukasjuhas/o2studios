          <footer class="footer" role="contentinfo">
              <div class="container">
                <div class="logo-footer">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-footer">
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/logo-footer.svg"  onerror="this.src='<?php echo bloginfo('template_directory'); ?>/images/logo-footer.png'" alt="<?php bloginfo( 'name' ); ?>" />
                   </a>
                </div>
              </div>
          </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
