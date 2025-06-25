<template>
  <DashboardLayout>
    <template #breadcrumb>
      <BreadcrumbBar :items=" [
        { label: 'Dashboard', url: '/dashboard' },
        { label: 'Students', url: '/students' }
      ]" />
    </template>
    <template #default>
      <div class="bg-surface-0 dark:bg-surface-900 shadow-lg rounded-3xl w-full mx-auto flex flex-col gap-6 p-8 md:p-12">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    <h1 class="text-3xl font-bold text-surface-900 dark:text-surface-0">All Students</h1>

          <Button 
            label="Add New Student" 
            icon="pi pi-plus" 
            class="ml-auto" 
            severity="primary"
            @click="$inertia.visit('/students/create')" 
          />
        </div>
        <div class="flex flex-col md:flex-row md:items-center gap-2 mb-4">
          <InputText 
            v-model="search" 
            placeholder="Search students..." 
            class="w-full md:w-72"
          />
          <Button label="Filter" icon="pi pi-filter" class="!bg-gray-200 !text-gray-700" outlined />
          <Button label="Sort" icon="pi pi-sort-alt" class="!bg-gray-200 !text-gray-700" outlined />
        </div>
        <DataTable 
          :value="filteredStudents" 
          class="p-datatable-sm rounded-xl overflow-hidden"
          :rows="10"
          responsiveLayout="scroll"
        >
          <Column field="student_id" header="Student ID" style="width: 120px;" />
          <Column field="name" header="Name" />
          <Column field="room" header="Room/Bed" />
          <Column field="contact" header="Contact" />
          <Column header="Status" style="width: 120px;">
            <template #body="slotProps">
              <Tag 
                :value="slotProps.data.status" 
                :severity="statusSeverity(slotProps.data.status)" 
                class="uppercase"
              />
            </template>
          </Column>
        </DataTable>
      </div>
    </template>
  </DashboardLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import DashboardLayout from '../layouts/DashboardLayout.vue';
import BreadcrumbBar from '../../components/BreadcrumbBar.vue';
import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';
import Tag from 'primevue/tag';

const search = ref('');

const students = ref([
  { student_id: 'STU-001', name: 'Jane Doe', room: 'A-101', contact: 'jane.doe@example.com', status: 'ACTIVE' },
  { student_id: 'STU-002', name: 'John Smith', room: 'B-205', contact: 'john.smith@example.com', status: 'ACTIVE' },
  { student_id: 'STU-003', name: 'Emily White', room: 'C-302', contact: 'emily.w@example.com', status: 'INACTIVE' },
  { student_id: 'STU-004', name: 'Michael Brown', room: 'A-103', contact: 'michael.b@example.com', status: 'ACTIVE' },
  { student_id: 'STU-005', name: 'Sarah Green', room: 'B-201', contact: 'sarah.g@example.com', status: 'PENDING' },
]);

const filteredStudents = computed(() => {
  if (!search.value) return students.value;
  return students.value.filter(s =>
    s.student_id.toLowerCase().includes(search.value.toLowerCase()) ||
    s.name.toLowerCase().includes(search.value.toLowerCase()) ||
    s.room.toLowerCase().includes(search.value.toLowerCase()) ||
    s.contact.toLowerCase().includes(search.value.toLowerCase()) ||
    s.status.toLowerCase().includes(search.value.toLowerCase())
  );
});

function statusSeverity(status) {
  switch (status) {
    case 'ACTIVE': return 'success';
    case 'INACTIVE': return 'secondary';
    case 'PENDING': return 'warning';
    default: return 'info';
  }
}
</script>

<style scoped>
.p-datatable .p-datatable-thead > tr > th {
  background: #f3f4f6;
  font-weight: 600;
}
</style>