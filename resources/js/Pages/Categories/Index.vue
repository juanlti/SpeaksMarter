<script>
export default {
    name: "CategoriesIndex"
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import {Link} from '@inertiajs/vue3';


defineProps({

categories:{
    type:Object,
    required:true,
}
})
const deleteCategory = id =>{
    if(confirm('Desea confirmar la eliminacion ?')){

        Inertia.delete(route('categories.destroy',id));
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
            <h1 class="font-semi-bold text-xl text-gray-800 leading-tight">Categories</h1>
        </template>

        <!--  TEMPLATE DEL BODY (MAIN) PQ EL SLOT NO ESTA ESPECIFICADO-->
        <div class="py-12">
            <!-- ancho  maximo py-12 -->

                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <!-- ancho maximo 7-->
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- caja fondo blanco-->
                    <div class="flex justify-between">
                        <!--TODO CREAR CATEGORIA-->
                        <Link :href="route('categories.create')" class="text-white bg-indigo-500 hover:bg-indigo-700 rounded py-2 px-4">
                            Create category
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
                                        <Link :href="route('categories.edit',category.id)">Edit</Link>
                                        <!-- FORMA 1 DE TENER LA ACCION DE BORRAR
                                        <Link :href="route('categories.destroy',category.id)">Delete</Link>
                                        -->

                                        <Link @click="deleteCategory(category.id)">Delete </Link>
                                    <!--FORMA 2 , UTILIZAMOS UNA FUNCION PARA CONFIRMAR SI REALMENTE DESEA BORRAR UNA CATEGORIA -->
                                    </p>
                                </div>
                            </li>
                            <!--  FIN Bloque que ocupa una categoria-->


                            </ul>

                    </div>
                </div>
            </div>
        </div>


    </AppLayout>

</template>
