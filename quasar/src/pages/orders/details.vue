<template>
  <q-page padding>
    <h1 class="q-display-2">
      Orders Details
    </h1>

    <q-card v-for="i in 4" :key="i" class="q-mb-sm">
      <q-card-main class="row">
        <div class="col-md-1 col-xs-2">
          <img src="~assets/avatar.png" alt="" style="width:50px" class="round-borders">
        </div>
        <div class="col flex items-center">
          Name of the product
        </div>
        <div class="col-md-4 flex items-center justify-end">
          1
        </div>
        <div class="col-2 flex items-center justify-end">
          $ 10,00
        </div>
      </q-card-main>
    </q-card>

    <div class="row">
      <q-card class="col-xs-12 col-md-6 offset-md-6 text-black text-right" color="grey-3">
        <q-card-main>
          Delivery: $ 10,00
        </q-card-main>
        <q-card-main>
          Delivery: $ 40,00
        </q-card-main>
        <q-card-main>
          Delivery: $ 50,00
        </q-card-main>
        <q-card-actions class="flex justify-end">
          <q-btn color="green" label="Status of the order" :to="'/order/' + $route.params.id"/>
        </q-card-actions>
      </q-card>
    </div>
  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
};
</script>

<style>
</style>
