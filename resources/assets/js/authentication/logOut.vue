<template>
 <li @click="logout"><a><i class="fa fa-sign-out fa-fw"></i> Logout</a>
 </li>
</template>
<script>
    export default{
        methods:{
            logout(){
                axios.get('/logout').then(response=>{
                    this.$router.push('/login');
                })
            }
        }
    }
</script>
