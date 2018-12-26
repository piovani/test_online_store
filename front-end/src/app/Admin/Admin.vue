<template lang="pug">
  Admin
    ToolbarAdminTop
    ProductAdmin
    v-footer(
      fixed
    )
      v-flex
        v-card-actions.justify-center 2018 Vintage - All rights reserved
</template>

<script>
import ToolbarAdminTop from './Toolbar/ToolbarAdminTop'
import ProductAdmin from './Products/Product'

export default {
  components: {
    ToolbarAdminTop,
    ProductAdmin
  }  
}
</script>

<style scoped>

</style>
