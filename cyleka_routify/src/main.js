import App from './App.svelte'

import "@shoelace-style/shoelace/dist/themes/light.css"
import "@shoelace-style/shoelace/dist/shoelace.js"
// import "bulma/css/bulma.css"

import '@fortawesome/fontawesome-free/css/all.min.css'
import "./styles/css/dark.css"
import "./styles/css/custom.css"
import "./styles/css/tooltip.min.css"

const app = new App({ target: document.body })

export default app
