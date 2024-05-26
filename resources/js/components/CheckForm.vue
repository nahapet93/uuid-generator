<script setup>
import {ref, computed} from 'vue';
import UuidList from './UuidList.vue';
import SingleUuid from './SingleUuid.vue';
import NotFound from './NotFound.vue';

const routes = {
    '/': UuidList,
    'uuid': SingleUuid
}

const currentPath = ref(window.location.hash);

window.addEventListener('hashchange', () => {
    currentPath.value = window.location.hash;
});

const currentView = computed(() => {
    return routes[currentPath.value.split('/')[1] || '/'] || NotFound
});

</script>

<template>
    <div class="card m-3">
        <component :is="currentView" />
    </div>
</template>

<style scoped>

</style>
