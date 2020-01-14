import Vue from 'vue'
import { InertiaApp } from '@inertiajs/inertia-vue'
import Quasar from 'quasar'

Vue.use(InertiaApp)

Vue.use(Quasar, {
  config: {
    loadingBar: {
      skipHijack: true
    }
  }
})

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
