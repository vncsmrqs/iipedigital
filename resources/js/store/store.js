import { getLocalUser } from '../helpers/auth'
import Axios from 'axios';

const user = getLocalUser()

export default {
    state: {
        welcome: "Bem vindo",
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,
        clientes: [],
        produtos: [],
        vendas: [],
    },
    
    getters: {
        welcomeMessage(state){
            return state.welcome
        },
        isLoading(state){
            return state.loading
        },

        isLoggedIn(state){
            return state.isLoggedIn
        },

        isAdmin(state){
            return state.currentUser.admin == 1 ? true : false
        },

        currentUser(state){
            return state.currentUser
        },

        authError(state){
            return state.auth_error
        },

        clientes(state){
            return state.clientes
        },

    },

    mutations: {
        login(state){
            state.loading = true
            state.auth_error = null
        },

        loginSuccess(state, payload){
            state.auth_error = null
            state.isLoading = false
            state.isLoggedIn = true
            state.currentUser = Object.assign({}, payload.user, { token: payload.access_token })

            localStorage.setItem("user", JSON.stringify(state.currentUser))
        },

        loginFailed(state, payload){
            state.isLoading = false
            state.auth_error = payload.error
        },
        
        logout(state){
            state.currentUser = null
            state.isLoggedIn = false
            localStorage.removeItem("user")
        },

        tokenExpirado(state){
            state.auth_error = 'Token Expirado'
        },
        atualizarClientes(state, payload){
            state.clientes = payload
        },
        atualizarProdutos(state, payload){
            state.produtos = payload
        },
        atualizarVendas(state, payload){
            state.vendas = payload
        }
        
    },

    actions: {
        login(context){
            context.commit("login")
        },
        getClientes(context){
            Axios.get('api/clientes', {
                headers:{
                    "Authorization": `Bearer ${context.state.currentUser.token}`
                }
            })
            .then((response) => {
                context.commit('atualizarClientes', response.data.data)
            })
        }
    }
}