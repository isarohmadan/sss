import DOMPurify from 'dompurify';
function  reFormatRupiah(angka) {
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


document.addEventListener('DOMContentLoaded', function() {
        const shipping_select = document.getElementById('shipping-select');
        let shippingPrice = shipping_select.value;
        totalPaymentPriceCart(shippingPrice)
        shipping_select.addEventListener('change', function() {
        shippingPrice = shipping_select.value;
        totalPaymentPriceCart(shippingPrice);
    });
    function totalPaymentPriceCart(value){
        const totalPayment = document.getElementById('total_payment');
        let totalPrice = document.getElementById('total_product_price').getAttribute('value-product-price');
        totalPrice = DOMPurify.sanitize(totalPrice);
        let totalPaymentPrice = parseInt(totalPrice) + parseInt(value);
        totalPaymentPrice = DOMPurify.sanitize(totalPaymentPrice);
        if(parseInt(totalPrice) == 0){
            totalPaymentPrice = 0;
        }
        
        totalPayment.innerText = reFormatRupiah(totalPaymentPrice);
        totalPayment.setAttribute('value-total-payment', totalPaymentPrice);
    }
});


