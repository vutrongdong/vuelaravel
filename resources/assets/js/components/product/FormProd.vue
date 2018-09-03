<template>
    <div class="col-lg-12" style="padding-bottom:120px">
        <form method="POST" enctype="multipart/form-data" @submit.prevent="formSubmit">
            <div class="form-group">
                <label>Name</label>
                <input v-model="product.name" v-validate="'required|min:3|max:32'" class="form-control" name="name" placeholder="Please Enter Username" />
                <span v-show="errors.has('name')" style="color:red">*{{ errors.first('name') }}</span>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input v-model="product.price" v-validate="'required|min_value:1'" class="form-control" name="price" placeholder="Please Enter price" />
                <span v-show="errors.has('price')" style="color:red">*{{ errors.first('price') }}</span>
            </div>
            <div class="form-group">
                <label>parrent category</label><br>
                <select class="form-control" name="cate_id" v-validate="'required'" v-model="product.cate_id">
                    <option disabled="" value="Parrent Category">Parrent Category</option>
                    <option  :value="cate.id" v-for='cate in category' style="color:red" :key="cate.id">{{ cate.name }}</option>
                </select>
                <span v-show="errors.has('cate_id')" style="color:red">*{{ errors.first('cate_id') }}</span>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea v-model="product.description" class="form-control" rows="3" name="description" v-validate="'required'"></textarea>
                <span v-show="errors.has('description')" style="color:red">*{{ errors.first('description') }}</span>
            </div>
            <div class="form-group">
                <label>Images</label>
                <!-- <input @change="imageChanged" type="file" name="image"><br> -->
                <input @change="imageChanged" type='file' id="imgInp" /><br>
                <img id="output" width="200px" v-if="dataProd.image" :src="'upload/product/' + dataProd.image" alt="">
                <img id="output" v-else />
                <span v-show="errors.has('image')" style="color:red">*{{ errors.first('image') }}</span>

            </div>
            <div class="form-group">
                <label>Promotion</label>
                <input v-model="product.promotion" class="form-control" name="promotion" placeholder="Please Enter Promotion" />
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input v-model="product.quantity" v-validate="'required|min_value:1'" type="number" name="quantity">
                <span style="color:red" v-show="errors.has('quantity')">*{{ errors.first('quantity') }}</span>
            </div>
            <div class="form-group">
                <label>Status</label>
                <label class="radio-inline">
                    <input v-model="product.status" name="status" value="1" type="radio">Mới
                </label>
                <label class="radio-inline">
                    <input v-model="product.status" name="status" value="2" type="radio">Cũ
                </label>
            </div>
            <div class="form-group">
                <label>Warranty</label>
                <input v-model="product.warranty" type="text" name="warranty">
            </div>
            <button type="submit" class="btn btn-success"><span v-if="this.type==='create'">Product Add</span><span v-else>Product Edit</span></button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
</template>
<script>
import { mapGetters,mapActions } from 'vuex'
export default{

    data: function(){
        return {
            product:{
                name:'',
                slug:'',
                price:'',
                cate_id:'',
                description:'',
                image:'',
                promotion:'',
                quantity:'',
                status:'',
                warranty:'',
            },
        }
    },
    computed:{
        ...mapGetters(['allCate']),
        category(){
            return this.allCate
        }
    },
    props: {
        type: {
            type: String,
            default: 'edit'
        },
        dataProd: {
            type: Object,
            default: () => {
                return {
                    name:'',
                    slug:'',
                    price:'',
                    cate_id:'',
                    description:'',
                    image:'',
                    promotion:'',
                    quantity:'',
                    status:'',
                    warranty:'',
                }
            }
        }
    },
    methods:{
        ...mapActions(['pushProduct','FetchCate']),
        imageChanged(event){
            console.log(event.target.files[0].name);
            // this.product.image = event.target.files[0].name;
            var reader = new FileReader();
            reader.onload = (e)=>{
                // this.product.image = event.target.files[0].name;
                this.product.image = e.target.result;
                var output = document.getElementById('output');
                output.src = reader.result;

            };
            reader.readAsDataURL(event.target.files[0]);
        },
        formSubmit(){
            this.$validator.validate().then(result=>{
                if(result){
                    let product = Object.assign({}, this.product)
                    this.$emit('submit',product)
                }
            })
        }
    },
    mounted (){
        this.FetchCate();
        this.product = Object.assign({}, this.product, this.dataProd);
    },
}
</script>

