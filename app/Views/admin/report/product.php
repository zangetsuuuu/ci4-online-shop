<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<section class="h-screen p-6 bg-white">
    <div class="flex flex-col items-center justify-center h-full">
        <h1 class="mb-4 text-2xl font-bold">Laporan Produk</h1>
        <h2 class="mb-2 text-xs tracking-wider text-gray-500 uppercase">Keterangan:</h2>
        <p class="mb-2 text-xs text-myBlack">Data: <?= esc($info); ?></p>
        <p class="mb-2 text-xs text-myBlack">Tanggal Dibuat: <?= date('d F Y'); ?></p>
        <p class="mb-6 text-xs text-myBlack">Jumlah Produk: <?= esc($totalProducts); ?></p>
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
                            Nama Produk
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Kategori
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Stok
                        </th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase border-b border-gray-200">
                            Harga
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)) : $i = 1;
                        foreach ($products as $product) : ?>
                            <tr>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= $i++; ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    #<?= esc($product['id']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= esc($product['name']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= esc($product['category']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    <?= (esc($product['stock']) == 0) ? 'Habis' : esc($product['stock']); ?>
                                </td>
                                <td class="px-4 py-2 text-xs text-gray-700">
                                    Rp. <?= number_format($product['price'], 0, ',', '.'); ?>
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