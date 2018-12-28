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
    Carousel
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
import Carousel from './Carousel'

export default {
  components: {
    Toolbar,
    Footer,
    Carousel
  },
  created () {
    this.getItems()
  },
  data: () => ({
    items: [],
    categories: []
  }),
  methods: {
    getItems () {
      HomeService.getItems().then((response) => {
        this.items = response.data
      })
    }
  }
}
</script>
