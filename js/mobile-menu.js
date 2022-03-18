/**
 * File mobile-menu.js.
 *
 * Toggle chevron in mobile list group on click
 * 
 */

(function() {
    'use strict';
	window.addEventListener('load', function() {
		document.querySelectorAll('.list-group-dropdown-icon').forEach(item => {
			item.addEventListener('click', event => {
				item.querySelectorAll('i').forEach(icon => {
					icon.classList.toggle('fa-chevron-right');
					icon.classList.toggle('fa-chevron-down');
				});
			});
		});
	}, false);
})();