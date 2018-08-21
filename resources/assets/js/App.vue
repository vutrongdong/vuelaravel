<template>
    <div>
        <navbar></navbar>
        <router-view/>

    </div>
</template>
x
<script>
import NavBar from './components/navbar.vue';
export default {
    components:{
        'navbar': NavBar,
    }
}
</script>
