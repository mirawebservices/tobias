/**
 * File mobile-menu.js.
 *
 * Toggle chevron in mobile list group on click
 * 
 */

document.querySelectorAll('.list-group-dropdown-icon').forEach(item => {
    item.addEventListener('click', event => {
      item.querySelectorAll('i').forEach(icon => {
          icon.classList.toggle('fa-chevron-right');
          icon.classList.toggle('fa-chevron-down');
      });
    });
});