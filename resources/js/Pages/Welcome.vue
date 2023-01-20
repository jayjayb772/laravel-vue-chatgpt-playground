<script setup>
import { Head, Link } from '@inertiajs/vue3';
import LandingLayout from "../Layouts/LandingLayout.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <LandingLayout>
        <template #page-header>
            <h2>
                Markdown editor
            </h2>
        </template>

        <div>
            Hello world
        </div>
    </LandingLayout>
</template>
