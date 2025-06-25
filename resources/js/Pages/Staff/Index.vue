<template>
  <DashboardLayout>
    <template #breadcrumb>
      <BreadcrumbBar :items=" [
        { label: 'Dashboard', url: '/dashboard' },
        { label: 'Staff', url: '/staff' }
      ]" />
    </template>
    <template #default>
      <div class="bg-surface-0 dark:bg-surface-900 shadow-lg rounded-3xl w-full mx-auto flex flex-col gap-4 p-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <h1 class="text-3xl font-bold text-surface-900 dark:text-surface-0">Staff List</h1>
          <Button 
            label="Add New Staff" 
            icon="pi pi-plus" 
            class="ml-auto" 
            severity="primary"
            @click="$inertia.visit('/staff/create')" 
          />
        </div>
        <div class="bg-gray-50 rounded-xl p-0 min-h-[180px] w-full">
          <DataTable
            :data="staff"
            :columns="columns"
            searchPlaceholder="Search staff..."
            :rows="5"
            class="w-full"
          />
        </div>
      </div>
    </template>
  </DashboardLayout>
</template>

<script setup>
import { ref, h } from 'vue';
import DashboardLayout from '../layouts/DashboardLayout.vue';
import BreadcrumbBar from '../../components/BreadcrumbBar.vue';
import Button from 'primevue/button';
import DataTable from '../../components/DataTable.vue';
import Tag from 'primevue/tag';

const staff = ref([
  { staff_id: 'STF-001', name: 'Alice Johnson', department: 'Administration', email: 'alice.j@example.com', status: 'ACTIVE' },
  { staff_id: 'STF-002', name: 'Bob Williams', department: 'Maintenance', email: 'bob.w@example.com', status: 'ACTIVE' },
  { staff_id: 'STF-003', name: 'Carol Smith', department: 'Security', email: 'carol.s@example.com', status: 'INACTIVE' },
  { staff_id: 'STF-004', name: 'David Brown', department: 'Cafeteria', email: 'david.b@example.com', status: 'ACTIVE' },
  { staff_id: 'STF-005', name: 'Eva Green', department: 'Library', email: 'eva.g@example.com', status: 'PENDING' },
]);

function statusSeverity(status) {
  switch (status) {
    case 'ACTIVE': return 'success';
    case 'INACTIVE': return 'secondary';
    case 'PENDING': return 'warning';
    default: return 'info';
  }
}

const columns = [
  { field: 'staff_id', header: 'Staff ID' },
  { field: 'name', header: 'Name' },
  { field: 'department', header: 'Department' },
  { field: 'email', header: 'Email' },
  {
    field: 'status',
    header: 'Status',
    body: ({ data }) => h(Tag, {
      value: data.status,
      severity: statusSeverity(data.status)
    })
  }
];
</script>