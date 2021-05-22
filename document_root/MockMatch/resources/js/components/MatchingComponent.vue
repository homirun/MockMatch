<template>
    <div id="index-root">
        <v-card max-width="800" class="mx-auto my-12">
            <v-card-title>MockMatch Matching Config</v-card-title>
            <v-card-text>
                ようこそ {{ user['name'] }} さん
            </v-card-text>
            <div class="text-center">
                <v-btn
                x-large
                color="error"
                dark
                class="mx-5 my-7"
                :href="logout_url"
                >
                    Logout
                </v-btn>
            </div>
        </v-card>

    </div>
</template>

<script>
    export default {
        props: {
            user: {
                type: Object,
                required: true
            },
            logout_url: {
                type: String,
                required: true
            }
        }
    }
</script>
