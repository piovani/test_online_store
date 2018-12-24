import http from '@/app/Arch/http'

class HomeService {
  getItems () {
    return http.get('/api/product/home')
  }
}

const service = new HomeService()
export default service
