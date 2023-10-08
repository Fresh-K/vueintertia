<template>
    <app-layout>
        <template #header>
         {{course.title}}
        </template>
        <div class="py-4 mx-8" >
            <div class="mx-4 bg-white rounded shadow p-4">
                <div class="text-sm text-gray-500">{{course.episodes[this.currentKey].title}}</div>
                <iframe class="w-full min-h-screen" :src="course.episodes[this.currentKey].video_url"
                        title="Application full stack Laravel et InertiaJS - Afficher les épisodes" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="text-sm text-gray-500">{{course.episodes[this.currentKey].desc}}</div>

                <div class="mt-6">
                    <ul v-for="(episode,index) in courseShow.episodes" v-bind:ke="episode.id">
                        <li class="mt-3">Episode numero : {{index+1}} - {{episode.title}}
                        <button class="text-gray-500 focus:text-indigo-500" @click="switchEpisode(index)">
                            voir episode
                        </button>
                        </li>

                    </ul>
                </div>


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

    props: ['course'],

    data() {
        return{
            courseShow : this.course,
            currentKey:0
        }
    },

    methods:{
        switchEpisode(index){
            this.currentKey=index;
            window.scrollTo(
                {
                    top:0,
                    left:0,
                    behavior:'smooth'
                }
            )
        }
    },
    mounted() {
        // console.log(this.courseList);
    }

}
</script>
