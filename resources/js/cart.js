document.addEventListener('DOMContentLoaded', function () {
    // ambil semua elemen dengan class 'remove-from-cart'

    

    // ambil semua elemen dengan class 'add-to-cart' 
    // event untuk menambahkan data ke keranjang
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', async () => {
                    const productId = button.getAttribute('data-product-id');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const sizeMerch = document.getElementById('size').value;
                    const sizeSelectMerch = document.getElementById('size');
                    const quantityMerch = parseInt(document.getElementById('quantity').value);
                    
                    // Mendapatkan opsi yang dipilih dari koleksi options menggunakan indeks
                    const selectedOption = sizeSelectMerch.options[sizeSelectMerch.selectedIndex];
                
                    // Mendapatkan atribut product-stock dari opsi yang dipilih
                    const stockinfo = selectedOption.getAttribute('product-stock');
            
                    // Pastikan productId terambil dengan benar
                    if (!sizeMerch || quantityMerch <= 0) {
                        alert('Add the size and quantity.');
                        return;
                    }

                    // Button disabled and loading
                    button.setAttribute('disabled', 'disabled');
                    button.classList.add('loading');

                    try {
                        // Ambil data yang bernama productId
                        const cart = await getCart(productId);
                        // Check if sizeMerch exists and validate stock
                        if (cart !== undefined) {
                            const currentSizeStock = cart.sizes[sizeMerch] || 0;

                            if ((currentSizeStock + quantityMerch) >= stockinfo) {
                                alert('Stock is not enough!');
                                button.removeAttribute('disabled');
                                button.classList.remove('loading');
                                return;
                            }
                        }

                        // Lakukan fetch request untuk menambah item ke keranjang
                        const response = await fetch('/Cart/Add', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                productId: productId,
                                size: sizeMerch,
                                quantity: quantityMerch
                            })
                        });

                        if (!response.ok) {
                            const errorMessage = await response.text();
                            throw new Error(errorMessage);
                        }

                        const data = await response.json();
                        if (data.message) {
                            window.location.href = '/Cart';
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('An error occurred: ' + error.message);
                    } finally {
                        button.removeAttribute('disabled');
                        button.classList.remove('loading');
                    }
                });
            });


            
        });

async function getCart(id = null) {
    try {
        const response = await fetch('/Cart/Session');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        if (id !== null) {
            // Jika id disediakan, kembalikan item cart dengan id yang sesuai
            const cartItem = data[id];
            return cartItem;
        } else {
            // Jika id tidak disediakan, kembalikan seluruh data cart
            return data;
        }
    } catch (error) {
        console.error('Error fetching cart data:', error);
        throw error; // Re-throw the error if needed for further handling
    }
}



