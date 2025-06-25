<template>
  <DashboardLayout>
    <template #default>
      <div class="w-full py-8 px-4 md:px-8 lg:px-16">
        <h1 class="text-2xl font-bold text-surface-900 dark:text-surface-0 mb-6">Dashboard</h1>
        <!-- Summary Cards (Flex Row) -->
        <div class="flex gap-x-6 mb-8">
          <div class="flex-1 bg-surface-0 dark:bg-surface-900 rounded-xl shadow p-6 flex flex-col items-center">
            <span class="text-surface-500 dark:text-surface-400 font-semibold mb-1">Total Students</span>
            <span class="text-3xl font-bold text-surface-900 dark:text-surface-0">250</span>
          </div>
          <div class="flex-1 bg-surface-0 dark:bg-surface-900 rounded-xl shadow p-6 flex flex-col items-center">
            <span class="text-surface-500 dark:text-surface-400 font-semibold mb-1">Available Beds</span>
            <span class="text-3xl font-bold text-surface-900 dark:text-surface-0">75</span>
          </div>
          <div class="flex-1 bg-surface-0 dark:bg-surface-900 rounded-xl shadow p-6 flex flex-col items-center">
            <span class="text-surface-500 dark:text-surface-400 font-semibold mb-1">Pending Payments</span>
            <span class="text-3xl font-bold text-surface-900 dark:text-surface-0">$1,200</span>
          </div>
          <div class="flex-1 bg-surface-0 dark:bg-surface-900 rounded-xl shadow p-6 flex flex-col items-center">
            <span class="text-surface-500 dark:text-surface-400 font-semibold mb-1">New Visitors Today</span>
            <span class="text-2xl font-bold text-surface-900 dark:text-surface-0">12</span>
          </div>
        </div>
        <!-- Recent Activity (Full Width) -->
        <div class="w-full mb-8">
          <h2 class="text-lg font-semibold text-surface-900 dark:text-surface-0 mb-3">Recent Activity</h2>
          <div class="bg-surface-50 dark:bg-surface-800 rounded-xl shadow p-4">
            <ul class="divide-y divide-surface-200 dark:divide-surface-700">
              <li class="py-3 flex items-start gap-3">
                <span class="inline-block bg-primary/10 text-primary rounded-full p-2"><i class="pi pi-user-plus"></i></span>
                <div>
                  <div class="font-medium text-surface-900 dark:text-surface-0">New student registered</div>
                  <div class="text-xs text-surface-500 dark:text-surface-400">2 minutes ago</div>
                </div>
              </li>
              <li class="py-3 flex items-start gap-3">
                <span class="inline-block bg-green-100 text-green-600 rounded-full p-2"><i class="pi pi-check-circle"></i></span>
                <div>
                  <div class="font-medium text-surface-900 dark:text-surface-0">Payment received from John Doe</div>
                  <div class="text-xs text-surface-500 dark:text-surface-400">10 minutes ago</div>
                </div>
              </li>
              <li class="py-3 flex items-start gap-3">
                <span class="inline-block bg-yellow-100 text-yellow-600 rounded-full p-2"><i class="pi pi-exclamation-triangle"></i></span>
                <div>
                  <div class="font-medium text-surface-900 dark:text-surface-0">Bed request pending approval</div>
                  <div class="text-xs text-surface-500 dark:text-surface-400">30 minutes ago</div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- Upcoming Events (Full Width) -->
        <div class="w-full">
          <h2 class="text-lg font-semibold text-surface-900 dark:text-surface-0 mb-3">Upcoming Events</h2>
          <div class="bg-surface-50 dark:bg-surface-800 rounded-xl shadow p-4">
            <ul class="divide-y divide-surface-200 dark:divide-surface-700">
              <li class="py-3 flex items-start gap-3">
                <span class="inline-block bg-blue-100 text-blue-600 rounded-full p-2"><i class="pi pi-calendar"></i></span>
                <div>
                  <div class="font-medium text-surface-900 dark:text-surface-0">Fire Drill</div>
                  <div class="text-xs text-surface-500 dark:text-surface-400">Tomorrow, 10:00 AM</div>
                </div>
              </li>
              <li class="py-3 flex items-start gap-3">
                <span class="inline-block bg-purple-100 text-purple-600 rounded-full p-2"><i class="pi pi-bell"></i></span>
                <div>
                  <div class="font-medium text-surface-900 dark:text-surface-0">Fee Payment Deadline</div>
                  <div class="text-xs text-surface-500 dark:text-surface-400">Friday, 5:00 PM</div>
                </div>
              </li>
              <li class="py-3 flex items-start gap-3">
                <span class="inline-block bg-pink-100 text-pink-600 rounded-full p-2"><i class="pi pi-users"></i></span>
                <div>
                  <div class="font-medium text-surface-900 dark:text-surface-0">Parent-Teacher Meeting</div>
                  <div class="text-xs text-surface-500 dark:text-surface-400">Next Monday, 2:00 PM</div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </template>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../layouts/DashboardLayout.vue';
</script>
