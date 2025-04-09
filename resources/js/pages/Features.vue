<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/pages/layouts/AppLayout.vue';
import { CheckIcon } from 'lucide-vue-next';
</script>

<template>
    <AppLayout>
        <Head title="Features" />

        <div class="container mx-auto px-6 py-16">
            <h1 class="mb-8 text-3xl font-bold">Fitur Lengkap</h1>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="rounded-lg border border-gray-200 p-6 dark:border-gray-800">
                    <h2 class="mb-4 text-xl font-semibold">Frontend</h2>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <CheckIcon class="mr-2 h-5 w-5 text-green-500" />
                            <span>Vue 3 Composition API</span>
                        </li>
                        <li class="flex items-start">
                            <CheckIcon class="mr-2 h-5 w-5 text-green-500" />
                            <span>TypeScript support</span>
                        </li>
                        <li class="flex items-start">
                            <CheckIcon class="mr-2 h-5 w-5 text-green-500" />
                            <span>Tailwind CSS untuk styling</span>
                        </li>
                        <li class="flex items-start">
                            <CheckIcon class="mr-2 h-5 w-5 text-green-500" />
                            <span>Inertia.js untuk SPA tanpa API</span>
                        </li>
                    </ul>
                </div>

                <div class="rounded-lg border border-gray-200 p-6 dark:border-gray-800">
                    <h2 class="mb-4 text-xl font-semibold">Backend</h2>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <CheckIcon class="mr-2 h-5 w-5 text-green-500" />
                            <span>Laravel 10+</span>
                        </li>
                        <li class="flex items-start">
                            <CheckIcon class="mr-2 h-5 w-5 text-green-500" />
                            <span>Autentikasi bawaan</span>
                        </li>
                        <li class="flex items-start">
                            <CheckIcon class="mr-2 h-5 w-5 text-green-500" />
                            <span>Database migrations</span>
                        </li>
                        <li class="flex items-start">
                            <CheckIcon class="mr-2 h-5 w-5 text-green-500" />
                            <span>Testing framework</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
