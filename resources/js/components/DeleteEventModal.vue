<template>
    <div 
    v-if="isModalVisible"
    style="background-color: rgba(0,0,0,.5);"
    class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto" :class="size">
            <div class="bg-white shadow-lg rounded-t-lg">
                <div class="modal-body px-8 py-8">
                    <div class="rounded-md bg-red-50 p-4">
                        <div class="flex">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-red-800">
                                    Are you sure you want to delete this recurring event?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 rounded-b-lg p-4">
                <div class="flex justify-end items-center">
                    <button @click.prevent="isModalVisible = false" class="bg-white px-4 py-2 rounded-md mr-3 shadow focus:outline-none focus:ring focus:ring-blue-300 hover:bg-gray-100">Cancel</button>
                    <button @click.prevent="submit" class="bg-gray-400 text-gray-800 px-4 py-2 rounded-md shadow focus:outline-none focus:ring focus:ring-blue-300 hover:bg-gray-600 hover:text-gray-100">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DeleteEventModal',
    props: {
        size: {
            type: String,
            required: false,
            default: 'max-w-4xl'
        }
    },

    data () {
        return {
            isModalVisible: false,
            eventId: ''
        }
    },

    mounted () {
        this.$root.$on('display::modal', (payload) => {
            if (payload.name === this.$options.name) {
                this.isModalVisible = true
                this.eventId = payload.event.event.id
            }
        })
    },

    methods: {
        submit () {
            // submit to an endpoint and save in the database.
            axios.delete(`/events/${this.eventId}`).then((response) => {
                this.isModalVisible = false
                this.$root.$emit('update::events')
            })
        }
    }
}
</script>