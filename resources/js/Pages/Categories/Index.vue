<script>
export default {
    name: "CategoriesIndex"
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import {Link} from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import {ref} from "vue";

defineProps({

categories:{
    type:Object,
    required:true,
}
})

const deleteCategory = id => {
    if (confirm('Desea confirmar la eliminacion ?')) {

        Inertia.delete(route('categories.destroy', id));

    }
}









</script>
<!-- DEFINO Y ALMACENO LAS PROPS  -->
<!-- guardo todos los parametros que recibe el index-->
<!-- categorias: { type: Object, required: true} -->
<!-- Object es la categoria -->


<template>
    <AppLayout>

        <template #header>
            <!--  TEMPLATE DEL ENCABEZADO, SLOT CON  NOMBRE (ESPECIFICADO) -->

            <!--  Propio -->
            <h1 class="font-semi-bold text-xl text-gray-800 leading-tight" >Categories</h1>
        </template>

        <!--  TEMPLATE DEL BODY (MAIN) PQ EL SLOT NO ESTA ESPECIFICADO-->
        <div class="py-12">
            <!-- ancho  maximo py-12 -->

                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <!-- ancho maximo 7-->
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- caja fondo blanco-->
                    <!-- si el usuario tiene permiso para crear categorias, se le mostrara el boton con el enlace de crear una categoria -->
                    <!-- con esto nos aseguramos que los usuarios con permisos de leer una categoria no puedan crear una -->
                    <div class="flex justify-between"  v-if="$page.props.user.permissions.includes('create categories')">
                        <!--TODO CREAR CATEGORIA-->
                        <Link :href="route('categories.create')" class="text-white bg-indigo-500 hover:bg-indigo-700 rounded py-2 px-4">
                            Crear una Categoria
                          <!--  {{categories.data }} -->
                        </Link>
                    </div>
                    <!-- CONTENIDO CLASES CRADAS-->
                    <div class="mt-4">
                        <!-- TODO TABLE  -->
                        <ul role="list" class="divide-y divide-gray-100">
                            <!-- Bloque que ocupa una categoria-->
                            <li class="flex justify-between gap-x-6 py-5" v-for="category in categories.data">
                                <!--  categories contiene la paginacion (toda la informacion -->
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-md font-semi-bold leading-6 text-gray-900">{{category.name}} </p>

                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-md leading-6 text-gray-900">

                                        <Link class="py-2 px-4" :href="route('categories.edit', category.id)"  v-if="$page.props.user.permissions.includes('update categories')">Edit</Link>
                                        <!-- FORMA 1 DE TENER LA ACCION DE BORRAR
                                        <Link :href="route('categories.destroy',category.id)">Delete</Link>
                                        -->

                                        <Link  class="py-2 px-4 text-red-600" @click="deleteCategory(category.id)" v-if="$page.props.user.permissions.includes('delete categories')">Delete </Link>
                                    <!--FORMA 2 , UTILIZAMOS UNA FUNCION PARA CONFIRMAR SI REALMENTE DESEA BORRAR UNA CATEGORIA -->
                                    </p>
                                </div>
                            </li>
                            <!--  FIN Bloque que ocupa una categoria-->


                            </ul>

                    </div>
                    <div class="flex justify-between mt-2">

                        <Link v-if="categories.current_page>1" :href="categories.prev_page_url" class="py-2 px-4 rounded">
                           ANTERIOR
                            <!--  {{categories.data }} -->
                        </Link>
                        <div v-else></div>
                        <Link  v-if="categories.current_page<categories.last_page" :href="categories.next_page_url" class="py-2 px-4 rounded">
                            SIGUIENTE
                            <!--  {{categories.data }} -->
                        </Link>
                        <div v-else></div>
                    </div>
                </div>
            </div>
        </div>


    </AppLayout>

</template>
