<template>
    <div>
        <Navbar />
        <Main />

    </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
import Main from './pages/Main.vue'

export default {
    name: 'App',
    data() {
        return {
        };
    },
    components: { Navbar, Main }
}
</script>

<style>

body{
    background-color: #f5f5f5;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
}
</style>
