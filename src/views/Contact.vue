<template>
  <div class="about">
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <v-col>
            <v-sheet min-height="70vh" rounded="lg">
              <!-- Enter content here -->
              <!-- Contact US Component-->
             <ContactUs></ContactUs>
            </v-sheet>
          </v-col>

        </v-row>
      </v-container>
    </v-main>
  </div>
</template>

<script>  
import ContactUs from '../components/contactUs.vue'
export default {
  components:{ContactUs}
}
</script>
