<template>
  <DashboardLayout>
    <template #breadcrumb>
      <BreadcrumbBar :items=" [
        { label: 'Dashboard', url: '/dashboard' },
        { label: 'Students', url: '/students' }
      ]" />
    </template>
    <template #default>
      <div class="bg-surface-0 dark:bg-surface-900 shadow-lg rounded-3xl w-full mx-auto flex flex-col gap-4 p-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <h1 class="text-3xl font-bold text-surface-900 dark:text-surface-0">Student List</h1>
          <Button 
            label="Add New Student" 
            icon="pi pi-plus" 
            severity="primary"
            @click="$inertia.visit('/students/create')" 
          />
        </div>
        <div class="bg-gray-50 rounded-xl p-0 min-h-[180px] w-full">
          <DataTable
            :data="students"
            :columns="columns"
            searchPlaceholder="Search students..."
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

const students = ref([
  { student_id: 'STU-001', name: 'Jane Doe', room: 'A-101', contact: 'jane.doe@example.com', status: 'ACTIVE' },
  { student_id: 'STU-005', name: 'Sarah Green', room: 'B-201', contact: 'sarah.g@example.com', status: 'PENDING' },
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
  { field: 'student_id', header: 'Student ID' },
  { field: 'name', header: 'Name' },
  { field: 'room', header: 'Room' },
  { field: 'contact', header: 'Contact' },
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

<style scoped>
.p-datatable .p-datatable-thead > tr > th {
  background: #f3f4f6;
  font-weight: 600;
}
</style>