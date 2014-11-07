jQuery(document).ready(function($) {
  
  function handler(e){
    $(this).off();
    $(this)
      .addClass('open')
      .find('.sub-menu')
      .addClass('show');
    e.preventDefault();
    e.stopPropagation();

    $(this).on('click', function(e) {
      $(this).off();
      attachHandler();
      $(this).find('.sub-menu').removeClass('show');
    });
  };

  function attachHandler() {
    $('.menu-item-has-children').on('click', handler);  
  };
  
  attachHandler(); 

});