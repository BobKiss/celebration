jQuery(document).ready(function ($) {
  // wow animations
  new WOW().init();

  // header
  $('.site-header .mainHeader .siteSearch form button').click(function (e) {
    let search = $(this).closest('.siteSearchForm');
    e.preventDefault();
    if (search.hasClass('active')) {
      let searchInput = search.find('input[type="text"]');
      if (searchInput.val().length > 0) {
        search.trigger('submit');
      } else
        search.removeClass('active');
    } else
      search.addClass('active');
  });

  // niceSelect init
  $('.perPageSelector, .woocommerce .woocommerce-ordering select').niceSelect();

  $('.site-header .mainHeader .userInfoBlock .userSection .userOptions .list .current').click(function () {
    $(this).closest('.list').toggleClass('active');
  });

  $('.site-header .mainHeader .userInfoBlock .userSection .cart').click(function () {
    $('.popupCartBlock').toggleClass('activeMenu');
  });


  $('.site-header .mobileHeader .mobileHeaderTopLine .row > .burgerButton').click(function (e) {
    $('body').toggleClass('mobileMenuActive');
    $('.mobileHeader').toggleClass('activeMenu');
    if ($('.mobileHeader').hasClass('activeMenu')) {
      let scrollMenuWidth = 0;
      $('.site-header .mobileHeader .fullscreenMenu .slideLine ul a').each(function (i, el) {
        scrollMenuWidth += $(el).outerWidth();
      });
      $('.site-header .mobileHeader.activeMenu .fullscreenMenu .slideLine ul').css('width', scrollMenuWidth+50);
    }
  });

  $('.site-header .mobileHeader .searchAndProfile .searchIcon').click(function (e) {
    $('.site-header .mobileHeaderTopLine .searchBar').toggleClass('active');
  });


  // homepage

  // homepage main slider
  $('.homepageTemplate .firstScreenSlider .slick_slider').slick({
    rtl: true,
    dots: true,
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    // cssEase: 'linear',
    prevArrow: `<button type="button" class="slick-prev"><img src="${location.origin}/wp-content/themes/celebration/assets/images/icons/sliderArrow.svg" alt="" /></button>`,
    nextArrow: `<button type="button" class="slick-next"><img src="${location.origin}/wp-content/themes/celebration/assets/images/icons/sliderArrow.svg" alt="" /></button>`,
    responsive: [
      {
        breakpoint: 480,
        settings: {
          dots: false,
        }
      }
    ]
  });

  // homepage prdoucts by type slider
  $('.prodsByType .categorySlider').slick({
    rtl: true,
    dots: false,
    infinite: true,
    speed: 500,
    slidesToShow: 5,
    cssEase: 'linear',
    prevArrow: `<button type="button" class="slick-prev"><img src="${location.origin}/wp-content/themes/celebration/assets/images/icons/sliderArrow.svg" alt="" /></button>`,
    nextArrow: `<button type="button" class="slick-next"><img src="${location.origin}/wp-content/themes/celebration/assets/images/icons/sliderArrow.svg" alt="" /></button>`,
    responsive: [
    {
      breakpoint: 1280,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  });


  // homepage tabulator

  $('.homepageTemplate .celebrationShopSection .shopContent .topBar .tabs a').click(function (e) {
    e.preventDefault();
    let tabName = $(this).attr('href');
    let toShowTab = $(tabName);
    $(this).closest('.tabs').find('a').removeClass('active');
    $(this).addClass('active');
    $('.homepageTemplate .celebrationShopSection .shopContent .line').removeAttr('class').addClass('line').addClass(tabName.slice(1));
    $(toShowTab).closest('.tabContentContainer').find('.active').removeClass('active');
    $(toShowTab).addClass('active');
  });

  // homepage category after tabulator
  $('.current-cat.cat-parent, .current-cat-parent').addClass('opened');
  $('.categoryList .product-categories .cat-parent>a ').append('<div class="after"></div>');
  $('.sidebar .product-categories .cat-parent > a > .after').click(function (e) {
    e.preventDefault();
    $(this).parent().parent().toggleClass('opened');
  });

  // homepage tabulator mobile buttons
  $('.homepageTemplate .celebrationShopSection .shopContent .arrowRigth').click(function () {
    $('.homepageTemplate .celebrationShopSection .shopContent .topBar .tabs').find('.active').parent().next().find('a').trigger('click');
  });
  $('.homepageTemplate .celebrationShopSection .shopContent .arrowLeft').click(function () {
    $('.homepageTemplate .celebrationShopSection .shopContent .topBar .tabs').find('.active').parent().prev().find('a').trigger('click');
  });


  // SINGLE PRODUCT
  if ($('.woocommerce div.product > .container')) {
    if ($('.woocommerce div.product .buyAndWishlist .addToWishlist .yith-wcwl-wishlistexistsbrowse').hasClass('show')) {
      $('.woocommerce div.product .buyAndWishlist .addToWishlist').addClass('added');
    }

    $('.woocommerce div.product .buyAndWishlist .addToWishlist').click(function (e) {
      location.href = $('.woocommerce div.product .buyAndWishlist .addToWishlist .show a').attr('href');
    });

    // quantity section
    let inputmin = $('.woocommerce div.product .qantitySection input[type="number"]').attr('min');
    let inputmax = $('.woocommerce div.product .qantitySection input[type="number"]').attr('max');
    inputmin = inputmin ? inputmin : 0;
    inputmax = inputmax ? inputmax : 100;

    $('.woocommerce div.product .qantitySection .plus').click(function (e) {
      let now = $('.woocommerce div.product .qantitySection .label').text();
      if (now >= inputmin && now < inputmax) {
        $('.woocommerce div.product .qantitySection input[type="number"]').val(++now);
        $('.woocommerce div.product .qantitySection form').trigger('change');
      };
    });
    $('.woocommerce div.product .qantitySection .minus').click(function (e) {
      let now = $('.woocommerce div.product .qantitySection .label').text();
      if (now > inputmin && now <= inputmax) {
        $('.woocommerce div.product .qantitySection input[type="number"]').val(--now);
        $('.woocommerce div.product .qantitySection form').trigger('change');
      };
    });

    $('.woocommerce div.product .qantitySection form').change(function (e) {
      $('.woocommerce div.product .qantitySection .label').text($('.woocommerce div.product .qantitySection input[type="number"]').val());
    });
    // gallery
    if ($('.woocommerce div.product .galleryPart .imageSliderWrapper .imageSlider img, .woocommerce div.product .galleryPart .imageSliderWrapper .imageSliderMobile img').length > 4) {

      $('.productContent .imageSliderMobile').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.productContent .currentImage',
        centerMode: true,
        focusOnSelect: true,
        rtl: true,
        nextArrow: `
        <a class="slick-next">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
          <g opacity="0.5">
          <g filter="url(#filter0_d)">
          <circle r="14.6218" transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 24.6223 20.6219)" fill="#333333"/>
          </g>
          <path d="M17.463 17.7892C17.3622 17.6951 17.3117 17.5776 17.3117 17.4483C17.3117 17.319 17.3622 17.2015 17.463 17.1074C17.6647 16.9194 17.9924 16.9194 18.1941 17.1074L24.6227 23.1019L31.0512 17.1074C31.2529 16.9194 31.5807 16.9194 31.7823 17.1074C31.984 17.2955 31.984 17.6011 31.7823 17.7892L24.9882 24.1363C24.7865 24.3243 24.4588 24.3243 24.2571 24.1363L17.463 17.7892V17.7892Z" fill="white"/>
          </g>
          <defs>
          <filter id="filter0_d" x="0" y="0" width="49.2437" height="49.2437" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"/>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
          <feOffset dy="4"/>
          <feGaussianBlur stdDeviation="5"/>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
          </filter>
          </defs>
          </svg>
        </a>
        `,
        prevArrow: `
        <a class="slick-prev">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
          <g opacity="0.5">
          <g filter="url(#filter0_d)">
          <circle r="14.6218" transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 24.6223 20.6219)" fill="#DFA29D"/>
          </g>
          <path d="M17.463 17.7892C17.3622 17.6951 17.3117 17.5776 17.3117 17.4483C17.3117 17.319 17.3622 17.2015 17.463 17.1074C17.6647 16.9194 17.9924 16.9194 18.1941 17.1074L24.6227 23.1019L31.0512 17.1074C31.2529 16.9194 31.5807 16.9194 31.7823 17.1074C31.984 17.2955 31.984 17.6011 31.7823 17.7892L24.9882 24.1363C24.7865 24.3243 24.4588 24.3243 24.2571 24.1363L17.463 17.7892V17.7892Z" fill="white"/>
          </g>
          <defs>
          <filter id="filter0_d" x="0" y="0" width="49.2437" height="49.2437" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"/>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
          <feOffset dy="4"/>
          <feGaussianBlur stdDeviation="5"/>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
          </filter>
          </defs>
          </svg>
        </a>
        `,

      });

      $('.productContent .imageSlider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.productContent .currentImage',
        vertical: true,
        focusOnSelect: true,
        // centerMode: true,
        nextArrow: `
        <a class="slick-next">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
          <g opacity="0.5">
          <g filter="url(#filter0_d)">
          <circle r="14.6218" transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 24.6223 20.6219)" fill="#333333"/>
          </g>
          <path d="M17.463 17.7892C17.3622 17.6951 17.3117 17.5776 17.3117 17.4483C17.3117 17.319 17.3622 17.2015 17.463 17.1074C17.6647 16.9194 17.9924 16.9194 18.1941 17.1074L24.6227 23.1019L31.0512 17.1074C31.2529 16.9194 31.5807 16.9194 31.7823 17.1074C31.984 17.2955 31.984 17.6011 31.7823 17.7892L24.9882 24.1363C24.7865 24.3243 24.4588 24.3243 24.2571 24.1363L17.463 17.7892V17.7892Z" fill="white"/>
          </g>
          <defs>
          <filter id="filter0_d" x="0" y="0" width="49.2437" height="49.2437" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"/>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
          <feOffset dy="4"/>
          <feGaussianBlur stdDeviation="5"/>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
          </filter>
          </defs>
          </svg>
        </a>
        `,
        prevArrow: `
        <a class="slick-prev">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
          <g opacity="0.5">
          <g filter="url(#filter0_d)">
          <circle r="14.6218" transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 24.6223 20.6219)" fill="#333333"/>
          </g>
          <path d="M17.463 17.7892C17.3622 17.6951 17.3117 17.5776 17.3117 17.4483C17.3117 17.319 17.3622 17.2015 17.463 17.1074C17.6647 16.9194 17.9924 16.9194 18.1941 17.1074L24.6227 23.1019L31.0512 17.1074C31.2529 16.9194 31.5807 16.9194 31.7823 17.1074C31.984 17.2955 31.984 17.6011 31.7823 17.7892L24.9882 24.1363C24.7865 24.3243 24.4588 24.3243 24.2571 24.1363L17.463 17.7892V17.7892Z" fill="white"/>
          </g>
          <defs>
          <filter id="filter0_d" x="0" y="0" width="49.2437" height="49.2437" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"/>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
          <feOffset dy="4"/>
          <feGaussianBlur stdDeviation="5"/>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
          </filter>
          </defs>
          </svg>
        </a>
        `,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            vertical: false,
            rtl: true,
          }
        },

        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
      });
    } else {
      $('.woocommerce div.product .galleryPart .imageSliderWrapper').css('display', 'none');
    }
    $('.productContent .currentImage').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      rtl: true,
      fade: true,
      arrows: false,
    });
    $('.woocommerce div.product .productInfoPart .buyAndWishlist .addToCart').click(function (e) {
      e.preventDefault();
      $('.woocommerce div.product form.cart .button').trigger('click');
    });
  }

  // mobile slider product list
  $('.featuredProductsMobileContainer .productsList ').slick({
    rtl: true,
    slidesToShow: 2,
    slidesToScroll: 2,
    rows: 2,
    nextArrow: `
    <a class="slick-next">
      <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1.72625 22.5C2.05478 22.5 2.36098 22.374 2.59732 22.1324L12.1448 12.3747C12.6184 11.8907 12.6184 11.1093 12.1448 10.6253L2.59732 0.867559C2.1178 0.37748 1.3347 0.37748 0.855178 0.867559C0.381607 1.35156 0.381607 2.13292 0.855178 2.61692L9.54685 11.5L0.855178 20.3831C0.381607 20.8671 0.381607 21.6484 0.855178 22.1324C1.09151 22.374 1.39772 22.5 1.72625 22.5Z" fill="#DFA29D" stroke="#DFA29D"/>
    </svg>

    </a>
    `,
    prevArrow: `
    <a class="slick-prev">
      <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M12.1448 22.1324L11.7892 21.7844L12.1448 22.1324C11.9085 22.374 11.6023 22.5 11.2738 22.5C10.9452 22.5 10.639 22.374 10.4027 22.1324L10.7601 21.7828L10.4027 22.1324L0.855177 12.3747C0.381607 11.8907 0.381607 11.1093 0.855177 10.6253L10.4027 0.867559C10.8822 0.37748 11.6653 0.37748 12.1448 0.867559C12.6184 1.35156 12.6184 2.13292 12.1448 2.61692L3.45315 11.5L12.1448 20.3831C12.6184 20.8671 12.6184 21.6484 12.1448 22.1324Z" fill="#DFA29D" stroke="#DFA29D"/>
    </svg>

    </a>
    `,

  });

  // featured products section (product single page)
  if ($('.featuredProductsSection').length > 0) {
    let containerWidth = 0;
    let padding = 100;
    jQuery('.featuredProductsSection .featuredProductsContainer ul li').each(function (i, el) {
      containerWidth += $(el).innerWidth();
      containerWidth += padding;
    });
    $('.featuredProductsSection .featuredProductsContainer').css('width', containerWidth);
    $('.featuredProductsSection .featuredProductsContainer a.woocommerce-LoopProduct-link').click(function (e) { e.preventDefault(); });
    $('.featuredProductsSection .featuredProductsContainer a.woocommerce-LoopProduct-link h2').click(function (e) {
      location.href = $(this).parent().attr('href');
    });
    $('.featuredProductsSection .featuredProductsWrapper').css('padding-right', $('.container').offset().left);
  }


  // header popups
  $('.site-header .mainHeader .userInfoBlock .register').click(function (e) {
    e.preventDefault();
    $('#registerPopup').fadeIn();
  });
  $('.site-header .mainHeader .userInfoBlock .login').click(function (e) {
    e.preventDefault();
    $('#loginPopup').fadeIn();
  });
  $('.overlay').click(function (e) {
    if (e.target != this) return;
    $('#registerPopup').fadeOut();
    $('#loginPopup').fadeOut();
  });

  // header cart counter
  $( document.body ).on( 'added_to_cart', function(){
    let data = {
      action: 'get_cart_count'
    };
    jQuery.post( myajax, data, function(response) {
			$('.site-header .mainHeader .userInfoBlock .userSection .cart .cartCount').text(response);
		});

  });

  // header animations
  let activeListOffset = '100%';
  let activeListWidth = 0;
  if ($('.site-header .main-navigation ul .current_page_item a').length > 0) {
    activeListOffset  = $('.site-header .main-navigation ul .current_page_item a').position().left;
    activeListWidth   = $('.site-header .main-navigation ul .current_page_item a').outerWidth();
  }
  $('.mainNavigationContainer .activeLine').animate({
    left: activeListOffset,
    width: activeListWidth,
  }, 100);
  $('.site-header .main-navigation ul li').hover(function hover(e) {
      let activeListOffsetNow  = $(this).position().left;
      let activeListWidthNow   = $(this).outerWidth();
      $('.mainNavigationContainer .activeLine').stop().animate({
        left: activeListOffsetNow,
        width: activeListWidthNow,
      }, 500);
    }
  );
  $('.site-header .main-navigation ul .sub-menu li').hover(function hover(e) {
      let activeListOffsetNow  = $(this).parent().parent().position().left;
      let activeListWidthNow   = $(this).parent().parent().outerWidth();
      $('.mainNavigationContainer .activeLine').stop().animate({
        left: activeListOffsetNow,
        width: activeListWidthNow,
      }, 500);
    }
  );
  $('.site-header .main-navigation ul').hover(null, function out(e) {
    $('.mainNavigationContainer .activeLine').stop().animate({
      left: activeListOffset,
      width: activeListWidth,
    }, 500);
  });
  // header animations end

  // header ajax search
  initSearch();
  function initSearch() {
    let timer, request;
    var data = {
			action: 'searchAjaxHeader',
			string: ''
		};

    $('.site-header .mainHeader .siteSearch form').on('input', function (e) {

      clearTimeout(timer);
        data.string = $('.site-header .mainHeader .siteSearch form input[type="text"]').val();

        if (data.string.length > 3) {
          timer = setTimeout(function () {
            $.get( myajax, data, function(response) {
              if (response != '') {
                $('.site-header .mainHeader .siteSearch form .searchResult').html($(response)).fadeIn();
                $('.site-header .mainHeader .siteSearch form .searchResult').find('a').each(function (i, el) {
                  if ($(el).text().length > 20) {
                    let text = $(el).text();
                    text = text.substring(0 , 20);
                    $(el).text(text + '...');
                  }
                });
              } else {
                $('.site-header .mainHeader .siteSearch form .searchResult').fadeOut();
              }
        		})
            .fail(function (e) {
              console.log('some error', e);
            });
          }, 500);
        } else {
          $('.site-header .mainHeader .siteSearch form .searchResult').fadeOut();
        }

    });
  }

  let queryString = $('.site-header .mainHeader .siteSearch form input[type="text"]').val();
  if (queryString.length>0) {
    markSearchQuery(queryString);
  }
  function markSearchQuery(text) {
    let keyWords = text.split(' ');
    console.log('keyWords', keyWords);
    keyWords.forEach(function (el) {
      $(".woocommerce ul.products, .woocommerce-page ul.products").mark(el);
    });
  }


  // user register n header ajax
  $('#usreReg').submit(function (e) {
    e.preventDefault();
    let newUserName = jQuery('#registerPopup.overlay .popupcontent input[name="Username"]').val();
    let newUserEmail = jQuery('#registerPopup.overlay .popupcontent input[name="user_email"]').val();
    let newUserPassword = jQuery('#registerPopup.overlay .popupcontent input[name="user_password"]').val();
    let newUserConfirmPassword = jQuery('#registerPopup.overlay .popupcontent input[name="user_password_conf"]').val();
    let newUserPhone = jQuery('#registerPopup.overlay .popupcontent input[name="user_tel"]').val();
    let validate = true;

    if (newUserName == '' || newUserEmail == '' || newUserPassword == '' || newUserPhone == '' || newUserConfirmPassword != newUserPassword) {
      validate = false;
    }
    if (validate) {
      jQuery.ajax({
        type:"POST",
        url: myajax.url,
        data: {
          action: "register_user_front_end",
          new_user_name : newUserName,
          new_user_email : newUserEmail,
          new_user_password : newUserPassword,
          // new_user_phone: newUserPhone,
        },
        success: function(results){
          console.log(results);
          let res = JSON.parse(results);
          $('.overlay .popupcontent .messagesBlock').empty().text(res.message).show();
          if (res.redirect) {
            setTimeout(function () {
              location.href = res.redirect;
            }, 1000);
          }
        },
        error: function(results) {
        }
      });
    } else {
      $('.overlay .popupcontent .messagesBlock').empty().text('Some error').show();
    }

  });


  // user login n header ajax
  $('#usreLogin').submit(function (e) {
    e.preventDefault();
    let userName = jQuery('#loginPopup.overlay .popupcontent input[name="Username"]').val();
    let userPassword = jQuery('#loginPopup.overlay .popupcontent input[name="user_password"]').val();
    let validate = true;

    if (userName == '' || userPassword == '') {
      validate = false;
    }
    if (validate) {
      jQuery.ajax({
        type:"POST",
        url: myajax.url,
        data: {
          action: "login_user_front_end",
          user_name : userName,
          user_password : userPassword,
          user_remember: true,
        },
        success: function(results){
          console.log(results);
          // let res = JSON.parse(results);
          let res = results;
          $('.overlay .popupcontent .messagesBlock').empty().html(res).show();
          if (res = 'success') {
            location.href = location.origin + '/my-account';
          }
        },
        error: function(results) {
        }
      });
    } else {
      $('.overlay .popupcontent .messagesBlock').empty().text('Some error').show();
    }

  });

});
