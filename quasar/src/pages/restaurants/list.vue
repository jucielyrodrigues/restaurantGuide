<template>
  <q-page padding>
    <h1 class="q-display-2">
      My restaurants
    </h1>

    <q-table
      title="Restaurants"
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
          <q-btn color="secondary" size="sm" class="q-mr-sm"
            :to="'/restaurant/' + props.row.id + '/detail'">+ details</q-btn>
          <q-btn color="primary" size="sm"
            :to="'/restaurant/' + props.row.id + '/edit'">edit</q-btn>
        </q-td>
      </q-tr>
    </q-table>

    <q-btn color="primary" to="/new-restaurant" class="q-my-md">New restaurant</q-btn>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      tableData: [
        {
          id: 1,
          title: 'restaurant 1',
        },
        {
          id: 2,
          title: 'restaurant 2',
        },
      ],
      columns: [
        {
          field: 'id',
          label: '',
        },
        {
          field: 'title',
          label: 'Title',
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
