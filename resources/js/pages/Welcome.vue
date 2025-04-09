<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { LightbulbIcon, CodeIcon, ShieldCheckIcon, HeartIcon } from 'lucide-vue-next';
import AppLayout from '@/pages/layouts/AppLayout.vue';
</script>

<template>
    <AppLayout>
        <Head title="Welcome">
            <link rel="preconnect" href="https://rsms.me/" />
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        </Head>

        <!-- Hero Section -->
        <section class="container mx-auto px-6 py-16 text-center md:py-24">
            <h1 class="mb-6 text-4xl font-bold tracking-tight md:text-5xl lg:text-6xl">
                <span class="block">Mulai Proyek Vue Anda</span>
                <span class="mt-2 block bg-gradient-to-r from-indigo-500 to-purple-600 bg-clip-text text-transparent">dengan Cepat dan Mudah</span>
            </h1>
            <p class="mx-auto mb-10 max-w-2xl text-lg text-gray-600 dark:text-gray-400">
                Framework modern untuk membangun aplikasi Vue yang skalabel dan performant dengan integrasi terbaik.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <Link
                    :href="route('register')"
                    class="rounded-md bg-indigo-600 px-8 py-3 text-base font-medium text-white transition-all hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
                >
                    Mulai Sekarang
                </Link>
                <a
                    href="#features"
                    class="rounded-md border border-gray-300 px-8 py-3 text-base font-medium transition-all hover:bg-gray-100 dark:border-gray-700 dark:hover:bg-gray-800"
                >
                    Pelajari Fitur
                </a>
            </div>
        </section>

        <!-- Code Preview -->
        <div class="container mx-auto mb-16 px-6">
            <div class="mx-auto max-w-3xl overflow-hidden rounded-xl bg-gray-900 p-6 shadow-2xl">
                <pre class="text-sm text-gray-300"><code>// Mulai dengan cepat
import { createApp } from 'vue'
import App from './App.vue'

createApp(App).mount('#app')</code></pre>
            </div>
        </div>

        <!-- Features Section -->
        <section id="features" class="container mx-auto px-6 py-16">
            <h2 class="mb-12 text-center text-3xl font-bold tracking-tight md:text-4xl">Fitur Unggulan</h2>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-lg border border-gray-200 p-6 dark:border-gray-800">
                    <LightbulbIcon class="mb-4 h-12 w-12 text-indigo-600" />
                    <h3 class="mb-2 text-xl font-semibold">Modern Stack</h3>
                    <p class="text-gray-600 dark:text-gray-400">Vue 3, TypeScript, Vite, dan Tailwind CSS untuk pengembangan modern.</p>
                </div>
                <div class="rounded-lg border border-gray-200 p-6 dark:border-gray-800">
                    <ShieldCheckIcon class="mb-4 h-12 w-12 text-indigo-600" />
                    <h3 class="mb-2 text-xl font-semibold">Keamanan Terjamin</h3>
                    <p class="text-gray-600 dark:text-gray-400">Autentikasi bawaan dengan fitur keamanan terkini.</p>
                </div>
                <div class="rounded-lg border border-gray-200 p-6 dark:border-gray-800">
                    <CodeIcon class="mb-4 h-12 w-12 text-indigo-600" />
                    <h3 class="mb-2 text-xl font-semibold">Developer Experience</h3>
                    <p class="text-gray-600 dark:text-gray-400">ESLint, Prettier, dan TypeScript untuk kode berkualitas tinggi.</p>
                </div>
                <div class="rounded-lg border border-gray-200 p-6 dark:border-gray-800">
                    <HeartIcon class="mb-4 h-12 w-12 text-indigo-600" />
                    <h3 class="mb-2 text-xl font-semibold">UI Komponen</h3>
                    <p class="text-gray-600 dark:text-gray-400">Koleksi komponen yang dapat digunakan kembali untuk membangun UI.</p>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
