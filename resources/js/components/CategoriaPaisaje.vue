<template>
    <div class="container my-5">
        <h2>Paisajes</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="paisaje in this.paisajes " v-bind:key="paisaje.id">

                <div class="card">
                    <img class="card-img-top" :src="`storage/${paisaje.imagen_principal}`" alt="card del restaurant" >
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ paisaje.nombre }} </h3>
                        <p class="card-text">
                            <span class="font-weight-bold">Fecha de registro:</span>
                                {{paisaje.fecha}}
                        </p>

                        <router-link :to="{ name: 'establecimiento', params: { id: paisaje.id }}">
                            <a class="btn btn-primary d-block">Ver Galeria</a>
                        </router-link>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {

    mounted() {
        axios.get('/api/categorias/paisaje')
            .then(respuesta => {
                //this.cafes = respuesta.data;
                this.$store.commit("AGREGAR_PAISAJES", respuesta.data);
            })
    },
    computed: {
        paisajes(){
            return this.$store.state.paisajes;
        }
    }
}
</script>
