import { InertiaApp } from '@inertiajs/inertia-vue'

import Vue from 'vue'
// import 'quasar/dist/quasar.min.css'
import 'quasar/dist/quasar.umd.min.js'

Vue.use(InertiaApp)

const app = document.getElementById('app')
let page = JSON.parse(app.dataset.page)

new Vue({
  metaInfo: {
    title: 'Loading…',
    titleTemplate: page.props.local ? '[local] %s | Super System' : '%s | Super System',
  },
  render: h => h(InertiaApp, {
    props: {
      initialPage: page,
      resolveComponent: name => import(/* webpackChunkName: "[request]" */ `./Pages/${name}`).then(module => module.default)
    },
  }),
}).$mount(app)
