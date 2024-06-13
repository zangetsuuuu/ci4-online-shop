<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg shadow-sm md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="6" r="4" fill="currentColor" />
                        <path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" fill="currentColor" />
                    </svg>
                    <h1 class="text-lg font-semibold tracking-wide md:text-xl">Pelanggan</h1>
                </div>
                <button data-modal-target="customer-search-modal" data-modal-toggle="customer-search-modal" class="duration-300 ease-in-out text-myBlack hover:text-gray-500">
                    <svg class="w-4 h-4 md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="h-full p-4 mt-3 bg-white rounded-lg shadow-sm md:mt-4">
            <?php if (session()->getFlashdata('Delete Success')) : ?>
                <div id="alert-delete-success" class="flex items-center p-3 mb-4 tracking-wide text-green-800 rounded-lg md:p-4 bg-green-50" role="alert">
                    <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                        <?= session()->getFlashdata('Delete Success') ?>
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1 md:p-1.5 hover:bg-green-200 inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 ease-in-out duration-200" data-dismiss-target="#alert-delete-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-2 h-2 md:w-3 md:h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('Customer Search Info')) : ?>
                <div class="flex items-center justify-between p-3 mb-4 text-sm text-gray-800 border border-gray-300 rounded-lg md:p-4 bg-gray-50">
                    <div class="flex items-center" role="alert">
                        <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                                <?= session()->getFlashdata('Customer Search Info'); ?>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/customers'); ?>" class="text-xs font-medium tracking-wide md:text-sm hover:underline">Reset</a>
                </div>
            <?php elseif (session()->getFlashdata('Customer Not Found')) : ?>
                <div class="flex items-center justify-between p-3 text-sm text-yellow-800 border border-yellow-300 rounded-lg md:p-4 bg-yellow-50">
                    <div class="flex items-center" role="alert">
                        <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                                <?= session()->getFlashdata('Customer Not Found'); ?>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/customers'); ?>" class="text-xs font-medium tracking-wide md:text-sm hover:underline">Kembali</a>
                </div>
            <?php endif; ?>

            <?php if (!session()->getFlashdata('Customer Not Found')) : ?>
                <!-- Customers start -->
                <div class="overflow-x-auto rounded-md">
                    <table class="min-w-[60rem] md:min-w-full text-sm text-left text-gray-500 tracking-wide divide-y divide-gray-200 border border-gray-200">
                        <thead class="text-xs text-center uppercase bg-gray-100 text-myBlack">
                            <tr>
                                <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                    No.
                                </th>
                                <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                    Foto
                                </th>
                                <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                    Nama
                                </th>
                                <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                    Email
                                </th>
                                <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                    No. HP
                                </th>
                                <th scope="col" class="px-4 py-3 md:px-6 md:py-4 w-fit">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-xs text-center bg-white divide-y divide-gray-200 md:text-sm">
                            <?php if (!empty($customers)) :
                                $i = 1 + (25 * ($currentPage - 1));
                                foreach ($customers as $data) : ?>
                                    <tr class="duration-150 ease-in-out hover:bg-gray-50">
                                        <td class="px-4 py-3 md:px-6 fo:nt-bold mdpy-4 whitespace-nowrap text-myBlack"><?= esc($i++); ?>.</td>
                                        <td class="flex justify-center px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                            <img class="object-cover rounded-full w-9 h-9 md:w-10 md:h-10" src="<?= base_url('img/avatars/customer/' . esc($data['avatar'])); ?>" alt="<?= esc($data['fullname']); ?>">
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                            <div class="space-y-[0.080rem] md:space-y-0.5">
                                                <div class="text-xs font-semibold md:text-sm"><?= esc($data['fullname']); ?></div>
                                                <div class="text-[0.55rem] md:text-xs text-gray-400">@<?= esc($data['username']); ?></div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap"><?= esc($data['email']); ?></td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap "><a href="https://wa.me/62<?= substr(esc($data['phone_number']), 1); ?>" class="duration-200 ease-in-out hover:text-emerald-500"><?= esc($data['phone_number']); ?></a></td>
                                        <td class="px-4 py-3 md:px-6 md:py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-center space-x-3">
                                                <a href="<?= base_url('admin/customer/@' . esc($data['username'])); ?>" class="duration-300 ease-in-out hover:text-myBlack">
                                                    <svg class="w-4 h-4 md:h-5 md:w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="currentColor" />
                                                    </svg>
                                                </a>
                                                <button data-modal-target="delete-customer-modal#<?= esc($data['id']); ?>" data-modal-toggle="delete-customer-modal#<?= esc($data['id']); ?>" class="text-red-500 duration-300 ease-in-out hover:text-red-600">
                                                    <svg fill="currentColor" class="w-4 h-4 md:h-5 md:w-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="delete" class="icon glyph">
                                                        <path d="M17,4V5H15V4H9V5H7V4A2,2,0,0,1,9,2h6A2,2,0,0,1,17,4Z"></path>
                                                        <path d="M20,6H4A1,1,0,0,0,4,8H5V20a2,2,0,0,0,2,2H17a2,2,0,0,0,2-2V8h1a1,1,0,0,0,0-2Z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="py-6 text-center">Belum ada pelanggan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Customers end -->
                <?php if ($pager !== null && $pager->getPageCount() > 1 && !empty($customers)) : ?>
                    <?= $pager->links('orders', 'orders_pagination'); ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->include('layout/admin/customer/delete'); ?>

<?= $this->include('layout/admin/customer/search'); ?>

<?= $this->endSection(); ?>