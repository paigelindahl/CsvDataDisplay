<template>
    <CsvForm @successCsv="showData"></CsvForm>
    <CsvTable v-show="csvData.length" :data="csvData"></CsvTable>
</template>

<script setup>
import CsvForm from '@/Components/csv/CsvForm.vue';
import CsvTable from '@/Components/csv/CsvTable.vue';
import { ref } from 'vue';

const csvData = ref([]);

const showData = function(data) {
    csvData.value = data.data;
    console.log('dataaa', data.data);
}

</script>
