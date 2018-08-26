<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Update
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <FormUpdate :users="users" @submit="Update()"></FormUpdate>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</template>
<script>
import FormUpdate from './FormUser.vue';
export default{
    data(){
        return{
            users:{}
        }
    },
    created(){
        this.fetchUser();
    },
    components:{FormUpdate},
    methods:{
        fetchUser(){
            axios.get('/User/'+this.$route.params.iduser + '/edit').then(response=>{
                this.users = response.data.values;
            })
        },
        Update(){
            axios.put('/User/'+this.$route.params.iduser,this.users).then(response=>{
                this.$router.push('/users');
                this.$notify({
                  group: 'foo',
                  title: 'thông báo',
                  text: 'Sửa thành công',
                  type:'success'
              });
            })
        }
    }
}
</script>
