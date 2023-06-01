/* ---------------------------
# Easy selector helper function
-------------------------------- */
const select = (selectors, all = false,  parent = document) => all ? [...parent.querySelectorAll(selectors)] : parent.querySelector(selectors);

/* ---------------------------
# Easy add event listener function
-------------------------------- */
const on = (selectors, type, listener, all = false, parent = document) => all ? select(selectors, all, parent).forEach( el => el.addEventListener(type, listener)) : select(selectors).addEventListener(type, listener);

/* ---------------------------
# Scroll to helper function
-------------------------------- */
const scrollto = (selectors) => {
  let header = select("#header");
  let offset = header.offsetHeight;

  let elementPos = select(selectors).offsetTop;
  window.scrollTo({
    top: elementPos - offset,
    behavior: "smooth"
  });
}

// Preloader - Using XHR
window.addEventListener("load", function() {
  let xhr = new XMLHttpRequest();
  let preloader_wrapper = select(".preloader-wrapper");

  xhr.addEventListener("load", () => {
    preloader_wrapper.style.display = "none";
  });
  xhr.open('GET', this.window.location.href);
  xhr.send();
});

// Remove hash after URL on clicking <a> elements
on("a", "click", function(event) {
  if(this.hash) {
    event.preventDefault();
    scrollto(this.hash);
  }
}, true);


// Add shadow on header - navbar on scroll
window.addEventListener("scroll", () => {
  let header = select("#header");
  if(window.scrollY > header.clientHeight) {
    header.classList.add("shadow-sm");
  } else {
    header.classList.remove("shadow-sm");
  }
})
// Toggle icon button on click
on("#header .navbar-toggler", "click", function() {
  let icon = select(".fa", false, this);
  icon.classList.toggle("fa-bars");
  icon.classList.toggle("fa-close");
});

// Initiate Swiper for Hero Area
new Swiper("#hero-area .swiper", {
  direction: 'horizontal',
  speed: 600,
  slidesPerView: 1,
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  navigation: {
    nextEl: '.next-btn',
    prevEl: '.prev-btn'
  },
});

// Initiate scroll reveal
new scrollReveal();

// Initiate Swiper for Reviews and Testimonials section
new Swiper("#reviews .swiper", {
  direction: 'horizontal',
  speed: 600,
  slidesPerView: 1,
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true
  },
  slidesPerView: 'auto',
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20
    },
    1200: {
      slidesPerView: 2,
      spaceBetween: 20
    }
  }
})
const iconContainers = document.querySelectorAll('.info');
const infoBoxes = document.querySelectorAll('.info-text');

iconContainers.forEach((iconContainer, index) => {
  iconContainer.addEventListener('mouseover', () => {
    infoBoxes[index].style.opacity = '1';
  });
  
  iconContainer.addEventListener('mouseleave', () => {
    infoBoxes[index].style.opacity = '0';
  });
});
