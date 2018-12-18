<template lang="pug">
  toolbar
    v-flex#free
      p FREE SHIPPING
    v-toolbar
      v-flex
        v-card
          v-img(
            src="./static/vintage/Captura de tela de 2018-12-18 01-02-31.png"
            width="100"
          )
      v-spacer
      v-toolbar-items
        v-btn(
          flat
        ) Link One
        v-btn(
          flat
        ) Link Two
        v-btn(
          flat
        ) Link Three
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
