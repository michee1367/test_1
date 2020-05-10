<template>
    <div>
        <b-navbar toggleable="lg" type="dark" class="nav-background">
            <b-navbar-brand href="#">SurIntrant</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <!-- 
                <b-navbar-nav>
                    <b-nav-item href="#">Link</b-nav-item>
                    <b-nav-item href="#" disabled>Disabled</b-nav-item>
                </b-navbar-nav>
                -->
                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
        
                    <b-nav-item-dropdown text="Lang" right>
                        <b-dropdown-item href="#">FR</b-dropdown-item>
                        <b-dropdown-item href="#">EN</b-dropdown-item>
                    </b-nav-item-dropdown>

                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template v-slot:button-content>
                            <em>Utilisateur</em>
                        </template>
                        <b-dropdown-item href="#">Deconnxion</b-dropdown-item>
                        <b-dropdown-item href="#">Profile</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>

        <b-container>
            <b-row align-h="center" class="mt-5">
                <b-col cols="5">
                    <b-card class="p-3">
                        <index_intrant>
                        </index_intrant>
                    </b-card>
                </b-col>
            </b-row>
        </b-container>
</div>
</template>

<script>
    import IndexIntrant from './intrant/IndexIntrant.vue'
    export default {
        components: {'index_intrant' : IndexIntrant},

        mounted() {

        },
        data() {
            return {

            }
        }
    }
</script>

<style>
    body {
        background:#EEF1F4;
    }

    .nav-background{
        background:#353535;
    }
</style>
