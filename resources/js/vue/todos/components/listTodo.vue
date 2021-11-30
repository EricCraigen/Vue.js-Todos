<template>
    <div>
        <div class="w-full flex items-center justify-between p-6 space-x-6">
            <div class="flex-1 truncate">
                <h3 :class="[item.completed ? 'line-through' : '']" class="text-gray-900 text-2xl font-medium truncate">
                    {{ item.name }}
                </h3>
                <div class="flex items-center justify-between mb-5">
                    <span :class="[item.status == 1 ? 'bg-moss' : item.status == 2 ? 'bg-rose' : 'bg-jet bg-opacity-60']" class="flex-shrink-0 inline-block px-2 py-0.5 text-raisin text-xs font-medium bg-green-100 rounded-full">
                        {{ item.status == 1 ? 'Normal' : item.status == 2 ? 'Urgent' : 'Snoozed' }}
                    </span>
                    <h3 class="mt-1 text-gray-500 text-md truncate">
                        <span class="text-raisin">Group:</span> {{ item.group }}
                    </h3>
                </div>
                <div class="flex items-center w-full p-3">
                    <input :class="[item.completed ? 'bg-rose' : 'bg-jet']" class="bg-opacity-50 border border-raisin w-6 h-6 rounded-md shadow-md text-bone mr-3" type="checkbox" @change="updateCheck()" v-model="item.completed">
                    <h3 class="text-raisin">
                        Complete Todo
                    </h3>
                </div>
            </div>
        </div>
        <div>
            <div class="-mt-px flex divide-x divide-raisin">
                <div class="w-0 flex-1 flex">
                    <a @click="removeTodo()" href="#" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-raisin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span class="ml-3">Delete</span>
                    </a>
                </div>
                <div class="-ml-px w-0 flex-1 flex">
                    <a href="#" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                        <span class="mr-3">Edit</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-raisin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item'],
    methods: {
        updateCheck() {
            axios.put('api/item/' + this.item.id, {
                item: this.item
            })
            .then(response => {
                if (response.status == 200) {
                    this.$emit('itemchanged');
                }
            })
            .catch(error => {
                console.log(error);
            });
        },
        removeTodo() {
            axios.delete('api/item/' + this.item.id, {
                item: this.item
            })
            .then(response => {
                if (response.status == 200) {
                    this.$emit('itemchanged');
                }
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>
