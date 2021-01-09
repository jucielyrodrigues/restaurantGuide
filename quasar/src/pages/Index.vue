<template>
  <q-page padding class="bg-food">
    <div class="row gutter-md">
      <div class="col-xs-12 col-md-4">
        <q-card color="green">
          <q-card-title>
            <q-icon name="location_on"/> My location
          </q-card-title>
          <q-card-separator/>
          <q-card-main>
            near of ...
          </q-card-main>
          <q-card-actions>
            <q-btn to="/list-restaurants" flat label="See restaurants"/>
          </q-card-actions>
        </q-card>
      </div>

      <div class="col-xs-12 col-md-4">
        <q-card color="orange">
          <q-card-title>
            <q-icon name="account_box"/> Login in
          </q-card-title>
          <q-card-separator/>
          <q-card-main>
            You can order using an existing address. Access your account to started
          </q-card-main>
          <q-card-actions>
            <q-btn to="/list-restaurants" flat label="Login in"/>
          </q-card-actions>
        </q-card>
      </div>

      <div class="col-xs-12 col-md-4">
        <q-card color="primary">
          <q-card-title>
            <q-icon name="fastfood"/> Pick up a location
          </q-card-title>
          <q-card-separator/>
          <q-card-main>
            <q-btn
              to="/list-restaurants"
              color="white"
              text-color="primary"
              size="md"
              class="q-mr-md q-mb-md"
              :label="place"
              v-for="(place, index) in places"
              :key="index"
            />
          </q-card-main>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<style>
.bg-food {
  background: url("~assets/food-bg.jpg") no-repeat;
  background-size: contain;
}
</style>

<script>
export default {
  name: 'PageIndex',
  data() {
    return {
      places: [
        'City 1',
        'City 2',
        'xxxx 1',
        'xxxxO 2',
        'xxxxxO 3',
      ],
    };
  },
};
</script>
