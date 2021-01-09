<template>
  <q-page padding>
    <h1 class="q-display-2">
      <q-icon name="location_on"/> New adress
    </h1>

    <form @submit.prevent="submit()">
      <address-fields v-model="data"></address-fields>

      <q-btn type="submit" label="Salvar" color="primary" class="q-my-md"/>
    </form>
  </q-page>
</template>

<script>
import AddressFields from '../../components/address_fields';

export default {
  data() {
    return {
      data: {},
    };
  },
  components: {
    'address-fields': AddressFields,
  },
  methods: {
    submit() {
      console.log(this.data);
    },
  },
};
</script>

<style>
</style>
