<template>
    <div>
        <navbar></navbar>
        <notifications group="foo" />
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
