<template>
<div class="flex w-full">
    <FullCalendar :options="calendarOptions" />
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
        dayMaxEventRows: 4,
        eventTimeFormat: { // like '14:30:00'
          hour: '2-digit',
          minute: '2-digit',
          second: '2-digit',
          hour12: true
        },
        events: [
          {
            daysOfWeek: [ '1' ],
            classNames: 'cursor-pointer',
            startRecur: '2020-12-01',
            endRecur: '2020-12-30',
            startTime: '08:00:00',
            endTime: '09:00:00',
            display: 'block',
            backgroundColor: 'rgba(139, 92, 246, var(--tw-bg-opacity))',
            borderColor: 'rgba(139, 92, 246, var(--tw-bg-opacity))'
          },
          {
            daysOfWeek: [ '1' ],
            classNames: 'cursor-pointer',
            startRecur: '2020-12-01',
            endRecur: '2020-12-30',
            startTime: '09:00:00',
            endTime: '10:00:00',
            display: 'block',
            backgroundColor: 'rgba(99, 102, 241, var(--tw-bg-opacity))',
            borderColor: 'rgba(99, 102, 241, var(--tw-bg-opacity))'
          },
          {
            daysOfWeek: [ '1' ],
            classNames: 'cursor-pointer',
            startRecur: '2020-12-01',
            endRecur: '2020-12-30',
            startTime: '12:00:00',
            endTime: '13:00:00',
            display: 'block',
            backgroundColor: 'rgba(59, 130, 246, var(--tw-bg-opacity))',
            borderColor: 'rgba(59, 130, 246, var(--tw-bg-opacity))'
          },
          {
            daysOfWeek: [ '2' ],
            classNames: 'cursor-pointer',
            startRecur: '2020-12-01',
            endRecur: '2020-12-30',
            startTime: '08:00:00',
            endTime: '09:00:00',
            display: 'block',
            backgroundColor: 'rgba(139, 92, 246, var(--tw-bg-opacity))',
            borderColor: 'rgba(139, 92, 246, var(--tw-bg-opacity))'
          },
          {
            daysOfWeek: [ '2' ],
            classNames: 'cursor-pointer',
            startRecur: '2020-12-01',
            endRecur: '2020-12-30',
            startTime: '09:00:00',
            endTime: '10:00:00',
            display: 'block',
            backgroundColor: 'rgba(99, 102, 241, var(--tw-bg-opacity))',
            borderColor: 'rgba(99, 102, 241, var(--tw-bg-opacity))'
          },
          {
            daysOfWeek: [ '2' ],
            classNames: 'cursor-pointer',
            startRecur: '2020-12-01',
            endRecur: '2020-12-30',
            startTime: '12:00:00',
            endTime: '13:00:00',
            display: 'block',
            backgroundColor: 'rgba(59, 130, 246, var(--tw-bg-opacity))',
            borderColor: 'rgba(59, 130, 246, var(--tw-bg-opacity))'
          }
        ]
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
      }
  }
}
</script>