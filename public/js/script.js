(function($) {
	
	"use strict";
	
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(200).fadeOut(500);
		}
	}
	
	
	
	//Update Header Style and Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var scrollLink = $('.scroll-to-top');
			
			var HeaderHight = $('.main-header').height();
			if (windowpos >= HeaderHight) {
				siteHeader.addClass('fixed-header');
				scrollLink.fadeIn(300);
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.fadeOut(300);
			}
			
		}
	}
	
	headerStyle();
	
	
	
	//Submenu Dropdown Toggle
	if($('.main-header li.dropdown ul').length){
		$('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa-solid fa-chevron-down fa-fw"></span></div>');
		
		//Dropdown Button
		$('.main-header li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
		
		//Disable dropdown parent link
		$('.navigation li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});
		
		$('.xs-sidebar-group .close-button').on('click', function(e) {
			$('.xs-sidebar-group.info-group').removeClass('isActive');
		});
		
	}
	
	
	// Add Current Class Auto
	function dynamicCurrentMenuClass(selector) {
		let FileName = window.location.href.split("/").reverse()[0];

		selector.find("li").each(function () {
			let anchor = $(this).find("a");
			if ($(anchor).attr("href") == FileName) {
				$(this).addClass("current");
			}
		});
		// if any li has .current elmnt add class
		selector.children("li").each(function () {
			if ($(this).find(".current").length) {
				$(this).addClass("current");
			}
		});
		// if no file name return
		if ("" == FileName) {
			selector.find("li").eq(0).addClass("current");
		}
	}
	
	
	
	
	//Mobile Nav Hide Show


	document.addEventListener('DOMContentLoaded', function() {
    const dropdownBtns = document.querySelectorAll('.mobile-menu .navigation li.dropdown .dropdown-btn');

    dropdownBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const span = this.querySelector('span');
            span.classList.toggle('rotate-180');
        });
    });
});

	if($('.mobile-menu').length){
		
		// $('.mobile-menu .menu-box').mCustomScrollbar();
		
		var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
		$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
		$('.sticky-header .main-menu').append(mobileMenuContent);
		$('.mobile-menu .navigation > .dropdown-1').remove();//  to remove mega menu from the mobile menu class 
		

		
		//Hide / Show Submenu
		$('.mobile-menu .navigation > li.dropdown > .dropdown-btn').on('click', function(e) {
			e.preventDefault();
			var target = $(this).parent('li').children('ul');
			
			if ($(target).is(':visible')){
				$(this).parent('li').removeClass('open');
				$(target).slideUp(500);
				$(this).parents('.navigation').children('li.dropdown').removeClass('open');
				$(this).parents('.navigation').children('li.dropdown > ul').slideUp(500);
				return false;
			}else{
				$(this).parents('.navigation').children('li.dropdown').removeClass('open');
				$(this).parents('.navigation').children('li.dropdown').children('ul').slideUp(500);
				$(this).parent('li').toggleClass('open');
				$(this).parent('li').children('ul').slideToggle(500);
			}
		});

		//3rd Level Nav
		$('.mobile-menu .navigation > li.dropdown > ul  > li.dropdown > .dropdown-btn').on('click', function(e) {
			e.preventDefault();
			var targetInner = $(this).parent('li').children('ul');
			
			if ($(targetInner).is(':visible')){
				$(this).parent('li').removeClass('open');
				$(targetInner).slideUp(500);
				$(this).parents('.navigation > ul').find('li.dropdown').removeClass('open');
				$(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
				return false;
			}else{
				$(this).parents('.navigation > ul').find('li.dropdown').removeClass('open');
				$(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
				$(this).parent('li').toggleClass('open');
				$(this).parent('li').children('ul').slideToggle(500);
			}
		});

		//Menu Toggle Btn
		$('.mobile-nav-toggler').on('click', function() {
			$('body').addClass('mobile-menu-visible');

		});

		//Menu Toggle Btn
		$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
			$('body').removeClass('mobile-menu-visible');
			$('.mobile-menu .navigation > li').removeClass('open');
			$('.mobile-menu .navigation li ul').slideUp(0);
		});

		$(document).keydown(function(e){
	        if(e.keyCode == 27) {
				$('body').removeClass('mobile-menu-visible');
			$('.mobile-menu .navigation > li').removeClass('open');
			$('.mobile-menu .navigation li ul').slideUp(0);
        	}
	    });
		
	}
	
	
	
	
	//Parallax Scene for Icons
	if($('.parallax-scene-1').length){
		var scene = $('.parallax-scene-1').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-2').length){
		var scene = $('.parallax-scene-2').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-3').length){
		var scene = $('.parallax-scene-3').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-4').length){
		var scene = $('.parallax-scene-4').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	
	
	
	if($('.paroller').length){
		$('.paroller').paroller({
			  factor: 0.2,            // multiplier for scrolling speed and offset, +- values for direction control  
			  factorLg: 0.4,          // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control  
			  type: 'foreground',     // background, foreground  
			  direction: 'horizontal' // vertical, horizontal  
		});
	}
	
	
	
	
	//Progress Bar
	if($('.progress-line').length){
		$('.progress-line').appear(function(){
			var el = $(this);
			var percent = el.data('width');
			$(el).css('width',percent+'%');
		},{accY: 0});
	}
	
	//Fact Counter + Text Count
	if($('.count-box').length){
		$('.count-box').appear(function(){
	
			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);
				
			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function() {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function() {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}
			
		},{accY: 0});
	}
	
	
	
	
	//Gallery Filters
	if($('.filter-list').length){
		$('.filter-list').mixItUp({});
	}
	
	
	
	
	// Single Item Carousel
	if ($('.single-item-carousel').length) {
		$('.single-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});
	}
	
	
	// Three Item Carousel
	if ($('.three-item-carousel').length) {
		$('.three-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				800:{
					items:2
				},
				1024:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}
	
	
	
	// Services Carousel
	if ($('.services-carousel').length) {
		$('.services-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:2
				},
				1024:{
					items:3
				},
				1200:{
					items:3
				}
			}
		});
	}
	
	
	// Four Item Carousel
	// if ($('.four-item-carousel').length) {
	// 	$('.four-item-carousel').owlCarousel({
	// 		//animateOut: 'fadeOut',
    // 		//animateIn: 'fadeIn',
	// 		loop:true,
	// 		margin:30,
	// 		nav:true,
	// 		//autoHeight: true,
	// 		smartSpeed: 500,
	// 		autoplay: 6000,
	// 		navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
	// 		responsive:{
	// 			0:{
	// 				items:1
	// 			},
	// 			600:{
	// 				items:2
	// 			},
	// 			800:{
	// 				items:2
	// 			},
	// 			1024:{
	// 				items:3
	// 			},
	// 			1200:{
	// 				items:4
	// 			}
	// 		}
	// 	});
	// }
	
	if ($('.four-item-carousel').length) {
        $('.four-item-carousel').owlCarousel({
            //animateOut: 'fadeOut',
            //animateIn: 'fadeIn',
            loop:true,
            margin:30,
            nav:true,
 
            //autoHeight: true,
            smartSpeed: 500,
            autoplay: 6000,
            navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                800:{
                    items:3
                },
                1024:{
                    items:4
                },
                1200:{
                    items:4
                },
                1400: {
                    items: 4
                },
                1600: {
                    items: 5
                },
                1800: {
                    items: 5
                }
            }
        });
    }
	
	
	// Case Carousel
	// if ($('.case-carousel').length) {
	// 	$('.case-carousel').owlCarousel({
	// 		//animateOut: 'fadeOut',
    // 		//animateIn: 'fadeIn',
	// 		loop:true,
	// 		margin:30,
	// 		nav:true,
	// 		//autoHeight: true,
	// 		smartSpeed: 500,
	// 		autoplay: 6000,
	// 		navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
	// 		responsive:{
	// 			0:{
	// 				items:1
	// 			},
	// 			600:{
	// 				items:2
	// 			},
	// 			800:{
	// 				items:2
	// 			},
	// 			1024:{
	// 				items:2
	// 			},
	// 			1200:{
	// 				items:2
	// 			}
	// 		}
	// 	});
	// }
	
	if ($('.case-carousel').length) {
        $('.case-carousel').owlCarousel({
            //animateOut: 'fadeOut',
            //animateIn: 'fadeIn',
            loop:true,
            margin:30,
           
            nav:true,
            //autoHeight: true,
            smartSpeed: 500,
            autoplay: 6000,
            navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                800:{
                    items:2
                },
                1024:{
                    items:3
                },
                1200:{
                    items:3
                },
                1400: {
                    items: 3
                },
                1600: {
                    items: 4
                },
                1800: {
                    items: 4
                }
 
            }
        });
    }
	
	
	
	// Case Carousel Two
	if ($('.case-carousel-two').length) {
		$('.case-carousel-two').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			//center:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});
	}
	
	
	
	
	// News Carousel
	if ($('.news-carousel').length) {
		$('.news-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			//autoHeight: true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fa-solid fa-angle-left fa-fw"></span>', '<span class="fa-solid fa-angle-right fa-fw"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:2
				},
				1024:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}
	
	
	
	
	// Sponsors Carousel
	if ($('.sponsors-carousel').length) {
		$('.sponsors-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
			responsive:{
				0:{
					items:2
				},
				480:{
					items:3
				},
				600:{
					items:3
				},
				800:{
					items:5
				},
				1024:{
					items:5
				}
			}
		});    		
	}
	
	
	// Sponsors Carousel Two
	if ($('.sponsors-carousel-two').length) {
		$('.sponsors-carousel-two').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
			responsive:{
				0:{
					items:2
				},
				480:{
					items:3
				},
				600:{
					items:3
				},
				800:{
					items:4
				},
				1024:{
					items:4
				}
			}
		});    		
	}
	
	
	
	
	
	// Odometer
	if ($(".odometer").length) {
		$('.odometer').appear();
		$('.odometer').appear(function(){
			var odo = $(".odometer");
			odo.each(function() {
				var countNumber = $(this).attr("data-count");
				$(this).html(countNumber);
			});
			window.odometerOptions = {
				format: 'd',
			};
		});
	}
	
	
	
	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));
			
			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}
	
	
	
	//Header Search
	if($('.search-box-outer').length) {
		$('.search-box-outer').on('click', function() {
			$('body').addClass('search-active');
		});
		$('.close-search').on('click', function() {
			$('body').removeClass('search-active');
		});
	}
	
	
	
	// LightBox Image
	if($('.lightbox-image').length) {
		$('.lightbox-image').magnificPopup({
		  type: 'image',
		  gallery:{
		    enabled:true
		  }
		});
	}
	
	
	
	//LightBox Video
	if($('.lightbox-video').length) {
		$('.lightbox-video').magnificPopup({
	      // disableOn: 700,
	      type: 'iframe',
	      mainClass: 'mfp-fade',
	      removalDelay: 160,
	      preloader: false,
	      iframe:{
	        patterns:{
	          youtube:{
	          index: 'youtube.com',
	          id: 'v=',
	          src: 'https://www.youtube.com/embed/%id%'
	        },
	      },
	      srcAction:'iframe_src',
	    },
	      fixedContentPos: false
	    });
	}
	
	
	$(document).ready(function() {
	//Contact Form Validation
	if($('#contact-form').length){
		$('#contact-form').validate({
			rules: {
				username: {
					required: true
				},
				phone: {
					required: true
				},
				services: {
					required: true
				},
				email: {
					required: true
				},
				message: {
					required: true
				}
			}
		});
	}
});
	
	
	// Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1500);
	
		});
	}
	
	
	
	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}
	


/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).on('scroll', function() {
		headerStyle();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	$(window).on('load', function() {
		handlePreloader();
	});	


})(window.jQuery);

// document.addEventListener('DOMContentLoaded', (event) => {
//     filterJobs();
// });
 
// const jobsPerPage = 5; // Number of jobs to display per page
// let currentPage = 1;   // Current page
 
// function filterJobs() {
//     let titleFilter = document.getElementById('jobTitle').value.toLowerCase();
//     let typeFilter = document.getElementById('jobType').value.toLowerCase();
//     let locationFilter = document.getElementById('location').value.toLowerCase();
//     let searchInput = document.getElementById('searchInput').value.toLowerCase();
 
//     let jobListings = document.querySelectorAll('.job-listing');
//     let totalJobs = 0;
//     let totalPages = 0;
 
//     jobListings.forEach((job) => {
//         let jobTitle = job.getAttribute('data-title').toLowerCase();
//         let jobType = job.getAttribute('data-type').toLowerCase();
//         let jobLocation = job.getAttribute('data-location').toLowerCase();
 
//         let matchesTitle = titleFilter === '' || jobTitle.includes(titleFilter);
//         let matchesType = typeFilter === '' || jobType.includes(typeFilter);
//         let matchesLocation = locationFilter === '' || jobLocation.includes(locationFilter);
//         let matchesSearchInput = searchInput === '' || jobTitle.includes(searchInput) || jobType.includes(searchInput) || jobLocation.includes(searchInput);
 
//         if (matchesTitle && matchesType && matchesLocation && matchesSearchInput) {
//             job.style.display = 'block';
//             totalJobs++;
//         } else {
//             job.style.display = 'none';
//         }
//     });
 
//     document.getElementById('totalJobs').innerText = totalJobs;
   
//     // Use proper conditional assignment for style display
//     if (totalJobs === 0) {
//         document.getElementById('noResultsMessage').style.display = 'block';
//         document.getElementById('noPagination').style.display = 'none'; // Assuming you want to hide pagination when there are no results
//     } else {
//         document.getElementById('noResultsMessage').style.display = 'none';
//         document.getElementById('noPagination').style.display = 'flex';
//     }
 
//     paginateJobs(totalJobs);
// }
 
// function paginateJobs(totalJobs) {
//     let jobListings = Array.from(document.querySelectorAll('.job-listing')).filter(job => job.style.display === 'block');
//     let totalPages = Math.ceil(totalJobs / jobsPerPage);
 
//     jobListings.forEach((job, index) => {
//         job.style.display = (index >= (currentPage - 1) * jobsPerPage && index < currentPage * jobsPerPage) ? 'block' : 'none';
//     });
 
//     document.getElementById('paginationControls').innerHTML = generatePagination(totalPages);
//     document.getElementById('nextButton').disabled = currentPage >= totalPages;
//     document.getElementById('prevButton').disabled = currentPage <= 1;
// }
 
// function generatePagination(totalPages) {
//     let paginationHTML = '';
//     for (let i = 1; i <= totalPages; i++) {
//         paginationHTML += `<button onclick="goToPage(${i})" class="${currentPage === i ? 'active' : ''}">${i}</button>`;
//     }
//     return paginationHTML;
// }
 
// function goToPage(page) {
//     currentPage = page;
//     filterJobs();
// }
 
// function goToNextPage() {
//     let jobListings = document.querySelectorAll('.job-listing').length;
//     let totalPages = Math.ceil(jobListings / jobsPerPage);
//     if (currentPage < totalPages) {
//         currentPage++;
//         console.log('Going to page:', currentPage);
//         filterJobs();
//     }
// }
 
// function goToPreviousPage() {
//     if (currentPage > 1) {
//         currentPage--;
//         filterJobs();
//     }
// }