<template>
    <div class="card card-default">
        <div class="card-header">
            Clientes
        </div>
        <div class="card-body">
            <div class="mb-3">
                <router-link to="clientes/cadastrar" class="btn btn-primary">Cadastrar</router-link>
            </div>
            <table class="table">
                <thead>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>CPF/CNPJ</th>
                    <th>Data de Cadastro</th>
                    <th>Ultima Atualização</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    <template v-if="!clientes.length">
                        <tr>
                            <td colspan="6" class="text-center">Nenhum cliente cadatrado</td>
                        </tr>
                    </template>
                    <template v-else>
                        <tr v-for="cliente in clientes" :key="cliente.id">
                            <td>{{ cliente.nome }}</td>
                            <td>{{ cliente.tipo }}</td>
                            <td>{{ cliente.cpf_cnpj }}</td>
                            <td>{{ cliente.created_at }}</td>
                            <td>{{ cliente.updated_at }}</td>
                            <td>
                                <router-link :to="`/clientes/detalhar/${cliente.id}`" class="btn btn-primary btn-sm">Detalhar</router-link>
                                <router-link v-if="isAdmin" :to="`/clientes/editar/${cliente.id}`"  class="btn btn-success btn-sm">Editar</router-link>
                                <button  v-if="isAdmin" type="button" class="btn btn-danger btn-sm">Excluir</button>                            
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    name: 'listar-clientes',
    mounted(){
        this.$store.dispatch('getClientes')
    },
    computed:{
        clientes(){
            return this.$store.getters.clientes
        },
        isAdmin(){
                return this.$store.getters.isAdmin
        }
    }
}
</script>

