import Home from '../components/Home'
import Login from '../components/auth/Login'
import PageNotFound from '../components/pages/PageNotFound'
import UnauthorizedAccess from '../components/pages/UnauthorizedAccess'

import ListarVendas from '../components/vendas/Listar'
import CadastrarVenda from '../components/vendas/Cadastrar'
import DetalharVenda from '../components/vendas/Detalhar'

import ListarClientes from '../components/clientes/Listar'
import CadastrarCliente from '../components/clientes/Cadastrar'
import EditarCliente from '../components/clientes/Editar'
import DetalharCliente from '../components/clientes/Detalhar'

import ListarProdutos from '../components/produtos/Listar'
import CadastrarProduto from '../components/produtos/Cadastrar'
import EditarProduto from '../components/produtos/Editar'
import DetalharProduto from '../components/produtos/Detalhar'

import MainContainer from '../components/containers/MainContainer'

export const routes = [
    {
        path: '/',
        component: MainContainer,
        meta: {
            requiresAuth: true,
        },
        children: [
            {
                path: '/',
                name: 'Home',
                component: Home
            },
            {
                path: 'clientes',
                name: 'Clientes',
                component: {
                  render (c) { return c('router-view') }
                },
                children: [
                  {
                    path: 'cadastrar',
                    name: 'CadastrarCliente',
                    component: CadastrarCliente
                  },
                  {
                    path: 'editar',
                    name: 'EditarCliente',
                    component: EditarCliente
                  },
                  {
                    path: '/',
                    name: 'ListarClientes',
                    component: ListarClientes
                  },
                  {
                    path: 'detalhar/:id',
                    name: 'DetalharCliente',
                    component: DetalharCliente
                  },
                ]
              },
              {
                path: 'Produtos',
                name: 'Produtos',
                meta: {
                    requiresAdmin: true,
                },
                component: {
                  render (c) { return c('router-view') }
                },
                children: [
                  {
                    path: '/',
                    name: 'ListarProdutos',
                    component: ListarProdutos
                  },
                  {
                    path: 'cadastrar',
                    name: 'CadastrarProduto',
                    component: CadastrarProduto
                  },
                  {
                    path: 'editar',
                    name: 'EditarProduto',
                    component: EditarProduto
                  },
                  {
                    path: 'detalhar/:id',
                    name: 'DetalharProduto',
                    component: DetalharProduto
                  },
                ]
              },
              {
                path: 'vendas',
                name: 'Vendas',
                component: {
                  render (c) { return c('router-view') }
                },
                children: [
                  {
                    path: 'cadastrar',
                    name: 'CadastrarVenda',
                    component: CadastrarVenda
                  },
                  {
                    path: '/',
                    name: 'ListarVendas',
                    component: ListarVendas
                  },
                  {
                    path: 'detalhar/:id',
                    name: 'DetalharVenda',
                    component: DetalharVenda
                  },
                ]
              },
            {
                path: '/404',
                component: PageNotFound
            },
            {
                path: '/503',
                component: UnauthorizedAccess
            },
        ],
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/*',
        redirect: '/404'
    },
]