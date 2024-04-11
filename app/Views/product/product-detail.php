<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg p-4 mt-16 md:mt-14">
            <div class="flex items-center space-x-2 md:space-x-3">
                <svg class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="icon" fill="currentColor" transform="translate(64.000000, 34.346667)">
                            <path d="M192,7.10542736e-15 L384,110.851252 L384,332.553755 L192,443.405007 L1.42108547e-14,332.553755 L1.42108547e-14,110.851252 L192,7.10542736e-15 Z M127.999,206.918 L128,357.189 L170.666667,381.824 L170.666667,231.552 L127.999,206.918 Z M42.6666667,157.653333 L42.6666667,307.920144 L85.333,332.555 L85.333,182.286 L42.6666667,157.653333 Z M275.991,97.759 L150.413,170.595 L192,194.605531 L317.866667,121.936377 L275.991,97.759 Z M192,49.267223 L66.1333333,121.936377 L107.795,145.989 L233.374,73.154 L192,49.267223 Z" id="Combined-Shape">
                            </path>
                        </g>
                    </g>
                </svg>
                <h1 class="text-lg md:text-xl font-semibold tracking-wide">Detail Produk</h1>
            </div>
            <hr class="my-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="w-full h-64 rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover" src="https://via.placeholder.com/300" alt="Product Image">
                </div>
                <div class="relative col-span-1 md:col-span-2 p-3 md:p-4">
                    <div class="space-y-1.5 mb-2.5 md:mb-3.5">
                        <div class="uppercase tracking-wide text-[0.65rem] md:text-xs text-blue-700 font-semibold">Makanan Instan</div>
                        <h2 class="text-myBlack text-lg md:text-xl font-semibold tracking-wide">Indomie Goreng</h2>
                        <div><span class="bg-gray-100 text-gray-500 text-[0.65rem] md:text-xs font-medium tracking-wide px-2.5 py-0.5 rounded">Stok: 43</span></div>
                    </div>
                    <p class="text-sm text-gray-500 tracking-wide leading-relaxed">Product Description Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, a nostrum. Dolorem, repellat quidem ut, minima sint vel eveniet quibusdam voluptates delectus doloremque, explicabo tempore dicta adipisci fugit amet dignissimos?</p>
                    <div class="mt-5">
                        <div class="flex items-center justify-between">
                            <div class="text-myBlack text-xl font-semibold tracking-wide">Rp. 4.000</div>
                            <button name="add_to_cart" class="btn-primary flex items-center space-x-2">
                                <svg class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04047 2.29242C2.6497 2.15503 2.22155 2.36044 2.08416 2.7512C1.94678 3.14197 2.15218 3.57012 2.54295 3.7075L2.80416 3.79934C3.47177 4.03406 3.91052 4.18961 4.23336 4.34802C4.53659 4.4968 4.67026 4.61723 4.75832 4.74609C4.84858 4.87818 4.91828 5.0596 4.95761 5.42295C4.99877 5.80316 4.99979 6.29837 4.99979 7.03832L4.99979 9.64C4.99979 12.5816 5.06302 13.5523 5.92943 14.4662C6.79583 15.38 8.19028 15.38 10.9792 15.38H16.2821C17.8431 15.38 18.6236 15.38 19.1753 14.9304C19.727 14.4808 19.8846 13.7164 20.1997 12.1875L20.6995 9.76275C21.0466 8.02369 21.2202 7.15417 20.7762 6.57708C20.3323 6 18.8155 6 17.1305 6H6.49233C6.48564 5.72967 6.47295 5.48373 6.4489 5.26153C6.39517 4.76515 6.27875 4.31243 5.99677 3.89979C5.71259 3.48393 5.33474 3.21759 4.89411 3.00139C4.48203 2.79919 3.95839 2.61511 3.34187 2.39838L3.04047 2.29242ZM13 8.25C13.4142 8.25 13.75 8.58579 13.75 9V10.25H15C15.4142 10.25 15.75 10.5858 15.75 11C15.75 11.4142 15.4142 11.75 15 11.75H13.75V13C13.75 13.4142 13.4142 13.75 13 13.75C12.5858 13.75 12.25 13.4142 12.25 13V11.75H11C10.5858 11.75 10.25 11.4142 10.25 11C10.25 10.5858 10.5858 10.25 11 10.25H12.25V9C12.25 8.58579 12.5858 8.25 13 8.25Z" fill="currentColor" />
                                    <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" fill="currentColor" />
                                    <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" fill="currentColor" />
                                </svg>
                                <div>Tambah<span class="hidden md:inline"> ke Keranjang</span></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>