<template>
  <div class="home">
    <book-hotel></book-hotel>
  </div>
</template>

<style>
   
</style>

<script>
//import productCardView from '../components/productCardView.vue'
//import footerComponent from '../components/footer.vue'
import bookHotel from '../components/bookHotel.vue'
  export default {
  components: { bookHotel },
    data: () => ({      
      
    }),
    methods:{
      getBadge(value){
        alert(value)
      }
    }
  }
</script>
