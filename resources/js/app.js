import { createApp } from 'vue/dist/vue.esm-bundler';
import CheckForm from './components/CheckForm.vue';

const app = createApp({
    components: {
        'check-form' : CheckForm,
    }
});

app.mount('#app');

