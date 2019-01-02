<template>
    <h1>{{ welcome }}</h1>
</template>

<script>
    export default {
        name: 'home',
        computed: {
            welcome(){
                return this.$store.getters.welcomeMessage
            }
        },
    }
</script>
