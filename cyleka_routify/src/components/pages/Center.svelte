<script>
    export let title, subtitle, classes = "";
</script>

<section class="{classes} hero is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-12 has-text-centered">
                    <div class="title is-1 has-text-weight-normal mb-2">
                        {title}
                    </div>

                    <div
                        class="title is-5 has-text-grey-light has-font-weight-light"
                    >
                        {subtitle}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
