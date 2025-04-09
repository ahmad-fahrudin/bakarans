<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { SearchIcon, HeartIcon, ShoppingCartIcon } from 'lucide-vue-next';
</script>

<template>
    <div class="min-h-screen bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100">
        <!-- Navbar -->
        <header class="fixed top-0 left-0 right-0 bg-white text-gray-900 shadow-sm z-50">
            <div class="container mx-auto px-6 py-4 max-w-6xl">
                <nav class="flex items-center justify-between">
                    <div class="text-2xl font-bold tracking-wider">
                        <Link href="/" class="text-gray-900">BAKARAN</Link>
                    </div>

                    <div class="flex-1 mx-8">
                        <div class="relative">
                            <input type="text" placeholder="Cari produk, tren, dan merek." class="w-full px-4 py-2 rounded-full border border-gray-300 text-gray-800 focus:outline-none" />
                            <button class="absolute right-3 top-2">
                                <SearchIcon class="h-5 w-5 text-gray-500" />
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-4">
                            <Link
                                :href="route('login')"
                                class="font-medium text-gray-800 hover:text-gray-600 transition-colors"
                            >
                                Masuk
                            </Link>
                            <Link
                                :href="route('register')"
                                class="px-4 py-1.5 bg-gray-800 text-white font-medium rounded-md hover:bg-gray-700 transition-colors"
                            >
                                Daftar
                            </Link>
                        </div>
                        <HeartIcon class="h-6 w-6 cursor-pointer text-gray-800" />
                        <ShoppingCartIcon class="h-6 w-6 cursor-pointer text-gray-800" />
                    </div>
                </nav>
            </div>

            <div class="border-t border-gray-200">
                <div class="container mx-auto px-6 max-w-6xl">
                    <div class="flex space-x-8">
                        <Link href="#" class="py-4 font-medium">MAKANAN</Link>
                        <Link href="#" class="py-4 font-medium">MINUMAN</Link>
                    </div>
                </div>
            </div>
        </header>

        <!-- Spacer to prevent content from being hidden under fixed header -->
        <div class="h-32"></div>

        <!-- Page Content -->
        <main class="container mx-auto px-6 max-w-6xl">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="border-t border-gray-200 bg-gray-50 py-12 dark:border-gray-800 dark:bg-gray-900">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="text-lg font-bold mb-4">Tentang Erafone</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Tentang Kami</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Karir</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Blog</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Layanan Pelanggan</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Bantuan</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Metode Pembayaran</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Hubungi Kami</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Belanja</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Promo</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Produk Baru</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Lokasi Toko</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Belanja</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Promo</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Produk Baru</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">Lokasi Toko</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.7"></path></svg>
                            </a>
                            <a href="#" class="text-gray-600 hover:text-red-600 dark:text-gray-400">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-8 text-center dark:border-gray-800">
                    <p class="text-gray-600 dark:text-gray-400">&copy; {{ new Date().getFullYear() }} Erafone. Semua hak dilindungi.</p>
                </div>
            </div>
        </footer>
    </div>
</template>
