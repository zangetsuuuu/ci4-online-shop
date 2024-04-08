<!-- Checkout modal -->
<div id="checkout-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-myBlack tracking-wide">Detail Pesanan</h3>
                <button type="button" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-myBlack rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ease-in-out duration-200" data-modal-hide="category-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="">
                <div class="space-y-4 p-4 md:p-5">
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
                                        <span id="price" data-original-value="<?= $j; ?>">
                                            <?= 'Rp. ' . number_format($j, 0, ',', '.'); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" class="text-red-500 font-semibold ms-1 hover:text-red-700 ease-in-out duration-200">
                                            <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="delete" class="icon glyph">
                                                <path d="M17,4V5H15V4H9V5H7V4A2,2,0,0,1,9,2h6A2,2,0,0,1,17,4Z"></path>
                                                <path d="M20,6H4A1,1,0,0,0,4,8H5V20a2,2,0,0,0,2,2H17a2,2,0,0,0,2-2V8h1a1,1,0,0,0,0-2Z"></path>
                                            </svg>
                                        </button>
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
                <!-- Modal footer -->
                <div class="flex items-center justify-end space-x-3 p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button type="button" class="btn-alternative">Reset</button>
                    <button type="submit" class="btn-primary">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div>