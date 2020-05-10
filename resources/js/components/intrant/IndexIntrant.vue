<template>

    <div>
        <choix_intrant v-show="subCompo.choix_intrant" @choix_intrant = "choixIntrant($event)">
        
        </choix_intrant>

        <div v-show="subCompo.declencheur_appel">

        <div v-show="subCompo.declencheur_appel">            
            <b-button block variant="primary" :href="num_tel">Appelez </b-button>
            
            <a href="" @click.prevent = "retourChoix">
                Retour
            </a>
        </div>

        </div>
    </div>
</template>

<script>

    import ChoixIntrant from './ChoixIntrant.vue'

    export default {
        components : {choix_intrant : ChoixIntrant},
        mounted() {
        },
        data() {
            return {
                num_tel : "",
                subCompo : {
                    choix_intrant : true,
                    declencheur_appel : false,
                },

            }
        },
        methods : {
            choixIntrant (idsFss){
                this.num_tel = "tel="+idsFss.appel_telephonique
                this.subCompo.choix_intrant = false
                this.subCompo.declencheur_appel = true
                //console.log(idsFss.appel_telephonique);
            },

            afterAppel(){
                this.subCompo.choix_intrant = true
                this.subCompo.declencheur_appel = false
            },
            retourChoix(){
                this.subCompo.choix_intrant = true
                this.subCompo.declencheur_appel = false
            }
        }
    }
</script>
