<template lang="pug">
  Admin
    ToolbarAdminTop
    v-layout(xs12)
      v-flex(xs3 md2)
        ToolbarAdminSide
      v-flex(xs11 md12)
        ProductAdmin
    v-footer(fixed)
      v-flex
        v-card-actions.justify-center 2018 Vintage - All rights reserved
</template>

<script>
import ToolbarAdminTop from './Toolbar/ToolbarAdminTop'
import ToolbarAdminSide from './Toolbar/ToolbarAdminSide'
import ProductAdmin from './Products/Product'

export default {
  components: {
    ToolbarAdminTop,
    ToolbarAdminSide,
    ProductAdmin
  }
}
</script>

<style scoped>

</style>
