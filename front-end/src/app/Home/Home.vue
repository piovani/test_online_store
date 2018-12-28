<template lang="pug">
  home
    Toolbar
    v-card
      v-img(
        src="./static/vintage/banner.png"
      )
    v-card
      v-img(
        src="./static/home/featured-for-man.png"
      )
    v-card
      v-img(
        src="./static/home/featured-for-woman.png"
      )
    Footer
</template>

<script>
import Toolbar from '@/components/Toolbar/Toolbar'
import Footer from '@/components/Footer/Footer'
import HomeService from './HomeService'
import CardProduct from '@/app/Admin/Products/CardProduct/CardProduct'

export default {
  components: {
    Toolbar,
    Footer,
    CardProduct
  },
  created () {
    this.getProducts()
  },
  data: () => ({
    forMan: [],
    forWoman: []
  }),
  methods: {
    getProducts () {
      HomeService.getItems().then(({ data }) => {
        this.forMan = data.man
        this.forWoman = data.woman
      })
    }
  }
}
</script>
