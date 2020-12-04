<template>
    <div 
    v-if="isModalVisible"
    style="background-color: rgba(0,0,0,.5);"
    class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto" :class="size">
            <div class="bg-white shadow-lg rounded-t-lg">
                <div class="modal-body px-8 py-8">
                    <div class="flex items-center w-full">
                        <div class="w-1/2 mr-2">
                            <label class="text-sm">Start Recurring Date</label>
                            <div>
                                <input type="date" v-model="formData.startRecur" class="rounded-md w-full border-gray-300 shadow text-sm text-gray-500 focus:ring focus:ring-blue-300" placeholder="Format 2020-01-01" />
                            </div>
                        </div>
                        <div class="w-1/2">
                            <label class="text-sm">End Recurring Date</label>
                            <div>
                                <input type="date" v-model="formData.endRecur" class="rounded-md w-full border-gray-300 shadow text-sm text-gray-500 focus:ring focus:ring-blue-300" placeholder="Form 2020-01-01" />
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center w-full mt-2">
                        <div class="w-1/2 mr-2">
                            <label class="text-sm">Start Time</label>
                            <div>
                                <input type="time" v-model="formData.startTime" class="rounded-md w-full border-gray-300 shadow text-sm text-gray-500 focus:ring focus:ring-blue-300" placeholder="ex. 08:00:00 or 13:00:00" />
                            </div>
                        </div>
                        <div class="w-1/2">
                            <label class="text-sm">End Time</label>
                            <div>
                                <input type="time" v-model="formData.endTime" class="rounded-md w-full border-gray-300 shadow text-sm text-gray-500 focus:ring focus:ring-blue-300" placeholder="Enter end time." />
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center w-full mt-8">
                        <div class="w-1/3 mr-2">
                            <label class="text-sm">Day of week to be applied</label>
                            <div>
                                <input type="number" v-model="formData.daysOfWeek" class="rounded-md w-full border-gray-300 shadow text-sm focus:ring focus:ring-blue-300" placeholder="Enter a number 0-6" />
                            </div>
                        </div>
                        <div class="w-1/3 mr-2">
                            <label class="text-sm">Background Color</label>
                            <div>
                                <input type="text" v-model="formData.backgroundColor" class="rounded-md w-full border-gray-300 shadow text-sm focus:ring focus:ring-blue-300" placeholder="ex. #000000 or rgb(1, 2, 3)" />
                            </div>
                        </div>
                        <div class="w-1/3">
                            <label class="text-sm">Border Color</label>
                            <div>
                                <input type="text" v-model="formData.borderColor" class="rounded-md w-full border-gray-300 shadow text-sm focus:ring focus:ring-blue-300" placeholder="ex. #000000 or rgb(1, 2, 3)" />
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
    props: {
        size: {
            type: String,
            required: false,
            default: 'max-w-4xl'
        }
    },

    data () {
        return {
            formData: {},
            isModalVisible: false
        }
    },

    mounted () {
        this.$root.$on('display::modal', () => {
            this.isModalVisible = true
        })
    },

    methods: {
        submit () {
            // submit to an endpoint and save in the database.
        }
    }
}
</script>