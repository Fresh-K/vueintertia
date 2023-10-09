<template>

    <div>
        <button class="bg-green-500 px-3 py-2 text-white" @click="toggleProgress()">
        {{this.iswatched ? 'Termine' : 'Termine?'}}
        </button>
    </div>
</template>



<script>

export default {
    props: ['episodeId','watchedEpisodes'],


    data(){
        return{
            watchedEp : this.watchedEpisodes,
            iswatched : null
        }
    },


    methods:{
        toggleProgress(){
            axios.post('/toggleProgress',{
                episodeId : this.episodeId
            })
                .then(response =>{
                    if(response.status==200){
                        this.iswatched = !this.iswatched;
                        eventBus.emit('toggleUpdate',response.data)
                    }
                })
                .catch(error => console.log(error));
        },
        iswatchedepisode(){
            return this.watchedEp.find(episode => episode.id == this.episodeId)?true : false ;
        }
    },


    mounted() {
        this.watched = this.iswatchedepisode();
    }

}
</script>
