<script>
    import { createForm } from "felte";
    import { validator } from "@felte/validator-yup";
    import { goto } from "@roxi/routify";
    import { login } from "$app/services/user/AuthService";
    import Snackbar from "$app/components/common/Snackbar";
    import * as yup from "yup";

    const schema = yup.object({
        username: yup.string().required().label('Username'),
        password: yup.string().required().label('Password'),
    });

    const { form, errors, isSubmitting } = createForm({
        extend: validator({ schema }),
        onSubmit: async (values) => {
            return await login(values);
        },
        onSuccess: (s) => {
            Snackbar.create({
                message: "Welcome back, " + s.user.username,
                position: "is-bottom",
            });
            $goto("/user/dashboard");
        },
        onError: (e) => {
            return e.response.data;
        },
    });
</script>

<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="box">
                        <div class="is-size-5">Login</div>
                        <div class="is-size-6 has-text-grey-light mb-3">
                            Lets continue from where you left
                        </div>
                        <form use:form>
                            <fieldset disabled={ $isSubmitting }>
                                <div class="field">
                                    <label for="username" class="label">Username</label>
                                    <div class="control has-icons-left">
                                        <input class="input" placeholder="Username" name="username"/>
                                        <span class="icon is-small is-left">
                                        <i class="fa fa-user" />
                                        </span>
                                    </div>
                                    {#if $errors.username}
                                        <div class="help is-danger">
                                            {$errors.username}
                                        </div>
                                    {/if}
                                </div>
                                <div class="field">
                                    <label for="password" class="label">Password</label>
                                    <div class="control has-icons-left">
                                        <input class="input" placeholder="Password" name="password"/>
                                        <span class="icon is-small is-left">
                                        <i class="fa fa-key" />
                                        </span>
                                    </div>
                                    {#if $errors.password}
                                        <div class="help is-danger">
                                            {$errors.password}
                                        </div>
                                    {/if}
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <button class:is-loading={ $isSubmitting } type="submit" class="button is-primary">Login</button>
                                    </div>
                                    {#if $errors.message}
                                        <div class="help is-danger">
                                            {$errors.message}
                                        </div>
                                    {/if}
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <center>
                        <a href="/auth/register">No account? Sign up for free!</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
