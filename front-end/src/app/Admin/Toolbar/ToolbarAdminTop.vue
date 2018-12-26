<template lang="pug">
  toolbar-admin-top
    v-toolbar
      v-toolbar-title
        v-btn.xs2(
          href="#/home"
          default
          flat
        )
          v-img(
            src="./static/vintage/Captura de tela de 2018-12-18 01-02-31.png"
            width="100"
            to="/"
          )
      v-spacer
      v-btn.xs2(
        align-end
        href="#/login"
        flat
      ) Sing out
</template>

<style scoped>
.v-toolbar {
  background-color: white;
  padding-top: 10px;
  padding-bottom: 10px;
}
</style>
