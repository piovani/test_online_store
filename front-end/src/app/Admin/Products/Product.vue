<template lang="pug">
  products-admin
    v-data-table(
      :headers="headers"
      :items="products"
      class="elevation-1"
    )
      template(
        slot="items"
        slot-scope="props"
      )
        td {{ props.item.name }}
        td {{ props.item.sub_name }}
        td {{ props.item.price }}
        td
          v-btn(
            color="blue"
            round
            dark
          ) EDIT
          v-btn(
            color="red"
            round
            dark
          ) DELETE
</template>

<script>
import ProductService from './ProductAdminService.js'

export default {
  created () {
    this.getHeaders()
    this.getProduts()
  },
  data: () => ({
    headers: [],
    products: [],
  }),
  methods: {
    getHeaders() {
      this.headers = ProductService.getHeaders()
    },
    getProduts() {
      ProductService.getList(this.params)
      .then((response) => {
        this.products = response.data.data
      })
    }
  }
}
</script>

<style scoped>

</style>
