// CODE ========================

var wH = $(window).height(),
    wW = $(window).width(),
    ua = navigator.userAgent,
    touchendOrClick = (ua.match(/iPad|iPhone|iPad/i)) ? "touchend" : "click",

    deviceAgent = navigator.userAgent.toLowerCase(),
    isMobile = deviceAgent.match(/(iphone|ipod|ipad)/);

var $root = $('html, body');

FastClick.attach(document.body);

$(window).resize(function() {
  $('.content').css({
    paddingTop: $('.header').outerHeight()
  });

  $('.video iframe').css({
    maxHeight: $(window).outerHeight() - $('header').outerHeight()
  });

  $('.new_page').css({
    paddingBottom: $('footer').outerHeight()
  })
}).trigger('resize');

$(window).load(function() {
  setTimeout(function() {

  },200)
});

$(document).ready(function() {

    $('.startedit').on('click', function () {
        tinymce.init({
            skin: 'custom',
            selector: '.inline-edit',
            fixed_toolbar_container: "#css3-selector",
            language: 'ru',
            inline: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime table contextmenu paste save'
            ],
            toolbar: 'save insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
            save_onsavecallback: function () {
                $.post('/control/pages/inlinesave/', {content:this.getContent(), id:$('.inline-edit').data('page-id')}, function (data) {
                    if (data === 'success' ) {
                        alert('Изменения успешно сохранены!');
                    }else{
                        alert('Возникла ошибка =(');
                    }
                });
            },
            init_instance_callback: function () {
                tinymce.activeEditor.focus();
            },
        });

        $(this).hide();
        $('.canceledit').show();
    });

    $('.canceledit').on('click', function () {
        location.reload();
    });




  var form = $('#requestForm');
  form.ajaxChimp({
    url: 'http://lykkex.us12.list-manage.com/subscribe/post?u=c9fb788cc123f23b892b90527&id=b385da00b1',
    callback: function() {
      $('#requestForm').addClass('zoomOut')
      setTimeout(function() {
        $('.message').fadeIn(800)
      }, 400)
    }
  });


  $('.product-slider').royalSlider({
    transitionType: 'fade',
    navigateByClick: false,
    arrowsNav: false,
    imageAlignCenter: false,
    imageScalePadding: 0,
    loop: true,
    autoHeight: true,
    fadeinLoadedSlide: false,
    autoPlay: {
      enabled: true,
      pauseOnHover: false,
      delay: 5000
    }
  })


  $('.screen-slideshow').royalSlider({
    transitionType: 'fade',
    navigateByClick: false,
    sliderDrag: false,
    sliderTouch: false,
    keyboardNavEnabled: false,
    arrowsNav: false,
    imageAlignCenter: false,
    imageScalePadding: 0,
    controlNavigation: false,
    loop: true,
    autoHeight: false,
    fadeinLoadedSlide: false,
    autoPlay: {
      enabled: true,
      pauseOnHover: false,
      delay: 4000
    }
  })

});

$(function() {


  $('.scrollToAnchor').on('click', function(e) {
    e.preventDefault();
    var target = $(this).attr('href');

    $('html,body').animate({
      scrollTop: $(target).offset().top - 40
    }, 1000);

  })

});


$('.features__item, .animElem').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
  if (isInView) {
    $(this).addClass('inview animated fadeInUp');
    if (visiblePartY == 'top') {
      // top part of element is visible
    } else if (visiblePartY == 'bottom') {
      // bottom part of element is visible
    } else {
      // whole part of element is visible
    }
  } else {
  }
});

$(function() {
  //caches a jQuery object containing the header element
  var header = $(".header");
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 10) {
      header.addClass("fixed");
    } else {
      header.removeClass("fixed")
    }
  });
});


function parallaxScroll(cont, el){
  var pxElem = cont.find(el);

  pxElem.each(function(){
    var scrolled = parseInt($(window).scrollTop() - $(this).offset().top),
        depth = $(this).attr('data-depth');

    $(this).css({
      '-webkit-transform': 'translate3d(0,' + (-(scrolled * depth)) + 'px, 0)',
      '-moz-transform': 'translate3d(0,' + (-(scrolled * depth)) + 'px, 0)',
      '-ms-transform': 'translate3d(0,' + (-(scrolled * depth)) + 'px, 0)',
      '-o-transform': 'translate3d(0,' + (-(scrolled * depth)) + 'px, 0)',
      'transform': 'translate3d(0,' + (-(scrolled * depth)) + 'px, 0)'
    });
  });
}

if (!isMobile && wW >= 767) {
  if($('.parallax-elem').length) {
    parallaxScroll($('.effect-parallax'), $('.parallax-elem'));
  }
  $(window).bind('scroll',function(e){
    if($('.parallax-elem').length) {
      parallaxScroll($('.effect-parallax'), $('.parallax-elem'));
    }
  });
}