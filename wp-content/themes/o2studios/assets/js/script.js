(function() {
  function toggleMenu(e) {
   e.preventDefault();
   $('.menu-toggle, .main-nav' ).toggleClass('open');
   $('.header').toggleClass('menu-open');
 }
 $('.menu-toggle').on('click', toggleMenu);

})(jQuery);
