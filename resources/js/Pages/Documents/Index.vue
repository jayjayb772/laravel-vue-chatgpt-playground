<template>
    <LandingLayout>
        <template #page-header>
            <h2>My Documents</h2>
        </template>
        <div>
            <div> display documents </div>
            <button @click="createDocument">New Document</button>

            <div>
            <div v-for="document in documents">
                {{document.title}}
            </div>
            </div>
        </div>
    </LandingLayout>
</template>

<script>
import LandingLayout from '@/Layouts/LandingLayout.vue';
export default {
    name: "Index",
    components:{
      LandingLayout
    },
    props:{
        documents: { type: Object, required: true}
    },
    methods:{
        createDocument(){
            this.$inertia.visit(route('documents.create'))
        }
    }
}
</script>

<style scoped>

</style>
