<template>
    <div>
        <table>
            <tr>
                <th v-for="(key, i) in keys" :key="i">{{ key }}</th>
            </tr>
            <tr v-for="(item, i) in data" :key="i">
                <td v-for="key in keys">{{ key === 'Month' ? findMonthName(item[key]) : item[key] }}</td>
            </tr>
        </table>
        <div v-show="!data.length" class="no-results">
            <p>No results found</p>
        </div>
    </div>
</template>

<style>
table {
    width: 100%;
    margin-top: 30px;
    min-width: 800px;
    table-layout: fixed;
    border-collapse: collapse;
}

td {
    text-align: center;
    padding: 10px;
}

th {
    padding-bottom: 10px;
    padding-top: 10px;
    font-size: 18px;
    background-color: #5d5d5d;
    color: white;
}

.no-results {
    display: flex;
    justify-content: center;
    font-size: 18px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}
</style>

<script setup>
import { useFindMonthName } from '@/Composables/useFindMonthName.js';
import { ref, onMounted, watch } from 'vue';

const props = defineProps({
    data: Array,
    keys: Array,
})

const { findMonthName } = useFindMonthName();

</script>
