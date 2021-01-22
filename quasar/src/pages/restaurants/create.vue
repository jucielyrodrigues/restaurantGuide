<template>
  <q-page padding>
    <h1 class="q-display-2">Register your restaurant</h1>

    <form @submit.prevent="submit()" class="row gutter-md">
      <div class="col-12">
        <q-field icon="label">
          <q-input
            type="text"
            v-model="data.title"
            float-label="restaurant name"
            autofocus
          />
        </q-field>
      </div>

      <div class="col-12">
        <q-field icon="insert_photo">
          <q-uploader
          url=""
          hide-upload-button
          float-label="Photo of the restaurant"
          @add="addFile"/>
        </q-field>
      </div>

      <div class="col-6">
        <q-field icon="timer">
          <q-input
            type="text"
            v-model="data.delivery_time"
            float-label="Time to delivery"
          />
        </q-field>
      </div>

      <div class="col-6">
        <q-field icon="attach_money">
          <q-input
            type="text"
            v-model="data.delivery_price"
            float-label="Price to delivery"
          />
        </q-field>
      </div>

      <div class="col-12">
        <h2 class="q-display-1">Adress</h2>
        <address-fields v-model="address"></address-fields>
      </div>

      <div class="col">
        <q-btn type="submit" color="primary" class="q-my-md q-mr-sm"
          >Save</q-btn
        >
        <q-btn type="submit" color="secondary" class="q-my-md" to="/restaurants"
          >Back</q-btn
        >
      </div>
    </form>
  </q-page>
</template>

<script>
import AddressFields from '../../components/address_fields';

export default {
  data() {
    return {
      data: {},
      address: {},
      formData: null,
    };
  },
  components: {
    'address-fields': AddressFields,
  },
  watch: {
    address(newValue) {
      console.log(newValue);
    },
  },
  methods: {
    addFile(file) {
      this.formData.append('photo', file[0]);
    },
    async submit() {
      Object.keys(this.data).forEach(key => this.formData.append(key, this.data[key]));
      Object.keys(this.address).forEach(key => this.formData.append(key, this.address[key]));
      await this.$store.dispatch('restaurants/create', { vue: this, data: this.formData });
      this.$q.notify({
        message: 'Restaurant successfully added',
        type: 'positive',
      });
      this.$router.push('/restaurants');
    },
  },
  mounted() {
    this.formData = new FormData();
  },
};
</script>

<style>
</style>
