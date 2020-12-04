<template>
<div class="flex w-full">
  <div class="w-1/3 mr-3 p-4">
    <h1 class="text-lg font-semibold">Available Times</h1>
    <div id="draggable">
        <p class="item-class rounded-md bg-blue-400 px-2 cursor-pointer">8:00 AM</p>
        <p class="item-class rounded-md bg-blue-400 px-2 mt-1 cursor-pointer">9:00 AM</p>
        <p class="item-class rounded-md bg-blue-400 px-2 mt-1 cursor-pointer">10:00 AM</p>
        <p class="item-class rounded-md bg-blue-400 px-2 mt-1 cursor-pointer">11:00 AM</p>
        <p class="item-class rounded-md bg-blue-400 px-2 mt-1 cursor-pointer">12:00 PM</p>
        <p class="item-class rounded-md bg-blue-400 px-2 mt-1 cursor-pointer">1:00 PM</p>
    </div>
  </div>
  <div class="w-2/3">
    <FullCalendar :options="calendarOptions" />
  </div>
</div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin, { Draggable } from '@fullcalendar/interaction'

export default {
  components: {
    FullCalendar
  },

  data() {
    return {
      calendarOptions: {
        plugins: [ dayGridPlugin, interactionPlugin ],
        droppable: true,
        initialView: 'dayGridMonth',
        height: 'auto',
        dateClick: this.handleDateClick,
        eventDrop: this.handleEventDrop,
        eventClick: this.handleEventClick,
        drop: this.handleDrop,
        editable: true,
        dayMaxEventRows: 4,
        events: [
          { title: 'event 1', date: '2020-12-06' },
          { title: 'event 2', date: '2020-12-06' },
          { title: 'event 3', date: '2020-12-06' },
          { title: 'event 4', date: '2020-12-06' },
          { title: 'event 5', date: '2020-12-06' },
          { title: 'event 6', date: '2020-12-06' },
          { title: 'event 7', date: '2020-12-06' },
          { title: 'event 8', date: '2020-12-06' }
        ]
      }
    }
  },

  mounted () {
    let draggableEl = document.getElementById('draggable');
    new Draggable(draggableEl, {
      itemSelector: '.item-class'
    })
  },

  methods: {
      handleDateClick (date) {
          // handle the date click.
      },

      handleEventDrop (event) {
          console.log(event)
          // method to handle when an event has been dropped.
      },

      handleEventClick (event) {
          // method to handle when an event has been clicked.
      },

      handleDrop (event) {
        // method to handle outside event thats dropped on calendar.
      }
  }
}
</script>