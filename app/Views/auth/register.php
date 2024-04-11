<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen flex items-center justify-center">
    <div class="container px-4 py-16 md:py-0 md:px-0">
        <div class="bg-white p-8 rounded-xl shadow-xl max-w-lg w-full mx-auto">
            <div class="flex justify-center mb-6">
                <span class="inline-block bg-gray-100 rounded-full p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5 stroke-myBlack" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="8.5" cy="7" r="4" />
                        <line x1="20" y1="8" x2="20" y2="14" />
                        <line x1="23" y1="11" x2="17" y2="11" />
                    </svg>
                </span>
            </div>
            <h2 class="text-2xl font-semibold text-center tracking-wide mb-2">Daftar akun baru</h2>
            <p class="text-sm text-gray-500 text-center tracking-wide mb-6">Isi data Anda untuk mendaftar.</p>
            <form class="space-y-5" action="#">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-0 gap-y-4 md:gap-x-4">
                    <div class="col-span-2">
                        <label for="fullname" class="text-sm font-medium text-myBlack tracking-wide">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="fullname" id="fullname" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="John Doe" required />
                    </div>
                    <div>
                        <label for="username" class="text-sm font-medium text-myBlack tracking-wide">Username <span class="text-red-500">*</span></label>
                        <input type="text" name="username" id="username" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="johndoe" required />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-0 gap-y-4 md:gap-x-4">
                    <div class="col-span-2">
                        <label for="email" class="text-sm font-medium text-myBlack tracking-wide">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="someone@example.com" required />
                    </div>
                    <div>
                        <label for="phone_number" class="text-sm font-medium text-myBlack tracking-wide">No. HP <span class="text-red-500">*</span></label>
                        <input type="email" name="phone_number" id="phone_number" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="+62" required />
                    </div>
                </div>
                <div>
                    <label for="address" class="text-sm font-medium text-myBlack tracking-wide">Alamat <span class="text-red-500">*</span></label>
                    <input type="text" name="address" id="address" placeholder="Jl. Teratai No. 123" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base" required />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-0 gap-y-4 md:gap-x-4">
                    <div>
                        <label for="password" class="text-sm font-medium text-myBlack tracking-wide">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base" required />
                    </div>
                    <div>
                        <label for="confirm_password" class="text-sm font-medium text-myBlack tracking-wide">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="••••••••" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-blue-700 focus:border-blue-700 focus:z-10 focus:shadow-md text-sm md:text-base" required />
                    </div>
                </div>
                <div class="flex flex-wrap md:flex-nowrap items-center justify-between">
                    <button type="submit" name="register" class="btn-primary w-full md:w-auto">Daftar akun</button>
                    <div class="text-sm font-medium text-gray-500 tracking-wide mx-auto md:me-0 mt-4 md:mt-0">
                        Sudah punya akun? <a href="/login" class="text-blue-700 hover:underline">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>