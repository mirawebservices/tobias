/**
 * File navbar.js.
 *
 * Modifications to default navbar functionality
 * Open dropdowns on hover
 * 
 */

const dropdowns = document.querySelectorAll('.dropdown');

(function() {
	'use strict';
	window.addEventListener('load', function() {
		for (const dropdown of dropdowns) {
			dropdown.addEventListener('mouseenter', function() {
				//alert('here');
				dropdown.classList.add('show');
				dropdown.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'true');
				dropdown.querySelector('.dropdown-menu').classList.add('show');
			});
			dropdown.addEventListener('mouseleave', function() {
				//alert('here2');
				dropdown.classList.remove('show');
				dropdown.querySelector('.dropdown-toggle').setAttribute('aria-expanded', 'false');
				dropdown.querySelector('.dropdown-menu').classList.remove('show');
			});
		}
	}, false);
})();