<template>
  <q-layout view="hHh Lpr lff">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />

        <q-toolbar-title>
          Quasar App
        </q-toolbar-title>

        <div>Quasar v{{ $q.version }}</div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
      content-class="bg-amber-3"
    >
      <q-list>
        <q-item-label
          header
          class="text-grey-8"
        >
          Essential Links
        </q-item-label>
        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>
<script>

import EssentialLink from 'components/EssentialLink.vue';

const linksData = [
  {
    title: 'Order',
    caption: 'Can I take your order? ',
    icon: 'search',
    link: '',
  },
  {
    title: 'I have a Restaurant',
    caption: 'Register your restaurant',
    icon: 'fastfood',
    link: '',
  },
  {
    title: 'My previous orders',
    caption: 'Check you orders',
    icon: 'shopping_cart',
    link: '',
  },
  {
    title: 'Sign in',
    caption: '',
    icon: 'account_box',
    link: '',
  },
];

export default {
  name: 'MainLayout',
  components: { EssentialLink },
  data() {
    return {
      leftDrawerOpen: false,
      essentialLinks: linksData,
    };
  },
};
</script>
