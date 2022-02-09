<template>
     <v-app-bar
      app
      color="white"
      flat
    >
      <v-container class="py-0 fill-height">
        <div id="navigation">
            <div>
              <v-avatar color="blue">
              <span class="white--text text-h5">MP</span>
            </v-avatar>
            </div>
       
              <div id="navText">
                  <router-link class="routeUrl" to="/"><v-btn text color="#1e1e1e">Home</v-btn></router-link>
                  <router-link class="routeUrl" to="/contact"><v-btn text color="#1e1e1e">Contact Us</v-btn></router-link>
                  <router-link class="routeUrl" to="/about"><v-btn text color="#1e1e1e">About Us</v-btn></router-link>
                  <router-link class="routeUrl" to="/login"><v-btn text color="#1e1e1e">Login</v-btn></router-link>
              </div>

             <div id="navBadge">
              <v-badge
                :content="messages"
                :value="messages"
                color="green"
                overlap
              >
                <v-icon large>
                  
                </v-icon>
              </v-badge>

            </div>  
          </div>
          
      </v-container>
    </v-app-bar>
  
</template>

<style>
 #navigation{
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    #navText{
      margin-top: 5px;
    }

    #navBadge{
      margin-top: 5px;
    }

    .routeUrl{
      text-decoration: none;   
    }
</style>

<script>

export default {
    
  data(){
    return{
      links: [
        'Home',
        'Contact Us',
        'About Us',
        'Login',
      ],
      messages: 0,
    }    
  }  

}
</script>