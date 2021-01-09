<template>
  <q-page padding>
    <h1 class="q-display-2">
      <q-icon name="location_on"/> Restaurants near me
    </h1>
    <p><span class="text-grey">Dublin </span></p>
    <p><q-btn to="/" color="primary" label="Change location"/></p>
    <div class="row gutter-lg">
      <div class="col-xs-6 col-md-4" v-for="i in 5" :key="i">
        <q-card>
          <q-card-media>
            <img src="~assets/food.jpg">
            <q-card-title slot="overlay">
              Name of the restaurant
              <span slot="subtitle">Delivery in 30-40 min</span>
            </q-card-title>
          </q-card-media>
          <q-card-separator/>
          <q-card-main>
            <q-icon name="star" v-for="i in star_range(2.5).full" :key="i"/>
            <q-icon name="star_half" v-for="i in star_range(2.5).half" :key="i*5"/>
            <q-icon name="star_border" v-for="i in star_range(2.5).empty" :key="i*10"/>
          </q-card-main>
          <q-card-actions>
            <q-btn to="/restaurant/1" flat color="primary" label="See menu"/>
          </q-card-actions>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  methods: {
    star_range(rate) {
      const full = Math.trunc(rate);
      let half = 0;

      if (rate % 1 !== 0) {
        half = 1;
      }

      const empty = 5 - (full + half);

      return {
        full,
        half,
        empty,
      };
    },
  },
};
</script>

<style>
</style>
