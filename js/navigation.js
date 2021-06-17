/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function($) {
	//use window.scrollY
	var scrollpos = window.scrollY;
	var header = document.getElementById("primary-navigation");

	window.addEventListener('scroll', function(){ 
		//Here you forgot to update the value
		scrollpos = window.scrollY;
	
		if(scrollpos > 60){
			add_class_on_scroll();
		}
		else {
			remove_class_on_scroll();
		}
		// console.log(scrollpos);
	});

	function add_class_on_scroll() {
		header.classList.add("bg-light");
		header.classList.add('animate__animated', 'animate__fadeInDown');
		header.style.setProperty('--animate-duration', '0.3s');
	}
	
	function remove_class_on_scroll() {
		header.classList.remove('animate__animated', 'animate__fadeInDown');
		header.classList.remove("bg-light");
	}

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	});

	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
	});
	
	// const siteNavigation = document.getElementById( 'site-navigation' );

	// // Return early if the navigation don't exist.
	// if ( ! siteNavigation ) {
	// 	return;
	// }

	// const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// // Return early if the button don't exist.
	// if ( 'undefined' === typeof button ) {
	// 	return;
	// }

	// const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// // Hide menu toggle button if menu is empty and return early.
	// if ( 'undefined' === typeof menu ) {
	// 	button.style.display = 'none';
	// 	return;
	// }

	// if ( ! menu.classList.contains( 'nav-menu' ) ) {
	// 	menu.classList.add( 'nav-menu' );
	// }

	// // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	// button.addEventListener( 'click', function() {
	// 	siteNavigation.classList.toggle( 'toggled' );

	// 	if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
	// 		button.setAttribute( 'aria-expanded', 'false' );
	// 	} else {
	// 		button.setAttribute( 'aria-expanded', 'true' );
	// 	}
	// } );

	// // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	// document.addEventListener( 'click', function( event ) {
	// 	const isClickInside = siteNavigation.contains( event.target );

	// 	if ( ! isClickInside ) {
	// 		siteNavigation.classList.remove( 'toggled' );
	// 		button.setAttribute( 'aria-expanded', 'false' );
	// 	}
	// } );

	// // Get all the link elements within the menu.
	// const links = menu.getElementsByTagName( 'a' );

	// // Get all the link elements with children within the menu.
	// const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// // Toggle focus each time a menu link is focused or blurred.
	// for ( const link of links ) {
	// 	link.addEventListener( 'focus', toggleFocus, true );
	// 	link.addEventListener( 'blur', toggleFocus, true );
	// }

	// // Toggle focus each time a menu link with children receive a touch event.
	// for ( const link of linksWithChildren ) {
	// 	link.addEventListener( 'touchstart', toggleFocus, false );
	// }

	//
	//
	//



	/**
	 * Sets or removes .focus class on an element.
	 */
	// function toggleFocus() {
	// 	if ( event.type === 'focus' || event.type === 'blur' ) {
	// 		let self = this;
	// 		// Move up through the ancestors of the current link until we hit .nav-menu.
	// 		while ( ! self.classList.contains( 'nav-menu' ) ) {
	// 			// On li elements toggle the class .focus.
	// 			if ( 'li' === self.tagName.toLowerCase() ) {
	// 				self.classList.toggle( 'focus' );
	// 			}
	// 			self = self.parentNode;
	// 		}
	// 	}

	// 	if ( event.type === 'touchstart' ) {
	// 		const menuItem = this.parentNode;
	// 		event.preventDefault();
	// 		for ( const link of menuItem.parentNode.children ) {
	// 			if ( menuItem !== link ) {
	// 				link.classList.remove( 'focus' );
	// 			}
	// 		}
	// 		menuItem.classList.toggle( 'focus' );
	// 	}
	// }

}(jQuery) );
