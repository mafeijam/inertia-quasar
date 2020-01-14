<template lang="pug">
  q-card.shadow-1
    q-tabs(v-model="tab" dense narrow-indicator align="left")
      q-tab(name="a" label="foo")
      q-tab(name="b" label="bar")
    q-separator
    q-tab-panels(v-model="tab")
      q-tab-panel(name="a")
      q-tab-panel(name="b")
        q-markup-table(flat dense)
          thead
            tr
              th.text-left 123
              th.text-left 456
          tbody
            tr
              td.text-left hi
              td.text-left yo
</template>

<script>
import layout from '../App.vue'

export default {
  layout,
  data() {
    return {
      tab: 'a'
    }
  }
}
</script>
