<template>
  <q-page padding>
    <h1 class="q-display-2">
      My Orders
    </h1>

    <q-table
      id="orders-table"
      title="Previous orders"
      :data="tableData"
      :columns="columns"
      row-key="id">
        <q-tr
          slot="body"
          slot-scope="props"
          class="cursor-pointer"
          @click.native="gotToOrder(props.row.id)">
          <q-td key="id">
            {{ props.row.id }}
          </q-td>
          <q-td key="restaurant" class="text-right">
            {{ props.row.restaurant }}
          </q-td>
          <q-td key="created" class="text-right">
            {{ props.row.created }}
          </q-td>
          <q-td key="price" class="text-right">
            {{ props.row.price }}
          </q-td>
          <q-td key="status" class="text-right">
            {{ props.row.status }}
          </q-td>
          <q-td key="actions" class="text-right">
            <q-btn color="primary" size="sm">+ details</q-btn>
          </q-td>
        </q-tr>
      </q-table>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      tableData: [
        {
          id: 2,
          restaurant: 'Ex restaurant 1',
          created: '01/06/2019',
          price: '$ 30,00',
          status: 'Delivered',
        },
        {
          id: 1,
          restaurant: 'Ex restaurant 2',
          created: '01/06/2019',
          price: '$ 30,00',
          status: 'Delivered',
        },
      ],
      columns: [
        {
          field: 'id',
          label: '',
        },
        {
          field: 'restaurant',
          label: 'Restaurant',
        },
        {
          field: 'created',
          label: 'Date',
        },
        {
          field: 'price',
          label: 'Price',
        },
        {
          field: 'status',
          label: 'Status',
        },
      ],
    };
  },
  methods: {
    gotToOrder(id) {
      this.$router.push(`/order/${id}/details`);
    },
  },
};
</script>

<style>
#orders-table td {
  padding: 22px 8px;
}
</style>
