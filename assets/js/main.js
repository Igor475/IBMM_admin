/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
   navToggle = document.getElementById('nav-toggle'),
   navClose = document.getElementById('nav-close')

/* Menu show */
navToggle.addEventListener('click', () => {
   navMenu.classList.add('show-menu')
})

/* Menu hidden */
navClose.addEventListener('click', () => {
   navMenu.classList.remove('show-menu')
})

/*=============== SEARCH ===============*/
const search = document.getElementById('search'),
   searchBtn = document.getElementById('search-btn'),
   searchClose = document.getElementById('search-close')

/* Search show */
searchBtn.addEventListener('click', () => {
   search.classList.add('show-search')
})

/* Search hidden */
searchClose.addEventListener('click', () => {
   search.classList.remove('show-search')
})

/*=============== LOGIN ===============*/
const login = document.getElementById('login'),
   loginBtn = document.getElementById('login-btn'),
   loginClose = document.getElementById('login-close')

/* Login show */
loginBtn.addEventListener('click', () => {
   login.classList.add('show-login')
})

/* Login hidden */
loginClose.addEventListener('click', () => {
   login.classList.remove('show-login')
})

window.addEventListener("scroll", () => {
   const header = document.getElementById("header");
   header.classList.toggle("sticky", scrollY > 0);
});

window.addEventListener("scroll", () => {
   const donation = document.getElementById("donation");
   donation.classList.toggle("sticky_donation", scrollY > 0);
})


// SCRIPTS DOS SLIDERS
let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const indicators = document.querySelectorAll('.indicator');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');
let autoplayInterval;

// Função para exibir o slide
function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active_slider', i === index);
        indicators[i].classList.toggle('active_slider', i === index);
    });
}

// Próximo slide
function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
}

// Slide anterior
function prevSlide() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    showSlide(currentIndex);
}

// Reiniciar autoplay quando o usuário navegar manualmente
function resetAutoplay() {
    clearInterval(autoplayInterval);
    autoplayInterval = setInterval(nextSlide, 5000); // Reinicia o intervalo
}

// Setas de navegação
prev.addEventListener('click', () => {
    prevSlide();
    resetAutoplay(); // Reiniciar o autoplay
});

next.addEventListener('click', () => {
    nextSlide();
    resetAutoplay(); // Reiniciar o autoplay
});

// Indicadores
indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        currentIndex = index;
        showSlide(currentIndex);
        resetAutoplay(); // Reiniciar o autoplay
    });
});

// Iniciar o autoplay
autoplayInterval = setInterval(nextSlide, 5000);




var swiper = new Swiper(".slide__content", {
   slidesPerView: 3,
   spaceBetween: 30,
   centerSlide: 'true',
   fade: 'true',
   grabCursor: 'true',
   loop: true,
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
   },
   navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
   },

   breakpoints: {
      0: {
         slidesPerView: 1,
      },
      520: {
         slidesPerView: 2,
      },
      950: {
         slidesPerView: 3,
      },
   },
});



var swiper = new Swiper(".box__versicle", {
   slidesPerGroup: 1,
   slidesPerView: 3,
   spaceBetween: 25,
   centerSlide: 'true',
   fade: 'true',
   grabCursor: 'true',
   loop: true,
   pagination: {
      el: ".swiper-pagination-versicle",
      clickable: true,
      dynamicBullets: true,
   },

   breakpoints: {
      0: {
         slidesPerView: 1,
      },
   },
});






/* FANCYBOX */
Fancybox.bind('[data-fancybox="gallery"]', {
   //
});


