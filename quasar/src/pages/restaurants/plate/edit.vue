<template>
  <q-page padding>
    <h1 class="q-display-2">
      Edit Dish
    </h1>

    <form @submit.prevent="submit()" class="row gutter-md">
      <div class="col-12">
        <q-field icon="label">
          <q-input
            type="text"
            v-model="data.title"
            float-label="Name of the dish"
            autofocus/>
        </q-field>
      </div>

      <div class="col-12">
        <q-field icon="insert_photo">
          <q-input
            type="text"
            v-model="data.photo"
            float-label="Photo of the dish"/>
        </q-field>
      </div>

      <div class="col-12">
        <q-field icon="description">
          <q-input
            type="text"
            v-model="data.description"
            float-label="Description of the dish"/>
        </q-field>
      </div>

      <div class="col-6">
        <q-field icon="attach_money">
          <q-input
            type="text"
            v-model="data.price"
            float-label="Price of the dish"/>
        </q-field>
      </div>

      <div class="col-12">
        <q-card>
          <q-card-main>
            <div class="q-card-title">
              Options
            </div>

            <q-alert
              v-if="options.length === 0"
              color="warning"
              text-color="black"
              class="q-mt-md">
              Any options for this dish
            </q-alert>

            <ul v-show="options.length > 0">
              <li class="q-my-sm" v-for="(opt, i) in options" :key="i">
                <q-btn size="sm" color="red" @click="optionsDelete(i)">x</q-btn> {{ opt }}
              </li>
            </ul>

            <q-field icon="exposure_plus_1">
              <q-input
                type="text"
                v-model="optionLabel"
                float-label="Add new dish"/>
              <q-btn color="primary" class="q-mt-md" @click="optionsAdd()">Add</q-btn>
            </q-field>
          </q-card-main>
        </q-card>
      </div>

      <div class="col">
        <q-btn type="submit" color="primary" class="q-my-md q-mr-sm">Save</q-btn>
        <q-btn type="submit" color="secondary"
          class="q-my-md" to="/restaurant/1/detail">Back</q-btn>
      </div>
    </form>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      data: {
        title: 'Name of the dish',
        description: 'Description',
        price: '$ 50,00',
      },
      options: [
        'Opt 1',
        'Opt 2',
      ],
      optionLabel: null,
    };
  },
  methods: {
    submit() {
      this.$q.notify({
        message: 'Update successfully',
        type: 'positive',
      });
    },
    optionsDelete(i) {
      this.options.splice(i, 1);
    },
    optionsAdd() {
      if (this.optionLabel === null) {
        this.$q.notify({
          message: 'Please, type a title for this option!',
        });
        return;
      }
      this.options.push(this.optionLabel);
      this.optionLabel = null;
    },
  },
};
</script>

<style>
</style>
