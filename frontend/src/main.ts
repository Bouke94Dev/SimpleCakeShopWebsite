import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import './assets/style.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUser, faHome, faBasketShopping } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// here I add the fa icons I use for the project
library.add(faUser, faHome, faBasketShopping)

const app = createApp(App)

// Register fontawesome icons in here so i can use them
app.component('font-awesome-icon', FontAwesomeIcon)
 
app.use(createPinia())
app.use(router)

app.mount('#app')
