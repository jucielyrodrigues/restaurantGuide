<template>
  <q-page padding>
    <h1 class="q-display-2">
      Details of the restaurant
    </h1>

    <q-card class="q-mb-md">
      <q-card-main>
        <p>Title: Restaurant 1</p>
        <p>Time do delivery: 50 minuts</p>
        <p>delivery: $ 10,00</p>

        <hr>

        <p>
          O'Cornell street - d1<br>
          Dublin- IE
        </p>
      </q-card-main>
    </q-card>

    <q-table
      title="Dishes"
      :data="tableData"
      :columns="columns"
    >
      <q-tr slot="body" slot-scope="props">
        <q-td key="id">
          {{ props.row.id }}
        </q-td>
        <q-td key="title" class="text-left">
          {{ props.row.title }}
        </q-td>
        <q-td key="actions" class="text-right">
          <q-btn color="primary" size="sm"
            :to="'/restaurant/plate/' + props.row.id + '/edit'">edit</q-btn>
        </q-td>
      </q-tr>
    </q-table>

    <q-btn color="primary" to="/restaurant/plate/create" class="q-my-md">Register a new Dish</q-btn>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      tableData: [
        {
          id: 1,
          title: 'food',
        },
        {
          id: 2,
          title: 'food 2',
        },
      ],
      columns: [
        {
          field: 'id',
          label: '',
        },
        {
          field: 'title',
          label: 'Título',
        },
      ],
    };
  },
  mounted() {
    if (this.tableData.length === 0) {
      this.$router.push('/new-restaurant');
    }
  },
};
</script>

<style>
</style>
