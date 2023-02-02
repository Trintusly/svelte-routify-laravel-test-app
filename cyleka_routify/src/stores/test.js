import { get, writable } from 'svelte/store';

const state =  {
    loggedIn: writable(false)
}

const methods = {
    get(value) {
        return get(state[value])
    }
}

export default {

    get: {
        getLoggedIn() {
            return get(state.loggedIn)
        }
    }
}
