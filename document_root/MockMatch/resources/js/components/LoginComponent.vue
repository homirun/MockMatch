<template>
    <div id="index-root">
        <v-card max-width="800" class="mx-auto my-12">
            <v-card-title>
                <h1 class="display-1">MockMatch</h1>
            </v-card-title>
            <v-card-text>
                <v-form :action="post_url" method="post">
                    <input :value="csrf" type="hidden" name="_token">
                    <v-text-field prepend-icon="mdi-account-circle" label="Email" name="email"/>
                    <v-text-field prepend-icon="mdi-lock"
                    :append-icon="isShow ? 'mdi-eye' : 'mdi-eye-off'"
                    label="Password"
                    :type="isShow ? 'text' : 'password'"
                    @click:append="isShow = !isShow "
                    name="password" />
                    <v-card-actions>
                        <v-col class="text-right">
                            <v-btn class="info" type="submit">LOGIN</v-btn>
                        </v-col>
                    </v-card-actions>
                </v-form>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
export default {
    data: () => ({
        isShow: false,
        csrf: document.head.querySelector('meta[name="csrf-token"]').content,
    }),
    props: {
        post_url: {
            type: String,
            required: true,
        },
    }
};
</script>
