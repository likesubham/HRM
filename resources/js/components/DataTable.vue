<template>
  <div>
    <!-- Filter & Sort Bar -->
    <div class="flex flex-col md:flex-row md:items-center gap-2 mb-4">
      <InputText
        v-model="search"
        :placeholder="searchPlaceholder"
        class="w-full md:w-72"
      />
      <Button
        icon="pi pi-filter"
        label="Filter"
        class="!bg-gray-100 !text-gray-700 border border-gray-300"
        outlined
        @click="onFilter"
      />
      <Button
        icon="pi pi-sort-alt"
        label="Sort"
        class="!bg-gray-100 !text-gray-700 border border-gray-300"
        outlined
        @click="toggleSort"
      />
    </div>
    <DataTable
      :value="filteredData"
      class="w-full"
      :rows="rows"
      paginator
      :sortField="sortField"
      :sortOrder="sortOrder"
      @sort="onSort"
    >
      <template v-for="col in columns" :key="col.field">
        <Column
          :field="col.field"
          :header="col.header"
          :sortable="col.sortable !== false"
        >
          <template v-if="col.body" #body="slotProps">
            <component :is="col.body" v-bind="slotProps" />
          </template>
        </Column>
      </template>
    </DataTable>
    <div v-if="filteredData.length === 0" class="text-gray-400 text-center py-8">
      No data found.
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

const props = defineProps({
  data: { type: Array, required: true },
  columns: { type: Array, required: true },
  rows: { type: Number, default: 5 },
  searchPlaceholder: { type: String, default: 'Search...' }
});

const search = ref('');
const sortField = ref('');
const sortOrder = ref(1);

const filteredData = computed(() => {
  if (!search.value) return props.data;
  return props.data.filter(row =>
    Object.values(row).some(
      val =>
        String(val)
          .toLowerCase()
          .includes(search.value.toLowerCase())
    )
  );
});

function onSort(event) {
  sortField.value = event.sortField;
  sortOrder.value = event.sortOrder;
}

function onFilter() {
  // You can open a filter modal or implement advanced filtering here
  alert('Filter button clicked! (implement filter logic)');
}

function toggleSort() {
  // Toggle sort order for demonstration
  sortOrder.value = sortOrder.value === 1 ? -1 : 1;
}
</script>