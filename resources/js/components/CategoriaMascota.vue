<template>
    <div class="container my-5">
        <h2>Mascotas</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="mascota in this.mascotas " v-bind:key="mascota.id">

                <div class="card">
                    <img class="card-img-top" :src="`storage/${mascota.imagen_principal}`" alt="card del restaurant" >
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ mascota.nombre }} </h3>
                        <p class="card-text">
                            <span class="font-weight-bold">Fecha de registro:</span>
                                {{mascota.fecha}}
                        </p>

                        <router-link :to="{ name: 'establecimiento', params: { id: mascota.id }}">
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
        axios.get('/api/categorias/mascota')
            .then(respuesta => {
                //this.cafes = respuesta.data;
                this.$store.commit("AGREGAR_MASCOTAS", respuesta.data);
            })
    },
    computed: {
        mascotas(){
            return this.$store.state.mascotas;
        }
    }
}
</script>
