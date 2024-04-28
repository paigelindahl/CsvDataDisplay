<template>
    <div>
        <div class="icon-container">
            <UploadIcon class="icon"></UploadIcon>
        </div>
        <h1>Upload your CSV file</h1>
        <form enctype="multipart/form-data" @submit.prevent="uploadCsv">
            <input type="file" name="csvFile" ref="csvInput" @change="allowSubmit" accept=".csv, .xlsx">
            <button type="submit" :disabled="disabled">Upload</button>
        </form>
    </div>
</template>

<style scoped>
h1 {
    size: 40px;
    color: #404040;
    text-align: center;
}

.icon {
    width: 100px;
}

.icon-container {
    display: flex;
    justify-content: center;
}

.upload-container > div {
    border: 1px solid orange;
    padding: 70px;
    border-radius: 20px
}

@media(max-width: 600px) {
    .upload-container > div {
        padding: 20px;
    }
}

.upload-container form {
    display: flex;
    flex-direction: column;
}

.upload-container form input {
    align-self: end;
}

.upload-container form button {
    margin-top: 20px;
    padding-top: 12px;
    padding-bottom: 12px;
    border-radius: 20px;
    font-size: 20px;
    background: linear-gradient(#ff5d51, #ff8e4a);
    color: white;
    border: transparent;
    outline: none;
    transition: transform 0.4s;
}

.upload-container form button:hover {
    transform: scale(1.05);
    background: linear-gradient(#e55348, #e57f42);
}

</style>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
import UploadIcon from '@/Components/icons/UploadIcon.vue';

const csvInput = ref(null);
const emits = defineEmits(['successCsv']);
const disabled = ref(true);

const allowSubmit = function() {
    disabled.value = false;
}

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
        emits('successCsv', res.data);
    }).catch(err => {
        console.log('err', err.message);
    })
}
</script>
