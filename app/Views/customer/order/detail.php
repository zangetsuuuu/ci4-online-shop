<?= $this->extend('layout/customer/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg shadow-sm md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 md:space-x-3">
                        <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58579 4.58579C5 5.17157 5 6.11438 5 8V17C5 18.8856 5 19.8284 5.58579 20.4142C6.17157 21 7.11438 21 9 21H15C16.8856 21 17.8284 21 18.4142 20.4142C19 19.8284 19 18.8856 19 17V8C19 6.11438 19 5.17157 18.4142 4.58579C17.8284 4 16.8856 4 15 4H9C7.11438 4 6.17157 4 5.58579 4.58579ZM9 8C8.44772 8 8 8.44772 8 9C8 9.55228 8.44772 10 9 10H15C15.5523 10 16 9.55228 16 9C16 8.44772 15.5523 8 15 8H9ZM9 12C8.44772 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14H15C15.5523 14 16 13.5523 16 13C16 12.4477 15.5523 12 15 12H9ZM9 16C8.44772 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H9Z" fill="currentColor" />
                        </svg>
                        <h1 class="text-lg font-semibold tracking-wide md:text-xl">Detail</h1>
                    </div>
                </div>
                <a href="<?= base_url('orders'); ?>" class="flex items-center space-x-2 text-xs tracking-wide text-gray-500 md:text-sm hover:underline">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <div>Kembali</div>
                </a>
            </div>
        </div>

        <div class="h-full p-4 mt-3 bg-white rounded-lg shadow-sm md:mt-4">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="flex items-center p-3 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg md:p-4 bg-blue-50" role="alert">
                    <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                </div>
            <?php elseif (session()->getFlashdata('error')) : ?>
                <div class="flex items-center p-3 mb-4 text-sm text-red-800 border border-red-300 rounded-lg md:p-4 bg-red-50" role="alert">
                    <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Order start -->
            <div class="flex items-center justify-between mb-6">
                <div class="space-y-1">
                    <h1 class="text-lg font-semibold tracking-wide md:text-xl">Pesanan #<?= $order['id']; ?></h1>
                    <p class="text-xs tracking-wide text-gray-500"><?= date('d M Y, H:i', strtotime($order['created_at'])); ?> WIB</p>
                </div>
                <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full md:px-3 md:text-sm <?= $color; ?>">
                    <?= ucwords($order['status']); ?>
                </span>
            </div>
            <div class="p-4 mb-4 rounded-lg bg-gray-50">
                <h2 class="mb-3 text-base font-semibold tracking-wide md:text-lg">Ringkasan Pesanan</h2>
                <div class="mb-2 space-y-2">
                    <?php $i = 0;
                    foreach ($order_items as $order_item) : ?>
                        <div class="flex items-center justify-between">
                            <p class="w-2/4 text-xs tracking-wide text-left text-gray-500 md:text-sm"><?= $items[$i++] ?> &times;<?= $order_item['quantity']; ?></p>
                            <p class="w-1/4 text-xs tracking-wide text-gray-500 md:text-sm text-end">Rp. <?= number_format($order_item['price'] * $order_item['quantity'], 0, ',', '.'); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="flex items-center justify-between pt-2 border-t">
                    <p class="text-base font-semibold tracking-wide md:text-lg">Total</p>
                    <p class="text-base font-semibold tracking-wide md:text-lg">Rp. <?= number_format($order['total_price'], 0, ',', '.'); ?></p>
                </div>
            </div>
            <!-- Order end -->

            <div class="p-4 mb-4 rounded-lg bg-gray-50">
                <h2 class="mb-3 text-base font-semibold tracking-wide md:text-lg">Metode Pembayaran</h2>
                <p class="text-xs font-semibold tracking-wide text-gray-500 md:text-sm"><?= strtoupper($payment_type); ?></p>
            </div>
            <form action="<?= base_url('order/' . $order['id'] . '/complete'); ?>" method="post" class="flex flex-wrap items-center justify-center space-x-0 space-y-3 md:flex-nowrap md:space-y-0 md:space-x-3">
                <input type="hidden" name="reference" value="<?= $order['reference']; ?>">
                <?php if ($order['status'] === 'Selesai') : ?>
                    <button type="button" class="w-full md:w-3/4 btn-primary" disabled>Pesanan sudah selesai</button>
                <?php else : ?>
                    <button type="submit" class="w-full btn-primary md:w-3/4">Tandai Pesanan Selesai</button>
                <?php endif; ?>
                <a href="https://wa.me/62<?= substr(esc($admin['phone_number']), 1); ?>" target="_blank" class="w-full btn-alternative md:w-1/4">Kontak Admin</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>