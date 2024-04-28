<template>
    <div>
        <table>
            <tr>
                <th>Customer</th>
                <th>Site</th>
                <th>Year</th>
                <th>Month</th>
                <th>Waste Type</th>
                <th>Estimated quantity (kg)</th>
                <th>Actual quantity (kg)</th>
            </tr>
            <tr v-for="item in data">
                <td>{{ item['Customer'] }}</td>
                <td>{{ item['Site'] }}</td>
                <td>{{ item['Year'] }}</td>
                <td>{{ findMonthName(item['Month']) }}</td>
                <td>{{item['Waste Type'] }}</td>
                <td>{{ item['Estimated quantity (kg)'] }}</td>
                <td>{{ item['Actual quantity (kg)'] }}</td>
            </tr>
        </table>
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
}
</style>

<script setup>
import { useFindMonthName } from '@/Composables/useFindMonthName.js';

const props = defineProps({
    data: Array,
})

const { findMonthName } = useFindMonthName();

</script>
