<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/pages/layouts/AppLayout.vue';
</script>

<template>
    <AppLayout>
        <Head title="About" />

        <div class="container mx-auto px-6 py-16">
            <h1 class="mb-8 text-3xl font-bold">Tentang Kami</h1>

            <div class="prose prose-lg dark:prose-invert max-w-none">
                <p>
                    Vue Starter Kit adalah kerangka kerja modern yang dirancang untuk membantu pengembang web memulai proyek Vue.js dengan cepat dan efisien.
                </p>

                <p>
                    Kami menyediakan semua yang Anda butuhkan untuk membangun aplikasi web yang skalabel dan berkinerja tinggi dengan Vue.js.
                </p>

                <h2>Misi Kami</h2>
                <p>
                    Memberdayakan pengembang untuk membangun aplikasi web yang luar biasa dengan menyediakan alat dan praktik terbaik yang terverifikasi.
                </p>
            </div>
        </div>
    </AppLayout>
</template>
