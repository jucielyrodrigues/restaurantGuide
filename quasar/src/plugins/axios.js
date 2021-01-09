import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:8765';

export default ({ Vue }) => {
  Vue.prototype.$axios = axios;
};
