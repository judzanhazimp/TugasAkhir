import axios from 'axios'

export const api = axios.create({
  baseURl: 'http://localhost:8080/TugasAkhir/public/'
})
