<!-- Category modal -->
<div id="report-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                <h3 class="text-lg font-semibold tracking-wide md:text-xl text-myBlack">Pilih Jenis Laporan</h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-500 duration-200 ease-in-out bg-transparent rounded-lg hover:bg-gray-200 hover:text-myBlack ms-auto" data-modal-hide="report-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="w-full">
                    <div class="grid grid-cols-2 gap-6 md:grid-cols-3">
                        <div class="space-y-2">
                            <h1 class="text-base tracking-wide md:text-lg">Pesanan/Penjualan</h1>
                            <hr>
                            <ul>
                                <li><a href="<?= base_url('admin/report/order/all') ?>" class="text-xs text-gray-500 ease-in-out md:text-sm hover:text-emerald-500">Semua Pesanan</a></li>
                                <?php $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; ?>
                                <?php foreach ($months as $key => $month) : ?>
                                    <li><a href="<?= base_url('admin/report/order/' . 0 . ($key + 1)) ?>" class="text-xs text-gray-500 ease-in-out md:text-sm hover:text-emerald-500"><?= $month ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="space-y-2">
                            <h1 class="text-base tracking-wide md:text-lg">Produk</h1>
                            <hr>
                            <ul>
                                <li><a href="<?= base_url('admin/report/product/all') ?>" class="text-xs text-gray-500 ease-in-out md:text-sm hover:text-emerald-500">Semua Produk</a></li>
                                <li><a href="<?= base_url('admin/report/product/stock-empty') ?>" class="text-xs text-gray-500 ease-in-out md:text-sm hover:text-emerald-500">Stok Habis</a></li>
                            </ul>
                        </div>
                        <div class="space-y-2">
                            <h1 class="text-base tracking-wide md:text-lg">Pelanggan</h1>
                            <hr>
                            <ul>
                                <li><a href="<?= base_url('admin/report/customer/all') ?>" class="text-xs text-gray-500 ease-in-out md:text-sm hover:text-emerald-500">Semua Pelanggan</a></li>
                                <li><a href="<?= base_url('admin/report/customer/active') ?>" class="text-xs text-gray-500 ease-in-out md:text-sm hover:text-emerald-500">Aktif</a></li>
                                <li><a href="<?= base_url('admin/report/customer/not-active') ?>" class="text-xs text-gray-500 ease-in-out md:text-sm hover:text-emerald-500">Tidak Aktif</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>