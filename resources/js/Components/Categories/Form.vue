<script>
export default {
    name: "CategoryForm"
}
</script>

<style scoped>

</style>
<!--defino los props, nos aseguramos de recibir los datos -->
<!-- le pasamos ? form -->
<!-- que recibe (type) el form ? tipo Objeto.  Y  es obligatorio recibir (required) los datos del formalario (nombre, edad )-->
<!-- la variable  "updating" indica si utilizamos el formulario para crear o para actualizar -->
<script setup>
// importaciones de componentes
import FormSection from '@/Components/FormSection.vue'
import InputError from '@/Components/InputError.vue'
//importo etiquetas
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
//Importo los inputs (ingreso de datos)
import TextInput from '@/Components/TextInput.vue'


    defineProps({
                    form: {
                        type: Object,
                        required:true,

                    },
                    updating: {
                        type: Boolean,
                        required: false,
                        default: false,
                    },

                },)





defineEmits(['submit'])

</script>
<!-- SI NO LE PASAMOS UN UPDATING,SIGNIFICA QUE UTILIZAMOS EL FORMULARIO PARA CREAR -->
<!-- defineEmits Comunicacion verticil ascendente (ENVIAR DESDE ACA (PAGINA FORM) A OTRA PAGINA (DIFERENTE A FORM) -->
<!-- defineProps Comunicacion verticil descendente  (RECIBIR DESDE OTRA PAGINA UN OBJETO A LA PAGINA ACTUAL (FORM) ->
<!- En rusmen: defineProps (recibe) y defineEmits (emvia) -->
<!-- defineEmits envia a  @submit="form.post(route('categories.store'))"/>  -->
<!-- defineProps recibe de        <CategoryForm :form="form"  -->

<template>
    <!-- Form (ingresa los datos solicitados y esto se pintan en el componente FormSectio page ->
        <FormSection @submitted="$emit('submit')">
        <!- ACA INGRESEMOS LOS DATOS DE LA CUENTA NUEVA / DATOS A MODIFICAR -->

    <FormSection @submitted="$emit('submit')">
        <template #title>
            <!-- CONDICIONAL  TERMARIA-->
            {{ updating ? 'Update ' : 'Create' }}

        </template>
        <template #description>
            {{ updating ? 'Update The Selected Category' : 'Create a New Category From Scratch' }}

        </template>
        <h2>{{ "We" }}</h2>
        <h2>{{ form.name }}</h2>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <!-- Pintamos los componentes necesarios para el ingreso de los datos -->
                <InputLabel for="name" value="Name"/>
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="mt-1 block w-full"/>
                <!-- Mostrar un error si lo hubiera -->
                <InputError v-if="$page.props.errors && $page.props.errors.name" :message="$page.props.errors.name"
                            class="mt-2"/>
                <!-- :message="$page.props.errors.name" muestra qué input tiene el error -->
            </div>
        </template>

        <!-- CODIGO DE LAS ACCIONES  ENVIAR, CANCELAR  ... BOTONES -->
        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}

            </PrimaryButton>
        </template>

    </FormSection>

</template>
