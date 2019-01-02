<template>
    <div id="main-container">
        <Cabecalho />
         <div class="container">
             <div class="row justif-content-center">
                 <div class="col-md-12">
                      <router-view></router-view>
                 </div>
             </div>
         </div>
    </div>
   
</template>

<script>
    import Cabecalho from '../Header'
    
    export default {
        name: 'main-container',
        components: {
            Cabecalho
        }
    }
</script>
