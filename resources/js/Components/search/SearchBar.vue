<template>
<div>
    <form>
        <input type="text" v-model="searchInput" class="search-input" placeholder="Search..."/>
    </form>
</div>

</template>

<style>
    .search-input {
        border-radius: 20px;
        padding: 8px;
        width: 250px;
    }
</style>

<script setup>
import { watch, ref } from 'vue';

const searchInput = ref('');

const emits = defineEmits(['searching']);

watch(searchInput, (newValue, oldValue) => {
    emits('searching', searchInput.value);
})

</script>
