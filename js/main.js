jQuery(document).ready(function($) {
  
  /**
  * Overlay Navigation
  */
  var handler = function(e){
    $(this).off();
    $overlay = $(this);
    // $overlay = $(this).find('.overlay');
    $overlay.addClass('open');
    e.preventDefault();
    e.stopPropagation();

    $(document).on('click', function(e) {
      e.preventDefault();
      $(this).off();
      attachHandler();
      $overlay.removeClass('open');
    });
  };

  function attachHandler() {
    $('.menu-item-has-children').on('click', handler);  
  };
  
  attachHandler(); 

});

( function() {
  var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
      is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
      is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

  if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
    window.addEventListener( 'hashchange', function() {
      var element = document.getElementById( location.hash.substring( 1 ) );

      if ( element ) {
        if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
          element.tabIndex = -1;

        element.focus();
      }
    }, false );
  }
})();


