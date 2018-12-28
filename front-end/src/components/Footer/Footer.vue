<template lang="pug">
  v-footer(
    color="black"
    dark
    height="200"
  )
    v-layout
      v-flex(
        xs3
        text-xs-center
      )
        v-card(
          color="black"
        )
          v-img#logo(
            height="120"
            width="120"
            src="static/vintage/vintage-footer.png"
          )
      v-flex(xs3)
        v-card(
          color="black"
        )
          .titleFooter ABOUT
          .itemFooter OUR MISSION
          .itemFooter ABOUT US
          .itemFooter REVIEWS
      v-flex(xs3)
        v-card(
          color="black"
        )
          .titleFooter MENU
          .itemFooter FOR MEN
          .itemFooter FOR WOMAN
          .itemFooter OTHERS
      v-flex(xs3)
        v-card(
          color="black"
        )
          .titleFooter SOCIAL MEDIA
          v-btn(icon)
            v-icon library_books
          v-btn(icon)
            v-icon send
          v-btn(icon)
            v-icon ondemand_video
        v-flex(
          lighten-2
          py-3
          x6
        )
        v-flex(xs6)
          h4 2018 Vintage - All rights reserved.
</template>

<style scoped>
* {
  background-color: black;
}
#logo {
  margin-left: 100px;
}
.titleFooter {
  font-weight: 900;
  font-size: 18px;
}
.itemFooter {
  margin-top: 15px;
}
</style>
