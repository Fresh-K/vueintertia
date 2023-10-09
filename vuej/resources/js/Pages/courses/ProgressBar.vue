<template>
    <div class="bg-gray-200 w-full rounded">
        <div class="bg-green-500 text-white rounded-l text-center transition-width duration-500 " :style="'width:'+ percentage + '%'">  {{percentage}} %</div>

    </div>
</template>



<script>

export default {
    props: ['watchedEpisodes', 'episodes'],

    data(){
      return{
       watchedEpisodeData : this.watchedEpisodes
       }
    },

computed:{
  percentage(){

      let filtredEp = this.episodes.filter(courseEp => {
         return  this.watchedEpisodeData.find(watchedEP=>{
            return   watchedEP.id === courseEp.id;
          });
      });
      return Math.ceil(filtredEp.length / this.episodes.length * 100);
  }
},


    mounted() {
   eventBus.on('toggleUpdate', data => this.watchedEpisodeData = data);
    }

}
</script>

