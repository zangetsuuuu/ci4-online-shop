<?= $this->extend('layout/customer/template'); ?>

<?= $this->section('content'); ?>
<div class="flex items-center justify-center min-h-screen">
    <div class="container px-4 py-16 md:py-0 md:px-0">
        <div class="w-full max-w-md p-6 mx-auto bg-white shadow-xl md:p-8 rounded-xl">
            <div class="flex justify-center mb-6">
                <span class="inline-block p-3 bg-gray-100 rounded-full">
                    <svg class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z" fill="currentColor" />
                    </svg>
                </span>
            </div>
            <h2 class="mb-2 text-2xl font-semibold tracking-wide text-center">Email Verifikasi</h2>
            <p class="mb-6 text-sm tracking-wide text-center text-gray-500">Kode verifikasi akan dikirim melalui email</p>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="flex items-center p-3 text-sm text-green-800 border border-green-300 rounded-lg md:p-4 bg-green-50" role="alert">
                    <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                </div>
            <?php elseif (session()->getFlashdata('email-error')) : ?>
                <div class="flex items-center p-3 mb-4 text-sm text-red-800 border border-red-300 rounded-lg md:p-4 bg-red-50" role="alert">
                    <svg class="flex-shrink-0 inline w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <div class="text-xs font-medium tracking-wide ms-3 md:text-sm">
                            <?= session()->getFlashdata('email-error'); ?>
                        </div>
                    </div>
                </div>
            <?php elseif (session()->getFlashdata('error')) : ?>
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

            <?php if (!session()->getFlashdata('success')) : ?>
                <form class="space-y-5" action="<?= base_url('auth/send-email'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div>
                        <label for="username" class="text-sm font-medium tracking-wide text-myBlack">Username <span class="text-red-500">*</span></label>
                        <input type="text" name="username" id="username" class="input-customers" placeholder="Masukkan username" />
                    </div>
                    <div>
                        <label for="email" class="text-sm font-medium tracking-wide text-myBlack">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" class="input-customers" placeholder="Masukkan email" />
                    </div>
                    <button type="submit" class="w-full btn-primary">Kirim Kode Verifikasi</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>