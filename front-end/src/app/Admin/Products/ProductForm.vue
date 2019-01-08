<template lang="pug">
  product-form
    ToolbarAdminTop
    v-layout(xs12)
      v-flex(xs3 md2)
        ToolbarAdminSide
      v-flex(xs11 md12)
        v-card(flat)
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
                href="#/admin/productList"
              ) CANCEL
              v-btn(
                dark
                round
                color="red"
                :disabled="!edited"
                @click="deleteProduct"
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
                ref="form"
                v-model="valid"
                lazy-validation
              )
                v-text-field(
                  solo
                  required
                  maxlength="255"
                  label="Product name"
                  v-model="product.name"
                  :rules="rules.ruleRequired"
                )
                v-text-field(
                  solo
                  required
                  maxlength="255"
                  label="Product sub name"
                  v-model="product.subName"
                  :rules="rules.ruleRequired"
                )
                v-text-field(
                  solo
                  required
                  label="Price"
                  maxlength="10"
                  v-model="product.price"
                  :rules="rules.ruleRequired"
                  v-money="money"
                )
                v-spacer
                v-textarea(
                  solo
                  required
                  label="Description"
                  v-model="product.description"
                  :rules="rules.ruleRequired"
                )
    v-footer(fixed)
      v-flex
        v-card-actions.justify-center 2018 Vintage - All rights reserved
</template>

<script>
import ProductAdminService from './ProductAdminService'
import ToolbarAdminTop from '../Toolbar/ToolbarAdminTop'
import ToolbarAdminSide from '../Toolbar/ToolbarAdminSide'
import ModalImport from './importCSV/ModalImportCSV'
import { Money } from 'v-money'

export default {
  components: {
    ToolbarAdminTop,
    ToolbarAdminSide,
    ModalImport,
    Money
  },
  created () {
    this.setId()
  },
  data: () => ({
    edited: false,
    id: '',
    valid: true,
    rules: {
      ruleRequired: [
        v => !!v || 'This field is required'
      ]
    },
    product: {
      name: '',
      subName: '',
      price: '',
      description: ''
    },
    money: {
      decimal: ',',
      thousands: '.',
      prefix: 'R$ ',
      suffix: ' #',
      precision: 2,
      masked: false
    }
  }),
  methods: {
    saveProduct () {
      if (!this.$refs.form.validate()) return

      if (!this.id) {
        ProductAdminService.save(this.product).then((response) => {
          this.$swal('The product was successfully registered').then(() => {
            this.$router.push('/admin/productList')
          })
        }).catch(() => {
          this.$swal({
            type: 'error',
            title: 'Oops...',
            text: 'Something went wrong, try again later'
          })
        })
      }

      if (this.id) {
        ProductAdminService.edit(this.id, this.product).then((response) => {
          this.$swal('The product successfully changed').then(() => {
            this.$router.push('/admin/productList')
          })
        }).catch(() => {
          this.$swal({
            type: 'error',
            title: 'Oops...',
            text: 'Something went wrong, try again later'
          })
        })
      }
    },
    getProduct (id) {
      ProductAdminService.get(id).then(({ data }) => {
        this.product.name = data.name
        this.product.subName = data.sub_name
        this.product.price = data.price
        this.product.description = data.description
      })
    },
    setId () {
      const { params } = this.$route
      this.id = params.id
      if (this.id) {
        this.edited = true
        this.getProduct(this.id)
      }
    },
    deleteProduct () {
      ProductAdminService.delete(this.id).then(() => {
        this.$router.push('/admin/productList')
      })
        .catch(({ response }) => {
          this.$swal({
            title: response.data,
            type: 'error'
          })
        })
    }
  }
}
</script>
