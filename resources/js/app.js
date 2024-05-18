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


// sidebar menu 
    document.getElementById("sidebar-open-icon").addEventListener("click", function() {
        document.querySelector(".sidebar").classList.add("show");
    });
  
    document.getElementById("sidebar-close-icon").addEventListener("click", function() {
        document.querySelector(".sidebar").classList.remove("show");
    });
    document.addEventListener("click", function(event) {
        var sidebar = document.querySelector(".sidebar");
        if (event.target !== document.querySelector("#sidebar-open-icon") && !sidebar.contains(event.target) && sidebar.classList.contains("show")) {
          sidebar.classList.remove("show");
        }
      });

      
// sidebar dropdown 

    const dropdownEventButton = document.getElementById('dropdown-events-sidebar-id');
    const dropdownEventMenu = document.getElementById('dropdown-events');

    dropdownEventButton.addEventListener('click', function () {
    dropdownEventMenu.classList.toggle('show');
    });

      // Sidebar merch dropdown
    const dropdownMerchButton = document.getElementById('dropdown-merch-sidebar-id');
    const dropdownMerchMenu = document.getElementById('dropdown-merch');
    
    dropdownMerchButton.addEventListener('click', function () {
        dropdownMerchMenu.classList.toggle('show');
    });




// increment decrement counter
const decrementButton = document.getElementById('decrement');
const incrementButton = document.getElementById('increment');
const quantityInput = document.getElementById('quantity');

decrementButton.addEventListener('click', function () {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

incrementButton.addEventListener('click', function () {
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
});



// scroll behavior
const scrollContainer = document.getElementById('scrollContainer');

    scrollContainer.addEventListener('scroll', function(event) {
        // if (event.deltaY != 0) {
        //     event.preventDefault();
        //     scrollContainer.scrollLeft += event.deltaY;
        // }
        console.log(event);
    });