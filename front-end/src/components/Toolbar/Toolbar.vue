<template lang="pug">
  toolbar
    v-flex#free
      p FREE SHIPPING
    v-toolbar
      v-spacer
      v-toolbar-title
        v-btn.xs2(
          href="/"
          default
          flat
        ) 
          v-img(
            src="./static/vintage/Captura de tela de 2018-12-18 01-02-31.png"
            width="100"
            to="/"
          )
      v-spacer
      v-toolbar-items.xs4
        v-btn(
          flat
        ) For Man
        v-btn(
          flat
        ) For Woman
        v-btn(
          flat
        ) Others
      v-spacer
      v-text-field.xs5(
        append-icon="search"
        label="Search..."
        single-line
        hide-details
      )
      v-badge.xs1(
        color="red"
      )
        span(
          slot="badge"
        ) 3
        v-icon(
          large
          color="black"
        ) shopping_cart
      v-spacer
      v-btn.xs2(
        align-end
        color="white"
        href="/login"
      ) Admin Area
</template>

<style scoped>
#free {
  background-color: black;
  color: white;
  height: 20px;
  font-weight: 500;
  padding-top: 2px;
}
.v-toolbar {
  background-color: white;
  padding-top: 10px;
  padding-bottom: 10px;
}
</style>
