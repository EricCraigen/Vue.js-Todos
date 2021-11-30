<template>
    <div class="fixed inset-0 bg-jet bg-opacity-75 flex justify-center items-center pointer-events-none z-10">
        <div class="flex flex-col w-full md:w-2/5 bg-bone border border-raisin rounded-md shadow-lg pointer-events-auto">
            <header class="flex p-3 justify-between items-center relative">
                <slot name="header">
                    This is the default title!
                </slot>
                <button type="button"
                        class=""
                        @click.stop="close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-raisin font-extrabold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </header>

            <section class="flex p-3 justify-center items-center relative">
                <slot name="body">
                    <div class="flex flex-col w-full justify-center items-center gap-5">
                        <input class="bg-jet bg-opacity-50 w-full rounded-md shadow-md text-bone" type="text" v-model="item.name" placeholder="Learn Vue Routing" />
                        <input class="bg-jet bg-opacity-50 w-full rounded-md shadow-md text-bone" type="text" v-model="item.group" placeholder="Vue.js" />
                    </div>

                </slot>
            </section>

            <footer class="flex p-3 justify-between items-center relative">
                <slot name="footer">
                    <button @click.stop="close" class="inline-flex items-center justify-center px-2 py-1 bg-rose text-lg font-semibold rounded-md shadow-md border border-raisin hover:bg-red-600">
                        Close
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-bone ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    <button @click.stop="addItem" class="inline-flex items-center justify-center px-2 py-1 bg-moss text-lg font-semibold rounded-md shadow-md border border-raisin hover:bg-glaucous">
                        Submit
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-bone ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </slot>
            </footer>
        </div>
    </div>
</template>

<style>

    input::placeholder {
        color: #ECE2D0;
    }

</style>

<script>
  export default {
    name: 'modal',
    data() {
        return {
            item: {
                    name: '',
                    group: '',
            }
        };
    },
    methods: {
        close() {
            this.$emit('close');
        },
        addItem() {
            if (this.item.name == '') {
                return;
            }

            axios.post('api/item/store', {
                item: this.item
            })
            .then(response => {
                if (response.status == 201) {
                    this.item.name = '';
                    this.item.group = '';

                }
            })
            .catch( error => {
                console.log(error);
            });
            this.$emit('close');
            this.$emit('itemchanged');
        }
    },
  };
</script>
