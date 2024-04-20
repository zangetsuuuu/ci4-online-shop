<?= $this->extend('layout/customer/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen flex items-center justify-center">
    <div class="container px-4 py-16 md:px-24">
        <div class="md:text-center max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold tracking-wide mb-3 md:mb-4">Selamat Datang di OnlineStore!</h1>
            <p class="text-base md:text-lg text-gray-500 tracking-wide mb-6">Cari dan beli barang yang Anda mau hanya dari rumah, disini!</p>
            <div class="flex flex-wrap items-center justify-center space-x-0 md:space-x-3 space-y-3 md:space-y-0">
                <a href="<?= base_url('register'); ?>" class="btn-primary w-full md:w-auto">
                    Daftar
                </a>
                <a href="<?= base_url('login'); ?>" class="btn-alternative w-full md:w-auto">
                    Login
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>