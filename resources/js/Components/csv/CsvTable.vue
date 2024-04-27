<template>
    <div>
        <table>
            <th>
                <td>Customer</td>
                <td>Site</td>
                <td>Year</td>
                <td>Month</td>
                <td>Waste Type</td>
                <td>Estimated quantity (kg)</td>
                <td>Actual quantity (kg)</td>
            </th>
            <tr v-for="item in data">
                <td>{{ item['Customer'] }}</td>
                <td>{{ item['Site'] }}</td>
                <td>{{ item['Year'] }}</td>
                <td>{{ item['Month'] }}</td>
                <td>{{item['Waste Type'] }}</td>
                <td>{{ item['Estimated quantity (kg)'] }}</td>
                <td>{{ item['Actual quantity (kg)']}}</td>
            </tr>
        </table>
    </div>
</template>

<style>
table {
    width: 100%;
}
</style>

<script setup>

const props = defineProps({
    data: Array,
})
</script>
