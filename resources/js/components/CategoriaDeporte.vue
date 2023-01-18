<template>
    <div class="container my-5">
        <h2>Deportes</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="deporte in this.deportes " v-bind:key="deporte.id">

                <div class="card">
                    <img class="card-img-top" :src="`storage/${deporte.imagen_principal}`" alt="card del restaurant" >
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ deporte.nombre }} </h3>
                        <p class="card-text">
                            <span class="font-weight-bold">Fecha de registro:</span>
                                {{deporte.fecha}} 
                        </p>

                        <router-link :to="{ name: 'establecimiento', params: { id: deporte.id }}">
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
        axios.get('/api/categorias/deporte')
            .then(respuesta => {
                //this.cafes = respuesta.data;
                this.$store.commit("AGREGAR_DEPORTES", respuesta.data);
            })
    },
    computed: {
        deportes(){
            return this.$store.state.deportes;
        }
    }
}
</script>
