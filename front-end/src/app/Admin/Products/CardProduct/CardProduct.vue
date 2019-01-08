<template lang="pug">
  card-product
    v-lagout
      v-flex
        v-card(
          height="400"
          width="300"
        )
          v-img#img(
            :src="item.image1"
          )
          v-lagout()
            v-flex(xs12)
              v-card(flat)
                #subTitle(class="text-sm-left") {{ item.sub_name }}
                #titleProduct(class="text-sm-left") {{ item.name }}
                #priceProduc(class="text-xs-right") {{ formatValue(item.price) }}

</template>

<script>
import FormatValue from '@/Mixins/FormatValue'
export default {
  mixins: [FormatValue],
  props: {
    item: {
      type: Object,
      default: () => ({
        subTitle: '',
        name: '',
        price: 0,
        image1: ''
      })
    }
  }
}
</script>

<style scoped>
#img {
  opacity: 0.6;
}
 #subTitle {
   font-size: 15px;
 }
 #titleProduct {
   font-size: 30px;
 }
 #priceProduc {
   font-size: 30px;
   font-weight: 900;
 }
</style>
