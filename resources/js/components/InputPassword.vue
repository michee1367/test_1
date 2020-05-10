<template>

    <div>
        <p>
                <input :type="show ? 'text' : 'password'" name="name" >
                <input type="checkbox" id="" v-model="show">
        </p>
    </div>

</template>
<script>
    export default {
        
        data(){
            return {
                show : false,
            }
        }
    }
</script>