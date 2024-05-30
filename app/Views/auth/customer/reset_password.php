<?= $this->extend('layout/customer/template'); ?>

<?= $this->section('content'); ?>
<div class="flex items-center justify-center min-h-screen">
    <div class="container px-4 py-16 md:py-0 md:px-0">
        <div class="w-full max-w-md p-6 mx-auto bg-white shadow-xl md:p-8 rounded-xl">
            <div class="flex justify-center mb-6">
                <span class="inline-block p-3 bg-gray-100 rounded-full">
                    <svg class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.17157 5.17157C2 6.34315 2 8.22876 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20H14C17.7712 20 19.6569 20 20.8284 18.8284C22 17.6569 22 15.7712 22 12C22 8.22876 22 6.34315 20.8284 5.17157C19.6569 4 17.7712 4 14 4H10C6.22876 4 4.34315 4 3.17157 5.17157ZM8 13C8.55228 13 9 12.5523 9 12C9 11.4477 8.55228 11 8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13ZM13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12ZM16 13C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11C15.4477 11 15 11.4477 15 12C15 12.5523 15.4477 13 16 13Z" fill="currentColor" />
                    </svg>
                </span>
            </div>
            <h2 class="mb-2 text-2xl font-semibold tracking-wide text-center">Reset Password</h2>
            <p class="mb-6 text-sm tracking-wide text-center text-gray-500">Silakan masukkan password baru</p>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="flex items-center p-3 mb-4 text-sm text-red-800 border border-red-300 rounded-lg md:p-4 bg-red-50" role="alert">
                    <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form class="space-y-5" action="<?= base_url('auth/password/reset'); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="token" id="token" value="<?= $token; ?>">
                <input type="hidden" name="email" id="email" value="<?= $email; ?>">
                <div>
                    <label for="password" class="text-sm font-medium tracking-wide text-myBlack">Password Baru <span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" class="<?= (isset($validation['password']) ? 'input-error' : 'input-customers'); ?>" <?= (isset($validation['password']) ? 'autofocus' : ''); ?> placeholder="********" />
                    <?php if (isset($validation['password'])) : ?>
                        <div class="input-error-message">
                            <?= $validation['password']; ?>
                        </div>
                    <?php endif ?>
                </div>
                <div>
                    <label for="confirm_password" class="text-sm font-medium tracking-wide text-myBlack">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <input type="password" name="confirm_password" id="confirm_password" class="<?= (isset($validation['confirm_password']) ? 'input-error' : 'input-customers'); ?>" <?= (isset($validation['confirm_password']) ? 'autofocus' : ''); ?> placeholder="********" />
                    <?php if (isset($validation['confirm_password'])) : ?>
                        <div class="input-error-message">
                            <?= $validation['confirm_password']; ?>
                        </div>
                    <?php endif ?>
                </div>
                <button type="submit" class="w-full btn-primary">Reset Password</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>