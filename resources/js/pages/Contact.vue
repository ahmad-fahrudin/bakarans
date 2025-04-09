<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/pages/layouts/AppLayout.vue';
</script>

<template>
    <AppLayout>
        <Head title="Contact" />

        <div class="container mx-auto px-6 py-16">
            <h1 class="mb-8 text-3xl font-bold">Hubungi Kami</h1>

            <div class="grid gap-10 md:grid-cols-2">
                <div>
                    <h2 class="mb-4 text-xl font-semibold">Informasi Kontak</h2>
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Jika Anda memiliki pertanyaan atau ingin berbicara dengan tim kami, silakan gunakan informasi kontak di bawah ini:
                    </p>

                    <div class="space-y-4">
                        <p><strong>Email:</strong> info@vuestarterkit.com</p>
                        <p><strong>Twitter:</strong> @vuestarterkit</p>
                        <p><strong>GitHub:</strong> github.com/vuestarterkit</p>
                    </div>
                </div>

                <div class="rounded-lg border border-gray-200 p-6 dark:border-gray-800">
                    <h2 class="mb-4 text-xl font-semibold">Kirim Pesan</h2>
                    <form>
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-medium" for="name">Nama</label>
                            <input
                                id="name"
                                type="text"
                                class="w-full rounded-md border border-gray-300 px-4 py-2 dark:border-gray-600 dark:bg-gray-800"
                            />
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-medium" for="email">Email</label>
                            <input
                                id="email"
                                type="email"
                                class="w-full rounded-md border border-gray-300 px-4 py-2 dark:border-gray-600 dark:bg-gray-800"
                            />
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 block text-sm font-medium" for="message">Pesan</label>
                            <textarea
                                id="message"
                                rows="4"
                                class="w-full rounded-md border border-gray-300 px-4 py-2 dark:border-gray-600 dark:bg-gray-800"
                            ></textarea>
                        </div>
                        <button
                            type="submit"
                            class="rounded-md bg-indigo-600 px-5 py-2 text-sm font-medium text-white transition-all hover:bg-indigo-700"
                        >
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
