require('./bootstrap')
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'

import { routes } from './routes/routes'
import MainStore from './store/store'
import MainApp from './components/MainApp'
import Axios from 'axios';

Vue.use(VueRouter)
Vue.use(Vuex)

const store = new Vuex.Store(MainStore)

const router = new VueRouter({
    routes,
    mode: 'history'
})

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some( record => record.meta.requiresAuth)
    const requiresAdmin = to.matched.some( record => record.meta.requiresAdmin)
    //const requiresAdmin = to.matched.some( record => record.meta.requiresAdmin)
    const currentUser = store.state.currentUser

    if(requiresAuth && !currentUser){
        next('/login')
    }else if (to.path == "/login" && currentUser){
        next('/')
    }else if(requiresAdmin && currentUser.admin=="0"){
        next('/503')
    }else{
        next()
    }

})

Axios.interceptors.response.use(null, (error) => {
    if(error.response.status = 401){
        state.commit('logout')
        state.commit('tokenExpirado')
        router.push('/login')
    }

    return Promise.reject(error)
})

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        MainApp,
    }
});
