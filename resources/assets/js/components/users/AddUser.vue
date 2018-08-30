<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Add
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <FormCreate :type="type" :users="users" @submit="Create()"></FormCreate>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</template>
<script>
import FormCreate from './FormUser.vue';
export default{
    data(){
        return {
            users:{},
            type:'create'
        }
    },
    components:{FormCreate},
    methods:{
        Create(){
            axios.post('/User',this.users).then(response=>{
                this.$router.push('/users');
                this.$notify({
                  group: 'foo',
                  title: 'thông báo',
                  text: 'Thêm thành công',
                  type:'success'
              });
            })
        }
    }
}
</script>
