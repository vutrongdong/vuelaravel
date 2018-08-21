<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form @submit.prevent="login()" role="form" action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input v-model="email" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input v-model="password" class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            email: '',
            password:''
        }
    },
    methods:{
        login(){
            var data = {
                client_id:2,
                client_secret:'9jigHUNwoHjepoMrhWwAyEhjnhtsUEgsP4T3DK6c',
                grant_type: 'password',
                username: this.email,
                password: this.password
            }
            this.$http.get('test',data).then(response=>{
                console.log(response);
                this.$router.push('register');
            });
        }
    }
}
</script>
