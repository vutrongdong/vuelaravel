<template>
    <div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Edit</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <Form @submit="Update"  v-bind:category="category"></Form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</template>

<script>
import Form from './FormCate.vue';
import { mapActions } from 'vuex'
export default{
    data(){
        return{
            category:{
            }
        }
    },
    components:{Form},
    created(){
        this.getCategory();
    },
    methods:{
        ...mapActions(['pushCate']),
        getCategory(){
            this.$http.get('CustomCate/'+ this.$route.params.idcate+'/edit').then(response =>{
                this.category = response.data.values;
                console.log(response.data);
            })
        },
        Update(category){
            this.pushCate({
                category:category,
                cb:()=>{
                    this.$router.push('/category');
                    this.$notify({
                      group: 'foo',
                      title: 'thông báo',
                      text: 'Sửa thành công',
                      type:'success'
                  });
                }
            })
        }
    }
}
</script>
<style>
.success{
    border-radius: 10px;
}
</style>
