<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Add</h1>
                </div>
                <!-- /.col-lg-12 -->
                <formProd @submit="Create()" v-bind:category="category,product,type"></formProd>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</template>
<script>
import Notifications from 'vue-notification'
import formProd from './FormProd.vue';
export default{
    data(){
        return{
            category:{},
            product:{
            },
            type:'create'
        }
    },
    components:{formProd},
    created(){
        this.fetchProd();
    },
    methods:{
        fetchProd(){
            this.$http.get('/CustomProd').then(response=>{
                this.category = response.data.category;
            })
        },
        Create(){
            this.$validator.validateAll().then(()=>{
                this.$http.post('/CustomProd',this.product).then(response=>{
                    this.$router.push('/product');
                })
            })
        }
    }
}
</script>
