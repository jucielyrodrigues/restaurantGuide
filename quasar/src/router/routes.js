
const routes = [
  {
    path: '/',
    component: () => import('layouts/MyLayout.vue'),
    children: [
      { path: '', redirect: '/home' },
      { path: 'home', component: () => import('pages/Index.vue') },
      { path: 'list-restaurants', component: () => import('pages/restaurants/front-list.vue') },
      { path: 'restaurant/:id', component: () => import('pages/restaurants/detail-front.vue') },
      { path: 'cart', component: () => import('pages/cart.vue') },
      { path: 'address/create', component: () => import('pages/address/create.vue') },
      { path: 'order/:id', component: () => import('pages/order.vue') },
      { path: 'order/:id/details', component: () => import('pages/orders/details.vue') },
      { path: 'orders', component: () => import('pages/orders/list.vue') },
      { path: 'new-restaurant', component: () => import('pages/restaurants/create.vue') },
      { path: 'auth', component: () => import('pages/auth.vue') },
      { path: 'restaurants', component: () => import('pages/restaurants/list.vue') },
      { path: 'restaurant/:id/edit', component: () => import('pages/restaurants/edit.vue') },
      { path: 'restaurant/:id/detail', component: () => import('pages/restaurants/detail.vue') },
      { path: 'restaurant/plate/:id/edit', component: () => import('pages/restaurants/plate/edit.vue') },
      { path: 'restaurant/plate/create', component: () => import('pages/restaurants/plate/create.vue') },
    ],
  },
];

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue'),
  });
}

export default routes;
