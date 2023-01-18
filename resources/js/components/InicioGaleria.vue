<template>
    <div>
        <listado-categorias></listado-categorias>
        <categoria-paisaje></categoria-paisaje>
        <categoria-persona></categoria-persona>
        <categoria-deporte></categoria-deporte>
        <categoria-mascota></categoria-mascota>
    </div>
</template>

<script>
import ListadoCategorias from './ListadoCategorias';
import CategoriaPaisaje from './CategoriaPaisaje';
import CategoriaPersona from './CategoriaPersona';
import CategoriaDeporte from './CategoriaDeporte';
import CategoriaMascota from './CategoriaMascota';

export default {
    components: {
        ListadoCategorias,
        CategoriaPaisaje,
        CategoriaPersona,
        CategoriaDeporte,
        CategoriaMascota
    }

}
</script>
