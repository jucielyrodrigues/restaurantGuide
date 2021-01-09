<template>
  <q-page padding>
    <h1 class="q-display-2">
      Editing restaurant
    </h1>

    <form @submit.prevent="submit()" class="row gutter-md">
      <div class="col-12">
        <q-field icon="label">
          <q-input
            type="text"
            v-model="data.title"
            float-label="restaurant 1"
            autofocus/>
        </q-field>
      </div>

      <div class="col-12">
        <q-field icon="insert_photo">
          <q-input
            type="text"
            v-model="data.photo"
            float-label="Photo of the restaurant"/>
        </q-field>
      </div>

      <div class="col-6">
        <q-field icon="timer">
          <q-input
            type="text"
            v-model="data.delivery_time"
            float-label="Time do delivery"/>
        </q-field>
      </div>

      <div class="col-6">
        <q-field icon="attach_money">
          <q-input
            type="text"
            v-model="data.delivery_price"
            float-label="Delivery value"/>
        </q-field>
      </div>

      <div class="col-12">
        <h2 class="q-display-1">Adress</h2>
        <address-fields v-model="address"></address-fields>
      </div>

      <div class="col">
        <q-btn type="submit" color="primary" class="q-my-md q-mr-sm">Save</q-btn>
        <q-btn type="submit" color="secondary" class="q-my-md" to="/restaurants">Back</q-btn>
      </div>
    </form>
  </q-page>
</template>

<script>
import AddressFields from '../../components/address_fields';

export default {
  data() {
    return {
      data: {
        title: 'Restaurant one',
        delivery_time: '10 minuts',
        delivery_price: '10,00',
      },
      address: {
        address: 'Parnell street',
        number: '123',
        neiborhood: 'd1',
        city: 'Dublin',
        state: 'IE',
      },
    };
  },
  components: {
    'address-fields': AddressFields,
  },
  methods: {
    submit() {
      this.$q.notify({
        message: 'successfully update',
        type: 'positive',
      });
    },
  },
};
</script>

<style>
</style>
