/*!
 * theme custom scripts
*/

jQuery(document).ready(function ($) {
  $(".waves canvas").waves();

  $('.wpcf7').on('wpcf7mailsent', function(){
    $('.valve').addClass('open-valve');
    
    $('.valve .wpcf7-submit').prop('disabled', true);
  });
});
