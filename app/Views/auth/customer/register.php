<?= $this->extend('layout/customer/template'); ?>

<?= $this->section('content'); ?>
<div class="flex items-center justify-center min-h-screen">
    <div class="container px-4 py-16 md:py-8 md:px-0">
        <div class="w-full max-w-3xl p-6 mx-auto bg-white shadow-xl md:p-8 rounded-xl">
            <div class="flex justify-center mb-6">
                <span class="inline-block p-3 bg-gray-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5 stroke-myBlack" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="8.5" cy="7" r="4" />
                        <line x1="20" y1="8" x2="20" y2="14" />
                        <line x1="23" y1="11" x2="17" y2="11" />
                    </svg>
                </span>
            </div>
            <h2 class="mb-2 text-2xl font-semibold tracking-wide text-center">Daftar akun baru</h2>
            <p class="mb-8 text-sm tracking-wide text-center text-gray-500">Isi data Anda untuk mendaftar.</p>
            <form class="space-y-5" action="<?= base_url('auth/register'); ?>" method="post">
                <?= csrf_field() ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-0 gap-y-4 md:gap-x-4">
                    <div>
                        <label for="fullname" class="text-sm font-medium tracking-wide text-myBlack">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="fullname" id="fullname" class="<?= (isset($validation['fullname'])) ? 'input-error' : 'input-customers' ?>" <?= (isset($validation['fullname'])) ? 'autofocus' : '' ?> placeholder="John Doe" value="<?= esc(old('fullname')); ?>" />
                        <?php if (isset($validation['fullname'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['fullname']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="username" class="text-sm font-medium tracking-wide text-myBlack">Username <span class="text-red-500">*</span></label>
                        <input type="text" name="username" id="username" class="<?= (isset($validation['username'])) ? 'input-error' : 'input-customers' ?>" <?= (isset($validation['username'])) ? 'autofocus' : '' ?> placeholder="johndoe" value="<?= esc(old('username')); ?>" />
                        <?php if (isset($validation['username'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['username']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-0 gap-y-4 md:gap-x-4">
                    <div>
                        <label for="email" class="text-sm font-medium tracking-wide text-myBlack">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" class="<?= (isset($validation['email'])) ? 'input-error' : 'input-customers' ?>" <?= (isset($validation['email'])) ? 'autofocus' : '' ?> placeholder="someone@example.com" value="<?= esc(old('email')); ?>" />
                        <?php if (isset($validation['email'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['email']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="phone_number" class="text-sm font-medium tracking-wide text-myBlack">No. HP <span class="text-red-500">*</span></label>
                        <input type="text" name="phone_number" id="phone_number" class="<?= (isset($validation['phone_number'])) ? 'input-error' : 'input-customers' ?>" <?= (isset($validation['phone_number'])) ? 'autofocus' : '' ?> placeholder="08xxxxxxxxxx" value="<?= esc(old('phone_number')) ?>" />
                        <?php if (isset($validation['phone_number'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['phone_number']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div>
                    <label for="gender" class="text-sm font-medium tracking-wide text-myBlack">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <select name="gender" id="gender" class="<?= (isset($validation['gender'])) ? 'input-error' : 'input-customers' ?>" <?= (isset($validation['gender'])) ? 'autofocus' : '' ?>>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" <?= esc(old('gender')) === 'Laki-laki' ? 'selected' : '' ?>>Laki-Laki</option>
                        <option value="Perempuan" <?= esc(old('gender')) === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                    <?php if (isset($validation['gender'])) : ?>
                        <div class="input-error-message">
                            <?= $validation['gender']; ?>
                        </div>
                    <?php endif ?>
                </div>
                <div>
                    <label for="address" class="text-sm font-medium tracking-wide text-myBlack">Alamat <span class="text-red-500">*</span></label>
                    <input type="text" name="address" id="address" class="<?= (isset($validation['address'])) ? 'input-error' : 'input-customers' ?>" <?= (isset($validation['address'])) ? 'autofocus' : '' ?> placeholder="Jl. Teratai No. 123" value="<?= esc(old('address')); ?>" />
                    <?php if (isset($validation['address'])) : ?>
                        <div class="input-error-message">
                            <?= $validation['address']; ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-0 gap-y-4 md:gap-x-4">
                    <div>
                        <label for="password" class="text-sm font-medium tracking-wide text-myBlack">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" class="<?= (isset($validation['password'])) ? 'input-error' : 'input-customers' ?>" <?= (isset($validation['password'])) ? 'autofocus' : '' ?> placeholder="••••••••" value="<?= esc(old('password')); ?>" />
                        <?php if (isset($validation['password'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['password']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="confirm_password" class="text-sm font-medium tracking-wide text-myBlack">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <input type="password" name="confirm_password" id="confirm_password" class="<?= (isset($validation['confirm_password'])) ? 'input-error' : 'input-customers' ?>" <?= (isset($validation['confirm_password'])) ? 'autofocus' : '' ?> placeholder="••••••••" value="<?= esc(old('confirm_password')); ?>" />
                        <?php if (isset($validation['confirm_password'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['confirm_password']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="flex flex-wrap items-center justify-between md:flex-nowrap">
                    <button type="submit" class="w-full btn-primary md:w-auto">Daftar akun</button>
                    <div class="mx-auto mt-4 text-sm font-medium tracking-wide text-gray-500 md:me-0 md:mt-0">
                        Sudah punya akun? <a href="<?= base_url('login'); ?>" class="text-blue-700 hover:underline">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>