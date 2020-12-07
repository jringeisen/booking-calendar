<template>
<div class="flex w-full">
    <add-to-calendar-modal />
    <FullCalendar :options="calendarOptions" />
</div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import AddToCalendarModal from './AddToCalendarModal'

export default {
  components: {
    FullCalendar,
    AddToCalendarModal
  },

  data() {
    return {
      events: [],
      isVisible: false,
      calendarOptions: {
        plugins: [ dayGridPlugin ],
        initialView: 'dayGridMonth',
        height: 'auto',
        dateClick: this.handleDateClick,
        eventDrop: this.handleEventDrop,
        eventClick: this.handleEventClick,
        dayMaxEventRows: 4,
        customButtons: {
          addToCalendar: {
            text: 'Add Time',
            click: this.addToCalendarClicked
          }
        },
        headerToolbar: {
          left: 'title',
          right: 'addToCalendar today prev,next'
        },
        eventTimeFormat: {
          hour: '2-digit',
          minute: '2-digit',
          second: '2-digit',
          hour12: true
        },
        events: '/events'
      }
    }
  },

  methods: {
      handleDateClick (date) {
          alert(date.dateStr)
          // handle the date click.
      },

      handleEventDrop (event) {
          console.log(event)
          // method to handle when an event has been dropped.
      },

      handleEventClick (event) {
          console.log(event)
          alert('start: ' + event.event.startStr + ' end: ' + event.event.endStr)
          // method to handle when an event has been clicked.
      },

      handleDrop (data) {
        // method to handle outside event thats dropped on calendar.
      },

      addToCalendarClicked () {
        this.$root.$emit('display::modal')
      }
  }
}
</script>