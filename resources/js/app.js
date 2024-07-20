import DOMPurify from 'dompurify';
const dropdown_gallery = document.querySelector('#gallery-event-parent');
const dropdown_vinyl = document.querySelector('#dropdown-vinyls-parent');
const dropdown_menu_vinyl = document.querySelector('#dropdown-menu-vinyls');
const dropdown_menu_gallery = document.querySelector('#dropdown-menu-gallery');
const dropdown_merch = document.querySelector('#dropdown-merch-parent');
const dropdown_menu_merch = document.querySelector('#dropdown-menu-merch');
const youtube = document.querySelector('#youtube'); 


document.addEventListener('DOMContentLoaded', function() {
    const preloader = document.querySelector('.preloader');
    const content = document.querySelector('.content');
    
    setTimeout(function() {
        preloader.style.display = 'none';
        content.style.opacity = 1;
    }, 1000); // 2 detik

    document.querySelectorAll('.delete-from-cart').forEach(buttonDelete => {
        buttonDelete.addEventListener('click', async () => {
            const productId = buttonDelete.getAttribute('data-product-id');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            if (!productId) {
                console.error('Product ID not found');
                return;
            }
    
            // ButtonDelete disabled and loading
            preloader.style.display = 'flex';
            content.style.opacity = 0;
    
            try {
                // Lakukan fetch request untuk menghapus item dari keranjang
                await fetch('/Cart/Delete', {
                    method: 'POST', // Ganti dengan 'DELETE' jika itu yang digunakan oleh API Anda
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        productId: productId
                    })
                });
                return window.location.reload();
                // Menghapus item dari tampilan
                
    
            }finally {
                buttonDelete.removeAttribute('disabled');
                buttonDelete.classList.remove('loading');
            }
        });
    })

document.querySelectorAll('.format-rupiah').forEach(element => {
    // Contoh penggunaan
    const sanitizedElement = DOMPurify.sanitize(element.innerHTML)
    element.innerHTML = formatRupiah(sanitizedElement);
});


});


function  formatRupiah(angka) {
    var numberString = angka.toString(),
        sisa = numberString.length % 3,
        rupiah = numberString.substr(0, sisa),
        ribuan = numberString.substr(sisa).match(/\d{3}/g),
        separator;

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    return ("Rp "+ rupiah);
}


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


// // redirect to youtube method 
// function redirectToYoutube() {
//     window.location.href = "https://www.youtube.com/@SegitigaSamaSisiBali";
// }


// youtube.addEventListener("click", (ev) => {
//     redirectToYoutube();
// });

// youtube.addEventListener('hover',(ev)=>{
//     console.log(ev);
// })


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





// Cart sidebar

const cartButton = document.getElementById('cart-button');
const cartButtonHidden = document.getElementById('cart-button-hidden');
const cartSidebar = document.getElementById('sidebar-cart');
const closeCartSidebar = document.getElementById('sidebar-close-cart');

cartButton.addEventListener('click', function () {
    cartSidebar.classList.toggle('show');
});
cartButtonHidden.addEventListener('click', function () {
    cartSidebar.classList.toggle('show');
});

closeCartSidebar.addEventListener('click', function () {
    cartSidebar.classList.toggle('show');
});


const imageContainer = document.getElementById('merch-container');
    const zoomImage = document.querySelector('.zoomImage');

    imageContainer.addEventListener('mousemove', function (e) {
      const rect = imageContainer.getBoundingClientRect();
      const x = e.clientX - rect.left; // x position within the element
      const y = e.clientY - rect.top;  // y position within the element

      const xPercent = (x / rect.width) * 100;
      const yPercent = (y / rect.height) * 100;

      zoomImage.style.transformOrigin = `${xPercent}% ${yPercent}%`;
      zoomImage.style.transform = 'scale(3.5)';
    });

    imageContainer.addEventListener('mouseleave', function () {
      zoomImage.style.transform = 'scale(1)';
    })
