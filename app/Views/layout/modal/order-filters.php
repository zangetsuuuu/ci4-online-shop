<!-- Order filters modal -->
<div id="order-filters-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-myBlack tracking-wide">Filter Pesanan</h3>
                <button type="button" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-myBlack rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ease-in-out duration-200" data-modal-hide="order-filters-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="" method="GET">
                <div class="space-y-5 p-4 md:p-5">
                    <div>
                        <label for="tanggal" class="text-sm font-medium text-myBlack tracking-wide">Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base">
                    </div>
                    <div>
                        <label for="status" class="text-sm font-medium text-myBlack tracking-wide">Status:</label>
                        <select id="status" name="status" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base">
                            <option value="all">Semua</option>
                            <option value="process">Diproses</option>
                            <option value="done">Selesai</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end space-x-3 p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button type="button" class="btn-alternative">Reset</button>
                    <button type="submit" name="set_filter" class="btn-primary">Terapkan Filter</button>
                </div>
            </form>
        </div>
    </div>