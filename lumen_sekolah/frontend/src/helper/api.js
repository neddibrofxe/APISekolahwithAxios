import axios from 'axios'

export const api = axios.create({
	baseURL: 'http://localhost/lumen_sekolah/public/'
})