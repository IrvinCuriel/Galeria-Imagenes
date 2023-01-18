<template>
    <div class="container my-5">
        <h2>Personas</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="persona in this.personas" v-bind:key="persona.id">

                <div class="card">
                    <img class="card-img-top" :src="`storage/${persona.imagen_principal}`" alt="card del persona" >
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ persona.nombre }} </h3>
                        <p class="card-text">
                            <span class="font-weight-bold">Fecha de registro:</span>
                                {{persona.fecha}} 
                        </p>

                        <router-link :to="{ name: 'establecimiento', params: { id: persona.id }}">
                            <a class="btn btn-primary d-block">Ver Galería</a>
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
        axios.get('/api/categorias/persona')
            .then(respuesta => {
                this.$store.commit("AGREGAR_PERSONAS", respuesta.data );
            })
    },
    computed: {
        personas() {
            return this.$store.state.personas
        }
    }
}
</script>
