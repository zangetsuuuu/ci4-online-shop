<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg shadow-sm md:mt-14">
            <div class="flex items-center space-x-2 md:space-x-3">
                <svg class="inline w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="6" r="4" fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 22C14.8501 22 14.0251 22 13.5126 21.4874C13 20.9749 13 20.1499 13 18.5C13 16.8501 13 16.0251 13.5126 15.5126C14.0251 15 14.8501 15 16.5 15C18.1499 15 18.9749 15 19.4874 15.5126C20 16.0251 20 16.8501 20 18.5C20 20.1499 20 20.9749 19.4874 21.4874C18.9749 22 18.1499 22 16.5 22ZM17.0833 16.9444C17.0833 16.6223 16.8222 16.3611 16.5 16.3611C16.1778 16.3611 15.9167 16.6223 15.9167 16.9444V17.9167H14.9444C14.6223 17.9167 14.3611 18.1778 14.3611 18.5C14.3611 18.8222 14.6223 19.0833 14.9444 19.0833H15.9167V20.0556C15.9167 20.3777 16.1778 20.6389 16.5 20.6389C16.8222 20.6389 17.0833 20.3777 17.0833 20.0556V19.0833H18.0556C18.3777 19.0833 18.6389 18.8222 18.6389 18.5C18.6389 18.1778 18.3777 17.9167 18.0556 17.9167H17.0833V16.9444Z" fill="currentColor" />
                    <path d="M15.6782 13.5028C15.2051 13.5085 14.7642 13.5258 14.3799 13.5774C13.737 13.6639 13.0334 13.8705 12.4519 14.4519C11.8705 15.0333 11.6639 15.737 11.5775 16.3799C11.4998 16.9576 11.4999 17.6635 11.5 18.414V18.586C11.4999 19.3365 11.4998 20.0424 11.5775 20.6201C11.6381 21.0712 11.7579 21.5522 12.0249 22C12.0166 22 12.0083 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C13.3262 13 14.577 13.1815 15.6782 13.5028Z" fill="currentColor" />
                </svg>
                <h1 class="text-lg font-semibold tracking-wide md:text-xl">Tambah Admin</h1>
            </div>
        </div>
        <div class="h-full p-4 mt-3 bg-white rounded-lg shadow-sm md:mt-4">
            <form action="<?= base_url('admin/auth/register'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="col-span-2 space-y-5">
                    <div>
                        <label for="fullname" class="text-sm font-medium tracking-wide text-myBlack">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="fullname" id="fullname" class="<?= (isset($validation['fullname'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['fullname'])) ? 'autofocus' : '' ?> placeholder="John Doe" value="<?= esc(old('fullname')); ?>" />
                        <?php if (isset($validation['fullname'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['fullname']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="username" class="text-sm font-medium tracking-wide text-myBlack">Username <span class="text-red-500">*</span></label>
                        <input type="text" name="username" id="username" class="<?= (isset($validation['username'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['username'])) ? 'autofocus' : '' ?> value="<?= esc(old('username')); ?>" placeholder="johndoe" />
                        <?php if (isset($validation['username'])) : ?>
                            <p class="input-error-message">
                                <?= $validation['username']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="email" class="text-sm font-medium tracking-wide text-myBlack">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" class="<?= (isset($validation['email'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['email'])) ? 'autofocus' : '' ?> placeholder="someone@example.com" value="<?= esc(old('email')); ?>" />
                        <?php if (isset($validation['email'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['email']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="gender" class="text-sm font-medium tracking-wide text-myBlack">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="gender" id="gender" class="<?= (isset($validation['gender'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['gender'])) ? 'autofocus' : '' ?>>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" <?= esc(old('gender')) === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= esc(old('gender')) === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <?php if (isset($validation['gender'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['gender']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="phone_number" class="text-sm font-medium tracking-wide text-myBlack">No. HP <span class="text-red-500">*</span></label>
                        <input type="text" name="phone_number" id="phone_number" class="<?= (isset($validation['phone_number'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['phone_number'])) ? 'autofocus' : '' ?> placeholder="08xxxxxxxxxx" value="<?= esc(old('phone_number')); ?>" />
                        <?php if (isset($validation['phone_number'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['phone_number']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="password" class="text-sm font-medium tracking-wide text-myBlack">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" class="<?= (isset($validation['password'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['password'])) ? 'autofocus' : '' ?> placeholder="••••••••" value="<?= esc(old('password')); ?>" />
                        <?php if (isset($validation['password'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['password']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div>
                        <label for="confirm_password" class="text-sm font-medium tracking-wide text-myBlack">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <input type="password" name="confirm_password" id="confirm_password" class="<?= (isset($validation['confirm_password'])) ? 'input-error' : 'input-admin' ?>" <?= (isset($validation['confirm_password'])) ? 'autofocus' : '' ?> placeholder="••••••••" value="<?= esc(old('confirm_password')); ?>" />
                        <?php if (isset($validation['confirm_password'])) : ?>
                            <div class="input-error-message">
                                <?= $validation['confirm_password']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <button type="submit" class="w-full btn-admin">Tambah Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>