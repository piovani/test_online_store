import axios from 'axios'

const axiosInstance = axios.create({
  baseUrl: '/api'
})

axiosInstance.interceptors.request.use((config) => {
  const token = localStorage.getItem('local')
  if (token) {
    /* eslint-disable no-param-reassign */
    config.headers.common.AuthorizationToken = token
  }
  return config
})

export default axiosInstance
