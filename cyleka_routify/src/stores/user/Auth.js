import { writable } from 'svelte/store';

export let authenticated = writable( localStorage.getItem("authenticated") ? localStorage.getItem('authenticated') == "true" ? true : false : false )
export let user = writable( localStorage.getItem("user") ? JSON.parse(localStorage.getItem('user')) : {} )

export const setAuthenticated = (to) => {
    localStorage.authenticated = to
    authenticated.set(to)
}

export const setUser = (to) => {
    localStorage.user = JSON.stringify(to)
    user.set(to)
}
