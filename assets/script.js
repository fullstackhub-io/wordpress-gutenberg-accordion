(function ($) {

  // Toggle the accordion
  $('.td-accordion').on('click', '.td-accordion__header', function () {
    console.log('test');
    $(this).parent().toggleClass('td-accordion--open');
  });

})(jQuery);
