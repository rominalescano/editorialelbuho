  (function($, window, document) {


    // Slider block gutember features
    jQuery('.slider-features').slick({
        dots: true,
        arrows: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        fade: true,
        cssEase: 'linear',
        prevArrow: '<div class="arrow-prev"><i class="fas fa-chevron-left"></i></div>',
        nextArrow: '<div class="arrow-next"><i class="fas fa-chevron-right"></i></div>',
        responsive: [
        {     
          breakpoint: 768,
          settings: {
            dots: false,
                     
          }
        },
        ]
      });
    
   
    // Slider block gutember testimonials

    jQuery('.slider-testimonial').slick({
        dots: true,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        fade: true,
        cssEase: 'linear'
      });


      // Slider block gutember testimonials

    jQuery('.slider-membership').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        infinite: false,
        dots: false,
        adaptiveHeight: false,
        responsive: [
            {
             breakpoint: 768,
             settings: {
               
               centerMode: true,
               arrows: true,
               dots: true,
               slidesToShow: 1
             }
           }
  
           ]
       
      });

  })(jQuery, window, document);

