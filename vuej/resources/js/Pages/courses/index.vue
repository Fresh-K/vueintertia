<template>
    <app-layout>
        <template #header>
            Liste des formations
        </template>

        <div v-if="$page.props.flash.success" class="bg-green-200 text-green-600 p-4">
            {{ $page.props.flash.success}}
        </div>
        <div class="py-5" v-for="course in this.courseList" v-bind:key="course.id">
            <div class="mx-4 bg-white rounded shadow p-4">
                <div class="text-sm text-gray-500">{{course.user.name}}</div>
                <div class="flex justify-between items-center">
                    <div>
                        Mise en ligne par <strong>{{ course.user.name }}</strong> (<span class="text-gray-500 text-sm">{{ course.participants }} participant<span v-if="parseInt(course.participants) > 1 ">s</span>)
                            </span>
                    </div>
                    <div class="text-3xl">{{course.title}}</div>
                    <div class="text-sm text-gray-500">{{course.episodes_count}} episode</div>

                </div>

                <div class="text-sm text-gray-500">{{course.desc}}</div>
                <div class="flex justify-between items-center">
                    <a :href="'course/' + course.id" class="bg-indigo-700 text-white px-3 py-2 text-sm mt-3 inline-block rounded hover:bg-indigo-500">Voir la formation</a>
                    <a :href="'courses/edit/' + course.id"  class="bg-gray-700 text-white px-3 py-2 text-sm mt-3 inline-block rounded hover:bg-gray-500">Editer</a>
                </div>
<!--                <a :href="'courses/' + course.id" class="bg-indigo-700 text-white px-3 py-2 text-sm mt-3 inline-block rounded hover:bg-indigo-500">Voir la formation</a>            -->
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
