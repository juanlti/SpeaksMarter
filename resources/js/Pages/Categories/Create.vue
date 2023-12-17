<script>
export default {
    name: "CategoriesCreate"
}
</script>

<style scoped>


</style>
<script setup>
import {useForm} from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue'
//importo el componente del formulario  de "Componentes/Categories/Form con el nombre CategoryForm
import CategoryForm from '@/Components/Categories/Form.vue'

const form = useForm({
    name: ''
})

</script>
<!-- useForm este componente genera un formulario-->
<template>

    <AppLayout>
        <template #header>
            <!--  Propio -->
            <h1 class="font-semi-bold text-xl text-gray-800 leading-tight"> Crear Categorias</h1>


        </template>
        <!-- FORMULARIO -->
        <div class="py-12">
            <!-- ancho maximo-->
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <!--caja del contenido -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!--  colores de la caja-->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"></div>

                 <div class="p-6 bg-white border-b border-gray-200"></div>
                        <!--Le pasamos los datos ingresados por el usaurio para crear una categoria al componente  CategoryForm-->
                    <!-- COMUNICACION ASCENDENTE -->
                    <CategoryForm :form="form" @submit="form.post(route('categories.store'))"/>

                    <form action="" @submit.prevent="form.post('/categories')" enctype="multipart/form-data"></form>
                    <!-- comprension del codigo de arriba linea 46.  -->
                    <!-- 1) cliente ejecuta la accion de crear/modificar un usaurio..  -->
                    <!-- 2) Se recibe la poticion desde la pantalla del usuario a las rutas.  -->
                    <!-- 3) ahi mismo se verifica si el suario esta logeado o no, y demas controles -->
                    <!-- 4) Desde aca (Create), les cnmparte los datos por Props de los formularios a la pagina de rendirizado -->
                    <!-- 5) Por ultimo, una vez recibido los datos ingresado en otra pagina. Nosotros verificamos los daots antes de guardarlos en BD-->

                </div>

            </div>
        </div>

    </AppLayout>

</template>
