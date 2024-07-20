import DOMPurify from 'dompurify';

// increment decrement counter
const decrementButton = document.getElementById('decrement');
const incrementButton = document.getElementById('increment');
const quantityInput = document.getElementById('quantity');

decrementButton.addEventListener('click', function () {
    let currentValue = parseInt(quantityInput.value);
    if(currentValue <= 0) return;
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

incrementButton.addEventListener('click', function () {
    let currentValue = parseInt(quantityInput.value);
    const maxValue = parseInt(quantityInput.getAttribute('max'))
    if(currentValue >= maxValue) {
        return;
    };
    quantityInput.value = currentValue + 1;
});

const mainImage = document.getElementById('zoomImage');
const previewImagesFront = document.getElementById('preview-image-front');
const previewImagesBack = document.getElementById('preview-image-back');

previewImagesFront.addEventListener('click', function () {
    mainImage.src = previewImagesFront.src;
}
);

previewImagesBack.addEventListener('click', function () {
    mainImage.src = previewImagesBack.src;
}   
);



document.addEventListener("DOMContentLoaded", function() {
    const sizeSelect = document.getElementById('size');
    const quantityInput = document.getElementById('quantity');
    const getInfoStock = document.getElementById('stock-info')
    
    // Event listener untuk setiap kali ukuran dipilih
    sizeSelect.addEventListener('change', function() {
        const selectedSize = sizeSelect.value;
        let maxStock = sizeSelect.options[sizeSelect.selectedIndex].getAttribute('product-stock');
        
        maxStock = DOMPurify.sanitize(maxStock);
        // Perbarui atribut max dari input jumlah sesuai dengan jumlah stok yang tersedia
        quantityInput.setAttribute('max', maxStock);
        getInfoStock.innerHTML = maxStock;
        quantityInput.value = 0;    // Reset jumlah yang dipilih
        // Jika jumlah yang dipilih melebihi jumlah stok yang tersedia, sesuaikan jumlahnya
        if (parseInt(quantityInput.value) > parseInt(maxStock)) {
            quantityInput.value = maxStock;
        }
    });
});
