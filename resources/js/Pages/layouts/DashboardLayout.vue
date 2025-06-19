<template>
  <div class="min-h-screen flex bg-gradient-to-br from-surface-100 via-surface-50 to-surface-200 dark:from-surface-950 dark:via-surface-900 dark:to-surface-950">
    <!-- Sidebar -->
    <aside :class="['transition-all duration-300', collapsed ? 'w-20' : 'w-64', 'bg-surface-0 dark:bg-surface-900 shadow-lg flex flex-col min-h-screen relative']">
      <div class="flex items-center justify-between p-4">
        <span class="text-2xl font-bold text-primary mx-auto w-full text-center">{{ collapsed ? 'H' : 'HMS' }}</span>
        <button @click="toggleCollapse" class="ml-auto p-2 rounded hover:bg-surface-100 dark:hover:bg-surface-800 focus:outline-none" :aria-label="collapsed ? 'Expand sidebar' : 'Collapse sidebar'">
          <i :class="collapsed ? 'pi pi-angle-right' : 'pi pi-angle-left'" class="text-lg"></i>
        </button>
      </div>
      <nav class="flex flex-col gap-2 px-2">
        <Link v-for="item in navItems" :key="item.label" :href="item.href" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition group relative"
          :class="[
            isActive(item),
            'hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0',
            collapsed ? 'justify-center' : ''
          ]"
          :aria-label="item.label"
        >
          <i :class="item.icon"></i>
          <span v-if="!collapsed">{{ item.label }}</span>
          <span v-else class="absolute left-full ml-2 bg-surface-900 text-surface-0 text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 pointer-events-none whitespace-nowrap z-20">{{ item.label }}</span>
        </Link>
        <!-- Settings Submenu -->
        <div>
          <button @click="toggleSettings" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0 font-medium w-full transition group relative focus:outline-none"
            :class="[collapsed ? 'justify-center' : '', settingsActive ? 'bg-surface-200 dark:bg-surface-800' : '']"
            :aria-expanded="settingsOpen"
            :aria-label="'Settings'"
            style="border:none;box-shadow:none;"
          >
            <i class="pi pi-cog"></i> <span v-if="!collapsed">Settings</span>
            <i class="pi pi-angle-down ml-auto transition-transform duration-200" v-if="!collapsed" :style="settingsOpen ? 'transform: rotate(-180deg);' : ''"></i>
            <span v-else class="absolute left-full ml-2 bg-surface-900 text-surface-0 text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 pointer-events-none whitespace-nowrap z-20">Settings</span>
          </button>
          <div v-if="settingsOpen && !collapsed" class="flex flex-col w-full mt-1 gap-1">
            <Link href="/settings/general" class="block w-full px-6 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0 font-normal text-left" :class="isActive({href: '/settings/general'})">General Settings</Link>
            <Link href="/settings/users" class="block w-full px-6 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0 font-normal text-left" :class="isActive({href: '/settings/users'})">User Settings</Link>
          </div>
        </div>
      </nav>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const collapsed = ref(false);
const settingsOpen = ref(false);
const settingsDropdown = ref(null);
const page = usePage();

const navItems = [
  { label: 'Dashboard', href: '/dashboard', icon: 'pi pi-home' },
  { label: 'Users', href: '/users', icon: 'pi pi-users' },
  { label: 'Members', href: '/members', icon: 'pi pi-id-card' },
];

function isActive(item) {
  return page.url.startsWith(item.href) ? 'bg-surface-200 dark:bg-surface-800' : '';
}

function toggleCollapse() {
  collapsed.value = !collapsed.value;
  if (collapsed.value) settingsOpen.value = false;
}

function toggleSettings(e) {
  settingsOpen.value = !settingsOpen.value;
}

function onSettingsBlur(e) {
  // Close dropdown if focus leaves the dropdown and button
  setTimeout(() => {
    if (!settingsDropdown.value?.contains(document.activeElement)) {
      settingsOpen.value = false;
    }
  }, 100);
}

const settingsActive = page.url.startsWith('/settings');

function handleClickOutside(event) {
  if (settingsDropdown.value && !settingsDropdown.value.contains(event.target)) {
    settingsOpen.value = false;
  }
}

onMounted(() => {
  document.addEventListener('mousedown', handleClickOutside);
});
onBeforeUnmount(() => {
  document.removeEventListener('mousedown', handleClickOutside);
});
</script>

<style scoped>
.group:hover .group-hover\:opacity-100 {
  opacity: 1;
}
</style> 