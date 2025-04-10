<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardFooter } from '@/components/ui/card';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm, Link } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';

const props = defineProps({
  categories: Array
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: '/admin/products',
    },
    {
        title: 'Create',
        href: '/admin/products/create',
    },
];

const form = useForm({
  name: '',
  description: '',
  price: '',
  stock: '',
  image: null,
  category_id: '',
});

const imagePreview = ref('');

// Searchable dropdown functionality
const isDropdownOpen = ref(false);
const searchTerm = ref('');
const dropdownRef = ref(null);
const selectedCategory = ref(null);

const filteredCategories = computed(() => {
  if (!searchTerm.value) return props.categories;

  return props.categories.filter(category =>
    category.name.toLowerCase().includes(searchTerm.value.toLowerCase())
  );
});

function toggleDropdown() {
  isDropdownOpen.value = !isDropdownOpen.value;
  if (isDropdownOpen.value) {
    setTimeout(() => {
      document.querySelector('#category-search')?.focus();
    }, 50);
  }
}

function selectCategory(category) {
  form.category_id = category.id;
  selectedCategory.value = category;
  isDropdownOpen.value = false;
  searchTerm.value = '';
}

function handleClickOutside(event) {
  if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
    isDropdownOpen.value = false;
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onBeforeUnmount(() => {
  document.removeEventListener('click', handleClickOutside);
});

// Find selected category when form.category_id changes
function updateSelectedCategory() {
  if (form.category_id && props.categories) {
    selectedCategory.value = props.categories.find(c => c.id == form.category_id);
  }
}

onMounted(updateSelectedCategory);

function handleImageUpload(event) {
  const file = event.target.files[0];
  if (!file) return;

  if (file.size > maxFileSize) {
    imageError.value = `Image size exceeds 10MB limit (${(file.size / (1024 * 1024)).toFixed(2)}MB)`;
    return;
  }

  imageError.value = '';

  form.image = file;

  const reader = new FileReader();
  reader.onload = (e) => {
    imagePreview.value = e.target.result;
  };
  reader.onerror = () => {
    imageError.value = 'Error reading file';
  };
  reader.readAsDataURL(file);
}

function submit() {
  form.post(route('products.store'), {
    onSuccess: () => {
      Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        icon: 'success',
        title: 'Product created successfully'
      })
    },
    onError: () => {
      Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        icon: 'error',
        title: 'Failed to create product'
      });
    },
  });
}
</script>

<template>
    <Head title="Create Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Create Product</h1>
            </div>

            <Card>
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <CardContent class="space-y-4">
                        <!-- Searchable Category Dropdown -->
                        <div class="space-y-2">
                            <Label for="category_id">Category</Label>
                            <div class="relative" ref="dropdownRef">
                                <button
                                    type="button"
                                    @click="toggleDropdown"
                                    class="w-full flex items-center justify-between pl-4 pr-2 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-900 text-sm"
                                >
                                    <span v-if="selectedCategory">{{ selectedCategory.name }}</span>
                                    <span v-else class="text-gray-500">Select a category</span>
                                    <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div v-show="isDropdownOpen" class="absolute z-10 mt-1 w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-md shadow-lg max-h-60 overflow-auto">
                                    <div class="sticky top-0 z-10 bg-white dark:bg-gray-900 p-2 border-b border-gray-200 dark:border-gray-700">
                                        <Input
                                            id="category-search"
                                            v-model="searchTerm"
                                            type="text"
                                            placeholder="Search categories..."
                                            class="w-full"
                                            @click.stop
                                        />
                                    </div>
                                    <div v-if="filteredCategories.length" class="py-1">
                                        <button
                                            v-for="category in filteredCategories"
                                            :key="category.id"
                                            type="button"
                                            @click="selectCategory(category)"
                                            class="w-full px-4 py-2 text-left text-sm hover:bg-gray-100 dark:hover:bg-gray-800"
                                            :class="{'bg-blue-50 dark:bg-blue-900': form.category_id === category.id}"
                                        >
                                            {{ category.name }}
                                        </button>
                                    </div>
                                    <div v-else class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                                        No categories found
                                    </div>
                                </div>
                                <input type="hidden" v-model="form.category_id" />
                                <p v-if="form.errors.category_id" class="mt-1 text-sm text-red-500">{{ form.errors.category_id }}</p>
                            </div>
                        </div>

                        <!-- Product Name -->
                        <div class="space-y-2">
                            <Label for="name">Name</Label>
                            <Input
                                id="name"
                                v-model="form.name"
                                type="text"
                                placeholder="Enter product name"
                                required
                            />
                            <p v-if="form.errors.name" class="text-sm text-red-500">{{ form.errors.name }}</p>
                        </div>

                        <!-- Rest of the form remains unchanged -->
                        <!-- Description -->
                        <div class="space-y-2">
                            <Label for="description">Description</Label>
                            <textarea
                                id="description"
                                v-model="form.description"
                                rows="4"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-900 text-sm"
                                placeholder="Enter product description"
                            ></textarea>
                            <p v-if="form.errors.description" class="text-sm text-red-500">{{ form.errors.description }}</p>
                        </div>

                        <!-- Price -->
                        <div class="space-y-2">
                            <Label for="price">Price</Label>
                            <Input
                                id="price"
                                v-model="form.price"
                                type="number"
                                step="0.01"
                                min="0"
                                placeholder="Enter product price"
                                required
                            />
                            <p v-if="form.errors.price" class="text-sm text-red-500">{{ form.errors.price }}</p>
                        </div>

                        <!-- Stock -->
                        <div class="space-y-2">
                            <Label for="stock">Stock</Label>
                            <Input
                                id="stock"
                                v-model="form.stock"
                                type="number"
                                min="0"
                                placeholder="Enter product stock"
                                required
                            />
                            <p v-if="form.errors.stock" class="text-sm text-red-500">{{ form.errors.stock }}</p>
                        </div>

                        <!-- Image Upload -->
                        <div class="space-y-2">
                            <Label for="image">Product Image (Max 10MB)</Label>
                            <div class="flex flex-col space-y-4">
                            <div class="flex items-center justify-center w-full">
                                <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6" v-if="!imagePreview">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF (max 10MB)</p>
                                </div>
                                <img v-else :src="imagePreview" class="h-full w-auto max-h-28 object-contain" alt="Product Preview" />
                                <input id="image" type="file" @change="handleImageUpload" class="hidden" accept="image/*" />
                                </label>
                            </div>
                            <p v-if="imageError" class="text-sm text-red-500">{{ imageError }}</p>
                            <p v-else-if="form.errors.image" class="text-sm text-red-500">{{ form.errors.image }}</p>
                            <p v-else-if="imagePreview" class="text-xs text-green-500">Image ready to upload</p>
                            </div>
                        </div>
                    </CardContent>
                    <CardFooter class="flex justify-between">
                        <Link :href="route('products.index')">
                            <Button type="button" variant="outline">Cancel</Button>
                        </Link>
                        <Button type="submit" :disabled="form.processing">Create Product</Button>
                    </CardFooter>
                </form>
            </Card>
        </div>
    </AppLayout>
</template>

<style scoped>
.dropdown-enter-active,
.dropdown-leave-active {
  transition: opacity 0.2s ease, transform 0.2s ease;
}

.dropdown-enter-from,
.dropdown-leave-to {
  opacity: 0;
  transform: translateY(-5px);
}
</style>
