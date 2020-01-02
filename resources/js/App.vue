<template lang="pug">
  q-layout(view="hHh lpR fFf")
    q-drawer(v-model="drawer")
      q-list
        q-item(clickable @click="$inertia.visit('/')")
          q-item-section home
        q-item(clickable @click="$inertia.visit('/about')")
          q-item-section about
    q-header.shadow-1
      q-toolbar.bg-blue-grey-8
        q-toolbar-title laravel quasar

    q-page-container
      slot
</template>

<script>
export default {
  data() {
    return {
      drawer: true
    }
  },
  created() {
    this.$q.loadingBar.setDefaults({color: 'yellow', size: '3px'})
  }
}
</script>
