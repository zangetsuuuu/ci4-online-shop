<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-16 md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="currentColor" />
                    </svg>
                    <h1 class="text-lg md:text-xl font-semibold tracking-wide">Edit Profil</h1>
                </div>
                <a href="<?= base_url('admin/profile'); ?>" class="flex items-center space-x-2 text-xs md:text-sm tracking-wide text-gray-500 hover:underline">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <div>Kembali<span class="hidden md:inline"> ke profil</span></div>
                </a>
            </div>
        </div>

        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-3 md:mt-4">
            <form action="">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-y-8 md:gap-5">
                    <div class="rounded-full w-48 h-48 md:w-56 md:h-56 overflow-hidden border mx-auto relative">
                        <img id="frame" src="<?= base_url('img/bg-1.jpg'); ?>" class="object-cover w-full h-full" alt="">
                        <div class="flex items-center justify-center absolute inset-0 bg-myBlack/20">
                            <label data-tooltip-target="edit-user-picture-tooltip" for="fileInput" class="text-white hover:text-gray-300 p-3 rounded-full cursor-pointer ease-in-out duration-300">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.77778 21H14.2222C17.3433 21 18.9038 21 20.0248 20.2646C20.51 19.9462 20.9267 19.5371 21.251 19.0607C22 17.9601 22 16.4279 22 13.3636C22 10.2994 22 8.76721 21.251 7.6666C20.9267 7.19014 20.51 6.78104 20.0248 6.46268C19.3044 5.99013 18.4027 5.82123 17.022 5.76086C16.3631 5.76086 15.7959 5.27068 15.6667 4.63636C15.4728 3.68489 14.6219 3 13.6337 3H10.3663C9.37805 3 8.52715 3.68489 8.33333 4.63636C8.20412 5.27068 7.63685 5.76086 6.978 5.76086C5.59733 5.82123 4.69555 5.99013 3.97524 6.46268C3.48995 6.78104 3.07328 7.19014 2.74902 7.6666C2 8.76721 2 10.2994 2 13.3636C2 16.4279 2 17.9601 2.74902 19.0607C3.07328 19.5371 3.48995 19.9462 3.97524 20.2646C5.09624 21 6.65675 21 9.77778 21ZM12 9.27273C9.69881 9.27273 7.83333 11.1043 7.83333 13.3636C7.83333 15.623 9.69881 17.4545 12 17.4545C14.3012 17.4545 16.1667 15.623 16.1667 13.3636C16.1667 11.1043 14.3012 9.27273 12 9.27273ZM12 10.9091C10.6193 10.9091 9.5 12.008 9.5 13.3636C9.5 14.7192 10.6193 15.8182 12 15.8182C13.3807 15.8182 14.5 14.7192 14.5 13.3636C14.5 12.008 13.3807 10.9091 12 10.9091ZM16.7222 10.0909C16.7222 9.63904 17.0953 9.27273 17.5556 9.27273H18.6667C19.1269 9.27273 19.5 9.63904 19.5 10.0909C19.5 10.5428 19.1269 10.9091 18.6667 10.9091H17.5556C17.0953 10.9091 16.7222 10.5428 16.7222 10.0909Z" fill="currentColor" />
                                </svg>
                            </label>
                            <input type="file" name="userProfilePicture" id="fileInput" class="hidden" accept="image/*" onchange="previewImage()">
                        </div>
                        <div id="edit-user-picture-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs tracking-wide font-medium text-white transition-opacity duration-300 bg-myBlack rounded-lg shadow-sm opacity-0 tooltip group">
                            Ganti Foto
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>

                    <div class="col-span-2 space-y-5">
                        <div>
                            <label for="fullname" class="text-sm font-medium text-myBlack tracking-wide">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="fullName" id="fullName" class="input-admin" placeholder="John Doe" required />
                        </div>
                        <div>
                            <label for="username" class="text-sm font-medium text-myBlack tracking-wide">Username <span class="text-red-500">*</span></label>
                            <input type="text" name="username" id="username" class="input-admin" placeholder="johndoe" required />
                        </div>
                        <div>
                            <label for="email" class="text-sm font-medium text-myBlack tracking-wide">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" class="input-admin" placeholder="someone@example.com" required />
                        </div>
                        <div>
                            <label for="phone_number" class="text-sm font-medium text-myBlack tracking-wide">No. HP <span class="text-red-500">*</span></label>
                            <input type="email" name="phone_number" id="phone_number" class="input-admin" placeholder="+62" required />
                        </div>
                        <button type="submit" class="btn-admin w-full">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>