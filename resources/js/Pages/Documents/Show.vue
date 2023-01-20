<template>
    <LandingLayout>
        <template #page-header>
            <h2>{{document.title}}</h2>
        </template>
        <div>
            {{document.content}}
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
        document: { type: Object, required: true}
    }
}
</script>

<style scoped>

</style>
