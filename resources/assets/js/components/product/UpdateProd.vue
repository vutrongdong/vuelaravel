<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>Edit</small>
                    </h1>
                </div>
                <FormUpdate @submit="Update()" v-bind:category="category,product"></FormUpdate>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</template>
<script>
import FormUpdate from './FormProd.vue';
export default{
    components:{FormUpdate},
    data(){
        return{
            category:[],
            product:{},
        }
    },
    created(){
        this.fetchProd();
        this.fetchCate();
    },
    methods:{
        fetchCate(){
            this.$http.get('/CustomProd').then(response=>{
                this.category =response.data.category;
                // console.log(response.data.category);
            })
        },

        fetchProd(){
            this.$http.get('/CustomProd/'+this.$route.params.idpro+'/edit').then(response=>{
                this.product = response.data.values
            })
        },
        Update(){
            this.$http.put('/CustomProd/'+this.$route.params.idpro,this.product).then(response=>{
                this.$router.push('/product');
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
<style>
.success{
    border-radius: 10px;
}
</style>
