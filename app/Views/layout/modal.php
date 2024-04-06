<!-- Category modal -->
<div id="category-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-myBlack tracking-wide">Pilih Kategori</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-myBlack rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ease-in-out duration-200" data-modal-hide="category-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="productCategoryForm" action="" method="pages/home">
                <div class="p-4 md:p-5">
                    <div class="flex items-center mb-4">
                        <input id="allCategory" type="radio" value="allCategory" name="category" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="allCategory" class="ms-2 text-sm font-medium text-myBlack tracking-wide">Semua Kategori</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="staple" type="radio" value="staple" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="staple" class="ms-2 text-sm font-medium text-myBlack tracking-wide">Bahan Pokok</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="snack" type="radio" value="snack" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="snack" class="ms-2 text-sm font-medium text-myBlack tracking-wide">Snack</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="drinks" type="radio" value="drinks" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="drinks" class="ms-2 text-sm font-medium text-myBlack tracking-wide">Minuman</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="instantFood" type="radio" value="instantFood" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="instantFood" class="ms-2 text-sm font-medium text-myBlack tracking-wide">Makanan Instan</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="milk" type="radio" value="milk" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="milk" class="ms-2 text-sm font-medium text-myBlack tracking-wide">Susu</label>
                    </div>
                    <div class="flex items-center">
                        <input id="bread" type="radio" value="bread" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="bread" class="ms-2 text-sm font-medium text-myBlack tracking-wide">Roti</label>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end md:justify-start space-x-0 md:space-x-3 p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button type="submit" class="btn-primary order-1 md:order-none ms-3 md:ms-0">Konfirmasi</button>
                    <button type="button" onclick="resetForm()" class="btn-alternative">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>