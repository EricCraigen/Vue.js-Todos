<template>
    <div v-on:itemchanged="itemchanged()">
        <button @click="showModal" class="inline-flex items-center justify-center px-2 py-1 bg-moss text-lg font-semibold rounded-md shadow-md border border-raisin hover:bg-glaucous">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-bone mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Create Todo
        </button>
        <modal v-show="isModalVisible"
               @close="closeModal">
            <template v-slot:header>
                <h3 class="text-raisin text-xl font-bold">
                    Create a new todo
                </h3>
            </template>
        </modal>
    </div>
</template>

<script>
import Modal from '../../components/modal.vue';

export default {
    components: {
        Modal,
    },
    data() {
        return {
            isModalVisible: false,
        };
    },
    methods: {
        showModal() {
            console.log('showModal => true');
            this.isModalVisible = true;
        },
        closeModal() {
            console.log('showModal => false');
            this.isModalVisible = false;
        },
        itemchanged() {
            this.$emit('reloadlist');
        }
    }
}
</script>
