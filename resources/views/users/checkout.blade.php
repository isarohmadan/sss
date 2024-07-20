@extends('users.layouts.main', ['navbar_category' => $navbar_category])

@section('content')
<?php $total = [] ?>
    <div class="container mx-auto content">
        <div class="flex shadow-md">
            <div class="w-3/4 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-2">
                    <h1 class="font-semibold text-2xl">Checkout</h1>        
                </div>
                <div class="hover:bg-gray-100 py-5">
                    {{-- DI DALAM SINI ISI FORM CHECKOUT --}}
                    <form action="" method="POST" class="w-full grid grid-cols-4 gap-6">
                        @csrf
                        <div class="col-span-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="mb-4">
                                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                                <input type="text" name="address" id="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4">
                                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City:</label>
                                <input type="text" name="city" id="city" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                        </div>
                        
                        <div class="col-span-4">
                            <div class="mb-4">
                                <label for="zip" class="block text-gray-700 text-sm font-bold mb-2">Zip Code:</label>
                                <input type="text" name="zip" id="zip" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4">
                                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country:</label>
                                <input type="text" name="country" id="country" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                                <input type="text" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4">
                                <label for="payment_method" class="block text-gray-700 text-sm font-bold mb-2">Payment Method:</label>
                                <select name="payment_method" id="payment_method" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">Additional Notes:</label>
                                <textarea name="notes" id="notes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
                        </div>
                        <div class="col-span-4 flex justify-end mt-4">
                            <button type="submit" class="bg-black hover:opacity-80 transition-opacity py-3 text-sm text-white uppercase w-full">Place Order</button>
                        </div>
                    </form>
                </div>
                <!-- Repeat for more items if needed -->
                <a href="{{ route('gallery_merches') }}" class="flex text-indigo-600 text-md mt-10">
                    <i class="fas fa-chevron-left hover:text-indigo-400 transition-colors"><span class="ml-2 text-md hover:text-indigo-400 transition-colors font-normal">Continue Shopping</span></i>
                </a>
            </div>
            <div id="summary" class="w-1/4 px-8 py-10 bg-white">
                <h1 class="font-semibold text-2xl border-b pb-2">Your Order</h1>
                <div class="flex justify-between mt-5 mb-5">
                    
                </div>
                <button class="bg-black hover:opacity-80 transition-opacity py-3 text-sm text-white uppercase w-full">Checkout</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/cart_page.js','resources/js/cart.js'])
@endsection
