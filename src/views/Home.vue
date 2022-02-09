<template>
  <div class="home">
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>     
          <v-col>
            <v-sheet
              min-height="70vh"
              rounded="lg"
            >
              <!-- Enter content here -->
              <!--Component -->
             <product-card-view>

             </product-card-view>

            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
      <!--Component-->
      <footerComponent></footerComponent> 
    </v-main> 
  </div>
</template>

<style>
   
</style>

<script>
import productCardView from '../components/productCardView.vue'
import footerComponent from '../components/footer.vue'
  export default {
  components: { productCardView,footerComponent },
    data: () => ({      
      
    }),
    methods:{
      getBadge(value){
        alert(value)
      }
    }
  }
</script>
