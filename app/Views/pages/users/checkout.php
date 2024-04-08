<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg p-4 mt-16 md:mt-14">
            <div class="space-y-1 mb-6">
                <h1 class="text-2xl md:text-3xl font-semibold tracking-wide">Pesanan #111</h1>
                <p class="text-xs text-gray-500 tracking-wide">08 April 2024 pukul 14.02 WIB</p>
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="bg-gray-50 rounded-lg p-4 mb-8">
                <h2 class="text-base md:text-lg font-semibold tracking-wide mb-3">Ringkasan Pesanan</h2>
                <div class="space-y-2 mb-2">
                    <?php for ($i = 1; $i < 5; $i++) : ?>
                        <div class="flex justify-between items-center">
                            <p class="w-2/4 text-xs md:text-sm text-gray-600 text-left tracking-wide">Indomie Goreng &times;<?= $i ?></p>
                            <p class="w-1/4 text-xs md:text-sm text-gray-600 text-end tracking-wide">Rp 4.000</p>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="flex justify-between items-center border-t pt-2">
                    <p class="text-base md:text-lg font-semibold tracking-wide">Total</p>
                    <p class="text-base md:text-lg font-semibold tracking-wide">Rp 16.000</p>
                </div>
            </div>

            <button type="button" class="btn-primary w-full mt-4 flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="ic_fluent_payment_24_filled" fill="currentColor" fill-rule="nonzero">
                            <path d="M21.9883291,10.9947074 L21.9888849,16.275793 C21.9888849,17.7383249 20.8471803,18.9341973 19.4064072,19.0207742 L19.2388849,19.025793 L4.76104885,19.025793 C3.29851702,19.025793 2.10264457,17.8840884 2.01606765,16.4433154 L2.01104885,16.275793 L2.01032912,10.9947074 L21.9883291,10.9947074 Z M18.2529045,14.5 L15.7529045,14.5 L15.6511339,14.5068466 C15.2850584,14.556509 15.0029045,14.8703042 15.0029045,15.25 C15.0029045,15.6296958 15.2850584,15.943491 15.6511339,15.9931534 L15.7529045,16 L18.2529045,16 L18.3546751,15.9931534 C18.7207506,15.943491 19.0029045,15.6296958 19.0029045,15.25 C19.0029045,14.8703042 18.7207506,14.556509 18.3546751,14.5068466 L18.2529045,14.5 Z M19.2388849,5.0207074 C20.7014167,5.0207074 21.8972891,6.162412 21.9838661,7.60318507 L21.9888849,7.7707074 L21.9883291,9.4947074 L2.01032912,9.4947074 L2.01104885,7.7707074 C2.01104885,6.30817556 3.15275345,5.11230312 4.59352652,5.02572619 L4.76104885,5.0207074 L19.2388849,5.0207074 Z" id="🎨-Color">
                            </path>
                        </g>
                    </g>
                </svg>
                <span>Pilih Metode Pembayaran</span>
            </button>
        </div>
    </div>
</div>

<?= $this->include('layout/modal/checkout'); ?>

<?= $this->endSection(); ?>