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
      v-card(v-for="(tipo, index) in categorias")
        v-card dasd
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

export default {
  components: {
    Toolbar,
    Footer
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
