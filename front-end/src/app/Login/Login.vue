<template lang="pug">
  login
    v-flex.xs4#login
      v-card.xs4
        v-text-field(
          solo
          type="email"
          label="Email"
        )
        v-text-field(
          solo
          type="password"
          label="Password"
        )
        v-btn(
          xs4
          color="white"
        ) Cancel
        v-btn(
          dark
        ) Login
</template>

<script>
export default {
}
</script>

<style scoped>
.login {
  align-items: center;
}
#login {
  align-items: center;
  align-self: center;
}
</style>
