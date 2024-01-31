
      document.addEventListener('DOMContentLoaded', function() {
          // Get the elements
          const toggleBtn = document.querySelector('.toggle_btn');
          const mobileNav = document.querySelector('.mobile_nav');

          // Add click event listener to the toggle_btn
          toggleBtn.addEventListener('click', function() {
              // Toggle the visibility of the mobile_nav
              mobileNav.style.display = (mobileNav.style.display === 'flex') ? 'none' : 'flex';

              // Change the font awesome icon
              const icon = document.querySelector('.toggle_btn i');
              icon.className = (icon.className === 'fa-solid fa-bars') ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
          });
      });
 