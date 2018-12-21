import http from '@/app/Arch/http'

class LoginService {
  saveToken (token) {
    localStorage.setItem('token-app', token)
  }

  login (payload) {
    return http.post('/api/auth', payload)
  }
}

const service = new LoginService()
export default service
