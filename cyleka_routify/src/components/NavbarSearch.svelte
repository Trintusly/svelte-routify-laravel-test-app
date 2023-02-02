<script>
    import { fly } from "svelte/transition";
    import axios from "axios";

    import NavbarSearchUser from "$app/components/NavbarSearchUser.svelte";

    let responseData = [];
    let responseProcessing = false;
    let isFocused = false;
    let searchValue = "";
    let timer;
    let isMouseOnBox = false;

    $: if (!isFocused) {
        searchValue = "";
    }

    const setFocusedFalse = () => {
        if (!isMouseOnBox) {
            isFocused = false;
        }
    };

    const search = async () => {
        responseProcessing = true;
        clearTimeout(timer);
        timer = setTimeout(async () => {
            let r = await axios.get(
                "http://localhost:8000/api/user/search?username=" + searchValue
            );
            responseData = r.data;
            responseProcessing = false;
            console.log("searching....");
        }, 250);
    };
</script>

<div class="navbar-search" style="width: 325px; position: relative;">
    <div class="navbar-item control">
        <input
            on:click={() => (isFocused = true)}
            bind:value={searchValue}
            on:input={search}
            class="input is-rounded navbar-searchbar"
            type="text"
            placeholder="Search"
        />
    </div>
    {#if isFocused}
        <div on:click={setFocusedFalse} class="overlay" />
        <div
            on:mousemove={() => (isMouseOnBox = true)}
            on:mouseleave={() => (isMouseOnBox = false)}
            transition:fly={{ y: -15, duration: 250 }}
            maxlength="25"
            style="width: 100%;  position: absolute; z-index:999;"
            class="box p-4"
        >
            {#if searchValue}
                <div class="is-size-6 has-text-truncate">
                    <i class="fas fa-search" />&nbsp;&nbsp;Searching for
                    <b>{searchValue}</b>
                </div>
                <hr class="mt-2 mb-2" />
                {#if responseProcessing}
                    <div class="is-size-7 has-text-grey">Searching...</div>
                {:else}
                    <div class="is-size-7 has-text-grey">
                        Query yielded {responseData.results.yielded} results.
                    </div>
                    {#each responseData.results.data as user}
                        <NavbarSearchUser {user} />
                    {/each}
                    {#if responseData.results.yielded > 3}
                        <hr class="mt-3 mb-2" />
                        <a class="button is-fullwidth is-rounded is-primary is-small" href="">View All</a>
                    {/if}
                {/if}

            {:else}
                <div class="is-size-6">
                    <i class="fas fa-search has-text-grey" />&nbsp;&nbsp;Search
                    Cyleka
                </div>
            {/if}
        </div>
    {/if}
</div>

<style>
    .overlay {
        bottom: 0;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        position: fixed;
    }
</style>
