<template lang="pug">
  off(
    class="text-xs-center"
  )
    v-card(flat)
      v-card-text
        .titleOff WANT 80% OFF?
        .subTitleOff SUBSCRIBE BELOW TO GET
        v-flex.email(
          xs4
          offset-xs4
          class="text-xs-center"
        )
          v-text-field(
            type="email"
            label="Email"
            v-model="email"
            :rules="rules.email"
          )
          v-btn(
            dark
            color="black"
            @click="sendEmail"
          ) SUBSCRIBE
</template>

<script>
export default {
  data: () => ({
    email: '',
    rules: {
      email: [
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'Invalid E-mail'
      ]
    }
  }),
  methods: {
    sendEmail () {
      this.email = ''
      this.$swal('Discount coupon was sent to your email..')
    }
  }
}
</script>

<style scoped>
* {
  background-color: #F5F5F5;
}
.titleOff {
  font-size: 60px;
}
.subTitleOff {
  font-size: 25px;
}
.email {
  margin-top: 30px;
}
</style>
