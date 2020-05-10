<template>

    <div>
        <h3>Choix Intrant</h3>
        <b-list-group v-for="fss_intrant in fss_intrants" :key="fss_intrant.nom_fss_intrant">
            <b-list-group-item>
                
                <b-button block variant="primary" @click="getIdsFss(fss_intrant.id)">{{fss_intrant.nom_intrant}}</b-button>
            
            </b-list-group-item>
        </b-list-group>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get("/intrants/index").then(({data}) =>{
                this.fss_intrants = data
                console.log(data)
            })
            console.log('Component mounted.')
        },
        data() {
            return {
                fss_intrants : [],
                
            }
        },
        methods : {
            getIdsFss(idIntrant){

                axios.get('/ids_fss_intrant/'+idIntrant).then(({data})=>{
                    this.$emit("choix_intrant", data)
                    //console.log(data)
                })
                //console.log('/ids_fss_intrant/'+idIntrant)
            }
        }
    }
</script>
