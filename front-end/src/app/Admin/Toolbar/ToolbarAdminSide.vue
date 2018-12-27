<template lang="pug">
  toolbar-admin-side
    v-navigation-drawer(
      permanent
      width="220"
      height="345"
    )
      v-list(class="pa-2")
        v-list-tile-content
          v-list-tile-title MENU
      v-list
        v-list-tile(
          v-for="item in items"
          :key="item.title"
          :to="item.path == '#' ? '' : item.path"
          @click=""
        )
          v-list-tile-action
          v-list-tile-content
            v-list-tile-title {{ item.title }}
</template>

<script>
export default {
  data: () => ({
    items: [
      {title: 'PRODUCTS', path: '/admin/productList'},
      {title: 'ORDERS'},
      {title: 'CUSTOMERS'},
      {title: 'ANALYTICS'},
      {title: 'DISCOUNTS'},
      {title: 'APPS'}
    ]
  })
}
</script>

<style scoped>

</style>
