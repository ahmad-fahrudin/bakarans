<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/pages/layouts/AppLayout.vue';
</script>

<template>
    <AppLayout>
        <Head title="Welcome">
            <link rel="preconnect" href="https://rsms.me/" />
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        </Head>

        <!-- Menu Categories -->
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between">
                <div class="flex items-center px-6 py-3 rounded-full border border-gray-200">
                    <span class="bg-blue-600 text-white text-xs px-1 rounded mr-2">%</span>
                    <span>Promo</span>
                </div>

                <div class="flex items-center px-6 py-3 rounded-full border border-gray-200">
                    <span class="text-red-500 mr-2">New</span>
                    <span>Click & PickUp</span>
                </div>

                <div class="flex items-center px-6 py-3 rounded-full border border-gray-200">
                    <span class="text-blue-600 mr-2">✓</span>
                    <span>Brand</span>
                </div>

                <div class="flex items-center px-6 py-3 rounded-full border border-gray-200">
                    <span class="text-blue-600 mr-2">🎟️</span>
                    <span>MyEraspace Giftcard</span>
                </div>

                <div class="flex items-center px-6 py-3 rounded-full border border-gray-200">
                    <span class="text-blue-600 mr-2">⚙️</span>
                    <span>Jasa Service Gadget</span>
                </div>

                <div class="flex items-center px-6 py-3 rounded-full border border-gray-200">
                    <span class="text-blue-600 mr-2">📊</span>
                    <span>Bandingkan</span>
                </div>

                <div class="flex items-center px-6 py-3 rounded-full border border-gray-200">
                    <span class="text-blue-600 mr-2">📘</span>
                    <span>E-Catalogue</span>
                </div>

                <div class="flex items-center px-6 py-3 rounded-full border border-gray-200">
                    <span class="text-blue-600 mr-2">🔵</span>
                    <span>MyEraspace</span>
                </div>
            </div>
        </div>

        <!-- Banner -->
        <div class="container mx-auto px-6 py-4">
            <div class="bg-gradient-to-r from-blue-900 to-blue-500 rounded-lg overflow-hidden">
                <div class="flex items-center justify-between p-8">
                    <div class="text-white">
                        <h2 class="text-3xl font-bold mb-2">DAFTAR JADI MEMBER SEKARANG</h2>
                        <p class="text-2xl font-bold">DAN DAPATKAN BENEFITNYA</p>
                    </div>
                    <button class="bg-white text-blue-800 px-6 py-2 rounded-lg font-medium">Daftar Sekarang</button>
                </div>
            </div>
        </div>

        <!-- Member Benefits -->
        <div class="container mx-auto px-6 py-8">
            <h2 class="text-2xl font-bold mb-6">Spesial Member MyEraspace</h2>

            <div class="grid grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg p-6 text-white">
                    <h3 class="text-xl font-bold">Nikmati Keuntungan Member</h3>
                    <p class="mt-2">My eraspace</p>
                </div>

                <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg p-6 text-white">
                    <h3 class="text-xl font-bold">Voucher Spesial Khusus untuk Kamu</h3>
                </div>

                <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg p-6 text-white">
                    <h3 class="text-xl font-bold">Tukar Poin dengan Beragam Diskon</h3>
                </div>

                <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg p-6 text-white">
                    <h3 class="text-xl font-bold">Klaim Transaksi dan Dapatkan Bonus Poin</h3>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
