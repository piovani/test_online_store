<template lang="pug">
  modal-import
    v-btn(
      dark
      round
      color="blue"
      @click="openModal"
    ) IMPORT PRODUCT
    v-dialog(
      v-model="modal"
      max-width="600"
    )
      v-toolbar
        v-toolbar-title UPDATE CSV
        v-spacer
        v-btn(
          icon
          @click="closeModal"
        )
          v-icon close
      v-card(
        hover
        raised
        )
        v-form(
          ref="form"
          lazy-validation
          v-model="valid"
          )
          input(
            type="file"
            accept=".csv"
            ref="file"
            @change="getFileData"
          )
        v-card-actions
          v-layout(align-end)
            v-flex(offset-xs1)
              v-btn(
                @click="importProducts"
              ) SAVE
              v-btn(
                @click="closeModal"
              ) CANCEL
</template>

<script>
import ProductService from '../ProductAdminService.js'

export default {
  data: () => ({
    valid: false,
    modal: false,
    file: null
  }),
  methods: {
    openModal () {
      this.modal = true
    },
    closeModal () {
      this.modal = false
    },
    importProducts () {
      let formData = new FormData()
      formData.append('file', this.file)
      ProductService.importProduct(formData).then((response) => {
        this.$swal('File imported successfully, it is now just waiting for the processing email.')
      }).catch(() => {
        this.$swal({
          type: 'error',
          title: 'Oops...',
          text: 'Something went wrong, try again later'
        })
      })
      this.clearFields()
      this.$router.push('/admin/productList')
    },
    getFileData (event) {
      this.file = event.target.files[0]
    },
    clearFields () {
      this.valid = false,
      this.modal = false,
      this.file = null
    }
  }
}
</script>
