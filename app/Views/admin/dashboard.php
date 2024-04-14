<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-16 md:mt-14">
            <div class="flex items-center space-x-2 md:space-x-3">
                <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="dashboard" class="icon glyph">
                    <rect x="2" y="2" width="9" height="11" rx="2"></rect>
                    <rect x="13" y="2" width="9" height="7" rx="2"></rect>
                    <rect x="2" y="15" width="9" height="7" rx="2"></rect>
                    <rect x="13" y="11" width="9" height="11" rx="2"></rect>
                </svg>
                <h1 class="text-lg md:text-xl font-semibold tracking-wide">Dashboard</h1>
            </div>
        </div>

        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-3 md:mt-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
                <div class="bg-emerald-500 text-white tracking-wide rounded-lg p-3.5 md:p-4">
                    <h2 class="text-sm md:text-base font-semibold mb-2">Total Pesanan</h2>
                    <p class="text-lg md:text-2xl font-bold">156</p>
                </div>
                <div class="bg-sky-500 text-white tracking-wide rounded-lg p-3.5 md:p-4">
                    <h2 class="text-sm md:text-base font-semibold mb-2">Total Produk</h2>
                    <p class="text-lg md:text-2xl font-bold">50</p>
                </div>
                <div class="bg-yellow-400 text-white tracking-wide rounded-lg p-3.5 md:p-4">
                    <h2 class="text-sm md:text-base font-semibold mb-2">Pesanan Tertunda</h2>
                    <p class="text-lg md:text-2xl font-bold">24</p>
                </div>
                <div class="bg-indigo-500 text-white tracking-wide rounded-lg p-3.5 md:p-4">
                    <h2 class="text-sm md:text-base font-semibold mb-2">Jumlah Customer</h2>
                    <p class="text-lg md:text-2xl font-bold">32</p>
                </div>
            </div>
        </div>

        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-3 md:mt-4">
            <div class="flex items-center justify-between mb-4">
                <div class="text-base md:text-lg font-semibold tracking-wide">Pesanan Terbaru</div>
                <a href="<?= base_url('/admin/orders'); ?>" class="text-xs md:text-sm text-gray-500 font-semibold tracking-wide hover:underline">Lihat semua</a>
            </div>
            <div class="rounded-md overflow-x-auto">
                <!-- Orders start -->
                <table class="min-w-full text-sm text-left text-gray-500 tracking-wide divide-y divide-gray-200 border border-gray-200">
                    <thead class="text-xs text-myBlack uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-4 w-fit">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">
                                ID Pesanan
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">
                                Tanggal Pesanan
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">
                                Pelanggan
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $i; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">#111</td>
                                <td class="px-6 py-4 whitespace-nowrap">12-04-2024</td>
                                <td class="px-6 py-4 whitespace-nowrap truncate max-w-10">Kurosaki Ichigo</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Selesai
                                    </span>
                                </td>
                                <td class="px-7 py-4 whitespace-nowrap">
                                    <a href="<?= base_url('/admin/orders/' . $i . ''); ?>" class="hover:text-myBlack ease-in-out duration-300">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
                <!-- Orders end  -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>