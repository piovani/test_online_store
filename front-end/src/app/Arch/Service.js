import http from './http'

export default class Service {
  constructor (baseUrl) {
    this.baseUrl = baseUrl
  }

  get (id) {
    return http.get(`${this.baseUrl}/${id}`)
  }

  getList (params = {}) {
    return http.get(`${this.baseUrl}`, {
      params
    })
  }

  save (item) {
    return http.post(`${this.baseUrl}`, item)
  }

  edit (id, item) {
    return http.put(`${this.baseUrl}/${id}`, item)
  }

  delete (id) {
    return http.delete(`${this.baseUrl}/${id}`)
  }
}
