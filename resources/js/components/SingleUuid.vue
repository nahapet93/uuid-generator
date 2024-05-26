<script setup>
import {ref} from "vue";
import axios from "axios";

const uuid = ref(null);
const id = window.location.hash.split('/')[2];

axios.get(`/api/uuid/retrieve/${id}`)
    .then(response => {
        uuid.value = response.data.data;
    });
</script>

<template>
    <div class="card-body">
        <div v-if="uuid">
            <h5 class="text-center text-xl font-bold">UUID</h5>
            {{ uuid.id }}. {{ uuid.value }}
        </div>
        <div v-if="!uuid" class="text-center">
            <h5 class="card-header text-center">Not found</h5>
        </div>
    </div>
</template>

<style scoped>

</style>
