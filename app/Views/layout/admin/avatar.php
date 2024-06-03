<!-- Profile image modal -->
<div id="profile-image-modal#<?= esc($admin['id']); ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative overflow-hidden bg-white rounded-lg shadow">
            <div class="w-full h-full">
                <img src="<?= base_url('img/avatars/admin/' . esc($admin['avatar'])); ?>" class="object-cover" alt="<?= esc($admin['fullname']); ?>">
            </div>
            <button type="button" class="absolute z-50 inline-flex items-center justify-center w-8 h-8 p-1 text-sm text-white duration-300 ease-in-out rounded-lg top-4 end-4 bg-myBlack/20 backdrop-filter backdrop-blur-md hover:bg-white hover:text-myBlack ms-auto" data-modal-hide="profile-image-modal#<?= esc($admin['id']); ?>">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
    </div>
</div>