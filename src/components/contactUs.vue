<template>
    <div>
       <v-card class="mx-auto">
   

    <v-list
      subheader
      two-line
    >
      <v-subheader inset>Social media Handles</v-subheader>

      <v-list-item
        v-for="folder in folders"
        :key="folder.title"
      >
        <v-list-item-avatar>
          <v-icon
            class="grey lighten-1"
            dark
          >
            {{folder.icon}}
          </v-icon>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title v-text="folder.title"></v-list-item-title>

          <v-list-item-subtitle v-text="folder.subtitle"></v-list-item-subtitle>
        </v-list-item-content>

        <v-list-item-action>
          <v-btn icon>
            <v-icon color="grey lighten-1">mdi-information</v-icon>
          </v-btn>
        </v-list-item-action>
      </v-list-item>

      <v-divider inset></v-divider>

      <v-subheader inset>Contact</v-subheader>

      <v-list-item
        v-for="file in files"
        :key="file.title"
      >
        <v-list-item-avatar>
          <v-icon
            :class="file.color"
            dark
            v-text="file.icon"
          ></v-icon>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title v-text="file.title"></v-list-item-title>

          <v-list-item-subtitle v-text="file.subtitle"></v-list-item-subtitle>
        </v-list-item-content>

        <v-list-item-action>
          <v-btn icon>
            <v-icon color="grey lighten-1">mdi-information</v-icon>
          </v-btn>
        </v-list-item-action>
      </v-list-item>
    </v-list>
  </v-card>          
    </div>          
</template>

<style>
#cardView{
    max-width: 90%;
}

#carousel{
  width:250px;
  height: 100px;
}
</style>

<script>

export default {
  data: () => ({
    show: false,
    cardList:[],
    files: [
        {
          color: 'blue',
          icon: 'mdi-phone',
          subtitle: '+1(321)984-2132',
          title: 'Contact Number',
        },
        {
          color: 'amber',
          icon: 'mdi-email',
          subtitle: 'demo@gmail.com',
          title: 'Email',
        },
      ],
      folders: [
        {
          subtitle: 'insta.com',
          title: 'Instagram',
          icon:'mdi-instagram'
        },
        {
          subtitle: 'fb.com',
          title: 'Facebook',          
          icon:'mdi-facebook'
        },
        {
          subtitle: 'linkdin.com',
          title: 'linkdin',         
          icon:'mdi-account'
        },
      ],
      }),
  methods:{
      saveData(data){
          this.cardList = data;
      }
  },
};
</script>