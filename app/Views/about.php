<?= $this->extend('layout/customer/template.php'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg md:mt-14">
            <h1 class="mb-4 text-2xl font-bold">Tentang Kami</h1>
            <div>
                <h2 class="text-xl font-semibold">Pemilik</h2>
                <p class="mt-2 text-gray-600">
                    Nama: Galva Al Godzali<br>
                    Alamat: Perum Taman Ria Persada, Blok A1 No. 2<br>
                    Email: galvghazali@gmail.com<br>
                    Telepon: 0813-8411-9387
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>