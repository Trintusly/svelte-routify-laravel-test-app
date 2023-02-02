import axios from "axios"
// import store from '@/store'

let instance = axios.create({
	withCredentials: true,
    baseURL: "http://localhost:8000/api/"
})

// instance.interceptors.request.use(request => {
// 	request.headers.common['Accept'] = 'application/json'
// 	request.headers.common['Content-Type'] = 'application/json'

// 	return request
// })

instance.interceptors.response.use(
	response => {
		return response
	},
	error => {
		
		/**
		 * If we receive 401 from the server, the user login credentials are INVALID.
		 * Logout the user if this is the case.
		 */

		// if (error.response.status == 401) {
		// 	// store.dispatch('logout')
		// 	console.log("Error 401: User has been logged out.")
		// }

		return Promise.reject(error)
	}
)

export default instance