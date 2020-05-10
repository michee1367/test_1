<template>
    <div>
            <h2>Bonjour {{ name }} !</h2>
            <p>
                <input type="text" name="name" id="" v-model="name">
                <input type="checkbox" name="name" id="" v-model="checkbox">
            </p>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                name : "Michée",
                checkbox : true,
            }
        }
    }
</script>
