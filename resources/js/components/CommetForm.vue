<template>
            
            <form action=""  @submit.prevent="uploadCommet">
                <hr />
                <textarea name=""  id="" cols="30" rows="10" v-model="commet"></textarea>
                <hr />
                <button>commenter</button>

            </form>
</template>
<script>
    export default {
        data(){
            return {
                commet : '',
            }
        },

        methods : {

                uploadCommet(){
                    axios.post('/comments', {
                        commet : this.commet
                    })
                    console.log(this.commet)
                }
        }
    }
</script>