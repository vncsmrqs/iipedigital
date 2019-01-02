<template>
    <div class="card card-default">
        <div class="card-header">
            Clientes / Cadastrar
        </div>
        <div class="card-body">
            <div class="cadastrar-cliente">
                <form @submit.prevent="salvar">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Vinicius Marques da Silva">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tipo">Tipo de Pessoa</label>
                            <select id="tipo" class="form-control">
                                <option selected value="fisica">Física</option>
                                <option value="juridica">Jurídica</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cpf_cnpj">CPF/CNPJ</label>
                            <input type="text" class="form-control" id="cpf_cnpj" placeholder="111.111.111-11">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" class="form-control" id="logradouro" placeholder="Rua das Flores">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="numero">Número</label>
                            <input type="number" class="form-control" id="numero">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'cadastrar-cliente',
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

