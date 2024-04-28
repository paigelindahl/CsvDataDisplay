<template>
    <h1>Upload CSV File</h1>
    <form enctype="multipart/form-data" @submit.prevent="uploadCsv">
        <input type="file" name="csvFile" ref="csvInput" >
        <button type="submit">Upload</button>
    </form>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

const csvInput = ref(null);
const emits = defineEmits(['successCsv']);

const uploadCsv = function(e) {
    const csvFile = csvInput.value.files[0];

    const data = new FormData();
    data.append('csvFile', csvFile)

    axios.post(route('csv.handle'), data, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
    })
    .then(res => {
        console.log('it worked', res.data);
        emits('successCsv', res.data);
    }).catch(err => {
        console.log('err', err);
    })
}
</script>
