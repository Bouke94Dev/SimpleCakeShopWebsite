import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import './assets/style.css'
// Font Awesome core en iconen importeren
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUser, faHome, faBasketShopping } from '@fortawesome/free-solid-svg-icons' // kies hier je icons
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// Voeg iconen toe aan de library
library.add(faUser, faHome, faBasketShopping)

const app = createApp(App)

// Registreer FontAwesome component globaal
app.component('font-awesome-icon', FontAwesomeIcon)

app.use(createPinia())
app.use(router)

app.mount('#app')
