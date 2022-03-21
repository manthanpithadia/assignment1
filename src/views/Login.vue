<template>
    <div id="login">

        <v-main class="grey lighten-3">
      <v-container>
        <v-row>     
          <v-col>
            <v-sheet
              min-height="70vh"
              rounded="lg"
            >
              <!-- Enter content here -->
              <center>
            <div id="content">
               <v-col
                cols="12"

                sm="6"
                md="4"
                id="textField"
                >
             <v-text-field             
                label="User Name"
                filled
                rounded
                dense
                v-model="uname"
          ></v-text-field>  
          <v-text-field         
                label="Password"
                filled
                rounded
                dense
                v-model="pass"
          ></v-text-field>   

           <v-btn 
           id="btn"
           color="primary"
           v-on:click="btnLoninClicked">
            Login
            </v-btn>
            </v-col>
            </div>
            </center>
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>            
    </div>
</template>

<style>
    #content{
        padding-top: 100px;
    }
    #btn{
        width: 300px;
        border-radius: 60px;
        padding-top: 25px;
        padding-bottom: 25px;
        padding-left: 180px;
        padding-right: 180px;
    }
</style>

<script>
import axios from 'axios'
export default {
  data: () => ({      
     users:[],
     uname: null,
     pass: null
    }),
  mounted(){
      axios.get('http://localhost:9000/login')
      .then((response)=>{
        console.log(response.data);
        this.users = response.data;
      })
      .catchc((error)=>{
      console.log(error);
      });
  },
  methods:{
    // function for login
    btnLoninClicked(){      
      if(this.users[0].username == this.uname && this.users[0].password == this.pass)
      {
        alert("login success");
      }
      else{
        alert("login failed");
      }
    }
  }
  
}
</script>