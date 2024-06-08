<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg shadow-sm md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58579 4.58579C5 5.17157 5 6.11438 5 8V17C5 18.8856 5 19.8284 5.58579 20.4142C6.17157 21 7.11438 21 9 21H15C16.8856 21 17.8284 21 18.4142 20.4142C19 19.8284 19 18.8856 19 17V8C19 6.11438 19 5.17157 18.4142 4.58579C17.8284 4 16.8856 4 15 4H9C7.11438 4 6.17157 4 5.58579 4.58579ZM9 8C8.44772 8 8 8.44772 8 9C8 9.55228 8.44772 10 9 10H15C15.5523 10 16 9.55228 16 9C16 8.44772 15.5523 8 15 8H9ZM9 12C8.44772 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14H15C15.5523 14 16 13.5523 16 13C16 12.4477 15.5523 12 15 12H9ZM9 16C8.44772 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H9Z" fill="currentColor" />
                    </svg>
                    <h1 class="text-lg font-semibold tracking-wide md:text-xl">Pesanan</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <button data-modal-target="sort-modal" data-modal-toggle="sort-modal" class="duration-300 ease-in-out text-myBlack hover:text-gray-500">
                        <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 18L16 6M16 6L20 10.125M16 6L12 10.125" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 6L8 18M8 18L12 13.875M8 18L4 13.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button data-modal-target="status-modal" data-modal-toggle="status-modal" class="duration-300 ease-in-out text-myBlack hover:text-gray-500">
                        <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5868 6.58468C14.9487 6.22336 15.4482 5.99994 16 5.99994C17.1046 5.99994 18 6.89537 18 7.99994C18 8.55169 17.7766 9.05126 17.4153 9.41311C16.824 8.17759 15.8223 7.17594 14.5868 6.58468ZM10.2571 6.25701C10.5118 5.41662 10.9459 4.65423 11.5149 4.0144C7.32249 4.26517 4 7.74455 4 11.9999C4 16.4182 7.58172 19.9999 12 19.9999C16.2554 19.9999 19.7348 16.6774 19.9855 12.4851C19.3457 13.054 18.5833 13.4882 17.7429 13.7429C16.9962 16.2066 14.7075 17.9999 12 17.9999C8.68629 17.9999 6 15.3136 6 11.9999C6 9.2924 7.79338 7.00373 10.2571 6.25701Z" fill="currentColor" />
                            <circle cx="16" cy="8" r="4" fill="currentColor" />
                        </svg>
                    </button>
                    <button data-modal-target="search-modal" data-modal-toggle="search-modal" class="duration-200 ease-in-out text-myBlack hover:text-gray-500">
                        <svg class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="h-full p-4 mt-3 bg-white rounded-lg shadow-sm md:mt-4">
            <?php if (session()->getFlashdata('status')) : ?>
                <div class="flex items-center justify-between p-3 mb-4 text-sm text-gray-800 border border-gray-300 rounded-lg md:p-4 bg-gray-50">
                    <div class="flex items-center" role="alert">
                        <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                                <?= session()->getFlashdata('status'); ?>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/orders'); ?>" class="text-xs font-medium tracking-wide md:text-sm hover:underline">Reset</a>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('Order Search Info')) : ?>
                <div class="flex items-center justify-between p-3 mb-4 text-sm text-gray-800 border border-gray-300 rounded-lg md:p-4 bg-gray-50">
                    <div class="flex items-center" role="alert">
                        <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                                <?= session()->getFlashdata('Order Search Info'); ?>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/orders'); ?>" class="text-xs font-medium tracking-wide md:text-sm hover:underline">Reset</a>
                </div>
            <?php elseif (session()->getFlashdata('Order Not Found')) : ?>
                <div class="flex items-center justify-between p-3 text-sm text-yellow-800 border border-yellow-300 rounded-lg md:p-4 bg-yellow-50">
                    <div class="flex items-center" role="alert">
                        <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                                <?= session()->getFlashdata('Order Not Found'); ?>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/orders'); ?>" class="text-xs font-medium tracking-wide md:text-sm hover:underline">Kembali</a>
                </div>
            <?php endif; ?>

            <?php if (!session()->getFlashdata('Order Not Found')) : ?>
                <div class="overflow-x-auto rounded-md">
                    <!-- Orders start -->
                    <table class="min-w-[60rem] md:min-w-full text-sm text-gray-500 tracking-wide divide-y divide-gray-200 border border-gray-200 text-center">
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
                            <?php if (!empty($orders)) :
                                $i = 1 + (25 * ($currentPage - 1));
                                foreach ($orders as $order) : ?>
                                    <tr>
                                        <td class="px-4 py-3 font-bold md:px-6 md:py-4 whitespace-nowrap text-myBlack"><?= esc($i++); ?>.</td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">#<?= esc($order['id']); ?></td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap"><?= esc(date('d M Y, H:i', strtotime($order['created_at']))); ?> WIB</td>
                                        <td class="px-4 py-3 truncate md:px-6 md:py-4 whitespace-nowrap max-w-10"><?= esc($order['customer_name']); ?></td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 <?= esc($order['status_color']); ?> rounded-full">
                                                <?= esc($order['status']); ?>
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <a href="<?= base_url('admin/order/' . esc($order['reference'])); ?>" class="duration-300 ease-in-out hover:text-myBlack">
                                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->include('layout/admin/order/sort'); ?>

<?= $this->include('layout/admin/order/status'); ?>

<?= $this->include('layout/admin/order/search'); ?>

<?= $this->endSection(); ?>