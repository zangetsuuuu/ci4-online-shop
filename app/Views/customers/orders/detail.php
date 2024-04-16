<?= $this->extend('layout/customers/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-16 md:mt-14">
            <div class="flex items-center space-x-2 md:space-x-3">
                <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58579 4.58579C5 5.17157 5 6.11438 5 8V17C5 18.8856 5 19.8284 5.58579 20.4142C6.17157 21 7.11438 21 9 21H15C16.8856 21 17.8284 21 18.4142 20.4142C19 19.8284 19 18.8856 19 17V8C19 6.11438 19 5.17157 18.4142 4.58579C17.8284 4 16.8856 4 15 4H9C7.11438 4 6.17157 4 5.58579 4.58579ZM9 8C8.44772 8 8 8.44772 8 9C8 9.55228 8.44772 10 9 10H15C15.5523 10 16 9.55228 16 9C16 8.44772 15.5523 8 15 8H9ZM9 12C8.44772 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14H15C15.5523 14 16 13.5523 16 13C16 12.4477 15.5523 12 15 12H9ZM9 16C8.44772 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H9Z" fill="currentColor" />
                </svg>
                <h1 class="text-lg md:text-xl font-semibold tracking-wide">Detail Pesanan</h1>
            </div>
        </div>

        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-3 md:mt-4">
            <!-- Order start -->
            <div class="flex items-center justify-between mb-6">
                <div class="space-y-1">
                    <h1 class="text-2xl md:text-3xl font-semibold tracking-wide">Pesanan #111</h1>
                    <p class="text-xs text-gray-500 tracking-wide">08 April 2024 pukul 14.02 WIB</p>
                </div>
                <span class="px-2 md:px-3 inline-flex text-xs md:text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Selesai
                </span>
            </div>
            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                <h2 class="text-base md:text-lg font-semibold tracking-wide mb-3">Ringkasan Pesanan</h2>
                <div class="space-y-2 mb-2">
                    <?php for ($i = 1; $i < 5; $i++) : ?>
                        <div class="flex justify-between items-center">
                            <p class="w-2/4 text-xs md:text-sm text-gray-500 text-left tracking-wide">Indomie Goreng &times;<?= $i ?></p>
                            <p class="w-1/4 text-xs md:text-sm text-gray-500 text-end tracking-wide">Rp. 4.000</p>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="flex justify-between items-center border-t pt-2">
                    <p class="text-base md:text-lg font-semibold tracking-wide">Total</p>
                    <p class="text-base md:text-lg font-semibold tracking-wide">Rp. 16.000</p>
                </div>
            </div>
            <!-- Order end -->
            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                <h2 class="text-base md:text-lg font-semibold tracking-wide mb-3">Metode Pembayaran</h2>
                <p class="text-xs md:text-sm text-gray-500 font-semibold tracking-wide">DANA</p>
            </div>
            <div class="flex flex-wrap md:flex-nowrap items-center justify-center space-x-0 space-y-3 md:space-y-0 md:space-x-3">
                <button type="submit" class="btn-primary w-full md:w-3/4">Tandai Pesanan Selesai</button>
                <a href="https://wa.me/6282110967112" class="btn-alternative w-full md:w-1/4">Kontak Admin</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>