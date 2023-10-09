

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-if="$page.props.flash.success" class="bg-green-200 text-green-600 p-4">
                        {{ $page.props.flash.success}}
                    </div>
                    <div class="w-full" >

                        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Titre de la formation
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" v-model="form.title" type="text"  required>

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="desc">
                                       Description de la formation
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="desc" v-model="form.desc"  type="text" required > </textarea>
                            </div>


                            <div class="mb-4">
                                <h2>Episodes de la formation </h2>
                                <div v-for="(episode, index) in this.form.episodes" v-bind:key="index">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                       Titre de l'episode {{index+1}}
                                   </label>
                                   <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" v-model="form.episodes[index].title" type="text" required >

                                   <label class="block text-gray-700 text-sm font-bold mb-2" for="desc">
                                       Description de l'episode {{index+1}}
                                   </label>
                                   <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="desc" v-model="form.episodes[index].desc"  type="text"  required> </textarea>

                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="video_url">
                                       Url de video de l'episode {{index+1}}
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="video_url" v-model="form.episodes[index].video_url" type="text" required >

                                </div>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold my-4 py-2 px-4 rounded" v-if="form.episodes.length < 15" @click.prevent="add">
                                    +
                                </button>

                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold my-3 py-2 px-4 rounded" v-if="form.episodes.length > 1" @click.prevent="remove">
                                    -
                                </button>
                            </div>


                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                   Creer la formation
                                </button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script >
import AppLayout from '@/Layouts/AppLayout.vue';

export default {

    components:{
        AppLayout
    },
    data(){
        return{
            form:{
                title : null,
                desc : null,
                episodes: [
                    {title: null, desc: null, video_url: null} ]
            }
        }
    },


    methods:{
        submit() {
            this.$inertia.post('/courses', this.form)
        },

        add() {
            this.form.episodes.push({title: null, desc: null, video_url: null});
        },

        remove() {
            this.form.episodes.pop();
        },
    },



}
</script>
