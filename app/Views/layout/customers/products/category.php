<!-- Category modal -->
<div id="category-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg md:text-xl font-semibold text-myBlack tracking-wide">Pilih Kategori</h3>
                <button type="button" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-myBlack rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ease-in-out duration-200" data-modal-hide="category-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="">
                <div class="p-4 md:p-5">
                    <div class="w-full">
                        <select id="category" name="category" class="block w-full p-2.5 text-base bg-gray-50 border-gray-300 focus:outline-none focus:ring-blue-700 focus:border-blue-700 sm:text-sm rounded-md">
                            <option value="all" selected disabled>Semua Kategori</option>
                            <option value="staple">Bahan Pokok</option>
                            <option value="snack">Snack</option>
                            <option value="beverage">Minuman</option>
                            <option value="instant_food">Makanan Instan</option>
                            <option value="milk">Susu</option>
                            <option value="bread">Roti</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end space-x-3 p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button type="submit" name="reset_category" class="btn-alternative">Reset</button>
                    <button type="submit" name="set_category" class="btn-primary">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div>