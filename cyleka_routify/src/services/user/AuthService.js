import API from "$app/services/APIService"
import { authenticated, setAuthenticated, setUser } from '../../stores/user/Auth'

export let loggedIn;

authenticated.subscribe(v => loggedIn = v)

export const getCookieInfo = () => {
    return API.get("/authentication/me")
}

export const updateLocalInfo = async () => {
    if (loggedIn) {
        try {
            const { data } = await getCookieInfo()
            setUser(data.user)
        } catch (e) { logout() }
    }
}

export const setCsrf = () => {
    return API.get("http://localhost:8000/sanctum/csrf-cookie");
}

export const setLoggedInUser = async (user) => {
    setAuthenticated(true)
    setUser(user)
}

export const register = async (credentials) => {
    await setCsrf()
    const { data } = await API.post('/authentication/register', credentials)
    return data
}

export const login = async (credentials) => {
    await setCsrf()
    const { data } = await API.post("/authentication/login", credentials);
    await setLoggedInUser(data.user);
    return data;
}

export const logout = async (options = {}) => {
    if (loggedIn) {
        try {
            await API.post("/authentication/logout")
            setAuthenticated(false)
            setUser({})
        } catch (e) { /* do something */ }
    }
}