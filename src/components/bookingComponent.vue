<template>
  <v-app id="inspire">
    <v-app-bar
      app
      color="#59abd1"
      flat
    >

      <v-tabs
        centered
        class="ml-n9"
        color="black"
        active-class="t2"
      >
        <v-tab class="t1">
          <router-link class="routeUrl" to="/"><h4 id="navP">Home</h4></router-link>
        </v-tab>
        <v-tab class="t2">
            <router-link class="routeUrl" to="/bookings"><h4 id="navP">Your Bookings</h4></router-link>
        </v-tab>
      </v-tabs>

      <v-avatar
        class="hidden-sm-and-down"
        color="#1e1e1e"
        size="32">
      <v-icon dark>
        mdi-account-circle
      </v-icon>
      </v-avatar>
    </v-app-bar>

    <v-main class="blue lighten-4"
        color="#1e1e1e"
    >
      <v-container>
        <v-row>
             <v-col>
            <v-sheet
              min-height="70vh"
              rounded="lg"
            >
              <!-- Col1 -->
              <v-list-item
        v-for="booking in bookings"
        :key="booking"
      >
        <v-list-item-avatar>
          <v-icon
            color="amber"          
          >mdi-bag-suitcase-outline</v-icon>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title v-text="booking.location"></v-list-item-title>          
          <v-list-item-subtitle>Adult: {{booking.adult}}</v-list-item-subtitle>
          <v-list-item-subtitle>Children: {{booking.children}}</v-list-item-subtitle>
          <v-list-item-subtitle>Room: {{booking.room}}</v-list-item-subtitle>
          <v-list-item-subtitle>Price: {{parseInt(booking.room)*60}}</v-list-item-subtitle>
        </v-list-item-content>

      
      </v-list-item>
            </v-sheet>
            </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<style>
    #navP{
        color: black;
    }
</style>
<script>
import axios from 'axios'
  export default {
    data: () => ({      
      bookings:null,  
      files: [
        {
          color: 'blue',
          icon: 'mdi-bag-suitcase-outline',
          subtitle: '+1(321)984-2132',
          title: 'Contact Number',
        },
        {
          color: 'amber',
          icon: 'mdi-bag-suitcase-outline',
          subtitle: 'demo@gmail.com',
          title: 'Email',
        },
      ],
    }),
    
    mounted(){
      axios.get('http://localhost:5000/api/Booking')
      .then((response)=>{
        console.log(response.data);
        this.bookings = response.data;
      })
      .catchc((error)=>{
      console.log(error);
      });
  },
  }
</script>