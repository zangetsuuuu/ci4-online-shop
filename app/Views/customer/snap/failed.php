<?= $this->extend('layout/customer/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen flex items-center justify-center">
    <div class="p-4 sm:ml-64">
        <div class="bg-white rounded-lg shadow-sm p-8 mt-16 md:mt-14">
            <div class="text-center">
                <svg class="h-16 w-16 text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <h2 class="text-2xl font-semibold mt-4 mb-2">Payment Failed</h2>
                <p class="text-gray-700">Thank you for your payment!</p>
                <!-- You can add additional information here, such as order details, etc. -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>