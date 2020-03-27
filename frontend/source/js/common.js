$(function() {

	$(function() {
	  $('#main-menu').smartmenus();
	});

	$('.burger').on('click', function(){
        $(this).parent().toggleClass('dropdown__open_burger');
    });

    if ($(window).width() > 1200) {
    	$('.wrapper__another .menu_container').hover(function(){
    		$('.menu_container').toggleClass("open_menu_another_page");
    	})
    } 

    $('.filter_wrapper-item-button').click(function(){
    	$(this).parent().toggleClass("rotate").find('.filter_wrapper-item-body').slideToggle();
    })	

    $('.see__more').click(function(){
    	$(this).toggleClass('rotate_action');
    	if($(this).parent().hasClass('see_all_cherecter')){
    		$(this).parent().removeClass('see_all_cherecter');
    		$(this).html('Еще');
    	}else{
    		$(this).parent().addClass('see_all_cherecter');
    		$(this).html('Свернуть')
    	}
    }); 

    $('.btn_yellow').click(function(){
    	$('.filter_wrapper').show();
    });
    $('.m_filter_close').click(function(){
    	$('.filter_wrapper').hide();
    })
	
	$('.m-slider').slick({
	  dots: true,
	  customPaging : function(slider, i) {
        return '<button href="#"><span class="dot_icon"></span></button>';
      },
	  infinite: true,
	  speed: 500,
	  slidesToShow: 1,
	  prevArrow: $('.m-prev'),
	  nextArrow: $('.m-next'),
	  adaptiveHeight: true
	});

	$('.p-slider').slick({
	  dots: false,
	  prevArrow: $('.v-prev'),
	  nextArrow: $('.v-next'),
	  infinite: false,
	  speed: 600,
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  responsive: [
	    {
	      breakpoint: 1601,
	      settings: {
	        slidesToShow: 4,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        infinite: true
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	        infinite: true
	      }
	    },
	    {
	      breakpoint: 501,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true,
	        customPaging : function(slider, i) {
       		 return '<button href="#"><span class="dot_icon"></span></button>';
      		}
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});

	$('.product_bought-slider').slick({
	  dots: false,
	  prevArrow: $('.b-prev'),
	  nextArrow: $('.b-next'),
	  infinite: false,
	  speed: 600,
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  responsive: [
	    {
	      breakpoint: 1601,
	      settings: {
	        slidesToShow: 4,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        infinite: true
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	        infinite: true
	      }
	    },
	    {
	      breakpoint: 501,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true,
	        customPaging : function(slider, i) {
       		 return '<button href="#"><span class="dot_icon"></span></button>';
      		}
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	})

	$('.product-slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  swipe: false,
	  fade: true,
	  asNavFor: '.product-slider-nav'
	});
	$('.product-slider-nav').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  asNavFor: '.product-slider-for',
	  dots: false,
	  vertical: true,
	  centerMode: true,
	  centerPadding: '0px',
	  focusOnSelect: true,
	  responsive: [
          {
            breakpoint: 501,
            settings: {
              slidesToShow: 2,
	  			slidesToScroll: 1,
            }
          }
        ]
	});

	$('.burger_two, .overlay').click(function(){
	  $('.burger_two').toggleClass('clicked');
	  $('.overlay').toggleClass('show');
	  $('.page_nemu_nav').toggleClass('show');
	  $('body').toggleClass('overflow');
	});	

	if ($('div').is('#html5')) {
	    var form = $('.onchange input').closest('form');
	    var w = $(window).width();
	    var keypressSlider = document.getElementById('html5');
	    var input0 = document.getElementById('min_price');
	    var input1 = document.getElementById('max_price');
	    var inputs = [input0, input1];
	    var maxPrice = Number(document.getElementById('max_available_price').value);
	    var currentMin = Number(input0.value);
	    var currentMax = Number(input1.value);
	    if (currentMax == 0){
	        currentMax = maxPrice;
	    }



	    noUiSlider.create(keypressSlider, {
	        start: [currentMin, currentMax],
	        connect: true,
	        // direction: 'rtl',
	        // tooltips: [true, wNumb({decimals: 1})],
	        // tooltips: true,

	        range: {
	            'min': [0],
	            'max': [maxPrice],
	        },
	        step: 1,

	    });
	    function setSliderHandle(i, value) {
	        var r = [null, null];
	        r[i] = Number(value);
	        keypressSlider.noUiSlider.set(r);
	    }

	// Listen to keydown events on the input field.
	    inputs.forEach(function (input, handle) {

	        input.addEventListener('change', function () {
	            setSliderHandle(handle, this.value);
	        });
	        input.addEventListener('keydown', function (e) {
	            var values = keypressSlider.noUiSlider.get();
	            var value = Number(values[handle]);
	            // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
	            var steps = keypressSlider.noUiSlider.steps();
	            // [down, up]
	            var step = steps[handle];
	            var position;
	            // 13 is enter,
	            // 38 is key up,
	            // 40 is key down.
	            switch (e.which) {
	                case 13:
	                    setSliderHandle(handle, this.value);
	                    break;
	                case 38:
	                    // Get step to go increase slider value (up)
	                    position = step[1];
	                    // false = no step is set
	                    if (position === false) {
	                        position = 1;
	                    }
	                    // null = edge of slider
	                    if (position !== null) {
	                        setSliderHandle(handle, value + position);
	                    }
	                    break;
	                case 40:
	                    position = step[0];
	                    if (position === false) {
	                        position = 1;
	                    }
	                    if (position !== null) {
	                        setSliderHandle(handle, value - position);
	                    }
	                    break;
	            }
	        });
	    });
	    keypressSlider.noUiSlider.on('update', function (values, handle) {
	        inputs[handle].value = Math.round(values[handle], 1);
	    });
	}

});



$(document).ready(function() {
  $('select').niceSelect();
});




  $('.tile')
    // tile mouse actions
    .on('mouseover', function(){
      $(this).children('.photo').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
    })
    .on('mouseout', function(){
      $(this).children('.photo').css({'transform': 'scale(1)'});
    })
    .on('mousemove', function(e){
      $(this).children('.photo').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
    })
    // tiles set up
    .each(function(){
      $(this)
        // add a photo container
        .append('<div class="photo"></div>')
        // some text just to show zoom level on current item in this example
        .append('<div class="txt"><div class="x">'+ $(this).attr('data-scale') +'x</div>ZOOM ON<br>HOVER</div>')
        // set up a background image for each tile based on data-image attribute
        .children('.photo').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
    })



    $('.minus').click(function () {
        var $input = $(this).parent().find('.cout-product');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('.cout-product');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
    $(".cout-product").keypress(function(event){
      event = event || window.event;
      if (event.charCode && event.charCode!=0 && event.charCode!=46 && (event.charCode < 48 || event.charCode > 57) )
        return false;
    });


    var block_answer = $('.answer_form');

	$('.review_button').on('click', function(){
		var reviewId = parseInt($(this).data('review'));
		$('#review-id').val(reviewId);

		$(this).after(block_answer);
		if($(this).parent().parent().find('.ananswer_form_open')){
			$(this).parent().parent().find('.answer_form').removeClass('answer_form_open');
			$('.review_button').removeClass('review_button_open');
		}
		$(this).parent().parent().find('.answer_form').addClass('answer_form_open');
		$(this).addClass('review_button_open');

	});

	$('#standart_coment-popap').click(function(event){
		event.preventDefault();
		$('.answer_form').removeClass('answer_form_open');
        $('.review_button').removeClass('review_button_open');
	})

    $(document).on('click', function(e) {
      if (!$(e.target).closest('.answer_form, .review_button').length) {
        $('.answer_form').removeClass('answer_form_open');
        $('.review_button').removeClass('review_button_open');

      }
        e.stopPropagation();
    });



  $('.tabgroup > div').hide();
  $('.tabgroup > div:first-of-type').show();
  $('.tabs a').click(function(e){
  e.preventDefault();
    var $this = $(this),
        tabgroup = '#'+$this.parents('.tabs').data('tabgroup'),
        others = $this.closest('li').siblings().children('a'),
        target = $this.attr('href');
    others.removeClass('active');
    $this.addClass('active');
    $(tabgroup).children('div').hide();
    $(target).show();
  
  });

$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value')); // The star currently selected
    var stars = $(this).parent().children('li.star');
    $('#vote-input').val(onStar);

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);
    
  });
});

function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}

$('#open_add_rew').click(function(){
	$('.add_reviews_block_main').addClass('add_reviews_block_main_open');
	$('.reviews_wrapper').addClass('reviews_wrapper_close');
});	

$('.standart_large_close').click(function(event){
	event.preventDefault();
	$('.add_reviews_block_main').removeClass('add_reviews_block_main_open');
	$('.reviews_wrapper').removeClass('reviews_wrapper_close')
});


$(document).ready(function() {
    $(".anhor").click(function() {
      var elementClick = $(this).attr("href")
      var destination = $(elementClick).offset().top;
      $("html:not(:animated),body:not(:animated)").animate({
        scrollTop: destination
      }, 800);
      return false;
    });
});

