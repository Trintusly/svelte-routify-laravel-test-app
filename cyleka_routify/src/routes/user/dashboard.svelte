<script>
    import { user } from "$app/stores/user/Auth";
    import Render from "$app/components/user/Render.svelte";
</script>

<!-- routify:meta middleware="auth" -->

<div class="container">
    <section class="section">
        <div class="columns">
            <div class="column is-4">
                <div class="dashboard-card card mb-3">
                    <div class="dashboard-header has-background-primary">
                        <div class="dashboard-avatar">
                            <Render hash="default" />
                        </div>
                    </div>

                    <div class="dashboard-card-body mt-4">
                        <div
                            class="is-size-6 has-text-centered has-text-weight-semibold"
                        >
                            {$user.username}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
