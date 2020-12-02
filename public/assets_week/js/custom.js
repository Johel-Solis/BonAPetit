$(document).ready(function(){

	"use strict";

    

        /*==================================

* Author        : "ThemeSine"

* Template Name : Travel HTML Template

* Version       : 1.0

==================================== */


        /*=========== TABLE OF CONTENTS ===========

1. Scroll To Top
2. Range js
3. Countdown timer
4. owl carousel
5. datepicker
6. Smooth Scroll spy
7. Animation support
======================================*/
    

    // 1. Scroll To Top 
    // 2. range js
        
        
        
        // Quantity Buttons Shop
    
       

    // 3.Countdown timer 
        
    
    // 4. owl carousel
    
        // i. #testimonial-carousel
    
        
        

    // 5. datepicker
          

    // 6. Smooth Scroll spy
        
        $('.header-area').sticky({
           topSpacing:0
        });
        
        //=============

       
        
        $('body').scrollspy({
            target:'.navbar-collapse',
            offset:0
        });

    // 7.animation support

        $(window).load(function(){

            $(".about-us-txt h2").removeClass("animated fadeInUp").css({'opacity':'0'});
            $(".about-us-txt button").removeClass("animated fadeInDown").css({'opacity':'0'});
        });

        $(window).load(function(){

            $(".about-us-txt h2").addClass("animated fadeInUp").css({'opacity':'0'});
            $(".about-us-txt button").addClass("animated fadeInDown").css({'opacity':'0'});

        });
        

});	

	