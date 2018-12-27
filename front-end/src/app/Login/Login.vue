<template lang="pug">
  login
    v-flex#card(
      xs4
      md2
      lg2
      offset-xs5
    )
      v-card(flat)
        v-img#logo(
          aspect-ratio="4"
          src="./static/vintage/VintageGG.png"
        )
        v-form(
          ref="form"
          v-model="valid"
          lazy-validation
        )
          v-flex
            v-text-field(
              outline
              required
              type="email"
              label="Email"
              :rules="rules.email"
              dont-fill-mask-blanks
              v-model="payload.email"
            )
            v-text-field(
              outline
              required
              type="password"
              label="Password"
              dont-fill-mask-blanks
              :rules="rules.password"
              v-model="payload.password"
            )
            v-btn(
              dark
              round
              type="submit"
              color="#0000ff"
              @click="login()"
            ) SignIn
          v-btn(
            flat
            href="#/home"
            color="#0000ff"
          ) SignUp
    v-footer(
      fixed
    )
      v-flex
        v-card-actions.justify-center 2018 Vintage - All rights reserved
</template>

<script>
import LoginService from './LoginService'

export default {
  data: () => ({
    valid: true,
    payload: {
      email: '',
      password: ''
    },
    rules: {
      email: [
        v => !!v || 'E-mail is required',
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'Invalid E-mail'
      ],
      password: [
        v => !!v || 'Password is required'
      ]
    }
  }),
  methods: {
    login () {
      if (!this.$refs.form.validate()) return
      LoginService.login(this.payload).then((response) => {
        LoginService.saveToken(response.data.token)
        this.$router.push('/admin/productList')
      }).catch((err) => {
        console.log(err.response.data)
      })
    }
  }
}
</script>

<style scoped>
* {
  text-transform: none! important;
}
#card {
  padding-top: 5%;
}
#logo {
  margin-bottom: 50px;
}
</style>
