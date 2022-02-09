<template>
    
    <div>
    <data-transfer :sendToParent="updateData"></data-transfer>
    
    <!-- <div id="a">
    {{myData.feedback}}
    </div>-->
     <v-card
     id="card"
    class="mx-auto"
    max-width="344"
  >
    <v-card-text>
      <div>Product Details {{myData.title}}</div>
      <p class="text-h4 text--primary">
        ${{myData.messages * myData.price}}
      </p>
      <p></p>
      <div class="text--primary">
        {{myData.details}}
      </div>
    </v-card-text>
    <v-card-actions>
      <v-btn
        text
        color="deep-purple accent-4"
      >
        Buy Qty:{{myData.messages}}
      </v-btn>
    </v-card-actions>
  </v-card>
    </div>
  
    
</template>

<style>
   #card{
       margin-top: 70px;
   }
</style>
<script>
import dataTransfer from "../components/dataTransfer.vue"
export default {
    components:{
        dataTransfer
    },
    data(){
        return{
            myData: [],
        }
    },
    methods:{
        updateData(event){
            alert(event)
        }
    },
    created(){
        this.myData= this.$route.params.data
    }
}
</script>