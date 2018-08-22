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
                <select v-model="product.cate_id" name="cate_id" v-validate="'required'">
                    <option disabled="">parrent category</option>
                    <option  :value="cate.id" v-for='cate in category'>{{ cate.name }}</option>
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
                <input @change="imageChanged" type="file" name="image" v-validate="'required'">
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
                    <input v-model="product.status" name="status" value="1" checked="checked" type="radio">Mới
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
export default{
    data(){
        return{

        }
    },
    props:['category','product','type'],
    methods:{
        imageChanged(e){
            console.log(e.target.files[0]);
            var fileReader = new FileReader();

            fileReader.readAsDataURL(e.target.files[0])

            fileReader.onload =(e) =>{
                this.product.image = e.target.result
            }
        },
        formSubmit(){
            this.$validator.validate().then(result=>{
                if(result){
                    let product = Object.assign({}, this.product)
                    this.$emit('submit',product)
                }
            })
        }
    }
}
</script>
