<?= $this->extend('layout/customer/template.php'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full p-4 mt-16 bg-white rounded-lg md:mt-14">
            <div class="flex items-center space-x-2 md:space-x-3">
                <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 48 48" version="1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 48 48">
                    <path fill="currentColor" d="M37,40H11l-6,6V12c0-3.3,2.7-6,6-6h26c3.3,0,6,2.7,6,6v22C43,37.3,40.3,40,37,40z" />
                    <g fill="#ffffff">
                        <rect x="22" y="20" width="4" height="11" />
                        <circle cx="24" cy="15" r="2" />
                    </g>
                </svg>
                <h1 class="text-lg font-semibold tracking-wide md:text-xl">Tentang Kami</h1>
            </div>
        </div>
        <div class="h-full p-4 mt-3 bg-white rounded-lg md:mt-8">
            <h2 class="text-base font-semibold tracking-wide md:text-lg">Pemilik</h2>
            <p class="mt-2 text-xs text-gray-500 md:text-sm">
                Nama: Galva Al Godzali<br>
                Alamat: Perum Taman Ria Persada, Blok A1 No. 2<br>
                Email: galvalghazali@gmail.com<br>
                Telepon: 0813-8411-9387
            </p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>