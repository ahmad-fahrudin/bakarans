<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-gradient-to-b from-[#FDFDFC] to-[#f5f5f3] text-[#1b1b18] dark:from-[#0a0a0a] dark:to-[#131313] dark:text-[#EDEDEC]">
        <!-- Navbar -->
        <header class="container mx-auto px-6 py-6">
            <nav class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="text-2xl font-bold bg-gradient-to-r from-indigo-500 to-purple-600 bg-clip-text text-transparent">
                        <Link href="/">Vue Starter Kit</Link>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <Link href="/about" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                        About
                    </Link>
                    <Link href="/features" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                        Features
                    </Link>
                    <Link href="/contact" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                        Contact
                    </Link>
                </div>
                <div class="flex items-center gap-4">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="rounded-md bg-indigo-600 px-5 py-2 text-sm font-medium text-white transition-all hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
                    >
                        Dashboard
                    </Link>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="rounded-md px-5 py-2 text-sm font-medium transition-all hover:text-indigo-600 dark:hover:text-indigo-400"
                        >
                            Log in
                        </Link>
                        <Link
                            :href="route('register')"
                            class="rounded-md bg-indigo-600 px-5 py-2 text-sm font-medium text-white transition-all hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
                        >
                            Register
                        </Link>
                    </template>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="border-t border-gray-200 bg-gray-50 py-12 dark:border-gray-800 dark:bg-gray-900">
            <div class="container mx-auto px-6 text-center">
                <p class="text-gray-600 dark:text-gray-400">&copy; {{ new Date().getFullYear() }} Vue Starter Kit. Dibuat dengan ❤️ untuk pengembang.</p>
            </div>
        </footer>
    </div>
</template>
