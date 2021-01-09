<template>
  <q-page padding>
    <h1 class="q-display-2">
      Orders
    </h1>

    <q-stepper ref="stepper" color="green" :no-header-navigation="true">
      <q-step
        title="Payment methods"
        active-icon="access_time"
      >
        <h5 class="text-center">What is the payment method?</h5>
        <p class="text-center">
          <q-btn label="Ok" color="primary" @click="payment_form=true"/>
        </p>
      </q-step>

      <q-step
        title="Order received"
        active-icon="access_time"
      >
        <h5 class="text-center">Wait for confirmation from the restaurant?</h5>
      </q-step>

      <q-step
        title="Restaurant confirmation"
        active-icon="access_time"
      >
        <h5 class="text-center">Order confirmed</h5>
        <p class="text-center">
          We are preparing your order, it must be delivered after 40 minutes.
        </p>
      </q-step>

      <q-step
        title="Delivering"
        active-icon="access_time"
      >
        <h5 class="text-center">The delivery is on his way</h5>
        <p class="text-center">
          Keep an eye on your cell phone, the delivery may need information.
        </p>
      </q-step>

      <q-step
        title="Delivered"
        active-icon="access_time"
      >
        <h5 class="text-center">Enjoy</h5>
      </q-step>

      <!-- <q-stepper-navigation>
        <q-btn flat @click="$refs.stepper.previous()" label="Volta"/>
        <q-btn flat @click="$refs.stepper.next()" label="Avança"/>
      </q-stepper-navigation> -->
    </q-stepper>

    <q-modal v-model="payment_form" content-classes="q-pa-md" :no-backdrop-dismiss="true">
      <h4>Payment methods</h4>

      <q-field>
        <q-radio v-model="payment" val="1" label="Cash"/>
      </q-field>

      <q-field>
        <q-radio v-model="payment" val="2" label="Card"/>
      </q-field>

      <div v-if="payment === '1'">
        <q-field>
          <q-input
            type="text"
            v-model="change"
            float-label="Do you need change?"
          />
        </q-field>
      </div>

      <q-btn
        label="Confirm order?"
        color="primary"
        class="q-mt-sm"
        @click="pay()"
      />
    </q-modal>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      payment_form: false,
      payment: '1',
      change: 0.00,
    };
  },
  methods: {
    pay() {
      this.payment_form = false;
      this.$refs.stepper.next();
    },
  },
};
</script>

<style>
</style>
