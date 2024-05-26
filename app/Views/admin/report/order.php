<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<section class="h-screen p-6 bg-white">
    <div class="flex flex-col items-center justify-center h-full">
        <h1 class="mb-4 text-2xl font-bold">Laporan Penjualan</h1>
        <h2 class="mb-2 text-xs tracking-wider text-gray-500 uppercase">Keterangan:</h2>
        <p class="mb-2 text-xs text-myBlack"><?= ($month !== 'Semua Data') ? 'Bulan ' . $month : $month; ?></p>
        <p class="mb-2 text-xs text-myBlack">Tanggal Dibuat: <?= date('d F Y'); ?></p>
        <p class="mb-6 text-xs text-myBlack">Total Pendapatan: Rp. <?= number_format($totalRevenue, 0, ',', '.'); ?></p>
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
                            Tanggal Pesanan
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Nama Pelanggan
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Status
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Total Harga
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)) : $i = 1;
                        foreach ($orders as $order) : ?>
                            <tr>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= $i++; ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    #<?= $order['id']; ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= date('d M Y, H:i', strtotime($order['created_at'])); ?> WIB
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= $order['customer_name']; ?> <span class="text-red-500"><?= $order['deleted_at'] != null ? '(Tidak Aktif)' : ''; ?></span>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= ucwords($order['status']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    Rp. <?= number_format($order['total_price'], 0, ',', '.'); ?>
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