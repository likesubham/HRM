<template>
  <DashboardLayout>
    <template #default>
      <div class="w-full mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-surface-900 dark:text-surface-0 mb-6">Dashboard</h1>
        <!-- Summary Cards (All in one row) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
          <div class="bg-surface-0 dark:bg-surface-900 rounded-xl shadow p-6 flex flex-col">
            <span class="text-surface-500 dark:text-surface-400 font-semibold mb-2">Total Students</span>
            <span class="text-3xl font-bold text-surface-900 dark:text-surface-0">250</span>
          </div>
          <div class="bg-surface-0 dark:bg-surface-900 rounded-xl shadow p-6 flex flex-col">
            <span class="text-surface-500 dark:text-surface-400 font-semibold mb-2">Available Beds</span>
            <span class="text-3xl font-bold text-surface-900 dark:text-surface-0">75</span>
          </div>
          <div class="bg-surface-0 dark:bg-surface-900 rounded-xl shadow p-6 flex flex-col">
            <span class="text-surface-500 dark:text-surface-400 font-semibold mb-2">Pending Payments</span>
            <span class="text-3xl font-bold text-surface-900 dark:text-surface-0">$1,200</span>
          </div>
          <div class="bg-surface-0 dark:bg-surface-900 rounded-xl shadow p-6 flex flex-col">
            <span class="text-surface-500 dark:text-surface-400 font-semibold mb-2">New Visitors Today</span>
            <span class="text-2xl font-bold text-surface-900 dark:text-surface-0">12</span>
          </div>
        </div>
        <!-- Recent Activity -->
        <div class="mb-8">
          <h2 class="text-lg font-semibold text-surface-900 dark:text-surface-0 mb-2">Recent Activity</h2>
          <div class="bg-surface-50 dark:bg-surface-800 rounded-xl shadow p-8 text-surface-400 dark:text-surface-500 text-center">
            Recent activity feed will be displayed here.
          </div>
        </div>
        <!-- Upcoming Events -->
        <div>
          <h2 class="text-lg font-semibold text-surface-900 dark:text-surface-0 mb-2">Upcoming Events</h2>
          <div class="bg-surface-50 dark:bg-surface-800 rounded-xl shadow p-8 text-surface-400 dark:text-surface-500 text-center">
            Upcoming events and notices will be displayed here.
          </div>
        </div>
      </div>
    </template>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../layouts/DashboardLayout.vue';
</script>
