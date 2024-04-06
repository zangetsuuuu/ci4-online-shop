<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg p-4 mt-16 md:mt-14">
            <h1 class="text-xl md:text-2xl font-semibold tracking-wide">Keranjang</h1>
            <hr class="my-4">
            <!-- Cart items -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 tracking-wide">
                    <thead class="text-xs text-myBlack uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="md:w-2/5 px-6 py-3 rounded-s-lg">
                                Nama Produk
                            </th>
                            <th scope="col" class="w-1/5 px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="w-1/5 px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="w-1/5 px-6 py-3 rounded-e-lg">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($j = 1; $j <= 3; $j++) : ?>
                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-myBlack whitespace-nowrap">
                                    Indomie Goreng
                                </th>
                                <td class="px-6 py-4">
                                    <input id="quantity" type="number" min="1" value="1" class="w-14 h-8 rounded-md">
                                </td>
                                <td class="px-6 py-4">
                                    Rp. <span id="price" data-original-value="<?= $j; ?>"><?= number_format($j, 0, ',', '.'); ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" class="text-red-500 font-semibold">Hapus</button>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                    <tfoot>
                        <tr class="font-semibold text-myBlack border-t">
                            <th scope="row" class="px-6 py-3 text-base">Total</th>
                            <td id="totalQuantity" class="px-6 py-3">1</td>
                            <td id="totalPrice" class="px-6 py-3">0</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Checkout button -->
            <button class="mt-4 btn-primary">Lanjut Checkout</button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>