<script>
    import Overlay from "$app/components/loaders/Overlay.svelte";
    import Error from "$app/components/errors/404.svelte";
    import { getProfile } from "$app/services/user/ProfileService";

    export let username;

    let response = getProfile(username)
   
    /**
     * If the username is changed, make a new request and update the component
    */
    $: if (username) {
        response = getProfile(username)
    }
</script>

{#await response}
    <Overlay/>
{:then r}
    <div class="container">
        <section class="section">
            <slot props={{ user: r.data.user }} />
        </section>
    </div>
{:catch}
    <Error/>
{/await}
