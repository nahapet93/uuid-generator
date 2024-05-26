<script setup>
import {ref} from "vue";
import axios from "axios";

const uuids = ref([]);

axios.get('/api/uuid/list')
    .then(response => {
        uuids.value = response.data.data;
    });

function generate() {
    axios.post('/api/uuid/generate')
        .then(response => {
            uuids.value = [...uuids.value, response.data.data];
        });
}

function remove(id) {
    axios.delete(`/api/uuid/delete/${id}`)
        .then(response => {
            uuids.value = uuids.value.filter(uuid => uuid.id !== response.data.data.id);
        });
}
</script>

<template>
    <div class="card-body">
        <div v-if="uuids.length">
            <h5 class="text-center text-xl font-bold">UUIDs</h5>
            <ul class="mb-0 font-mono">
                <li v-for="uuid in uuids" :key="uuid.id">
                    {{ uuid.id }}.
                    <a class="underline" :href="'#/uuid/' + uuid.id">{{ uuid.value }}</a>
                    <button class="ml-2" title="Remove"
                            type="button"
                            @click="remove(uuid.id)">
                        ❌
                    </button>
                </li>
            </ul>
        </div>
        <div v-if="!uuids.length" class="text-center">
            <h5 class="card-header text-center">Nothing found</h5>
        </div>

        <div class="text-center">
            <button type="button"
                    @click="generate"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Generate
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
