<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg shadow-sm md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 6V18M18 12H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h1 class="text-lg font-semibold tracking-wide md:text-xl">Tambah Produk</h1>
                </div>
                <a href="<?= base_url('admin/products'); ?>" class="flex items-center space-x-2 text-xs tracking-wide text-gray-500 md:text-sm hover:underline">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <div>Kembali</div>
                </a>
            </div>
        </div>
        <div class="h-full p-4 mt-3 bg-white rounded-lg shadow-sm md:mt-4">
            <form action="<?= base_url('admin/product/save'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-y-8 md:gap-8">
                    <!-- Product Image -->
                    <div class="flex flex-col items-center space-y-2">
                        <div class="relative w-full h-48 overflow-hidden border rounded-md md:h-60">
                            <img id="frame" src="<?= base_url('img/products/placeholder.webp'); ?>" class="object-cover w-full h-full" alt="Product Image Placeholder">
                            <div class="absolute inset-0 flex items-center justify-center bg-myBlack/20">
                                <label data-tooltip-target="add-product-image-tooltip" for="fileInput" class="p-3 text-white duration-300 ease-in-out rounded-full cursor-pointer hover:text-gray-300">
                                    <svg class="w-7 h-7" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0" fill="none" width="24" height="24" />
                                        <g>
                                            <path d="M23 4v2h-3v3h-2V6h-3V4h3V1h2v3h3zm-8.5 7c.828 0 1.5-.672 1.5-1.5S15.328 8 14.5 8 13 8.672 13 9.5s.672 1.5 1.5 1.5zm3.5 3.234l-.513-.57c-.794-.885-2.18-.885-2.976 0l-.655.73L9 9l-3 3.333V6h7V4H6c-1.105 0-2 .895-2 2v12c0 1.105.895 2 2 2h12c1.105 0 2-.895 2-2v-7h-2v3.234z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </label>
                                <input type="file" name="image" id="fileInput" class="hidden" accept="image/*" onchange="previewImage()">
                            </div>
                            <div id="add-product-image-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium tracking-wide text-white transition-opacity duration-300 rounded-lg shadow-sm opacity-0 bg-myBlack tooltip group">
                                Gambar produk
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <?php if (isset($validation['image'])) : ?>
                            <p class="input-error-message">
                                <?= $validation['image']; ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Product Info -->
                    <div class="col-span-2 space-y-5">
                        <div>
                            <label for="name" class="text-sm font-medium tracking-wide text-myBlack">Nama Produk <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" class="<?= (isset($validation['name'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['name'])) ? 'autofocus' : '' ?> value="<?= esc(old('name')) ?>" placeholder="Tambahkan nama produk" />
                            <?php if (isset($validation['name'])) : ?>
                                <p class="input-error-message">
                                    <?= $validation['name']; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="category" class="text-sm font-medium tracking-wide text-myBlack">Kategori <span class="text-red-500">*</span></label>
                            <select name="category" id="category" class="<?= (isset($validation['category'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['category'])) ? 'autofocus' : '' ?>>
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="Makanan" <?= old('category') == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                                <option value="Minuman" <?= old('category') == 'Minuman' ? 'selected' : '' ?>>Minuman</option>
                            </select>
                            <?php if (isset($validation['category'])) : ?>
                                <p class="input-error-message">
                                    <?= $validation['category']; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="stock" class="text-sm font-medium tracking-wide text-myBlack">Stok <span class="text-red-500">*</span></label>
                            <input type="number" min="" name="stock" id="stock" class="<?= (isset($validation['stock'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['stock'])) ? 'autofocus' : '' ?> value="<?= esc(old('stock')); ?>" placeholder="Tambahkan stok" />
                            <?php if (isset($validation['stock'])) : ?>
                                <p class="input-error-message">
                                    <?= $validation['stock']; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="price" class="text-sm font-medium tracking-wide text-myBlack">Harga <span class="text-red-500">*</span></label>
                            <input type="number" min="500" name="price" id="price" class="<?= (isset($validation['price'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['price'])) ? 'autofocus' : '' ?> value="<?= esc(old('price')); ?>" placeholder="Rp." />
                            <?php if (isset($validation['price'])) : ?>
                                <p class="input-error-message">
                                    <?= $validation['price']; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="description" class="text-sm font-medium tracking-wide text-myBlack">Deskripsi <span class="text-red-500">*</span></label>
                            <textarea name="description" id="description" class="<?= (isset($validation['description'])) ? 'input-error resize-none' : 'input-admin resize-none' ?>" <?= (isset($validation['description'])) ? 'autofocus' : '' ?> placeholder=" Tambahkan deskripsi"><?= esc(old('description')); ?></textarea>
                            <?php if (isset($validation['description'])) : ?>
                                <p class="input-error-message">
                                    <?= $validation['description']; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="w-full btn-admin">Tambah Produk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>