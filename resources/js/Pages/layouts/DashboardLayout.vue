<template>
  <div class="min-h-screen w-full">
    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 w-64 h-screen bg-surface-0 dark:bg-surface-900 shadow-lg flex flex-col z-30">
      <div style="border-right: 0px !important; border-bottom: 0px !important;" class="flex items-center justify-center h-16 custom-border">
        <span class="text-2xl font-bold text-primary">HMS</span>
      </div>
      <nav class="flex-1 flex flex-col gap-2 px-2 py-4">
        <Link v-for="item in navItems" :key="item.label" :href="item.href" class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition group relative hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0"
          :class="isActive(item)"
          :aria-label="item.label"
        >
          <i :class="item.icon"></i>
          <span>{{ item.label }}</span>
        </Link>
        <!-- Settings Submenu -->
        <div>
          <button @click="toggleSettings" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0 font-medium w-full transition group relative focus:outline-none"
            :class="[settingsActive ? 'bg-surface-200 dark:bg-surface-800' : '']"
            :aria-expanded="settingsOpen"
            :aria-label="'Settings'"
            style="border:none;box-shadow:none;"
          >
            <i class="pi pi-cog"></i> <span>Settings</span>
            <i class="pi pi-angle-down ml-auto transition-transform duration-200" :style="settingsOpen ? 'transform: rotate(-180deg);' : ''"></i>
          </button>
          <div v-if="settingsOpen" class="flex flex-col w-full mt-1 gap-1">
            <Link href="/settings/general" class="block w-full px-6 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0 font-normal text-left" :class="isActive({href: '/settings/general'})">General Settings</Link>
            <Link href="/settings/users" class="block w-full px-6 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0 font-normal text-left" :class="isActive({href: '/settings/users'})">User Settings</Link>
          </div>
        </div>
      </nav>
      <div class="p-4">
        <button @click="logout" class="flex items-center gap-3 px-3 py-2 rounded-lg w-full font-medium transition hover:bg-surface-100 dark:hover:bg-surface-800 text-surface-900 dark:text-surface-0 focus:outline-none group relative"
          :aria-label="'Logout'"
        >
          <i class="pi pi-sign-out"></i>
          <span>Logout</span>
        </button>
      </div>
    </aside>
    <!-- Main Content Wrapper -->
    <div class="ml-64 min-h-screen bg-white">
      <Header class="fixed top-0 left-64 w-[calc(100%-16rem)] z-50 custom-border bg-white">
        <template #breadcrumb>
          <slot name="breadcrumb"></slot>
        </template>
        <template #header>
          <slot name="header"></slot>
        </template>
      </Header>
      <div class="w-full pt-16 relative z-10">
        <slot />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link, usePage, router } from '@inertiajs/vue3';
import Header from '../../components/Header.vue';
import BreadcrumbBar from '../../components/BreadcrumbBar.vue';

const settingsOpen = ref(false);
const page = usePage();

const navItems = [
  { label: 'Dashboard', href: '/dashboard', icon: 'pi pi-home' },
  { label: 'Student Management', href: '/students', icon: 'pi pi-book' }, 
  { label: 'Staff Management', href: '/staff', icon: 'pi pi-briefcase' },
  { label: 'Accounts', href: '/accounts', icon: 'pi pi-id-card' },
  { label: 'Users', href: '/users', icon: 'pi pi-users' },
];

function isActive(item) {
  return page.url.startsWith(item.href) ? 'bg-surface-200 dark:bg-surface-800' : '';
}

function toggleSettings() {
  settingsOpen.value = !settingsOpen.value;
}

const settingsActive = page.url.startsWith('/settings');

function logout() {
  router.post('/logout');
}
</script>

<style>
.custom-border {
  border: 1px solid #ccc !important;
}
</style>