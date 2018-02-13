// Script to manage the mobile menu


window.onload = function() {
	var navToggle = document.querySelector(".main-nav .menu-button");
	var nav = document.querySelector( ".main-nav nav #pages-navigation");
	var button = document.querySelector(".main-nav .menu-button a");
	var lang = document.querySelector(".main-nav #languages-navigation");

	//console.log(lang);

	if ( navToggle ) {
		navToggle.addEventListener( "click", function(e) {
			if (nav.className == "open" ) {
				button.className = "";
				nav.className = "";
				lang.className = "";
			} else {
				button.className = "open";
				nav.className = "open";
				lang.className = "open";
			}
			e.preventDefault();
		}, false );
	}

	// sensible art workshop

	var navToggleS = document.querySelector(".senseable-main-nav .senseable-menu-button");
	var linkToggleS = document.querySelectorAll(".senseable-main-nav nav ul .link-button");
	var navS = document.querySelector( ".senseable-main-nav nav ul");
	var buttonS = document.querySelector(".senseable-main-nav .senseable-menu-button a");

	// open/close the menu trough the "menu" button
	if ( navToggleS ) {
		navToggleS.addEventListener( "click", function(e) {
			if (navS.className == "open" ) {
				buttonS.className = "";
				navS.className = "";
			} else {
				buttonS.className = "open";
				navS.className = "open";
			}
			e.preventDefault();
		}, false );
	}

	// close the menu when a link is clicked
	if( linkToggleS ) {
		Array.from(linkToggleS).forEach( function(item, index, array) {
			item.addEventListener( "click", function() {
				buttonS.className = "";
				navS.className = "";
			});
		});
	}


	// resources experience audio players
	// play only one at the time

 	var audios = document.getElementsByTagName('audio');	

 	/*
	document.addEventListener('play', function(e){
	    for(var i = 0, len = audios.length; i < len;i++){
	        if(audios[i] != e.target){
	            audios[i].pause();
	            audios[i].currentTime = 0;
	        }
	    }
	}, true);
	*/


	for(var i = 0, len = audios.length; i < len;i++){

		// volume change and muted (both triggered by 'volumechange')
		audios[i].addEventListener('volumechange', function(e) {

			if(this.muted) {
				for(var i = 0, len = audios.length; i < len;i++) {
			            audios[i].muted = this.muted;
			    }
			}
			else {
				for(var i = 0, len = audios.length; i < len;i++) {
						audios[i].muted = false;
			            audios[i].volume = this.volume;
			    }
			}
		}, true);

		// playback control
		audios[i].addEventListener('play', function(e) {
			for(var i = 0, len = audios.length; i < len;i++){
		        if(audios[i] != e.target){
		            audios[i].pause();
		            audios[i].currentTime = 0;
		        }
		    }
		}, true);

	}

	//--- KIT SINGLE LIGHTBOX GALLERIES ---//
	// 
	var gallery_array = $("figure[class][class*='gallery']");	// select only the galleries

	//console.log(gallery_array);

    $.each(gallery_array, function() {
    	$gallery_name = $(this).attr('class').replace('gallery', '').replace(/ /g, '');
    	$link = $(this).children().attr('src');
    	$alt = $(this).children().attr('alt');

    	$(this).children().wrap("<a href=" + $link + " data-lightbox=" + $gallery_name + " data-title=" + $alt + "></a>");

    })

    //--- KIT INLINE GALLERY MANAGER ---//

    //****  method 1:

    var classNames = [];

    //var figures_array = $('figure').find('.gallery:first, .two-columns:first');

    var figures_array = $('figure').nextAll('figure');

    // select the groups of the same gallery and wrap them all with a div for css layouting
    $.each(figures_array, function() {
    	classNames.push($(this).attr('class').replace('gallery', '').replace('two-columns', '').replace(/ /g, ''));
    })

    classNames = jQuery.uniqueSort(classNames);

    $.each(classNames, function(i, e) {
    	// and operation on items to select based on attributes and elements types
    	$("figure[class][class*='gallery'][class*='" + e + "']").wrapAll("<div class='gallery-group' />");
    })



    //--- KIT LATERAL INDEX FOLLOWING THE SCROLL ---//

    var index = $('#index_menu');
    var top_pos;
    var end_pos;
    var index_height;
    var main_nav = $('.main-nav');
	var main_nav_h = main_nav.height();
	var scroll_top_pos = 0;
	var last_scroll = 0;
	var scrollup_val;
	var old_main_nav_top = -main_nav_h;
	var main_nav_top = -main_nav_h;
	var old_main_nav_top_down = 0;
	var menu_out = true;
	var up, down, start_up, start_down = 0;
	var old_menu_open = false;
	var safe_space_margin_top_index = 300;
    indexPositionCalc();

    var scroll_up_amount = 0;

    function indexPositionCalc() {
	    if(index.length > 0) {
			 index_height = index.height();
			 top_pos = index.offset().top ;
			 end_pos = $('#article_end').offset().top; // - index_height - main_nav_h - 36;
			 //console.log("index_height: " + index_height + " top_pos: " + top_pos + " end_pos: " + end_pos);
		}
	}

	$(window).scroll(function(e) {
		var scroll = $(window).scrollTop();

		//console.log("index_height: " + index_height + " top_pos: " + top_pos + " end_pos: " + end_pos);


		// MAIN MANU SCROLL ANIMATION
		if(scroll > last_scroll) {	// scroll down
			up = 0;
			start_up = scroll;
			down = scroll - start_down;

			if(menu_out) {
				old_menu_open = true;
				main_nav_top = old_main_nav_top_down - down;
				if(main_nav_top < -main_nav_h) {
					menu_out = false;
				 	main_nav_top = -main_nav_h;
				}
				
				old_main_nav_top = main_nav_top;
				$(main_nav).css("top", main_nav_top);
			 	//console.log(main_nav_top);
			}

		} else {			// scroll up
			down = 0;
			start_down = scroll;
			up = start_up - scroll;

			if(!menu_out) {
				if(scroll <= main_nav_h) {
					main_nav_top = -scroll;
					$(main_nav).css("top", main_nav_top);
					//console.log(main_nav_top);
					if(main_nav_top == 0) {
						menu_out = true;
					}
				}
				else if(up > main_nav_h) {
					menu_out = true;
					main_nav_top = up - 2*main_nav_h;
					//console.log(main_nav_top);
					$(main_nav).css("top", main_nav_top);
					old_menu_open = false;
				}
			} else {
				if(!old_menu_open) {
					main_nav_top = up - 2 * main_nav_h;
				} else {
					main_nav_top = old_main_nav_top + up;
				}
				//console.log(main_nav_top);
				if(main_nav_top >= 0 ) main_nav_top = 0;
				old_main_nav_top_down = main_nav_top;				
				$(main_nav).css("top", main_nav_top);
			}

		}

		//console.log("up: " + up + " down: " + down);


		last_scroll = scroll;

		// if the index exhists
		if(index.length > 0) {
			indexScroll(scroll, main_nav_top);
		}
		

		
		
	});

	$(window).resize(function() {
		index.css({ top: 0 });
		index.removeClass();
		indexPositionCalc();
		$(window).scroll();
	})

	$(document).on('click', 'a[href^="#"]', function (event) {
	    event.preventDefault();

	    $('html, body').animate({
	        scrollTop: $($.attr(this, 'href')).offset().top + main_nav_top
	    }, 200);
	});


	// index in kit single
	function indexScroll(scroll, main_nav_top) {
		//console.log("scroll: " + scroll + " top_pos: " + top_pos + " main_nav_top: " + main_nav_top);

		console.log(index.height());

		if(scroll - main_nav_top > top_pos && scroll < (end_pos - index.height() - safe_space_margin_top_index - 36)) {		// 36 is 2rem form the top: 2rem in the scss
			index.removeClass();
			var index_top = main_nav_h + main_nav_top + 36;
			index.css({ 'top': index_top, 'margin-top': 'auto' });
			index.addClass("fix");
		} else if (scroll > (end_pos - index.height() - safe_space_margin_top_index - 36)) {
			index.removeClass();
			index.addClass("absolute");
			index.css({ 'margin-top': end_pos - top_pos - index.height() - safe_space_margin_top_index - 36 });
			// console.log('end_pos: ' + end_pos + ' index-height: ' + index.height());
		} else if (scroll - main_nav_top < top_pos) {

			//console.log("scroll < top_pos: " + (top_pos - main_nav_top));
			index.removeClass();
		}
	}

	// index open on "one" item click

	var index_one_el = $("#index_menu ul li.one");

	//console.log(index_one_el[0]);

	for (var i=0; i<index_one_el.length; i++) {
		var item = $(index_one_el[i]);

		item.click(function(e) {
			$("#index_menu ul li.one").addClass("hide");
			$("#index_menu ul li.one").removeClass("active");
			$(e.currentTarget).addClass("active");
			$(e.currentTarget).removeClass("hide");
		});

		item.mouseover(function(e) {
			$(e.currentTarget).removeClass("hide");
			//console.log("OVER");
			//console.log($(e.currentTarget).parent());
		});

		item.mouseout(function(e) {
			$(e.currentTarget).addClass("hide");
			//console.log("OUT");
			//console.log($(e.currentTarget));
		})
	}
	
};

// once the DOM is loaded (before all the content as images ect) run the code here
$(document).ready(function() {

	// MAIN MARGINT TOP TO ACCOMADATE THE MAIN MENU
    $("main").css("margin-top", $(".main-nav").height()*2);

	// HOMEPAGE KITS "CAROUSELL"
	if($('#homepage-kit').length > 0) {

		var kits_com = $('#homepage-kit > ul > li.comunicazione');
		var kits_op = $('#homepage-kit > ul > li.opere');
		var kits_or = $('#homepage-kit > ul > li.orientamento');
		var kits_all = $('#homepage-kit > ul > li');

		class HomeKit {
			constructor(array) {
				this.array = array;
				this.old_pick = [(Math.floor(Math.random() * array.length)), (Math.floor(Math.random() * array.length))];
				this.interval = Math.floor(Math.random() * 3000 ) + 3000;
				this.mouse_over = false;
				this.init();
				//this.pickRandom();
			}

			hideAll() {
				this.array.each(function() {
					$(this).css({"display" : "none"});
				});
			}

			init() {
				this.hideAll();
				$(this.array[this.old_pick[0]]).fadeIn(500);

			}

			pickRandom() {

				if(!this.mouse_over) {

					// old_pick[0] => new value, old_pick[1] => old value 
					this.old_pick[1] = this.old_pick[0];

					while (this.old_pick[0] == this.old_pick[1]) {
						this.old_pick[0] = Math.floor(Math.random() * this.array.length);
					}
				}
			}
		}
		
		var com, op, or, all, aut_com, aut_op, aut_or, aut_all;

		if(window.innerWidth > 600) {		// when loading the page
			com = new HomeKit(kits_com);
			op = new HomeKit(kits_op);
			or = new HomeKit(kits_or);
			aut_com = setAutomation(com);
			aut_op = setAutomation(op);
			aut_or = setAutomation(or);
		} else {
			all = new HomeKit(kits_all);
			aut_all = setAutomation(all);
		}

		var trigger = false;				// when the page is resized

		$(window).resize(function() {
			if(window.innerWidth > 600 && !trigger) {
				trigger = true;
				clearAutomation(all, aut_all);
				com = new HomeKit(kits_com);
				op = new HomeKit(kits_op);
				or = new HomeKit(kits_or);
				aut_com = setAutomation(com);
				aut_op = setAutomation(op);
				aut_or = setAutomation(or);
			} else if(window.innerWidth <= 600 && trigger) {
				trigger = false;
				clearAutomation(com, aut_com);
				clearAutomation(op, aut_op);
				clearAutomation(or, aut_or);
				all = new HomeKit(kits_all);
				aut_all = setAutomation(all);
			}
		});


		function setAutomation(array) {
			for (var i=0; i < array.array.length; i++) {
				$(array.array[i]).mouseover(function() { array.mouse_over = true; });
				$(array.array[i]).mouseout(function() { array.mouse_over = false; });
			}

			return setInterval(function() { array.pickRandom(); $(array.array[array.old_pick[1]]).fadeOut(500, function() { $(array.array[array.old_pick[0]]).fadeIn(500); });}, array.interval);
		}

		function clearAutomation(array, aut) {
			clearInterval(aut);
			array.hideAll();
			array = null;
		}

	}

	// KIT PAGE SINGLE "READ MORE DESCRIPTION"
	if($('#kit #more-text').length > 0) {

		var desc = $('#kit #kit-description');

		var height_closed;


		height_closed = desc.height();	// get the height closed (defined by the css)


		$('#kit #more-text').click(function() {

			desc.toggleClass("open");

			if(desc.hasClass("open")) {
				desc.css("height", desc.prop('scrollHeight'));
				$('#main-header .linear-gradient').css('background-repeat', 'no-repeat');
			} else {				
				desc.css("height", height_closed);
				$('#main-header .linear-gradient').css('background-repeat', 'repeat-x');
			}

			$('#kit #more-text span').toggleClass("hidden-item");

		});


		$(window).resize(function() {
			if(desc.hasClass("open")) {
				//desc.css("height", desc.prop('scrollHeight'));
				desc.css("height", "auto");
				desc.css("height", desc.prop('scrollHeight'));
			}
		});
	}	

});


//--- HOMPEGAE KIT CAROUSELL ---//

/*

// not used anymore... list of 4 random kit without doubles
function changeKitsHomepage() {

	if($('#homepage-kit')) {
		var kits_list = $('#homepage-kit > ul > li');

		$(kits_list).each(function() {
			$(this).css({"display": "none", "margin-right" : "4.72458%"});
		});

		var hide_array = [];
		var hide_array_length = 4;

		hide_array.length = 0;

		
		while (hide_array.length < hide_array_length) {
			var rand_int = Math.floor(Math.random() * 8);

			if(hide_array.indexOf(rand_int) > -1) continue;
			hide_array[hide_array.length] = rand_int;
		}

		//console.log(hide_array);
		

		for(var i=0; i<hide_array.length; i++) {
			$(kits_list[hide_array[i]]).css("display", "block");
		}

		$(kits_list[Math.max(...hide_array)]).css("margin-right", "0px");
	}
};

*/


