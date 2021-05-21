<template>
    <div id="index-root">
        <v-card max-width="800" class="mx-auto my-12">
            <v-card-title>
                <h1 class="display-1">MockMatch</h1>
            </v-card-title>
            <v-card-text>
                <v-form>
                    <v-text-field prepend-icon="mdi-account-circle" label="Email" />
                    <v-text-field prepend-icon="mdi-lock"
                    :append-icon="isShow ? 'mdi-eye' : 'mdi-eye-off'"
                    label="Password"
                    :type="isShow ? 'text' : 'password'"
                    @click:append="isShow = !isShow "/>
                    <v-card-actions>
                        <v-col class="text-right">
                            <v-btn class="info">LOGIN</v-btn>
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
        isShow: false
    })
};
</script>
