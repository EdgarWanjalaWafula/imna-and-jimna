/**
 * @author 	Edgar Wanjala Wafula 
 * @url 	http://giftedcommunitypwd.org.com
 * 
 * Website integration scripts
 */

'use strict'

jQuery(document).ready(function($){

    $("#quotemodal").appendTo("body");
    initHomeSlider(); 
    AOS.init({
      duration: 2500,
    });
    initPreloaderTimeout(); 
    initMobileMenu(); 
    initReadMore(); 
    
    function initHomeSlider(){
        var homeslider = $('.home-slider'); 

        homeslider.owlCarousel({
          loop:false,
          margin:0,
          touchDrag : false,
          mouseDrag : false, 
          nav:false,
          dots:true, 
          autoplay: true,
          autoplayTimeout: 10000,
          smartSpeed: 2500,
          navSpeed: 2500,
          slideBy: 1,
          animateOut: 'slideOutDown',
          animateIn: 'fadeIn',
          responsive:{
            0:{
              items:1
            },
            600:{
              items:3
            },
            1000:{
              items:1
            }
          }
        })
        
        homeslider.on('changed.owl.carousel', function(event) {
            $(".owl-item h3").addClass("animated fadeInDown slow")
            $(".owl-item.active").next().find("h3").addClass('animated fadeInDown slow')
            $(".owl-item.active").next().find("p").addClass('animated fadeInDown slower delay-1s')
        })

        $(".home-services").owlCarousel({
			loop:false,
			margin:15,
            nav:false,
            dots:true, 
            autoplay: false,
            autoplayTimeout: 10000,
            smartSpeed: 2500,
            navSpeed: 2500,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},              
				1000:{
					items:3
				}
			}
        })
    }

    $(".clients-single").owlCarousel({
      loop:false,
      margin:0,
      touchDrag : false,
      mouseDrag : false, 
      nav:false,
      dots:false, 
      autoplay: true,
      autoplayTimeout: 10000,
      smartSpeed: 2500,
      navSpeed: 2500,
      slideBy: 1,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:3
        },
        1000:{
          items:2
        }
      }
    })

    function initPreloaderTimeout(){
        setTimeout(function(){ 
            $(".ij-preloader").fadeOut('slow'); 
        }, 1200);
    }

    function initMobileMenu(){

      $(".mobile-toggle-button .btn").on("click", function(e){
        e.preventDefault(); 

        $(".mobile-menu").toggleClass("open-panel");
        console.log("clicked");
      })
    }

    function initReadMore(){
      $('.readmore-content').readmore({ 
        speed: 1000, 
        moreLink: '<a href="#" class="about-readmore text-uppercase">read more</a>', 
        lessLink: '<a href="#" class="about-readmore text-uppercase">read less</a>', 
        collapsedHeight: 200
      });
    }
}); 

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.querySelector(".ij-homepage");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("ij-sticky")
  } else {
    navbar.classList.remove("ij-sticky");
  }
} 

