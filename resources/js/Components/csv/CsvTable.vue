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
}

td {
    text-align: center;
    padding: 5px;
}

th {
    padding-bottom: 10px;
    font-size: 18px;
}

.no-results {
    display: flex;
    justify-content: center;
    font-size: 18px;
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
