<template>
    <div id="tool-root">
        <v-toolbar @click="moveIndex">
            <v-toolbar-title>MockMatch</v-toolbar-title>
        </v-toolbar>
    </div>
</template>

<script>
    export default {
        methods: {
            moveIndex: function(){
                window.location.href = '/'
            }
        }
    }
</script>
