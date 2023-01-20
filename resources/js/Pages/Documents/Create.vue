<template>
    <LandingLayout>
        <template #page-header>
            <h2>New Document</h2>
        </template>
        <div>
            <label for="title-input">Document Title</label>
            <input id="title-input" type="text" v-model="form.title"/>
            <button @click="submitForm">Create Document</button>
            <div>
                {{form}}
            </div>
        </div>
    </LandingLayout>
</template>

<script>
import { useForm } from '@inertiajs/vue3'

import LandingLayout from '@/Layouts/LandingLayout.vue';
export default {
    name: "Index",
    components:{
      LandingLayout
    },
    data() {
        return {
            form: useForm({
                title: ''
            })
        }
    },
    methods:{
        submitForm(){
            this.form.post(route('documents.store'),{

            })
        }
    }
}
</script>

<style scoped>

</style>
