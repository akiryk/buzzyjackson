jQuery(document).ready(function($) {
  
  var handler = function(e){
    $(this).off();
    $overlay = $(this).find('.overlay');
    $overlay.addClass('open');
    e.preventDefault();
    e.stopPropagation();

    $(document).on('click', function(e) {
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