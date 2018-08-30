<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form @submit.prevent="login" role="form" action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input v-model="LoginDetails.email" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input v-model="LoginDetails.password" class="form-control" placeholder="Password" name="password" type="password" value="">
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
            LoginDetails:{
                email:'',
                password:'',
                remember:true
            }
        }
    },
    methods:{
        login(){
            this.$http.post('/login',this.LoginDetails).then(response=>{
                if(response.data.success=='success'){
                    this.$router.push('/category');
                    this.$notify({
                      group: 'foo',
                      title: 'thông báo',
                      text: 'Đăng nhập thành công',
                      type:'success'
                  });
                }else{
                  //  this.$notify({
                  //     group: 'foo',
                  //     title: 'thông báo',
                  //     text: 'Tên tài khoản hoặc mật khẩu không chính xác',
                  //     type:'error'
                  // });
               }
           })
        }
    }
}
</script>
