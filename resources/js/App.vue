<template>
    <div class="container">
        <div class="upload-container">
            <CsvForm @successCsv="showData"></CsvForm>
        </div>

        <div v-show="revealTable" class="search-container">
            <SearchBar @searching="filterResults"></SearchBar>
        </div>

        <div class="table-container">
            <CsvTable v-show="revealTable" :data="filterableData" :keys="keys"></CsvTable>
        </div>
    </div>
</template>

<style>
.container {
    padding: 16px;
    margin-top: 25px;
    max-width: 90rem;
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

.table-container {
    overflow-x: scroll;
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
        // for time im only filtering by the first key name which in the example csv is Customer
        const key = keys.value[0];
        return item[key].toLowerCase().includes(input.toLowerCase());
    });
    filterableData.value = filteredResults;
}

</script>
