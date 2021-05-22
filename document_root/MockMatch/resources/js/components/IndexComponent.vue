<template>
    <div id="index-root">
        <v-card max-width="800" class="mx-auto my-12">
            <v-card-title>About MockMatch</v-card-title>
            <v-card-text>
                MockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatchMockMatch
            </v-card-text>
            <div class="text-center">
                <v-btn
                x-large
                color="blue"
                dark
                class="mx-5 my-7"
                :href="login_url"
                >
                    Login
                </v-btn>
                <v-btn
                x-large
                color="orange"
                dark
                class="mx-5 my-7"
                :href="create_user_url"
                >
                    Create Account
                </v-btn>
            </div>
        </v-card>

    </div>
</template>

<script>
    export default {
        props: {
            login_url: {
                type: String,
                required: true
            },
            create_user_url: {
                type: String,
                required: true
            }
        }
    }
</script>
