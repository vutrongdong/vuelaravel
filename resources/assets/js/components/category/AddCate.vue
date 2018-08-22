<template>
    <div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Add
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <Form @submit="Create()" v-bind:category="category,type"></Form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</template>

<script>
import Notifications from 'vue-notification'
import Form from './FormCate.vue';
export default{
    data(){
        return{
            category:{},
            // errors:[],
            type:'create'
        };
    },
    components:{Form},
    methods:{
        Create(){
            this.$http.post('/CustomCate',this.category).then(response=>
            {

                this.$router.push('/category');
                this.$notify({
                  group: 'foo',
                  title: 'thông báo',
                  text: 'Thêm thành công',
                  type:'success'
              });
            });
        }
    }
}
</script>
<style>

</style>
