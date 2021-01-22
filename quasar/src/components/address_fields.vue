<template>
  <div>
    <q-field>
      <q-input
        type="text"
        maxlength="8"
        v-model="cep"
        float-label="Postal Code"
        autofocus
      />
    </q-field>

    <div v-show="showAddressFields">
      <q-field>
        <q-input
          type="text"
          v-model="data.address"
          float-label="Your address"
        />
      </q-field>

      <q-field>
        <q-input
          type="text"
          v-model="data.number"
          float-label="Number"
        />
      </q-field>

      <q-field>
        <q-input
          type="text"
          v-model="data.complement"
          float-label="+ details"
        />
      </q-field>

      <q-field>
        <q-input
          type="text"
          v-model="data.neighborhood"
          float-label="Neighborhood"
        />
      </q-field>

      <q-field>
        <q-input
          type="text"
          v-model="data.city"
          float-label="Your City"
        />
      </q-field>

      <q-field>
        <q-input
          type="text"
          v-model="data.state"
          float-label="Your County"
        />
      </q-field>
    </div>
  </div>
</template>

<script>
export default {
  props: ['value'],
  data() {
    return {
      cep: this.value !== undefined ? this.value.eircode || null : null,
      data: this.value || {},
      showAddressFields: false,
    };
  },
  watch: {
    cep(newValue) {
      if (newValue.length === 8) {
        const removeAuthHeader = (data, headers) => {
          delete headers.common.Authorization;
          return data;
        };

        this.data.cep = newValue;
        this.$emit('input', this.data);

        this.$axios.get(`https://viacep.com.br/ws/${newValue}/json/`, {
          transformRequest: [removeAuthHeader],
        }).then((res) => {
          this.data.address = res.data.logradouro;
          this.data.neighborhood = res.data.bairro;
          this.data.city = res.data.localidade;
          this.data.state = res.data.uf;
          this.showAddressFields = true;
        });
        this.showAddressFields = true;
      } else {
        this.showAddressFields = false;
      }
    },
    data(newValue) {
      this.$emit('input', newValue);
    },
  },
  mounted() {
    if (this.cep !== null && this.cep.length === 8) {
      this.showAddressFields = true;
    }
  },
};
</script>

<style>
</style>
