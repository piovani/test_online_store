import http from "@/app/Arch/http"
import Service from '@/app/Arch/Service'

class ProductAdminService extends Service {
  constructor () {
    super('api/product')
  }

  importProduct (payload) {
    console.log(payload)
    return http.post("api/import-product", payload);
  }

  getHeaders () {
    return [
      {
        text: 'Product Name',
        width: '20%',
        sortable: false
      },
      {
        text: 'Product Sub Name',
        width: '20%',
        sortable: false
      },
      {
        text: 'Price',
        width: '10%',
        sortable: false,
        align: 'center'
      },
      {
        text: 'Actions',
        width: '50%',
        sortable: false,
        align: 'center'
      }
    ]
  }
}

const service = new ProductAdminService()
export default service
