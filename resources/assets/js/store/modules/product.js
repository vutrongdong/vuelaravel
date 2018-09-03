import {
  FETCHING_RESOURCES,
  FETCHING_RESOURCES_DONE,
  FETCHING_RESOURCES_FAIL,

  FETCH_PRODUCT,
  DELETE_PRODUCT,
  FETCH_EDIT_PROD,
  FET_CATE_FOR_EDIT_PRO
} from '../mutation-type'

const state = {
  product:[],
  category:{}
}

const actions = {
  // let response = null
  async actionFetchProduct({commit}){
    let response = await axios.get('/CustomProd').then(response=>{
      commit(FETCH_PRODUCT,response.data.values)
    })
  },

  async FetProdForEdit({commit},payload){
    const { id,cb } = payload || {}
    let product = await axios.get('/CustomProd/'+id+'/edit')
      commit(FETCH_EDIT_PROD,{product:product.data})
      cb&&cb(product.data)
      // console.log(response.data.values);

  },

  async FetCateForEditProd({commit}){
    let response = await axios.get('/CustomCate').then(response=>{
      commit(FET_CATE_FOR_EDIT_PRO,response.data.values)
    })
  },
  async actionDeleteProd({commit},payload){
    const { prod,cb } = payload || {}
    let response =await axios.delete('/CustomProd/'+ prod).then(response=>{
      commit(DELETE_PRODUCT,prod)
    })
  },
  async pushProduct({commit},payload){
    commit(FETCHING_RESOURCES)
      const { product,cb} = payload || {}
    try{
      if(product.id){
        let response = await axios.put('/CustomProd/'+ product.id,product)
        cb && cb(response.data.data)
      }else{
        let response = await axios.post('/CustomProd',product)
        cb && cb(response.data.data)
      }
    }catch(error){
      commit(FETCHING_RESOURCES_FAIL, error)
    }
  }
}
const mutations ={
  [FETCH_PRODUCT](state,product){
    return state.product = product
  },
  [FETCH_EDIT_PROD](state,product){
    return state.product = product
  },
  [FET_CATE_FOR_EDIT_PRO](state,category){
    return state.category = category
  },
  [DELETE_PRODUCT](state,id){
    return state.product = state.product.filter((prod)=>prod.id !==id)
  }

}

const getters = {
  allProduct:(state) =>state.product,
  product:(state)=> state.product,
  CateForEditProd:(state)=>state.category
}





export default{
  state,
  mutations,
  actions,
  getters
}
