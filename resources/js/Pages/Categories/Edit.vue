<script>
export default {
    name: "CategoriesEdit"
}
</script>

<style scoped>

</style>
<script setup>
import {useForm} from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue'
import CategoryForm from '@/Components/Categories/Form.vue'

//defino las propiedades
//recibe en el props un objeto de tipo categoria
const props = defineProps({
    category: {
        type: Object,
        required: true,


    }
})

const form = useForm({
//recibe el nombre de la categoria a editar desde el contralor edit
    name: props.category.name

})
</script>

<template>
    <!-- Utilizo appLayout para ubicar todos los elementos -->
    <AppLayout title="Edit Category">
        <template #header>
            <!--  Propio -->
            <h1 class="font-semi-bold text-xl text-gray-800 leading-tight"> Editar Categorias</h1>
        </template>
        <div class="py-12">


            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2>{{props.category.name}}</h2>
                    <h2>{{form}}</h2>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <CategoryForm :updating="true" :form="form" @submit="form.put(route('categories.update',category.id))"/>

                        <!-- 1) Page Edit se comunica  con el compnonente CategoryForm y le paso como props los argumentos de [ updateging=true y el formulario form] -->
                        <!-- 2) Al terminar el paso 1), CategoryForm page retorna a la pagina Edit  con los datos del usuario-->
                        <!-- 3) Edit Page  envia ( por metodo put) el objeto (con los datos cargados), por el usuario, al controlador de Update Categories-->
                    </div>

                </div>

            </div>

        </div>
    </AppLayout>


</template>
