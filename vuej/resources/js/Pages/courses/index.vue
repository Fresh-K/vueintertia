<template>
    <app-layout>
        <template #header>
            Liste des formations
        </template>
        <div class="py-5" v-for="course in this.courseList" v-bind:key="course.id">
            <div class="mx-4 bg-white rounded shadow p-4">
                <div class="text-sm text-gray-500">{{course.user.name}}</div>
                <div class="flex justify-between items-center">
                    <div class="text-3xl">{{course.title}}</div>
                    <div class="text-sm text-gray-500">{{course.episodes_count}} episode</div>

                </div>

                <div class="text-sm text-gray-500">{{course.desc}}</div>
                <a class="bg-indigo-500 text-white px-2 py-1 mt-3 inline-block rounded hover:bg-indigo-700"> voir la formation</a>
            </div>



        </div>

    </app-layout>
</template>


<script>
import AppLayout from './../../Layouts/AppLayout.vue'

export default {
    components:{
        AppLayout
    },

    props: ['courses'],

    data() {
        return{
            courseList : this.courses
        }
    },
    mounted() {
        console.log(this.courseList);
    }

}
</script>
