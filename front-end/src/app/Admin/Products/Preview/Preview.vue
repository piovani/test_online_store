<template lang="pug">
  preview
    Toolbar
    v-layout
      v-flex(xs12)
        v-card(
          flat
          class="white--text"
        )
          v-layout
            v-flex(xs4)
              v-img(
                contain
                aspect-ratio="1.50"
                :src="item.image1"
              )
            v-flex(xs6)
              v-card-text
                .subTitle {{ item.sub_name }}
                .titleProduct {{ item.name }}
                .price $ {{ formatValue(item.price)  }}
                input.quantity(
                  type="number"
                  :value="quantity"
                )
                .description {{ item.description }}
              v-flex(text-xs-center mt-3)
                v-btn(
                  color="black"
                  dark
                ) ADD TO CART
    #spacer
    v-flex(xs12)
      Off
    v-flex(xs12)
      Footer
</template>

<script>
import Toolbar from '@/components/Toolbar/Toolbar'
import FormatValue from '@/Mixins/FormatValue'
import Off from '@/app/Home/Off/Off'
import Footer from '@/components/Footer/Footer.vue'

export default {
  mixins: [FormatValue],
  components: {
    Toolbar,
    Off,
    Footer
  },
  data: () => ({
    quantity: 1,
    item: {
      name: 'Gold',
      sub_name: 'Prof. Kayli Schiller MD',
      price: 1000.00,
      description: 'Quidem dolores rem et aperiam. Culpa et voluptatem consequatur praesentium qui. Et illum rerum aut id qui deserunt vitae. Itaque eaque cum eius ut. Laborum necessitatibus neque occaecati amet placeat. Qui et voluptatum qui tenetur accusamus excepturi.',
      image1: 'https://cdn.vuetifyjs.com/images/cards/foster.jpg'
    }
  })
}
</script>

<style scoped>
* {
  color: black;
  text-align: left;
}
#spacer {
  margin-bottom: 50px;
}
.v-card {
  margin-top: 50px;
  margin-left: 200px;
}
.subTitle {
  font-size: 20px;
}
.titleProduct {
  margin-bottom: 20px;
  font-size: 40px;
}
.price {
  font-size: 60px;
  font-weight: 900;
}
.quantity {
  margin-top: 20px;
  margin-bottom: 40px;
  width: 100px;
  height: 20px;
}
.description {
  text-align: justify;
  margin-bottom: 40px;
}
</style>
