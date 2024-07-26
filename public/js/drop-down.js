// // document.addEventListener("DOMContentLoaded", function () {
// //   const sections = document.querySelectorAll(".service-detail h3");
// //   const navLi = document.querySelectorAll(".toc-list li a");
// //   const mobileDrop = document.querySelector(".mobile-drop");
// //   const sidebarContainer = document.querySelector(".sidebar-page-container");

// //   window.addEventListener("scroll", () => {
// //     let current = "";
// //     sections.forEach((section) => {
// //       const sectionTop = section.offsetTop;
// //       const threshold = 40;
// //       if (pageYOffset >= sectionTop - threshold) {
// //         current = section.getAttribute("id");
// //       }
// //     });
// //     navLi.forEach((li) => {
// //       li.classList.remove("active");
// //       const href = li.getAttribute("href");
// //       if (href && href.startsWith('#') && href.slice(1) === current) {
// //         li.classList.add("active");
// //       }
     
// //     });

// //     // Add this to make the dropdown sticky
// //     // const mobileDropTop = mobileDrop.offsetTop;
// //     // const sidebarContainerTop = sidebarContainer.offsetTop;
// //     // if (pageYOffset >= sidebarContainerTop - mobileDropTop) {
// //     //   mobileDrop.classList.add("sticky");
// //     // } else {
// //     //   mobileDrop.classList.remove("sticky");
// //     // }
// //   });

// //   // TOC toggle functionality
// //   const tocToggle = document.getElementById("toc-toggle");
// //   const toc = document.getElementById("toc");
  
// //   let isTocOpen = false; // add a flag to track the state of the dropdown menu
  
// //   tocToggle.addEventListener("click", function() {
// //     const viewportWidth = window.innerWidth;
// //     if (viewportWidth < 786) {
// //       // mobile device
// //       toc.style.display = toc.style.display === "block" ? "none" : "block";
// //     } else {
// //       // desktop device
// //       if (isTocOpen) {
// //         toc.style.display = "none"; // close the dropdown menu
// //         isTocOpen = false;
// //       } else {
// //         toc.style.display = "block"; // open the dropdown menu
// //         isTocOpen = true;
// //       }
// //     }
// //   });
// // });

// // function isInViewport(element) {
// //   const rect = element.getBoundingClientRect();
// //   return (
// //     rect.top >= 0 &&
// //     rect.left >= 0 &&
// //     rect.bottom <=
// //       (window.innerHeight || document.documentElement.clientHeight) &&
// //     rect.right <= (window.innerWidth || document.documentElement.clientWidth)
// //   );
// // }


// ////////////////////////////////////////////////////////////////////////////////////////////////////////
// document.addEventListener("DOMContentLoaded", function () {
//   const sections = document.querySelectorAll(".service-detail h3");
//   const navLi = document.querySelectorAll(".toc-list li a");
//   const mobileDrop = document.querySelector(".mobile-drop");
//   const sidebarContainer = document.querySelector(".sidebar-page-container");

//   // Function to highlight the current section in the TOC
//   function highlightCurrentSection() {
//     let current = "";
//     sections.forEach((section) => {
//       const sectionTop = section.offsetTop;
//       console.log(" sectionTop:",sectionTop)
//       console.log("window.pageYOffset: ",window.pageYOffset)
//       const threshold = 0; // Adjust the threshold to control when sections become active
//       if (window.pageYOffset >= sectionTop - threshold) {
//         current = section.getAttribute("id");
//       }
//     });

//     navLi.forEach((li) => {
//       li.classList.remove("active");
//       const href = li.getAttribute("href");
//       if (href && href.startsWith('#') && href.slice(1) === current) {
//         li.classList.add("active");
//       }
//     });
//   }

//   // Debounce function to limit the rate of function calls
//   function debounce(func, wait) {
//     let timeout;
//     return function (...args) {
//       const later = () => {
//         clearTimeout(timeout);
//         func.apply(this, args);
//       };
//       clearTimeout(timeout);
//       timeout = setTimeout(later, wait);
//     };
//   }

//   // Event listener for scrolling to highlight the current section
//   window.addEventListener("scroll", debounce(highlightCurrentSection,100));

//   // TOC toggle functionality
//   const tocToggle = document.getElementById("toc-toggle");
//   const toc = document.getElementById("toc");
//   let isTocOpen = false; // Flag to track the state of the dropdown menu
  
//   tocToggle.addEventListener("click", function() {
//     const viewportWidth = window.innerWidth;
//     if (viewportWidth < 786) {
//       // Mobile device
//       toc.style.display = toc.style.display === "block" ? "none" : "block";
//     } else {
//       // Desktop device
//       if (isTocOpen) {
//         toc.style.display = "none"; // Close the dropdown menu
//         isTocOpen = false;
//       } else {
//         toc.style.display = "block"; // Open the dropdown menu
//         isTocOpen = true;
//       }
//     }
//   });

//   // Initial highlight on load
//   highlightCurrentSection();
// });

// function isInViewport(element) {
//   if (!element) return false;
//   const rect = element.getBoundingClientRect();
//   return (
//     rect.top >= 0 &&
//     rect.left >= 0 &&
//     rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
//     rect.right <= (window.innerWidth || document.documentElement.clientWidth)
//   );
// }


document.addEventListener("DOMContentLoaded", function () {
  const sections = document.querySelectorAll(".service-detail h3");
  const navLi = document.querySelectorAll(".toc-list li a");
  const mobileDrop = document.querySelector(".mobile-drop");
  const sidebarContainer = document.querySelector(".sidebar-page-container");
 
  let userHasClicked = false; // Flag to track if the user has clicked a TOC link
 
  // Function to highlight the current section in the TOC
  function highlightCurrentSection() {
    if (userHasClicked) return; // If the user has clicked a TOC link, do not update the active state
 
    let current = "";
    sections.forEach((section) => {
      const rect = section.getBoundingClientRect();
      const nextElement = section.nextElementSibling;
      const isInViewport = (el) => {
        const rect = el.getBoundingClientRect();
        return rect.top <= 30 && rect.bottom >= 30;
      };
 
      if (isInViewport(section) || (nextElement && nextElement.tagName === 'P' && isInViewport(nextElement))) {
        current = section.getAttribute("id");
      }
    });
 
    // If no section is in view, default to the first tab
    if (!current && navLi.length > 0) {
      current = navLi[0].getAttribute("href").slice(1);
    }
 
    navLi.forEach((li) => {
      li.classList.remove("active");
      const href = li.getAttribute("href");
      if (href && href.startsWith('#') && href.slice(1) === current) {
        li.classList.add("active");
      }
    });
  }
 
  // Debounce function to limit the rate of function calls
  function debounce(func, wait) {
    let timeout;
    return function (...args) {
      const later = () => {
        clearTimeout(timeout);
        func.apply(this, args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }
 
  // Event listener for scrolling to highlight the current section
  window.addEventListener("scroll", debounce(function() {
    userHasClicked = false; // Reset the flag on scroll
    highlightCurrentSection();
  }, 100));
 
  // Event listener for TOC links click
  navLi.forEach((li) => {
    li.addEventListener("click", function() {
      userHasClicked = true; // Set the flag when a TOC link is clicked
 
      navLi.forEach((link) => link.classList.remove("active")); // Remove active class from all links
      li.classList.add("active"); // Add active class to the clicked link
    });
  });
 
  // TOC toggle functionality
  const tocToggle = document.getElementById("toc-toggle");
  const toc = document.getElementById("toc");
  let isTocOpen = false; // Flag to track the state of the dropdown menu
 
  tocToggle.addEventListener("click", function() {
    const viewportWidth = window.innerWidth;
    if (viewportWidth < 786) {
      // Mobile device
      toc.style.display = toc.style.display === "block" ? "none" : "block";
    } else {
      // Desktop device
      if (isTocOpen) {
        toc.style.display = "none"; // Close the dropdown menu
        isTocOpen = false;
      } else {
        toc.style.display = "block"; // Open the dropdown menu
        isTocOpen = true;
      }
    }
  });
 
  // Initial highlight on load
  highlightCurrentSection();
});
