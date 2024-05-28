<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<section class="h-screen p-6 bg-white">
    <div class="flex flex-col items-center justify-center h-full">
        <h1 class="mb-4 text-2xl font-bold">Laporan Pelanggan</h1>
        <h2 class="mb-2 text-xs tracking-wider text-gray-500 uppercase">Keterangan:</h2>
        <p class="mb-2 text-xs text-myBlack">Data: <?= esc($info); ?></p>
        <p class="mb-2 text-xs text-myBlack">Tanggal Dibuat: <?= date('d F Y'); ?></p>
        <p class="mb-6 text-xs text-myBlack">Jumlah Pelanggan: <?= esc($totalCustomers); ?></p>
        <div class="w-full overflow-x-auto border border-gray-200 shadow-lg">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            No.
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            ID
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Nama
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Username
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Email
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Jenis Kelamin
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            No. HP
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Alamat
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($customers)) : $i = 1;
                        foreach ($customers as $customer) : ?>
                            <tr>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= esc($i++); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    #<?= esc($customer['id']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= esc($customer['fullname']); ?> <span class="text-red-500"><?= esc($customer['deleted_at'] != null ? '(Tidak Aktif)' : ''); ?></span>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    @<?= esc($customer['username']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= esc($customer['email']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= esc($customer['gender']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <a href="https://wa.me/<?= esc($customer['phone_number']); ?>"><?= esc($customer['phone_number']); ?></a>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= esc($customer['address']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="py-6 text-xs text-center text-gray-700">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>