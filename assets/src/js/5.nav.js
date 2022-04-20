var $dropdown = $(".dropdown");
var $dropdownToggle = $(".dropdown-toggle");
var $dropdownMenu = $(".dropdown-menu");
var showClass = "show";
var nav= $("navbar-collapse");

(function($){
  $(window).on("load resize", function() {
    if (this.matchMedia("(min-width: 768px)").matches) {
      $dropdown.hover(
        function() {
          var $this = $(this);
          $this.addClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "true");
          //$this.find($dropdownMenu).addClass(showClass);
        },
        function() {
          var $this = $(this);
          $this.removeClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "false");
          $this.find($dropdownMenu).removeClass(showClass);
        }
      );
    } else {
  
      $('.dropdown-menu > li > .dropdown-menu').parent().addClass('dropdown-submenu').find(' > .dropdown-item').attr('href', 'javascript:;').addClass('dropdown-toggle');
      $('.dropdown-submenu > a').on("click", function(e) {
        var dropdown = $(this).parent().find(' > .show');
        $('.dropdown-submenu .dropdown-menu').not(dropdown).removeClass('show');
        $(this).next('.dropdown-menu').toggleClass('show');
        e.stopPropagation();
      });
    
      // hide all open menus if the parent closes
      $('.dropdown').on("hidden.bs.dropdown", function() {
        $('.dropdown-menu.show').removeClass('show');
      });
      
   
    }
  });
}, jQuery);