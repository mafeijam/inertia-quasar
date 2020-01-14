<template lang="pug">
  .fullscreen.row.items-center.justify-center.bg-blue-grey-1
    q-card.shadow-1(style="width: 350px;")
      q-toolbar.bg-blue-grey-9.text-white
        q-toolbar-title 超勁系統
      q-card-section.q-pa-lg
        q-form.q-gutter-lg
          q-input(label="email" v-model="form.email" filled square dense type="email")
            template(v-slot:prepend)
              q-icon(name="fas fa-envelope fa-input-sm")
          q-input(label="password" v-model="form.password" filled square dense type="password")
            template(v-slot:prepend)
              q-icon(name="fas fa-lock fa-input-sm")
          .row.justify-between.items-center
            q-checkbox(label="保持登入" v-model="form.remember" dense)
            a.text-blue.text-right(href="#") 忘記密碼
          .row
            q-btn.full-width(color="indigo" icon="fas fa-sign-in-alt q-mr-md fa-btn-sm") 登入
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null,
        remember: false
      }
    }
  }
}
</script>
