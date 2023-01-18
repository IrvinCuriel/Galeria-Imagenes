<template>
    <div class="container my-5">
        <h2 class="text-center mb-5"> Título: {{galeria.nombre}} </h2>

        <div class="row align-items-start">
            <div class="col-md-8 order-2">
                    <img :src="`../storage/${galeria.imagen_principal}`" class="img-fluid" alt="imagen galeria">
                    <p class="mt-3"> {{galeria.descripcion}} </p>
                    <galeria-imagenes></galeria-imagenes>
            </div>

            <aside class="col-md-4 order-1">

                <div class="p-4 bg-primary ">
                    <h2 class="text-center text-white mt-2 mb-4">Más Información</h2>



                    <p class="text-white mt-1">
                        <span class="font-weight-bold">
                            Fecha registro:
                        </span>
                        {{ galeria.fecha }} 
                    </p>

                    <p class="text-white mt-1">
                        <span class="font-weight-bold">
                            Descrición:
                        </span>
                        {{ galeria.descripcion }}
                    </p>
                </div>
            </aside>
        </div>
    </div>
</template>


<script>
import GaleriaImagenes from './GaleriaImagenes';

export default {

    components: {
        GaleriaImagenes
    },
    mounted() {

        const { id } = this.$route.params;

        axios.get('/api/establecimientos/' + id )
            .then(respuesta => {
                this.$store.commit('AGREGAR_GALERIA', respuesta.data);
            })
    },
    computed: {
        galeria() {
            return this.$store.getters.obtenerGaleria;
        }
    }
}
</script>
