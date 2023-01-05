$(document).ready(function() {
     $("#slider-hero").owlCarousel({
          nav:true,
          loop:true,
          items:1,
          autoplay:true,
          navText: [
               "<i class='fas fa-angle-left'></i>",
               "<i class='fas fa-angle-right'></i>",
          ],
          navContainer: "#slider-hero-nav",

     });

     $("#tenaga-pendidik-slider").owlCarousel({
          nav:true,
          loop:true,
          items:3,
          dots: true,
          margin: 20,
        
          navText: [
               "<i class='fas fa-angle-left'></i>",
               "<i class='fas fa-angle-right'></i>",
          ],
          navContainer: "#slider-tools-1",
          responsive:{
               0:{
                   items:1,
                   nav:true
               },
               1000:{
                    items:3,
                    nav:true
                },
              
              
           }
          

     });

     $("#alumni-slider").owlCarousel({
          nav:true,
          loop:true,
          items:2,
          dots: false,
          margin: 20,
          navText: [
               "<i class='fas fa-angle-left'></i>",
               "<i class='fas fa-angle-right'></i>",
          ],
          navContainer: "#slider-tools-2",
         
          responsive:{
               0:{
                   items:1,
                   nav:true
               },

               1000:{
                    items:2,
                    nav:true
                },
              
              
           }

     });

     $("#gallery-slider").owlCarousel({
          nav:true,
          loop:true,
          items:3,
          dots: false,
          margin: 20,
          navText: [
               "<i class='fas fa-angle-left'></i>",
               "<i class='fas fa-angle-right'></i>",
          ],
          navContainer: "#slider-tools-3",

     });
});