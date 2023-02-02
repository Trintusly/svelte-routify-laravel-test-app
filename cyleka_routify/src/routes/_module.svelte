<script context="module">
    import { afterUrlChange } from "@roxi/routify";
    import { authenticated } from "$app/stores/user/Auth";
    import { get } from "svelte/store";

    export const load = (ctx) => {
        let middleware = ctx.node.meta.middleware;
        if (middleware) {
            for (const mw of middleware.split("|")) {
                if (mw == "auth") {
                    if (!get(authenticated)) {
                        return {
                            redirect: "/auth/login",
                        };
                    }
                }
                if (mw == "guest") {
                    if (get(authenticated)) {
                        return {
                            redirect: "/user/dashboard",
                        };
                    }
                }
            }
        }
    };
</script>

<script>
    import { updateLocalInfo } from "$app/services/user/AuthService";
    import Navbar from "$app/components/Navbar.svelte";
    import Footer from "$app/components/Footer.svelte";

    $afterUrlChange(() => {
        updateLocalInfo();
    });
</script>

<!-- we are no strangers to love you know the rules and so do i :D -->

<Navbar />

<slot />

<Footer/>
