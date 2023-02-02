<script>
    import { createForm } from "felte";
    import { validator } from "@felte/validator-yup";
    import { register } from "../../services/user/AuthService";
    import { goto } from "@roxi/routify";
    import * as yup from "yup";
    import Snackbar from "../../components/common/Snackbar";

    const schema = yup.object({
        username: yup.string().required().min(1).max(12).label('Username'),
        email: yup.string().email().required().label('Email'),
        password: yup.string().required().min(1).max(64).label('Password'),
    });

    const { form, errors, isSubmitting } = createForm({
        extend: validator({ schema }),
        onSubmit: async (values) => {
            return await register(values);
        },
        onSuccess: (s) => {
            $goto("/auth/login")
            Snackbar.create({
                message: "Account created successfully, please login to continue",
                position: "is-bottom"
            })
        },
        onError: (e) => {
            if (e.response.data.errors) {
                return e.response.data.errors
            }
            return e.response.data
        },
    });
</script>

c

<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="box">
                        <div class="is-size-5">Register</div>
                        <div class="is-size-6 has-text-grey-light mb-3">
                            Create a new account and hop right in the action
                        </div>

                        <form use:form>
                            <fieldset>
                                <div class="field">
                                    <label for="" class="label">Username</label>

                                    <div class="control has-icons-left">
                                        <input
                                            name="username"
                                            type="text"
                                            placeholder="Username"
                                            class="input"
                                        />
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-user" />
                                        </span>
                                    </div>
                                    {#if $errors.username}
                                        <div class="help is-danger">
                                            {$errors.username}
                                        </div>
                                    {/if}
                                    <div class="help has-text-grey-light">
                                        Your username will be your account's
                                        handle. Make sure your username does not
                                        have any revealing information such as
                                        names/locations.
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="" class="label">Email</label>

                                    <div class="control has-icons-left">
                                        <input
                                            name="email"
                                            type="email"
                                            placeholder="Email"
                                            class="input"
                                        />

                                        <span class="icon is-small is-left">
                                            <i class="fa fa-envelope" />
                                        </span>
                                    </div>
                                    {#if $errors.email}
                                        <div class="help is-danger">
                                            {$errors.email}
                                        </div>
                                    {/if}
                                    <div class="help has-text-grey-light">
                                        Your email is used to contact you in
                                        cases of important updates or account
                                        recovery requests.
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="" class="label">Password</label>

                                    <div class="control has-icons-left">
                                        <input
                                            name="password"
                                            type="password"
                                            placeholder="Password"
                                            class="input"
                                        />

                                        <span class="icon is-small is-left">
                                            <i class="fa fa-key" />
                                        </span>
                                    </div>
                                    {#if $errors.password}
                                        <div class="help is-danger">
                                            {$errors.password}
                                        </div>
                                    {/if}
                                    <div class="help has-text-grey-light">
                                        Your password is your account's key.
                                        Make sure your password is strong. Do
                                        not share it with anyone.
                                    </div>
                                </div>
                                <div class="field">
                                    <button
                                        class:is-loading={$isSubmitting}
                                        type="submit"
                                        class="button is-info"
                                    >
                                        Register
                                    </button>
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
                        <a href="/auth/login">Got an account?</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
