<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg shadow-sm md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="dashboard" class="icon glyph">
                        <rect x="2" y="2" width="9" height="11" rx="2"></rect>
                        <rect x="13" y="2" width="9" height="7" rx="2"></rect>
                        <rect x="2" y="15" width="9" height="7" rx="2"></rect>
                        <rect x="13" y="11" width="9" height="11" rx="2"></rect>
                    </svg>
                    <h1 class="text-lg font-semibold tracking-wide md:text-xl">Dashboard</h1>
                </div>
                <div class="text-gray-500 duration-200 ease-in-out hover:text-myBlack">
                    <button type="button" data-modal-target="report-modal" data-modal-toggle="report-modal" class="flex items-start space-x-2">
                        <svg fill="currentColor" class="w-7 h-7 md:w-8 md:h-8" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                            <path d="M691.2 410V256H333v154h-77v256h76.8v102h358.4V666H768V410h-76.8zM640 717H384V589h256v128zM384 410V307h256v103H384zm307.2 102c-14.1 0-25.6-11.5-25.6-25.6 0-14.1 11.5-25.6 25.6-25.6 14.1 0 25.6 11.5 25.6 25.6 0 14.1-11.5 25.6-25.6 25.6z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="h-full p-4 mt-3 bg-white rounded-lg shadow-sm md:mt-4">
            <div class="grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4 md:gap-4">
                <div class="bg-emerald-500 text-white tracking-wide rounded-lg p-3.5 md:p-4">
                    <h2 class="mb-3 text-sm font-semibold md:text-base">Total Pendapatan</h2>
                    <p class="text-base font-bold md:text-lg">Rp. <?= number_format($totalIncome, 0, ',', '.'); ?></p>
                </div>
                <div class="bg-sky-500 text-white tracking-wide rounded-lg p-3.5 md:p-4">
                    <h2 class="mb-3 text-sm font-semibold md:text-base">Total Produk</h2>
                    <p class="text-base font-bold md:text-lg"><?= $totalProducts; ?></p>
                </div>
                <div class="bg-amber-500 text-white tracking-wide rounded-lg p-3.5 md:p-4">
                    <h2 class="mb-3 text-sm font-semibold md:text-base">Total Pesanan</h2>
                    <p class="text-base font-bold md:text-lg"><?= $totalOrders; ?></p>
                </div>
                <div class="bg-blue-700 text-white tracking-wide rounded-lg p-3.5 md:p-4">
                    <h2 class="mb-3 text-sm font-semibold md:text-base">Jumlah Customer</h2>
                    <p class="text-base font-bold md:text-lg"><?= $totalCustomers; ?></p>
                </div>
            </div>
        </div>

        <div class="h-full p-4 mt-3 bg-white rounded-lg shadow-sm md:mt-4">
            <div class="flex items-center justify-between mb-4">
                <div class="text-base font-semibold tracking-wide md:text-lg">Pesanan Terbaru</div>
                <a href="<?= base_url('admin/orders'); ?>" class="flex items-center justify-center text-xs font-semibold tracking-wide text-gray-500 md:text-sm hover:underline">
                    <span>Lihat semua</span>
                    <svg class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 7L15 12L10 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <div class="overflow-x-auto rounded-md">
                <!-- Orders start -->
                <table class="min-w-[60rem] md:min-w-full text-sm text-center text-gray-500 tracking-wide divide-y divide-gray-200 border border-gray-200">
                    <thead class="text-xs uppercase bg-gray-100 text-myBlack">
                        <tr>
                            <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                No.
                            </th>
                            <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                ID Pesanan
                            </th>
                            <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                Tanggal Pesanan
                            </th>
                            <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                Pelanggan
                            </th>
                            <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                Status
                            </th>
                            <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-center bg-white divide-y divide-gray-200 md:text-sm">
                        <?php if (!empty($orders)) : ?>
                            <?php $i = 1 + (25 * ($currentPage - 1));
                            foreach ($orders as $order) : ?>
                                <tr>
                                    <td class="px-4 py-3 font-bold md:px-6 md:py-4 whitespace-nowrap text-myBlack"><?= $i++; ?></td>
                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">#<?= esc($order['id']); ?></td>
                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap"><?= esc(date('d M Y, H:i', strtotime($order['created_at']))); ?> WIB</td>
                                    <td class="px-4 py-3 truncate md:px-6 md:py-4 whitespace-nowrap max-w-10"><?= esc($order['customer_name']); ?></td>
                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 <?= $order['status_color']; ?> rounded-full">
                                            <?= esc($order['status']); ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <a href="<?= base_url('admin/order/' . $order['reference'] . ''); ?>" class="duration-300 ease-in-out hover:text-myBlack">
                                                <svg class="w-4 h-4 md:h-5 md:w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="currentColor" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="py-6 text-center">Belum ada pesanan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <!-- Orders end  -->
            </div>
            <?php if ($pager !== null && $pager->getPageCount() > 1 && !empty($orders)) : ?>
                <?= $pager->links('orders', 'orders_pagination'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->include('layout/admin/report'); ?>

<?= $this->endSection(); ?>