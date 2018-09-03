<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>Edit</small>
                    </h1>
                </div>
                <FormUpdate v-if="product.id" @submit="Update" :data-prod="product"></FormUpdate>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</template>
<script>
import FormUpdate from './FormProd.vue';
import { mapActions,mapGetters } from 'vuex'
export default{
    data(){
        return {
            product:{},
        }
    },
    components:{FormUpdate},
    computed:{
        ...mapGetters(['CateForEditProd']),
    },
    methods:{
        ...mapActions(['FetProdForEdit','pushProduct']),
        fetchProd(id){
            this.FetProdForEdit({
                id:this.$route.params.idpro,
                cb:(product)=>{
                    this.product = Object.assign({},this.product,product)
                }
            })
        },

        Update(product){
            this.pushProduct({
                product:product,
                cb:()=>{
                    this.$router.push('/product');
                    this.$notify({
                      group: 'foo',
                      title: 'thông báo',
                      text: 'Sửa thành công',
                      type:'success'
                  })
                }
            })
        }
    },
    mounted(){
        this.fetchProd();
        this.FetProdForEdit({
            id:this.$route.params.idpro,
            cb:(product)=>{
                this.product = Object.assign({},
                    this.product,product)
            }
        })
    },

}
</script>
<style>
.success{
    border-radius: 10px;
}
</style>
