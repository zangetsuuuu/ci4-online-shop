<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="flex items-center justify-center min-h-screen">
    <div class="container py-12 mx-auto">
        <div class="flex flex-col items-center space-y-2">
            <h1 class="text-3xl font-bold text-gray-700">Oops!</h1>
            <p class="text-sm text-gray-500">Anda tidak memiliki akses ke halaman ini.</p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>