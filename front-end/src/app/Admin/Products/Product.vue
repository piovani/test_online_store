<template lang="pug">
  products-admin
    v-card
      v-layout(row)
        v-flex(xs6)
          v-btn(
            color="blue"
            round
            dark
          ) ADD PRODUCT
          v-btn(
            color="blue"
            round
            dark
          ) IMPORT PRODUCT
        v-flex(offset-xs2)
          v-text-field( 
            v-model="pagination.search"
            append-icon="search"
            label="Search"
            single-line
            hide-details
          )
      v-data-table(
        :headers="headers"
        :items="products"
        :pagination.sync="pagination"
        :total-items="pagination.totalItems"
        :rows-per-page-items="[10]"
        :search="pagination.search"
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
              dark
              round
              color="red"
              @click="confirmDeleteProduct(props.item.id)"
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
    pagination: {
      rowsPerPage: 10,
      page: 1,
      totalItems: 0,
      seach: ''
    },
    headers: [],
    products: []
  }),
  methods: {
    getHeaders () {
      this.headers = ProductService.getHeaders()
    },
    getProduts () {
      ProductService.getList(this.pagination).then((response) => {
        this.products = response.data.data
        this.pagination.rowsPerPage = response.data.per_page
        this.pagination.page = response.data.current_page
        this.pagination.totalItems = response.data.total
      })
    },
    confirmDeleteProduct (id) {
      this.$swal({
        title: 'Are you sure you want to delete this product?',
        type: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        buttonsStyling: true
      }).then((result) => {
        if (result.value === true) {
          this.deleteProduct(id)
        }
      })
    },
    deleteProduct (id) {
      ProductService.delete(id).then(() => this.getProduts())
        .catch(({ response }) => {
          this.$swal({
            title: response.data,
            type: 'error'
          })
        })
    }
  },
  watch: {
    pagination () {
      this.getProduts()
    }
  }
}
</script>

<style scoped>

</style>
