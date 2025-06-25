<template>
  <header class="fixed top-0 left-64 w-[calc(100%-16rem)] flex items-center justify-between bg-surface-0 dark:bg-surface-900 shadow-sm px-6 h-16 z-40 border-b border-surface-100 dark:border-surface-800 transition-all duration-300">
    <div class="flex items-center gap-4 min-w-0">
      <slot name="breadcrumb" />
    </div>
    <div class="flex items-center gap-6">
      <button class="relative focus:outline-none" aria-label="Notifications">
        <i class="pi pi-bell text-xl text-surface-500 dark:text-surface-400"></i>
        <!-- Notification dot example -->
        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white dark:ring-surface-900"></span>
      </button>
      <div class="relative flex items-center gap-2 cursor-pointer select-none" @click="toggleDropdown" @keydown.enter.prevent="toggleDropdown" tabindex="0">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User Avatar" class="w-9 h-9 rounded-full object-cover border border-surface-200 dark:border-surface-700" />
        <span class="font-medium text-surface-900 dark:text-surface-0 hidden sm:block">John Doe</span>
        <i class="pi pi-chevron-down text-surface-500 dark:text-surface-400 text-xs ml-1"></i>
        <transition name="fade">
          <div v-if="dropdownOpen" class="absolute right-0 mt-12 w-40 bg-surface-0 dark:bg-surface-900 rounded-xl shadow-lg border border-surface-100 dark:border-surface-700 py-2 z-50">
            <a href="/settings" class="block px-4 py-2 text-surface-700 dark:text-surface-200 hover:bg-surface-100 dark:hover:bg-surface-800 rounded-t-xl">Settings</a>
            <button @click.stop="logout" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-surface-100 dark:hover:bg-surface-800 rounded-b-xl">Logout</button>
          </div>
        </transition>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

const dropdownOpen = ref(false);

function toggleDropdown() {
  dropdownOpen.value = !dropdownOpen.value;
}

function closeDropdown(e) {
  if (!e.target.closest('.select-none')) {
    dropdownOpen.value = false;
  }
}

function logout() {
  // Replace with your logout logic, e.g., Inertia or router.post('/logout')
  window.location.href = '/logout';
}

onMounted(() => {
  document.addEventListener('mousedown', closeDropdown);
});
onBeforeUnmount(() => {
  document.removeEventListener('mousedown', closeDropdown);
});
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.15s;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style> 