<template>
    <div id="index-root">
        <v-card max-width="800" class="mx-auto my-12">
            <v-card-title>
                <h1 class="display-1">MockMatch</h1>
            </v-card-title>
            <v-card-text>
                <v-form lazy-validation v-model="valid" ref="form">
                    <input :value="csrf" type="hidden" name="_token"/>
                    <v-text-field
                        prepend-icon="mdi-account-circle"
                        label="Name"
                        name="name"
                        :counter="10"
                        :rules="nameRules"
                        required
                        v-model="name"
                    />
                    <v-text-field
                        prepend-icon="mdi-at"
                        label="Email"
                        name="email"
                        :rules="emailRules"
                        required
                        v-model="email"
                    />
                    <v-text-field
                        prepend-icon="mdi-lock"
                        :append-icon="isShow ? 'mdi-eye' : 'mdi-eye-off'"
                        label="Password"
                        :type="isShow ? 'text' : 'password'"
                        :rules="passwordRules"
                        @click:append="isShow = !isShow"
                        name="password"
                        v-model="password"
                    />
                    <v-text-field
                        prepend-icon="mdi-lock"
                        :append-icon="isShow ? 'mdi-eye' : 'mdi-eye-off'"
                        label="Password Confirm"
                        :type="isShow ? 'text' : 'password'"
                        :rules="[
                            v => !!v || 'Password Confirm is required',
                            password === password_confirmation || 'Password confirmation doesn\'t match password',
                        ]"
                        @click:append="isShow = !isShow"
                        name="password_confirmation"
                        v-model="password_confirmation"
                    />
                    <v-select
                        prepend-icon="mdi-office-building"
                        :items="companyItems"
                        label="Company"
                        name="company"
                        :rules="companyRules"
                        v-model="company"
                    ></v-select>
                    <v-card-actions>
                        <v-col class="text-right">
                            <v-btn class="warning" :disabled="!valid" @click="dataSend">Create</v-btn>
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
        res: null,
        isShow: false,
        csrf: document.head.querySelector('meta[name="csrf-token"]').content,
        companyItems: ['i', 'ms', 'pb'],
        valid: false,
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        company: 'i',
        nameRules: [
            v => !!v || 'Name is required',
            v => (v && v.length <= 10) || 'Name must be less than 10 characters',
        ],
        emailRules: [
            v => !!v || 'E-mail is required',
            v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        passwordRules: [
            v => !!v || 'Password is required',
            v => (v && v.length >= 8) || 'Password must be than 8 characters',
        ],
        companyRules: [
            v => !!v || 'Company is required',
        ]
        // password_confirmationは変数スコープの問題でタグに直書き
    }),
    props: {
        post_url: {
            type: String,
            required: true,
        },
    },
    methods: {
        dataSend: function () {
            if (this.validate() === true) {
                let params = new URLSearchParams()
                params.append('_csrf', this.csrf)
                params.append('name', this.name)
                params.append('email', this.email)
                params.append('password', this.password)
                params.append('password_confirmation', this.password_confirmation)
                params.append('company', this.company)

                axios.post(this.post_url, params)
                    .then(function (response) {
                        self.res = response
                        // console.log(self.res['data']['redirect_url'])
                        window.location.href = self.res['data']['redirect_url']
                    }).catch(error => {
                    console.log(error)
                })
            }
        },
        validate: function () {
            return this.$refs.form.validate()
        }
    },
}
</script>
