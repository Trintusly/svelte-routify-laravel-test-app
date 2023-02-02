<script>
    import Render from "$app/components/user/Render.svelte";
    import moment from "moment";

    export let user;
</script>

<div class="columns">
    <div class="column is-3">
        <div class="has-text-weight-semibold mb-1">{user.username}</div>
        <div class="box p-3">
            {#if moment.utc().diff(moment.utc(user.updated_at), "minutes") <= 2}
                <span class="tag is-success is-rounded position-absolute has-shadow-small">online</span>
            {:else}
                <span class="tag is-rounded position-absolute has-shadow-small">offline</span>
            {/if}
            <center>
                <Render hash={user.render_key} />
                <hr class="mt-2 mb-2" />
                <div class="is-size-7 has-text-grey">{user.bio}</div>
            </center>
        </div>
        <div class="has-text-weight-semibold mb-1">Account Info</div>
        <div class="box">
            <div class="is-size-7">
                <b>Joined</b>
                <span
                    class="is-pulled-right tooltip has-tooltip-top"
                    data-tooltip={moment(user.created_at).fromNow()}
                >
                    {moment(user.created_at).format("LL")}
                </span>
            </div>
            <div class="is-size-7">
                <b>Last Seen</b>
                <span
                    class="is-pulled-right tooltip has-tooltip-top"
                    data-tooltip={moment(user.updated_at).fromNow()}
                >
                    {moment(user.updated_at).format("LL")}
                </span>
            </div>
        </div>
    </div>
</div>
