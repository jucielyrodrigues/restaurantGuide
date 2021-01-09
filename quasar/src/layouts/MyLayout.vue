<template>
  <q-layout view="hHh Lpr lff">
    <q-layout-header>
      <q-toolbar
        color="red"
      >
        <q-btn
          flat
          dense
          round
          @click="leftDrawerOpen = !leftDrawerOpen"
          aria-label="Menu"
        >
          <q-icon name="menu" />
        </q-btn>

        <q-toolbar-title>
          Quasar App
          <div slot="subtitle">Running on Quasar v{{ $q.version }}</div>
        </q-toolbar-title>

        <q-btn flat to="/cart">
          <transition enter-active-class="animated tada" leave-active-class="hidden">
            <q-chip icon="shopping_cart" :key="cart_count">{{ cart_count }}</q-chip>
          </transition>
        </q-btn>
      </q-toolbar>
    </q-layout-header>

    <q-layout-drawer
      v-model="leftDrawerOpen"
      content-class="bg-amber-3"
      id="sidebar"
    >
      <q-list
        no-border
        link
        inset-delimiter
      >
        <q-item>
          <img src="~assets/logo.png" alt="">
        </q-item>
        <q-list-header>How can I help you?</q-list-header>
        <q-item to="/home">
          <q-item-side icon="search" />
          <q-item-main label="You can order here"
            sublabel="Search for a restaurant nerby to you and order your food" />
        </q-item>
        <q-item to="/restaurants">
          <q-item-side icon="fastfood" />
          <q-item-main label="I have a restaurant"
            sublabel="Register your restaurant and receive orders" />
        </q-item>
        <q-item to="/orders">
          <q-item-side icon="shopping_cart" />
          <q-item-main label="My orders"
            sublabel="See your latest orders" />
        </q-item>
        <q-item to="/auth">
          <q-item-side icon="account_box" />
          <q-item-main label="Login"
            sublabel="Login in your account" />
        </q-item>
      </q-list>
    </q-layout-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { openURL } from 'quasar';

export default {
  name: 'MyLayout',
  data() {
    return {
      leftDrawerOpen: this.$q.platform.is.desktop,
      cart_count: 0,
    };
  },
  methods: {
    openURL,
  },
  watch: {
    cart_count(newValue, oldValue) {
      if (newValue > oldValue) {
        this.$q.notify({
          message: 'Pedido atualizado?',
          detail: 'Um novo item foi adicionado ao seu pedido, quer ir para o carrinho de compras?',
          type: 'positive',
          actions: [
            {
              label: 'Ver pedido',
              handler: () => {
                this.$router.push('/cart');
              },
            },
          ],
        });
      }
    },
  },
  mounted() {
    // setTimeout(() => {
    //   this.cart_count += 1;
    // }, 1000);

    // setTimeout(() => {
    //   this.cart_count += 1;
    // }, 5000);
  },
};
</script>

<style>
#sidebar .q-item.router-link-active {
  background: rgba(0, 0, 0, 0.1);
}
#sidebar .q-item.q-link:hover {
  background: rgba(0, 0, 0, 0.2);
}
#sidebar .q-item img {
  width: 80%;
  height: auto;
}
</style>
