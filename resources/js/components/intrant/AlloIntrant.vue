<template>
    <div>

        <b-button block variant="primary">Block Level Button</b-button>

    </div>
</template>

<script>
    export default {
        props : ['id'],
        mounted() {

        },
        data() {
            return {
                _id : id,
            }
        },
        methods : {
            getIdFss(){
                
            }
        }
    }
</script>
