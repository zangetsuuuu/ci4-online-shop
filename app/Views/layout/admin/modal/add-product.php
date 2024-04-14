<!-- Add product modal -->
<div id="add-product-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg md:text-xl font-semibold text-myBlack tracking-wide">Tambah Produk</h3>
                <button type="button" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-myBlack rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ease-in-out duration-200" data-modal-hide="add-product-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="" method="POST">
                <div class="space-y-5 p-4 md:p-5 max-h-[28rem] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-8 md:gap-5">
                        <!-- Product Image -->
                        <div class="rounded-md w-40 h-40 overflow-hidden border mx-auto relative">
                            <img id="frame" src="<?= base_url('img/gradient.jpg'); ?>" class="object-cover w-full h-full" alt="">
                            <div class="flex items-center justify-center absolute inset-0 bg-myBlack/20">
                                <label data-tooltip-target="add-product-image-tooltip" for="fileInput" class="text-white hover:text-gray-300 p-3 rounded-full cursor-pointer ease-in-out duration-300">
                                    <svg class="w-7 h-7" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0" fill="none" width="24" height="24" />
                                        <g>
                                            <path d="M23 4v2h-3v3h-2V6h-3V4h3V1h2v3h3zm-8.5 7c.828 0 1.5-.672 1.5-1.5S15.328 8 14.5 8 13 8.672 13 9.5s.672 1.5 1.5 1.5zm3.5 3.234l-.513-.57c-.794-.885-2.18-.885-2.976 0l-.655.73L9 9l-3 3.333V6h7V4H6c-1.105 0-2 .895-2 2v12c0 1.105.895 2 2 2h12c1.105 0 2-.895 2-2v-7h-2v3.234z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </label>
                                <input type="file" name="product_image" id="fileInput" class="hidden" accept="image/*" onchange="previewImage()">
                            </div>
                            <div id="add-product-image-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs tracking-wide font-medium text-white transition-opacity duration-300 bg-myBlack rounded-lg shadow-sm opacity-0 tooltip group">
                                Gambar produk
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="col-span-2 space-y-6">
                            <div>
                                <label for="product_name" class="text-sm font-medium text-myBlack tracking-wide">Nama Produk <span class="text-red-500">*</span></label>
                                <input type="text" name="product_name" id="product_name" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="Tambahkan nama produk" required />
                            </div>
                            <div>
                                <label for="product_category" class="text-sm font-medium text-myBlack tracking-wide">Kategori <span class="text-red-500">*</span></label>
                                <select name="product_category" id="product_category" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base" required>
                                    <option value="" disabled selected>Pilih kategori</option>
                                    <option value="food">Makanan</option>
                                    <option value="beverage">Minuman</option>
                                </select>
                            </div>
                            <div>
                                <label for="product_stock" class="text-sm font-medium text-myBlack tracking-wide">Stok <span class="text-red-500">*</span></label>
                                <input type="number" min="1" name="product_stock" id="product_stock" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="Tambahkan stok" required />
                            </div>
                            <div>
                                <label for="product_price" class="text-sm font-medium text-myBlack tracking-wide">Harga <span class="text-red-500">*</span></label>
                                <input type="number" min="500" name="product_price" id="product_price" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="Rp." required />
                            </div>
                            <div>
                                <label for="product_description" class="text-sm font-medium text-myBlack tracking-wide">Deskripsi <span class="text-red-500">*</span></label>
                                <textarea name="product_description" id="product_description" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base resize-none" placeholder="Tambahkan deskripsi" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end space-x-3 p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button type="button" data-modal-hide="add-product-modal" class="btn-alternative">Batal</button>
                    <button type="submit" name="add_product" class="btn-admin">Tambah Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>