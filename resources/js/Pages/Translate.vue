<template lang="pug">
  .row
    .col-4
      q-card.shadow-1
        q-card-section.bg-amber-9.text-white
          .text-subtitle1 輸入資料
        q-card-section.q-pa-lg
          q-form.q-gutter-sm
            q-input(label="en" v-model="form.en" filled square :error="!!$page.errors.en")
            q-input(label="zh" v-model="form.zh" filled square :error="!!$page.errors.zh")
            .row
              q-btn.full-width(color="indigo" icon="fas fa-save q-mr-md fa-btn-sm" size="lg" @click="submit") 保存
            pre {{ $page.errors }}
</template>

<script>
import layout from '../App.vue'
export default {
  layout,
  data() {
    return {
      form: {
        en: '',
        zh: ''
      }
    }
  },
  methods: {
    submit() {
      for (const k in this.$page.errors) {
        this.$page.errors[k] = false
      }
      this.$inertia.post('/translate', this.form)
    }
  }
}
</script>
