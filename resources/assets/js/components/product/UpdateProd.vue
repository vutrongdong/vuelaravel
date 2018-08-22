<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>Edit</small>
                    </h1>
                </div>
                <FormUpdate v-bind:data="category,product"></FormUpdate>
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
            category:{},
            product:{},
        }
    },
    created(){
        this.fetchProd();
    },
    methods:{
        fetchProd(){
            this.$http.get('/CustomProd').then(response=>{
                this.category =response.data.category;
                this.product = response.data.values;
            })
        }
    }

}
</script>
