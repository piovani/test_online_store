<template lang="pug">
  product-form
    v-card
      v-layout(row)
        v-flex(xs6)
          v-btn(
            dark
            round
            color="blue"
            @click="saveProduct"
          ) UPDATE
          v-btn(
            dark
            round
            color="grey"
          ) CANCEL
          v-btn(
            dark
            round
            color="red"
          ) DELETE
        v-flex(xs6)
          v-btn(
            dark
            round
            color="blue"
          ) PREVIEW
      v-layout(row)
        v-flex(xs6)
          v-form(
            v-model="valid"
          )
            v-text-field(
              solo
              required
              label="Product name"
              v-model="product.name"
              :rules="nameRules"
            )
            v-text-field(
              solo
              required
              label="Product sub name"
              v-model="product.subName"
              :rules="nameRules"
            )
            v-text-field(
              solo
              required
              label="Price"
              maxlength="13"
              v-model="product.price"
              :rules="nameRules"
            )
            v-spacer
            v-textarea(
              solo
              required
              label="Description"
              v-model="product.description"
              :rules="nameRules"
            )
</template>

<script>
import ProductAdminService from './ProductAdminService.js'

export default {
  components: {
  },
  data: () => ({
    valid: false,
    product: {
      name: '',
      subName: '',
      price: '',
      description: ''
    }
  }),
  methods: {
    saveProduct () {
      ProductAdminService.save(this.product).then((response) => {
        this.$swal('The product was successfully registered').then(() => {
          this.$router.push('./#/home')
        })
      }).catch(() => {
        this.$swal({
          type: 'error',
          title: 'Oops...',
          text: 'Something went wrong, try again later',
        })
      })
    }
  }
}
</script>

<style scoped>

</style>