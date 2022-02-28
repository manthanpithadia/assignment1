<template>
  <v-container>

    <v-alert
      v-model="alert"
      dismissible
      color="red"
      border="left"
      elevation="2"
      colored-border
      icon="mdi-alert-outline"
    >
      Sorry <strong>No items</strong> Available.
    </v-alert>
    
    

    <v-row>
      <table>
      <tr>
          <td>{{productTableData}}</td>
      </tr>
    </table>
      <v-col v-for="card in cards" :key="card" cols="4">
        <div>
          <v-card
            id="cardView"
            :loading="loading"
            class="mx-auto my-12"
            max-width="374"
            elevation="3"            
            >
            <template slot="progress">
              <v-progress-linear
                color="deep-purple"
                height="10"
                indeterminate
              ></v-progress-linear>
            </template>

            <v-img
              id="productImage"
              height="250"
              v-bind:src="card.image"
              alt="image not found"
              v-on:click="openProductDetails(card)"
            />

            <v-card-title id="productTitle">
              <div>
                {{ card.title }}
              </div>

              <div>
                ${{ card.price }}
              </div>
            </v-card-title>

            <v-card-text>
              <v-row align="center" class="mx-0">
                <v-rating
                  :value="card.rating"
                  color="amber"
                  dense
                  half-increments
                  readonly
                  size="14"
                ></v-rating>

                <div class="grey--text ms-4">
                  {{ card.rating }} ({{ card.feedback }})
                </div>
              </v-row>

              <div class="my-4 text-subtitle-1"></div>

              <div id="productDesc">
                {{ card.productDesc }}
              </div>
            </v-card-text>

            <v-divider class="mx-4" />
            <v-btn color="success" v-on:click="fetchAllData()">click</v-btn>
            <v-card-title>Colors</v-card-title>

            <v-card-text>
              <v-chip-group
                v-model="card.selection"
                active-class="deep-purple accent-4 white--text"
                column
              >
                <!-- colors -->
                <div v-for="color in card.colors" :key="color">
                  <v-chip
                    @click="
                      updateProduct(
                        color.imgUrl,
                        card.id,
                        color.avail,
                        color.id
                      )
                    "
                    >{{ color.name }}</v-chip
                  >
                </div>
              </v-chip-group>
              <br />
              <div id="btnBottom">
                <v-btn color="success" v-on:click="addToCart(card.id)">
                  <div id="navBadge">
                    <v-badge
                      :content="card.messages"
                      :value="card.messages"
                      color="blue"
                      overlap
                    >
                      <v-icon dark left> mdi-shopping </v-icon>
                    </v-badge>
                  </div>
                  <div id="btnText" >Add to cart</div>
                </v-btn>

                <v-btn text color="error" v-on:click="removeFromCart(card.id)">
                  Remove
                </v-btn>
              </div>
            </v-card-text>

            <v-card-actions> </v-card-actions>
            <v-expansion-panels accordion>
              <v-expansion-panel>
                <v-expansion-panel-header>
                  <div>
                    Feedbacks

                    <v-dialog v-model="dialog" width="500">
                      <template v-slot:activator="{ on, attrs }">
                        <v-icon id="plusIcon" small v-bind="attrs" v-on="on"
                          >mdi-plus-thick</v-icon
                        >
                      </template>

                      <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                          Feedback
                        </v-card-title>

                        <v-card-text id="textArea">
                          <v-textarea
                            outlined
                            name="input-7-4"
                            label="User Feedback"
                            value="I Love this Product"
                          ></v-textarea>
                        </v-card-text>

                        <v-divider></v-divider>

                        <v-card-actions>
                          <v-spacer></v-spacer>
                          <v-btn color="primary" text @click="dialog = false">
                            Submit
                          </v-btn>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                  </div>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <!-- Feedback List -->
                  <v-list three-line>
                    <template v-for="(item, index) in items">
                      <v-subheader
                        v-if="item.header"
                        :key="item.header"
                        v-text="item.header"
                      ></v-subheader>

                      <v-divider
                        v-else-if="item.divider"
                        :key="index"
                        :inset="item.inset"
                      ></v-divider>

                      <v-list-item v-else :key="item.title">
                        <v-list-item-avatar>
                          <v-img :src="item.avatar"></v-img>
                        </v-list-item-avatar>

                        <v-list-item-content>
                          <v-list-item-title
                            v-html="item.title"
                          ></v-list-item-title>
                          <v-list-item-subtitle
                            v-html="item.subtitle"
                          ></v-list-item-subtitle>
                        </v-list-item-content>
                      </v-list-item>
                    </template>
                  </v-list>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
          </v-card>
        </div>
      </v-col>
      <!-- <DataTransfer
      v-for="(row) in cards" :key="row.id" :cards=row
    ></DataTransfer> -->
      <dataTransfer v-for="(row) in cards" :key="row.id" :cards=row></dataTransfer>
    </v-row>
  </v-container>
</template>

<style>
#productTitle {
  justify-content: space-between;
}

#navBadge {
  padding-bottom: 8px;
}
#productImage{
  cursor: pointer;
}
#productDesc {
  text-align: left;
}
#textArea {
  margin-top: 20px;
}
#plusIcon {
  color: #3a3a3a;
  background: #b8b8b8;
  border-radius: 60px;
  margin-left: 10px;
  padding: 5px;
}

#btnText {
  margin-left: 15px;
}

#btnBottom {
  display: flex;
  justify-content: space-between;
}
</style>

<script>
// Importing the DataTransfer component
import dataTransfer from './dataTransfer.vue'
import axios from 'axios'
import Vue from 'vue';
import VueAxios from 'vue-axios'
Vue.use(VueAxios,axios)

export default {
  name: "productCardView.vue",
  components: {dataTransfer},
  data: () => ({
    productTableData:'',
    cart: 1,
    alert: false,
    dialog: false,
    cards: [
      {
        id: 0,
        messages: 0,
        image:
          "https://media.gq.com/photos/602ea7404be267beb28bb43f/master/w_2000,h_1334,c_limit/costco.jpg",
        title: "T-shirt",
        rating: "4.5",
        feedback: "400",
        chip: 0,
        colors: [
          {
            id: 0,
            name: "Black",
            imgUrl:
              "https://media.gq.com/photos/602ea7404be267beb28bb43f/master/w_2000,h_1334,c_limit/costco.jpg",
            avail: true,
          },
          {
            id: 1,
            name: "Yellow",
            imgUrl:
              "https://www.leatherclue.com/image/cache/catalog/AB_TEES/Plain%20T/yellow-men-s-tshirt-550x550.jpg",
            avail: false,
          },
          {
            id: 2,
            name: "White",
            imgUrl:
              "https://media.gq.com/photos/609596bb19cc29647abfe47a/master/w_1800,h_1200,c_limit/61xVh4j40iL._AC_UL1200_.jpg",
            avail: true,
          },
          {
            id: 3,
            name: "Blue",
            imgUrl:
              "https://i5.walmartimages.com/asr/23cf9221-aa59-4392-a336-0b3d9f999c30.88dd27322932e0d9eff4ad1951b83266.jpeg?odnHeight=580&odnWidth=580&odnBg=FFFFFF",
            avail: false,
          },
        ],
        productDesc: "In Stock",
        price: 40,
        selection: 0,
        details:"MICHIGAN ARTISTS & PRINTERS | this design was drawn and screen printed (silk screened) with pride by our skilled illustrators and printers in Ann Arbor. If you're ever in the area, stop by for a free tour and see how we make your apparel! Tagless tag is printed on fabric inside collar, you can't feel it."
      },

      {
        id: 1,
        messages: 0,
        image:
          "https://pyxis.nymag.com/v1/imgs/503/7d9/0896ab3731f23e07c101569d646c92d157-threedotstee.2x.rdeep-vertical.w245.jpg",
        title: "T-shirt",
        rating: "3.9",
        feedback: "482",
        chip: 0,
        colors: [
          {
            id: 0,
            name: "Pure white ",
            imgUrl:
              "https://pyxis.nymag.com/v1/imgs/503/7d9/0896ab3731f23e07c101569d646c92d157-threedotstee.2x.rdeep-vertical.w245.jpg",
            avail: true,
          },
          {
            id: 1,
            name: "Jet black",
            imgUrl:
              "https://i5.walmartimages.com/asr/2853b798-b731-496e-8170-02f74f65fc68_1.43ea1192a19c761faa162e114a0ab91d.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF",
            avail: true,
          },
          {
            id: 2,
            name: "Vino",
            imgUrl:
              "https://cf.shopee.ph/file/6cecf9627284efe8817d5a8902e4e5d7",
            avail: false,
          },
        ],
        productDesc: "In Stock",
        price: 50,
        selection: 0,
        details:"95% Cotton, 5% Spandex Suggest to hand wash ,Machine wash is ok , with Cold Water, Not Bleach. Unisex Size, Adult size fit Men ,Women,almost all people, standard size S-2xl can choose. Funny Graphic Friend prints Letter Top, Short sleeve, Crew neck.Lightweight and Cool To Wear In Spring, Summer and Fall . Suitable for Casual, Workout, Going Out ,Work, Travel, Home, Office,You Can Pair with Fashion Jeans, Shorts, Pants, Trousers,Legging, Skirts. You can pair this basic tops under a jacket, with jeans, leggings or a skirt in spring, summer, fall and winter. A wardrobe must-have! We listen to customer feedback and fine-tune every detail to ensure quality, fit, and comfort."
      },

      {
        id: 2,
        messages: 0,
        image:
          "https://5.imimg.com/data5/NI/GW/MY-19078323/girls-plain-regular-fit-denim-jeans-500x500.jpg",
        title: "Jeans",
        rating: "4",
        feedback: "365",
        chip: 0,
        colors: [
          {
            id: 0,
            name: "Blue",
            imgUrl:
              "https://5.imimg.com/data5/NI/GW/MY-19078323/girls-plain-regular-fit-denim-jeans-500x500.jpg",
            avail: true,
          },
          {
            id: 1,
            name: "Black",
            imgUrl:
              "https://img.hollisterco.com/is/image/anf/KIC_355-1166-0655-900_prod1?policy=product-medium",
            avail: false,
          },
          {
            id: 2,
            name: "Gray",
            imgUrl:
              "https://target.scene7.com/is/image/Target/GUEST_56a8f75b-bc7d-4973-bcb5-89e69e72b646",
            avail: true,
          },
        ],
        productDesc: "In Stock",
        price: 25,
        selection: 0,
        details:"Zipper closure Available in extended sizes Premium quality, super stretchy denim Hugs your curves and keeps its shape all day Quality is our Signature INSEAM (S=29, M=31, L=33) New Brand Logo and Packaging"
      },

      {
        id: 3,
        messages: 0,
        image:
          "https://pyxis.nymag.com/v1/imgs/503/7d9/0896ab3731f23e07c101569d646c92d157-threedotstee.2x.rdeep-vertical.w245.jpg",
        title: "T-shirt",
        rating: "3.9",
        feedback: "482",
        chip: 0,
        colors: [
          {
            id: 0,
            name: "Pure white ",
            imgUrl:
              "https://pyxis.nymag.com/v1/imgs/503/7d9/0896ab3731f23e07c101569d646c92d157-threedotstee.2x.rdeep-vertical.w245.jpg",
            avail: true,
          },
          {
            id: 1,
            name: "Jet black",
            imgUrl:
              "https://i5.walmartimages.com/asr/2853b798-b731-496e-8170-02f74f65fc68_1.43ea1192a19c761faa162e114a0ab91d.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF",
            avail: true,
          },
          {
            id: 2,
            name: "Vino",
            imgUrl:
              "https://cf.shopee.ph/file/6cecf9627284efe8817d5a8902e4e5d7",
            avail: false,
          },
        ],
        productDesc: "In Stock",
        price: 50,
        selection: 0,
        details:"95% Cotton, 5% Spandex Suggest to hand wash ,Machine wash is ok , with Cold Water, Not Bleach. Unisex Size, Adult size fit Men ,Women,almost all people, standard size S-2xl can choose. Funny Graphic Friend prints Letter Top, Short sleeve, Crew neck.Lightweight and Cool To Wear In Spring, Summer and Fall . Suitable for Casual, Workout, Going Out ,Work, Travel, Home, Office,You Can Pair with Fashion Jeans, Shorts, Pants, Trousers,Legging, Skirts. You can pair this basic tops under a jacket, with jeans, leggings or a skirt in spring, summer, fall and winter. A wardrobe must-have! We listen to customer feedback and fine-tune every detail to ensure quality, fit, and comfort."
      },

      {
        id: 4,
        messages: 0,
        image:
          "https://5.imimg.com/data5/NI/GW/MY-19078323/girls-plain-regular-fit-denim-jeans-500x500.jpg",
        title: "Jeans",
        rating: "4",
        feedback: "365",
        chip: 0,
        colors: [
          {
            id: 0,
            name: "Blue",
            imgUrl:
              "https://5.imimg.com/data5/NI/GW/MY-19078323/girls-plain-regular-fit-denim-jeans-500x500.jpg",
            avail: true,
          },
          {
            id: 1,
            name: "Black",
            imgUrl:
              "https://img.hollisterco.com/is/image/anf/KIC_355-1166-0655-900_prod1?policy=product-medium",
            avail: false,
          },
          {
            id: 2,
            name: "Gray",
            imgUrl:
              "https://target.scene7.com/is/image/Target/GUEST_56a8f75b-bc7d-4973-bcb5-89e69e72b646",
            avail: true,
          },
        ],
        productDesc: "In Stock",
        price: 25,
        selection: 0,
        details:"Zipper closure Available in extended sizes Premium quality, super stretchy denim Hugs your curves and keeps its shape all day Quality is our Signature INSEAM (S=29, M=31, L=33) New Brand Logo and Packaging"
      },
    ],

    //Feedbacks
    items: [
      { header: "Today" },
      {
        avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
        title: "John",
        subtitle: `This Product is really Good`,
      },
      { divider: true, inset: true },
      {
        avatar: "https://cdn.vuetifyjs.com/images/lists/2.jpg",
        title: "Mike",
        subtitle: `Good Service`,
      },
    ],
    loading: false,
  }),
  props: {
    getBadge: Function,
  },
  /*
  mounted(){
      Vue.axios.post('../retrieve.php')
      .then((response)=>{
        this.alert(response);
      })
  },*/
  methods: {

    reserve() {
      this.loading = true;
      setTimeout(() => (this.loading = false), 2000);
    },

    updateProduct(variantImage, index, avail, colorID) {
      this.cards[index].image = variantImage;
      this.cards[index].productDesc = this.setProductDesc(avail);
      this.cards[index].chip = colorID;
    },

    addToCart(index) {
      if (this.cards[index].colors[this.cards[index].chip].avail && this.cards[index].messages<10) {
        this.cards[index].messages++;
      } else {
        this.alert = true;
      }
    },

    removeFromCart(index) {
      if (this.cards[index].messages > 0) {
        this.cards[index].messages--;
      } else {
        this.alert = true;
      }
    },

    setProductDesc(avail) {
      return avail ? "In Stock" : "Out of Stock";
    },

    openProductDetails(card){
        this.$router.push({name:"ProductDetails",params:{data: card}})
    },

    fetchAllData(){
      axios.post('http://localhost/assignment1/src/retrieve.php')
      .then(function(response){
         alert(""+response.data);  
      })
     
    }
  },
  method:function(){
    this.fetchAllData();
  }

};
</script>

