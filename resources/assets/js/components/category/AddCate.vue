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
                        <Form @submit="Create" :category="category" :type="type"></Form>
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
            category:{},
            type:'create'
        };
    },
    mounted(){
        this.FetchCate();
    },
    components:{Form},
    methods:{
        ...mapActions(['pushCate','FetchCate']),
        Create(category){
            this.pushCate({
                category:category,
                cb:()=>{
                    this.$router.push('/category');
                    this.$notify({
                      group: 'foo',
                      title: 'thông báo',
                      text: 'Thêm thành công',
                      type:'success'
                  });
                }
            })
        }
    }
}
</script>
<style>

</style>
