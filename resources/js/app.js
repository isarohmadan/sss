const dropdown_gallery = document.querySelector('#gallery-event-parent');
const dropdown_vinyl = document.querySelector('#dropdown-vinyls-parent');
const dropdown_menu_vinyl = document.querySelector('#dropdown-menu-vinyls');
const dropdown_menu_gallery = document.querySelector('#dropdown-menu-gallery');
const dropdown_merch = document.querySelector('#dropdown-merch-parent');
const dropdown_menu_merch = document.querySelector('#dropdown-menu-merch');
const youtube = document.querySelector('#youtube'); 

function showDropdown(key, value) {
    switch (key) {
        case 'mouseover':
            value.classList.remove('opacity-0');
            value.classList.remove('scale-95');
            value.classList.remove('bottom-0');
            value.classList.add('opacity-100');
            value.classList.add('bg-white');
            value.classList.add('scale-100');
            break;
        default:
            value.classList.add('opacity-0');
            value.classList.add('scale-95');
            value.classList.remove('opacity-100');
            value.classList.remove('scale-100');
            break;
    }
}


// Add a 'mouseover' event listener to the element
dropdown_gallery.addEventListener("mouseover", (ev) => {
    // Display "hello" when the mouse is over the element
    showDropdown('mouseover', dropdown_menu_gallery);
});

// Add a 'mouseout' event listener to the element
dropdown_gallery.addEventListener("mouseout", (ev) => {
    // Hide "hello" when the mouse is no longer over the element
    showDropdown('mouseout', dropdown_menu_gallery);
});

dropdown_vinyl.addEventListener("mouseover", (ev) => {
    // Display "hello" when the mouse is over the element
    showDropdown('mouseover', dropdown_menu_vinyl);
});

// Add a 'mouseout' event listener to the element
dropdown_vinyl.addEventListener("mouseout", (ev) => {
    // Hide "hello" when the mouse is no longer over the element
    showDropdown('mouseout', dropdown_menu_vinyl);
});

dropdown_merch.addEventListener("mouseover", (ev) => {
    // Display "hello" when the mouse is over the element
    showDropdown('mouseover', dropdown_menu_merch);
});

// Add a 'mouseout' event listener to the element
dropdown_merch.addEventListener("mouseout", (ev) => {
    // Hide "hello" when the mouse is no longer over the element
    showDropdown('mouseout', dropdown_menu_merch);
});


// redirect to youtube method 
function redirectToYoutube() {
    window.location.href = "https://www.youtube.com/@SegitigaSamaSisiBali";
}


youtube.addEventListener("click", (ev) => {
    redirectToYoutube();
});

youtube.addEventListener('hover',(ev)=>{
    console.log(ev);
})



// scroll behaviour

