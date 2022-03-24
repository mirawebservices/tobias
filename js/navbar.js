/**
 * File navbar.js.
 *
 * Modifications to default navbar functionality
 * Additional accessbility support for submenus
 * 
 */

const dropdowns = document.querySelectorAll('.dropdown');
const dropdownIcons = document.querySelectorAll('.dropdown-icon');

(function() {
	'use strict';
	window.addEventListener('load', function() {
		for (const dropdown of dropdowns) {
			var lastMenuItem = dropdown.querySelector('.dropdown-menu').lastElementChild;
			/*
		 	 * Show dropdowns on parent <li> hover
		 	 */
			dropdown.addEventListener('mouseenter', function() {
				dropdown.classList.add('show');
				dropdown.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'true');
				dropdown.querySelector('.dropdown-menu').classList.add('show');
				dropdown.querySelector('.dropdown-icon i').classList.remove('fa-chevron-down');
				dropdown.querySelector('.dropdown-icon i').classList.add('fa-chevron-up');
			});
			/*
		 	 * Hide dropdowns on parent <li> hover off
		 	 */
			dropdown.addEventListener('mouseleave', function() {
				dropdown.classList.remove('show');
				dropdown.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'false');
				dropdown.querySelector('.dropdown-menu').classList.remove('show');
				dropdown.querySelector('.dropdown-icon i').classList.remove('fa-chevron-up');
				dropdown.querySelector('.dropdown-icon i').classList.add('fa-chevron-down');
			});
			/*
		 	 * Hide dropdowns when user tabs through the full menu list
		 	 */
			lastMenuItem.addEventListener('keydown', function(e) {
				if(e.keyCode == 9 && !e.shiftKey) {
					dropdown.classList.remove('show');
					dropdown.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'false');
					dropdown.querySelector('.dropdown-menu').classList.remove('show');
					dropdown.querySelector('.dropdown-icon i').classList.remove('fa-chevron-up');
					dropdown.querySelector('.dropdown-icon i').classList.add('fa-chevron-down');
				}
			});
		}
		for (const dropdownIcon of dropdownIcons) {
			dropdownIcon.addEventListener('keydown', function(e) {
				var parent = dropdownIcon.parentNode;
				/*
				 * Toggle dropdowns when Enter is pressed on dropdown-icon
				 */
				if (e.key == 'Enter') {
					e.preventDefault();
					if (parent.classList.contains('show')) {
						parent.classList.remove('show');
						parent.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'false');
						parent.querySelector('.dropdown-menu').classList.remove('show');
						parent.querySelector('.dropdown-icon i').classList.remove('fa-chevron-up');
						parent.querySelector('.dropdown-icon i').classList.add('fa-chevron-down');
					} else {
						parent.classList.add('show');
						parent.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'true');
						parent.querySelector('.dropdown-menu').classList.add('show');
						parent.querySelector('.dropdown-icon i').classList.remove('fa-chevron-down');
						parent.querySelector('.dropdown-icon i').classList.add('fa-chevron-up');
					}
				}
				/*
				 * Hide dropdowns when shift + tab is pressed on dropdown-icon
				 */
				if(e.shiftKey && e.keyCode == 9) {
					if (parent.classList.contains('show')) {
						parent.classList.remove('show');
						parent.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'false');
						parent.querySelector('.dropdown-menu').classList.remove('show');
						parent.querySelector('.dropdown-icon i').classList.remove('fa-chevron-up');
						parent.querySelector('.dropdown-icon i').classList.add('fa-chevron-down');
					}
				}
			});
		}
	}, false);
})();