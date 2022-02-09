<template>
    <div class="about">

         <v-main class="grey lighten-3">
      <v-container>
        <v-row>     
          <v-col>
            <v-sheet
              min-height="70vh"
              rounded="lg"
            >
              <!-- Enter content here -->
             <h1>{{title}}</h1>
             <h4>{{desc}}</h4>

            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    </div>
</template>

<style>
    h1{
        text-align: center;
        padding-top: 30px;
    }
    h4{
        font-weight: 500;        
        text-align: center;
        justify-content: center;
        margin-top: 30px;
        padding-left: 30px;
        padding-right: 30px;
    }
</style>


<script>
export default {
   data: () => ({      
      title: 'Who are we?',
      desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    }),
}
</script>