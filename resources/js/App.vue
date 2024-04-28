<template>
    <div class="container">
        <div class="upload-container">
            <CsvForm @successCsv="showData"></CsvForm>
        </div>

        <div v-show="revealTable" class="search-container">
            <SearchBar @searching="filterResults"></SearchBar>
        </div>

        <CsvTable v-show="revealTable" :data="filterableData" :keys="keys"></CsvTable>
    </div>
</template>

<style>
.container {
    padding: 25px;
    max-width: 80rem;
    margin-left: auto;
    margin-right: auto;
}

.upload-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.search-container {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    margin-top: 70px;
}
</style>

<script setup>
import CsvForm from '@/Components/csv/CsvForm.vue';
import CsvTable from '@/Components/csv/CsvTable.vue';
import SearchBar from '@/Components/search/SearchBar.vue';
import { ref } from 'vue';

// keeps csvData as the master untouched list to filter through
// and displays filterableData as the results
const csvData = ref([]);
const filterableData = ref([]);
const revealTable = ref(false);
const keys = ref([]);

const showData = function(data) {
    csvData.value = data.data;
    filterableData.value = data.data;
    revealTable.value = true;
    getKeys();
}

const getKeys = function() {
    keys.value = Object.keys(csvData.value[0]);
}

const filterResults = function(input) {
    const filteredResults = csvData.value.filter((item) => {
        return item['Customer'].toLowerCase().includes(input.toLowerCase());
    });
    filterableData.value = filteredResults;
}

</script>
