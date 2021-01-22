export function all(context, vue) {
  return vue.$axios.get('/restaurants.json')
    .then((res) => {
      context.commit('setList', res.data.restaurant);
    });
}
export function current(context, config) {
  const { vue } = config;
  const { id } = config;

  return vue.$axios.get(`/restaurants/${id}.json`)
    .then((res) => {
      context.commit('setCurrent', res.data.restaurant);
    });
}
export function create(context, config) {
  const { vue } = config;
  const { data } = config;
  return vue.$axios.post('/restaurants/add.json', data);
}
