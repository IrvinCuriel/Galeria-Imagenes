import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        paisajes: [],
        deportes: [],
        mascotas: [],
        personas: [],
        galeria: {},
        registros: [],
        categorias: [],
        categoria: ''
    },
    mutations: {
        AGREGAR_PAISAJES(state, paisajes) {
            state.paisajes = paisajes;
        },
        AGREGAR_DEPORTES(state, deportes) {
            state.deportes = deportes;
        },
        AGREGAR_MASCOTAS(state, mascotas) {
            state.mascotas = mascotas;
        },
        AGREGAR_PERSONAS(state, personas) {
            state.personas = personas
        },
        AGREGAR_GALERIA(state, galeria) {
            state.galeria = galeria
        },
        AGREGAR_REGISTROS(state, registros) {
            state.registros = registros
        },
        AGREGAR_CATEGORIAS(state, categorias) {
            state.categorias = categorias
        },
        SELECCIONAR_CATEGORIA(state, categoria) {
            state.categoria = categoria
        }
    },
    getters: {
        obtenerGaleria: state => {
            return state.galeria
        },
        obtenerImagenes: state => {
            return state.galeria.imagenes;
        },
        obtenerRegistros: state => {
            return state.registros
        },
        obtenerCategorias: state => {
            return state.categorias
        },
        obtenerCategoria: state => {
            return state.categoria
        }
    }
});
