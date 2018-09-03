<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Add</h1>
                </div>
                <!-- /.col-lg-12 -->
                <formProd @submit="Create"  :dataProd="product" :type="type"></formProd>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</template>
<script>
import formProd from './FormProd.vue';
import { mapGetters,mapActions } from 'vuex'
export default{
    data(){
        return{
            product:{},
            type:'create'
        }
    },
    components:{formProd},
    methods:{
        ...mapActions(['pushProduct','FetchCate']),
        Create(product){
            this.pushProduct({
                product:product,
                cb:()=>{
                    this.$router.push('/product');
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
