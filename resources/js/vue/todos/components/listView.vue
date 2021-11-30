<template>
    <div>
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 p-3 pt-5">
            <li v-for="(item, index) in items" :key="index" class="col-span-1 bg-bone rounded-lg shadow divide-y divide-gray-200">
                <list-todo
                    :item="item"
                    v-on:itemchanged="$emit('reloadlist')"
                />
            </li>
        </ul>
    </div>
</template>

<script>
import listTodo from './listTodo.vue';

export default {
    props: ['items'],
    components: {
        listTodo,
    }
}
</script>
