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
      >
        <v-tab>
          <router-link class="routeUrl" to="/"><h4 id="navP">Home</h4></router-link>
        </v-tab>
        <v-tab>
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
          <v-col
            cols="12"
            sm="2"
          >
            <v-sheet
              rounded="lg"
              min-height="auto"
            >
              <!-- Card 1 -->
               <v-card
                class="mx-auto"
                rounded="lg"
                >
                <v-list>
                <v-list-item-group
                    v-model="model"
                    color="#1e1e1e"
                >
                    <v-list-item
                    v-for="(item, i) in items"
                    :key="i"
                    >
                    <v-list-item-icon>
                        <v-icon v-text="item.icon"></v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title v-text="item.text"></v-list-item-title>
                    </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
                </v-list>
            </v-card>
            </v-sheet>
          </v-col>

          <v-col
            cols="12"
            sm="8"
          >
          <center>
            <v-sheet
              min-height="70vh"
              rounded="lg"           
            >
              <!-- Card 2 -->
              
              <v-col
                cols="18"                
                sm="18"
                md="8"
                id="textField"
                >
                
                    <div id="content">
                    <v-autocomplete
                        clearable
                        deletable-chips
                        rounded
                        solo                        
                        label="Select Location"
                        :items="actv"
                        v-model="location"
                        ></v-autocomplete>

                    <!-- Date Picker -->
                    <v-row>    
                       <v-col
                            cols="12"
                            sm="6"
                            md="4"
                            >
                            <v-dialog
                                ref="dialog"
                                v-model="modal"
                                :return-value.sync="date"
                                persistent
                                width="290px"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="date"
                                    label="Check in"
                                    prepend-icon="mdi-calendar"
                                    readonly
                                    v-bind="attrs"
                                    v-on="on"                            
                                ></v-text-field>
                                </template>
                                <v-date-picker
                                v-model="date"
                                scrollable
                                >
                                <v-spacer></v-spacer>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="modal = false"
                                >
                                    Cancel
                                </v-btn>
                                <v-btn
                                    text
                                    color="primary"
                                    @click="$refs.dialog.save(date)"
                                >
                                    OK
                                </v-btn>
                                </v-date-picker>
                            </v-dialog>
                            </v-col> 



                         <v-col
                        cols="12"
                        sm="6"
                        md="4"
                        >
                        <v-menu
                            v-model="menu2"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            transition="scale-transition"
                            offset-y
                            min-width="auto"
                        >
                            <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                v-model="date2"
                                label="Check out"
                                prepend-icon="mdi-calendar"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-date-picker
                            v-model="date2"
                            @input="menu2 = false"
                            ></v-date-picker>
                        </v-menu>
                        </v-col>
                    </v-row>

                    <!-- adults, children and room -->
                        <v-row>
                        <v-col
                            cols="18"
                            sm="8"
                            md="4"
                            id="textField"
                            >
                                <v-text-field             
                                    label="Adult"
                                    filled
                                    rounded
                                    dense                                    
                                    v-model="adult"
                                ></v-text-field>
                        </v-col>
                        <v-col
                            cols="18"
                            sm="8"
                            md="4"
                            id="textField"
                            >
                                <v-text-field             
                                    label="Childern"
                                    filled
                                    rounded
                                    dense
                                    v-model="children"
                                ></v-text-field>
                        </v-col>
                        <v-col
                            cols="18"
                            sm="8"
                            md="4"
                            id="textField"
                            >
                                <v-text-field             
                                    label="Room"
                                    filled
                                    rounded
                                    dense
                                    v-model="room"
                                ></v-text-field>
                        </v-col>
                        </v-row>

                        <v-btn 
                            id="btn"
                            color="primary"
                            v-on:click="btnSubmitClick">
                                Book
                        </v-btn>
                </div>
           
              </v-col>
            </v-sheet>
            </center> 
          </v-col>
        
          <v-col
            cols="12"
            sm="2"
            rounded="lg"
          >
            <v-sheet
              rounded="lg"
              min-height="268"
            >
              <!-- Card 3 -->
              <v-img
                max-height="auto"
                max-width="180"
                rounded="lg"
                :aspect-ratio="4/9"
                src="https://thumbs.dreamstime.com/b/black-friday-sale-vertical-web-banner-ad-ready-sites-press-as-discount-advertisement-flyer-contains-103627201.jpg"
                ></v-img>
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
// POST: http://localhost:5000/api/Booking
import axios from 'axios'

  export default {
    data: () => ({
      location: null,
      adult: null,
      children: null,
      room: null,
      price: null,
      date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
      date2: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
      menu: false,
      modal: false,
      modal2: false,
      menu2: false,
      actv: ['South Island', 'Paris', 'Maui', 'Tahiti','Rome'],
      links: [
        'Home',
        'Your Bookings',
      ],
      items: [
        {
          icon: 'mdi-bag-suitcase-outline',
          text: 'Stays',
        },
        {
          icon: 'mdi-airplane',
          text: 'Flight',
        },
        {
          icon: 'mdi-car-hatchback',
          text: 'Car Rentals',
        },
      ],
      model: 0,
      
    }),
    methods:{
         btnSubmitClick(){
      let bookHotelData = {
        location: this.location,
        checkIn: this.date,
        checkOut: this.date2,
        adult: this.adult,
        children: this.children,
        room: this.room,
      }
      axios.post('http://localhost:5000/api/Booking',bookHotelData)
      .then((response)=>{
        console.log(response);
      })
      .catch((error)=>{
        console.log(error);
      });      
      this.dialog = false;
    }, 
    }
  }
</script>