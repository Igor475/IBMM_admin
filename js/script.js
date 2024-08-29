// BARRA LATERAL
const allDropdown = document.querySelectorAll('#offcanvasWithBothOptions .side-dropdown');
const sidebar = document.getElementById('offcanvasWithBothOptions');

allDropdown.forEach(item => {
    const a = item.parentElement.querySelector('a:first-child');
    a.addEventListener('click', function(e) {
        e.preventDefault();

       if(!this.classList.contains('active')) {
            allDropdown.forEach(i=> {
                const aLink = i.parentElement.querySelector('a:first-child');

                aLink.classList.remove('active');
                i.classList.remove('show');
            })
        }


        this.classList.toggle('active');
        item.classList.toggle('show');
    })
})


sidebar.addEventListener('mouseleave', function() {
    if(this.classList.contains('hide')) {
        allDropdown.forEach(item => {
            const a = item.parentElement.querySelector('a:first-child');
            a.classList.remove('active');
            item.classList.remove('show');
        })
        allSideDivider.forEach(item=> {
            item.textContent ='-'
        })
    }
})



sidebar.addEventListener('mouseenter', function() {
    if(this.classList.contains('hide')) {
        allDropdown.forEach(item => {
            const a = item.parentElement.querySelector('a:first-child');
            a.classList.remove('active');
            item.classList.remove('show');
        })
        allSideDivider.forEach(item=> {
            item.textContent = item.dataset.text;
        })
    }
})






//SIDEBAR TOGGLE
var sidebarOpen = false;
var sidebars = document.getElementById("sidebar");

function openSidebar() {
    if(!sidebarOpen) {
        sidebars.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSidebar() {
    if(sidebarOpen) {
       sidebars.classList.remove("sidebar-responsive");
       sidebarOpen = false;
    }
}





// PROFILE DROPDOWN MENU
let profile = document.querySelector('.header .profile-dropdown-btn');
let profileDropdownList = document.querySelector(".profile-link");
let btn = document.querySelector(".profile-dropdown-btn");

function toggle() {}
btn.addEventListener('click', function() {
    profileDropdownList.classList.toggle('active');
})

window.addEventListener('click', function (e) {
    if(!btn.contains(e.target)) profileDropdownList.classList.remove('active');
})



let prayer = document.querySelector('.header .order_dropdown_btn');
let dropdownPrayer = document.querySelector(".items_order_prayer");
let btnPrayer = document.querySelector(".order_dropdown_btn");

function toggleOracao() {}
btnPrayer.addEventListener('click', function() {
    dropdownPrayer.classList.toggle('active'); 
})

window.addEventListener('click', function (es) {
    if(!btnPrayer.contains(es.target)) dropdownPrayer.classList.remove('active');
})





