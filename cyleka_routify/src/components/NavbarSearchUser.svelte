<script>
    import { url } from "@roxi/routify";
    import Render from "$app/components/user/Render.svelte";
    export let user;
</script>

<article class="media is-align-items-center mb-1 mt-2">
    
    <div class="media-left">
        <a href="/user/{ user.username }">
            <figure class="headshot image is-32x32">
                <Render hash={"default"} classes="is-rounded" />
            </figure>
        </a>
    </div>
    <div class="media-content">
        <div class="content">
            <div class="is-size-6 has-text-grey-light">
                <a href="/user/{ user.username }"> {user.username} </a>
            </div>
            <div class="is-size-7 has-text-weight-semibold has-text-grey">
                {user.bio}
            </div>
        </div>
    </div>
    <div class="media-right">
        
    </div>
</article>
