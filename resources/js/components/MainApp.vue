<template>
    <div id="main">
        <router-view></router-view>
    </div>
   
</template>

<script>
    import Cabecalho from './Header'
    
    export default {
        name: 'main-app',
        components: {
            Cabecalho
        }
    }
</script>
