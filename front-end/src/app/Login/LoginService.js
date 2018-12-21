import http from '@/app/Arch/http'

class LoginService {
  login (payload) {
    return http.post('/api/auth', payload)
  }
}

const service = new LoginService()
export default service
