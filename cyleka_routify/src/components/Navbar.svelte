<script>
    import { authenticated, user } from "../stores/user/Auth";
    import { logout } from "../services/user/AuthService";
    import { goto, afterUrlChange } from "@roxi/routify";
    import Dialog from "$app/components/common/Dialog";
    import Toast from "$app/components/common/Toast";
    import NavbarSearch from "$app/components/NavbarSearch.svelte";

    const _logout = async () => {
        Dialog.confirm({
            message: "how can i be homophobic my bitch is gay?",
            type: "is-danger",
        }).then((r) => {
            if (r) {
                logout();
                Toast.create({
                    message: "suiiiiiiiiiiiiiiiiiiiii!",
                    position: "is-top",
                });
                $goto("/auth/login");
            }
        });
    };

    let expanded = false

    const expandNav = () => {
        expanded = !expanded
    }

    $afterUrlChange(() => {
        expanded = false
    })
</script>

<nav class="navbar has-shadow is-s">
    <div class="container">
        <div class="navbar-brand">

            <a href="/" class="navbar-item">Cyleka</a>
            <a on:click={ expandNav } role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>

        </div>

        <div class:is-active={expanded} class="navbar-menu">
            
            <div class="navbar-start">
                {#if $authenticated}
                    <a href="/user/dashboard" class="navbar-item">Dashboard</a>
                {:else}
                    <a href="/" class="navbar-item">Home</a>
                {/if}
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    {#if $authenticated}
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a href="" class="navbar-link">
                                {$user.username}
                            </a>
                            <div class="navbar-dropdown is-boxed is-right">
                                <a
                                    href="/user/{$user.username}"
                                    class="navbar-item"
                                >
                                    {$user.username}
                                </a>
                                <hr class="navbar-divider" />
                                <a
                                    on:click={_logout}
                                    href=""
                                    class="navbar-item has-text-danger"
                                >
                                    <i class="fas fa-power-off" /> &nbsp;&nbsp;Sign
                                    Out
                                </a>
                            </div>
                        </div>
                    {:else}
                        <div class="buttons">
                            <a href="/auth/login" class="button is-primary"
                                >Login</a
                            >
                        </div>
                    {/if}
                </div>
            </div>
            
        </div>
    </div>
</nav>
