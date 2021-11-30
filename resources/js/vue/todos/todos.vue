<template>
    <div class="flex flex-col w-full">
        <div class="flex w-full justify-between text-bone">
            <h2 id="title" class="text-md md:text-2xl font-bold">
                Todo's List
            </h2>
            <add-todo-form v-on:reloadlist="getList()" />
        </div>
        <list-view :items="items"
                   v-on:reloadlist="getList()" />
    </div>
</template>


<script>
import AddTodoForm from './components/addTodoForm.vue';
import listView from './components/listView.vue';
export default {
    components: {
        listView,
        AddTodoForm
    },
    data: function() {
        return {
            items: [],
        }
    },
    methods: {
        getList() {
            axios.get('api/items')
            .then(response => {
                this.items = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    },
    created() {
        this.getList();
    }
}
</script>
