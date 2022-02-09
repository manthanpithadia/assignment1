<template>
    <div> 
        
    </div>
</template>

<script>
export default {
    name:'dataTransfer.vue',
    data(){
        return{
            cardData: this.cards
        }
    },
    methods:{
        openProductDetails(){
            this.$router.push({name:"ProductDetails",params:{data: this.cards}})
        }
    },
    props:['cards']
}
</script>