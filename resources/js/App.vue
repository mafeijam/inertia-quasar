<template lang="pug">
  q-layout(view="hHh lpR fFf")
    q-drawer(v-model="drawer" bordered :width="200" content-class="bg-blue-grey-1")
      q-list
        q-item(clickable v-ripple @click="$inertia.visit('/')" :active="$page.url == '/'")
          q-item-section home
        q-item(clickable v-ripple @click="$inertia.visit('/about')" :active="$page.url == 'about'")
          q-item-section about
        q-item(clickable v-ripple @click="$inertia.visit('/translate')" :active="$page.url == 'translate'")
          q-item-section translate

    q-header.shadow-1
      q-toolbar.bg-blue-grey-9
        q-btn(flat @click="drawer = !drawer" round dense icon="menu")
        q-toolbar-title laravel quasar
        q-btn(flat @click="" round dense icon="fas fa-bell fa-btn-sm")
        q-btn.q-ml-xs(flat @click="" round dense icon="fas fa-user fa-btn-sm")
    q-page-container.bg-grey-1
      q-page.q-pa-md
        slot
</template>

<script>
export default {
  data() {
    return {
      drawer: true
    }
  },
  watch: {
    '$page.flash': {
      handler(val) {
        if (val) {
          this.$q.notify({
            color: 'teal-5',
            message: val,
            position: 'top',
            onDismiss: _ => {
              this.$page.flash = null
            }
          })
        }
      },
      immediate: true
    }
  }
}
</script>
