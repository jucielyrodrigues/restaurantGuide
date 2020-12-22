<template>
  <q-page padding class="bg-food">
    <div class="flex flex-center">
      <h1 class="q-display-3 text-center q-py-xl">How can I help you?</h1>
    </div>
    <div class="row gutter-md">
      <div class="col-xs-9 col-md-4">
        <q-card class="my-card">
      <q-card-section class="bg-grey-8 text-white">
        <div class="text-h6">My location</div>
          <q-card-title>
            <q-icon name="location_on"/> location
          </q-card-title>
          <q-card-main>
            Near of ...
          </q-card-main>
      </q-card-section>
      <q-card-actions vertical align="center">
        <q-btn flat>See Restaurants</q-btn>
      </q-card-actions>
    </q-card>
      </div>
<q-card class="my-card">
      <q-card-section class="bg-grey-8 text-white">
        <div class="text-h6">Login in</div>
          <q-card-main>
           <q-icon name="account_box"/>
             You can use a existed adress to login in
          </q-card-main>
      </q-card-section>
      <q-card-actions vertical align="center">
        <q-btn flat>Login in</q-btn>
      </q-card-actions>
    </q-card>
      <q-card class="my-card">
      <q-card-section class="bg-grey-8 text-white">
        <div class="text-h6">Pick a location</div>
         <q-card-title>
            <q-icon name="fastfood"/> Pick location
          </q-card-title>
      </q-card-section>
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
      ],
    };
  },
};
</script>
