<template>
  <div id="q-app">
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      request_counter: 0,
    };
  },
  watch: {
    request_counter(counter) {
      if (counter > 0) {
        this.$q.loading.show({
          message: 'Wait please',
        });
      } else {
        this.$q.loading.hide();
      }
    },
  },
  methods: {
    request_subtract() {
      if (this.request_counter > 0) {
        this.request_counter -= 1;
      }
    },
  },
  mounted() {
    if (this.$q.cookies.has('token')) {
      const token = this.$q.cookies.get('token');
      this.$axios.defaults.headers.common.Authorization = `Bearer ${token}`;
    }
    this.$axios.interceptors.request.use((config) => {
      this.request_counter += 1;

      return config;
    }, (error) => {
      this.request_subtract();
      return Promise.reject(error);
    });

    this.$axios.interceptors.response.use((response) => {
      this.request_subtract();
      return response;
    }, (error) => {
      this.request_counter();
      return Promise.reject(error);
    });
  },
};
</script>

<style>
</style>
