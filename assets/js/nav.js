// Script to manage the mobile menu


window.onload = function() {
	var navToggle = document.querySelector(".main-nav .menu-button");
	var nav = document.querySelector( ".main-nav nav ul");
	var button = document.querySelector(".main-nav .menu-button a");

	//console.log(navToggle);

	if ( navToggle ) {
		navToggle.addEventListener( "click", function(e) {
			if (nav.className == "open" ) {
				button.className = "";
				nav.className = "";
			} else {
				button.className = "open";
				nav.className = "open";
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

	console.log(gallery_array);

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


    //***** method 2:

	/*

    var figures_array = $('figure').nextAll('figure');

    console.log(figures_array);

    $.each(figures_array, function(i, e) {
    	console.log(e);
    })

    */


};


//var index_el = $("#index_menu");

//console.log(".offset().top : " + index_el.offset().top);

console.log($(window).scrollTop());

document.addEventListener('scroll', function(e) {

	/*
	if( $(window).scrollTop() > index_el.offset().top ) {
		index_el.addClass("index-fixed");
	} else {
		index_el.removeClass("index-fixed");
	}
	*/

	console.log("ciao");

}, true);


