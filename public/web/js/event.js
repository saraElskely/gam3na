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
jQuery(document).ready(function($) {
  $('.rating .star').hover(function() {
    $(this).addClass('to_rate');
    $(this).parent().find('.star:lt(' + $(this).index() + ')').addClass('to_rate');
    $(this).parent().find('.star:gt(' + $(this).index() + ')').addClass('no_to_rate');
  }).mouseout(function() {
    $(this).parent().find('.star').removeClass('to_rate');
    $(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate');
  }).click(function() {
    $(this).removeClass('to_rate').addClass('rated');
    $(this).parent().find('.star:lt(' + $(this).index() + ')').removeClass('to_rate').addClass('rated');
    $(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate').removeClass('rated');
    /*Save your rate*/
    /*TODO*/
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