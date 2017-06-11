$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
jQuery(document).ready(function($){
  $('ul.cards').on('click', function(){
    $(this).toggleClass('transition');
  });

  $('ul.card-stacks').on('click', function(){
    $(this).toggleClass('transition');
  });

  $('ul.cards-split').on('click', function(){
    $(this).toggleClass('transition');
  });

  $('ul.cards-split-delay').on('click', function(){
    $(this).toggleClass('transition');
  });
});

$( document ).ready(function() {
  $(".buttom-btn").click(function(){
    $(".top-btn").addClass('top-btn-show');
    $(".contact-form-page").addClass('show-profile');
    $(this).addClass('buttom-btn-hide')
  });

  $(".top-btn").click(function(){
    $(".buttom-btn").removeClass('buttom-btn-hide');
    $(".contact-form-page").removeClass('show-profile');

  });

})