<template>
  <div id="app">
    
    <v-app id="inspire">
    <navigation></navigation>      

    <div>
      <router-view/>
    </div>
    </v-app>
  </div>
</template>

<script>
import navigation from './components/navigation.vue'

export default {
  components: { navigation },
  data(){
    return{
      
    }
  }
}
</script>