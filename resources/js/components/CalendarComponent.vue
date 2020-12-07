<template>
<div class="flex w-full">
    <add-to-calendar-modal />
    <delete-event-modal />
    <FullCalendar ref="calendar" :options="calendarOptions" />
</div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import AddToCalendarModal from './AddToCalendarModal'
import DeleteEventModal from './DeleteEventModal'

export default {
  components: {
    FullCalendar,
    AddToCalendarModal,
    DeleteEventModal
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

  mounted () {
    // Refetch calendar events when and event has been created, updated, 
    // or deleted.
    this.$root.$on('update::events', () => {
      this.$refs.calendar.getApi().refetchEvents()
    })
  },

  methods: {
      handleDateClick (date) {
          // handle the date click.
      },

      handleEventDrop (event) {
          // method to handle when an event has been dropped.
      },

      handleEventClick (event) {
          this.$root.$emit('display::modal', {name: 'DeleteEventModal', event})
      },

      handleDrop (data) {
        // method to handle outside event thats dropped on calendar.
      },

      addToCalendarClicked () {
        this.$root.$emit('display::modal', 'AddToCalendarModal')
      }
  }
}
</script>