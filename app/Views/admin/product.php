<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-16 md:mt-14">
            <!-- Product Start -->
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="icon" fill="currentColor" transform="translate(64.000000, 34.346667)">
                                <path d="M192,7.10542736e-15 L384,110.851252 L384,332.553755 L192,443.405007 L1.42108547e-14,332.553755 L1.42108547e-14,110.851252 L192,7.10542736e-15 Z M127.999,206.918 L128,357.189 L170.666667,381.824 L170.666667,231.552 L127.999,206.918 Z M42.6666667,157.653333 L42.6666667,307.920144 L85.333,332.555 L85.333,182.286 L42.6666667,157.653333 Z M275.991,97.759 L150.413,170.595 L192,194.605531 L317.866667,121.936377 L275.991,97.759 Z M192,49.267223 L66.1333333,121.936377 L107.795,145.989 L233.374,73.154 L192,49.267223 Z" id="Combined-Shape">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <h1 class="text-lg md:text-xl font-semibold tracking-wide">Produk</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <button data-modal-target="add-product-modal" data-modal-toggle="add-product-modal" data-tooltip-target="add-product-tooltip" class="text-myBlack hover:text-emerald-500 ease-in-out duration-200">
                        <svg class="w-7 h-7 md:w-8 md:h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6V18M18 12H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button data-modal-target="category-modal" data-modal-toggle="category-modal" class="text-myBlack hover:text-gray-500 ease-in-out duration-200">
                        <svg class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.24 2H5.34C3.15 2 2 3.15 2 5.33V7.23C2 9.41 3.15 10.56 5.33 10.56H7.23C9.41 10.56 10.56 9.41 10.56 7.23V5.33C10.57 3.15 9.42 2 7.24 2Z" fill="currentColor" />
                            <path d="M18.6695 2H16.7695C14.5895 2 13.4395 3.15 13.4395 5.33V7.23C13.4395 9.41 14.5895 10.56 16.7695 10.56H18.6695C20.8495 10.56 21.9995 9.41 21.9995 7.23V5.33C21.9995 3.15 20.8495 2 18.6695 2Z" fill="currentColor" />
                            <path d="M18.6695 13.4297H16.7695C14.5895 13.4297 13.4395 14.5797 13.4395 16.7597V18.6597C13.4395 20.8397 14.5895 21.9897 16.7695 21.9897H18.6695C20.8495 21.9897 21.9995 20.8397 21.9995 18.6597V16.7597C21.9995 14.5797 20.8495 13.4297 18.6695 13.4297Z" fill="currentColor" />
                            <path d="M7.24 13.4297H5.34C3.15 13.4297 2 14.5797 2 16.7597V18.6597C2 20.8497 3.15 21.9997 5.33 21.9997H7.23C9.41 21.9997 10.56 20.8497 10.56 18.6697V16.7697C10.57 14.5797 9.42 13.4297 7.24 13.4297Z" fill="currentColor" />
                        </svg>
                    </button>
                    <button data-modal-target="search-modal" data-modal-toggle="search-modal" class="text-myBlack hover:text-gray-500 ease-in-out duration-200">
                        <svg class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div id="add-product-tooltip" role="tooltip" class="absolute z-50 invisible inline-block px-3 py-2 text-xs tracking-wide font-medium text-white transition-opacity duration-300 bg-myBlack rounded-lg shadow-sm opacity-0 tooltip group">
                    Tambah produk
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        
        <div class="h-full bg-white rounded-lg shadow-md p-4 mt-3 md:mt-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-5">
                <?php for ($i = 1; $i <= 24; $i++) : ?>
                    <a href="<?= base_url("/admin/product/$i"); ?>" class="max-h-[20rem] bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-lg ease-in-out duration-300 group">
                        <form action="" method="">
                            <div class="h-24 md:h-28">
                                <img class="w-full h-full object-contain" src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//93/MTA-2583228/indomie_indomie-goreng-mie-instan--85g--_full02.jpg" alt="">
                            </div>
                            <div class="p-3">
                                <div class="mb-4">
                                    <div class="text-sm md:text-base font-semibold tracking-wide text-myBlack truncate mb-1">Indomie Goreng</div>
                                    <span class="bg-gray-100 text-gray-500 text-[0.65rem] md:text-xs font-medium tracking-wide px-2.5 py-0.5 rounded">Stok: 43</span>
                                </div>
                                <div class="flex items-center justify-between rounded-md">
                                    <h1 class="text-sm md:text-base font-semibold tracking-wide">Rp. 4.500</h1>
                                    <button data-modal-target="edit-product-modal#<?= $i ?>" data-modal-toggle="edit-product-modal#<?= $i ?>" data-tooltip-target="edit-product-tooltip#<?= $i ?>" type="button" class="icon-admin" onclick="event.preventDefault();">
                                        <svg class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div id="edit-product-tooltip#<?= $i; ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs tracking-wide font-medium text-white transition-opacity duration-300 bg-myBlack rounded-lg shadow-sm opacity-0 tooltip group">
                            Edit info produk
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </a>
                <?php endfor; ?>
            </div>
            <!-- Product End -->
        </div>
    </div>
</div>

<?= $this->include('layout/admin/modal/add-product'); ?>

<?= $this->include('layout/admin/modal/edit-product'); ?>

<?= $this->include('layout/admin/modal/category'); ?>

<?= $this->include('layout/admin/modal/search'); ?>

<?= $this->endSection(); ?>