import './bootstrap'
import {createApp} from 'vue'
import { Quasar } from 'quasar'
import quasarLang from 'quasar/lang/vi'
import 'quasar/src/css/index.sass'
import App from './App.vue'
import store from './store'
import router from './router'
import '@quasar/extras/material-icons/material-icons.css'
const app = createApp(App)

app.use(store)
app.use(router)
app.use(Quasar, {
    plugins: {}, // import Quasar plugins and add here
    lang: quasarLang,
})
app.mount("#app")