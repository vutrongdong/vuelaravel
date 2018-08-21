<template>
    <div>
        <navbar></navbar>
<!--         <div id="success">
            {{ success }}
        </div> -->
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
