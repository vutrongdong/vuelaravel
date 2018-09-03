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
                        <Form @submit="Update"  :category="category"></Form>
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
import { mapActions,mapGetters } from 'vuex'
export default{
    computed:{
        ...mapGetters(['category'])
    },
    components:{Form},
    created(){
        this.getCategory();
    },
    methods:{
        ...mapActions(['pushCate','FetchCateForEdit']),
        getCategory(id){
            this.FetchCateForEdit({
                id:this.$route.params.idcate
            });
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
