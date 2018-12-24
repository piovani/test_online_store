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
      v-carrousel-item(
        v-for="(item,i) in items"
        :key="i"
        :src="item.foto"
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
    items: [
      {
        foto: './static/relogio.jpg'
      },
      {
        foto: './static/relogio.jpg'
      }
    ]
  }),
  methods: {
    getItems() {
      HomeService.getItems()
      .then((response) => {
        console.log(this.items);
        this.items = response.data
        console.log(this.items);
      })
    }
  }
}
</script>
