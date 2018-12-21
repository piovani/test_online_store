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

export default {
  components: {
    Toolbar,
    Footer
  },
  created () {
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
  })
}
</script>
