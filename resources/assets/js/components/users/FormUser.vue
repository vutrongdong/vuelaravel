<template>
    <form @submit.prevent="formSubmit" class='form'>
        <div class="form-group">
            <label>Username</label>
            <input v-model="users.name" class="form-control" name="user" placeholder="Please Enter Username" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input v-model='users.email' type="email" class="form-control" name="email" placeholder="Please Enter Email" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input v-model="users.password" type="password" class="form-control" name="password" placeholder="Please Enter Password" />
        </div>
        <!-- <div class="form-group">
            <label>RePassword</label>
            <input v-model="users.repass" type="password" class="form-control" name="repass" placeholder="Please Enter RePassword" />
        </div> -->
        <div class="form-group">
            <label>Image</label>
            <input @change="ChangeImage" type="file" class="form-control" name="image" /><br>
            <img v-show="this.type!=='create'" width='100px' :src="'upload/user/'+ users.image" alt="">
        </div>
        <div class="form-group">
            <label>Status</label>
            <br>
            <label class="radio-inline">
                <input v-model="users.status" value="1" checked="" type="radio"> Ân
            </label>
            <label class="radio-inline">
                <input v-model="users.status" name="status" value="2" type="radio">Hiện
            </label>
        </div>
        <div class="form-group">
            <label>User Level</label><br>
            <label class="radio-inline">
                <input v-model="users.level" name="level" value="1" checked="" type="radio">Admin
            </label>
            <label class="radio-inline">
                <input v-model="users.level" name="level" value="2" type="radio">Member
            </label>
        </div>
        <button type="submit" class="btn btn-success"><span v-if="this.type==='create'">User Add</span ><span v-else>User Edit</span></button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</template>
<script>
export default{
    props:['users','type'],
    methods:{
        ChangeImage(e){
            console.log(e.target.files[0]);
            var fileReader = new FileReader();

            fileReader.readAsDataURL(e.target.files[0])

            fileReader.onload =(e) =>{
                this.users.image = e.target.result;
            }
        },
       formSubmit(){
        this.$validator.validate().then(result=>{
            if(result){
                let users = Object.assign({}, this.users)
                this.$emit('submit',users)
            }
        })
    }
}
}
</script>
