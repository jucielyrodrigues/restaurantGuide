<template>
  <q-page padding>
    <h1 class="q-display-2">
      Your details
    </h1>

    <div class="row gutter-md">
      <div class="col-xs-12 col-md-6">
        <q-card>
          <q-card-main>
            <form @submit.prevent="auth()">
              <p class="caption">Already have a account</p>

              <q-field icon="email">
                <q-input
                  type="email"
                  v-model="dataLogin.email"
                  float-label="Email"/>
              </q-field>

              <q-field icon="lock">
                <q-input
                  type="password"
                  v-model="dataLogin.password"
                  float-label="Password"/>
              </q-field>

              <q-btn type="submit" color="primary" class="q-my-md">Login in</q-btn>
              <!-- <q-btn color="primary" class="q-ma-md" @click="testar()">Testar</q-btn> -->

            </form>
          </q-card-main>
        </q-card>
      </div>

      <div class="col-xs-12 col-md-6">
        <q-card>
          <q-card-main>
            <form @submit.prevent="register()">
              <p class="caption">Sign up</p>

              <q-field icon="label">
                <q-input
                  type="text"
                  v-model="dataRegister.name"
                  float-label="Name"
                  autofocus/>
              </q-field>

              <q-field icon="email">
                <q-input
                  type="email"
                  v-model="dataRegister.email"
                  float-label="Email"/>
              </q-field>

              <q-field icon="lock">
                <q-input
                  type="password"
                  v-model="dataRegister.password"
                  float-label="Password"/>
              </q-field>

              <q-field icon="lock_open">
                <q-input
                  type="password"
                  v-model="dataRegister.passwordConfirmation"
                  float-label="Password Confirmation"/>
              </q-field>

              <q-btn type="submit" color="primary" class="q-my-md">Sign up</q-btn>

            </form>
          </q-card-main>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
import qs from 'qs';

export default {
  data() {
    return {
      dataLogin: {},
      dataRegister: {},
      token: null,
    };
  },
  methods: {
    // async testar() {
    //   const response = await this.$axios.get('/users/me.json', {
    //     headers: {
    //       Authorization: `Bearer ${this.token}`,
    //     },
    //   });
    //   console.log(response);
    // },
    async auth() {
      const data = qs.stringify(this.dataLogin);
      const response = await this.$axios.post('/users/login.json', data);

      const { token } = response.data.data;
      this.token = token;

      if (response.status === 200) {
        this.$q.notify({
          message: 'Successfully authenticated',
          type: 'positive',
        });
      }
    },
    async register() {
      if (!this.dataRegister.password
          || this.dataRegister.password !== this.dataRegister.passwordConfirmation) {
        const data = qs.stringity(this.data);

        const response = await this.$axios.post('http://localhost:8765/users/add.json', data);
        
        this.$q.notify({
          message: 'Passwords do not match',
        });
        return;
      }

      const data = qs.stringify(this.dataRegister);
      const response = await this.$axios.post('/users/add.json', data);

      if (response.status === 200) {
        this.$q.notify({
          message: 'Registered successfully',
          type: 'positive',
        });
      }
    },
  },
};
</script>

<style>
</style>
