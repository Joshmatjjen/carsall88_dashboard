<template>
    <div class="container-fluid">
        <div class="card mt-4">
        <div class="card-header mb-4">

            <div class="d-flex align-items-center">
                  <h2 class="card-title">Products</h2>
                    <div class="mx-auto input-group px-4">
                        <input type="search" @keyup="searchit" v-model="searchP" class="form-control br-tl-7 br-bl-7" placeholder="Search products....">
                        <button type="button" @click="searchit" class="btn btn-primary br-tr-7 br-br-7 input-group-btn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                        <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-cart-plus fa-fw"></i></button>
                </div>

            </div>
        </div>
        <div class="row row-cards justify-content-center">

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title"> Categories</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label mt-0">Mens</label>
                                    <select name="beast" id="select-beast" class="form-control custom-select">
                                        <option value="0">--Select--</option>
                                        <option value="1">Foot wear</option>
                                        <option value="2">Top wear</option>
                                        <option value="3">Bootom wear</option>
                                        <option value="4">Men's Groming</option>
                                        <option value="5">Accessories</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Women</label>
                                    <select name="beast" id="select-beast1" class="form-control custom-select">
                                        <option value="0">--Select--</option>
                                        <option value="1">Western wear</option>
                                        <option value="2">Foot wear</option>
                                        <option value="3">Top wear</option>
                                        <option value="4">Bootom wear</option>
                                        <option value="5">Beuty Groming</option>
                                        <option value="6">Accessories</option>
                                        <option value="7">jewellery</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Baby &amp; Kids</label>
                                    <select name="beast" id="select-beast2" class="form-control custom-select">
                                        <option value="0">--Select--</option>
                                        <option value="1">Boys clothing</option>
                                        <option value="2">girls Clothing</option>
                                        <option value="3">Toys</option>
                                        <option value="4">Baby Care</option>
                                        <option value="5">Kids footwear</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Electronics</label>
                                    <select name="beast" id="select-beast3" class="form-control custom-select">
                                        <option value="0">--Select--</option>
                                        <option value="1">Mobiles</option>
                                        <option value="2">Laptops</option>
                                        <option value="3">Gaming &amp; Accessories</option>
                                        <option value="4">Health care Appliances</option>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label">Sport,Books &amp; More </label>
                                    <select name="beast" id="select-beast4" class="form-control custom-select">
                                        <option value="0">--Select--</option>
                                        <option value="1">Stationery</option>
                                        <option value="2">Books</option>
                                        <option value="3">Gaming</option>
                                        <option value="4">Music</option>
                                        <option value="5">Exercise &amp; fitness</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-group-item">
                                <header class="card-header">
                                    <h2 class="card-title">Brands </h2>
                                </header>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <form>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-label">
                                                    Mersedes Benz
                                                </span>
                                            </label> <!-- form-check.// -->
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-label">
                                                    Nissan Altima
                                                </span>
                                            </label> <!-- form-check.// -->
                                            <label class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-label">
                                                    Another Brand
                                                </span>
                                            </label> <!-- form-check.// -->
                                        </form>
                                    </div> <!-- card-body.// -->
                                </div>
                            </div> <!-- card-group-item.// -->
                        </div>
                        <div class="card">
                            <div class="card-group-item">
                                <header class="card-header">
                                    <h2 class="card-title">Choose type </h2>
                                </header>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                            <span class="form-check-label">
                                                First hand items
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                            <span class="form-check-label">
                                                Brand new items
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadio" value="">
                                            <span class="form-check-label">
                                                Some other option
                                            </span>
                                        </label>
                                    </div> <!-- card-body.// -->
                                </div>
                            </div> <!-- card-group-item.// -->
                        </div>
                        <a href="#" class="btn btn-primary btn-block mb-3 ">Search</a>
                    </div>
                </div>
            </div>



        <div class="col-lg-9">

                <div class="row">
                    <div class="col-lg-6 col-xl-4 col-md-12" v-for="product in products.data" :key="product.id">
                        <div class="card item-card">
                            <div class="product-grid  card-body">
                                <div class="product-image">
                                    <a href="#">
                                        <img class="img-fluid" v-bind:src="'/img/productImage/' + product.photo_main">
                                    </a>
                                </div>
                                <!-- v-for="category in categories.data" :key="category.id" -->
                                <div class="product-content text-center mt-4" >
                                    <h6 class="title"><a href="#">category</a></h6>
                                    <h5 class="title"><a href="#">{{product.name}}</a></h5>

                                    <div class="price"><strong>₦</strong>{{product.price}}</div>
                                </div>
                                <ul class="icons">
                                     <!-- <b-button  variant="primary">xl modal</b-button> -->
                                    <li id="p-view"><a href="#" v-b-modal.product-details @click="showProduct(product)" v-b-tooltip.hover title="View Product"><i class="fa fa-eye"></i></a></li>
                                    <li v-if="$gate.isAdminORDeveloper()" id="p-edit"><a href="#" v-b-tooltip.hover title="Edit Product" @click="editModal(product)" data-tip="Edit Product"><i class="fa fa-edit"></i></a></li>
                                    <li v-if="$gate.isAdminORDeveloper()" id="p-delete"><a href="#" @click="deleteProduct(product.id)" v-b-tooltip.hover title="Delete Product"><i class="fa fa-trash-alt"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>




<!-- ANCHOR : Modal -->
                <!-- Modal Add New Product -->
        <div class="modal fade mod" id="addNew" tabindex="-1" role="dialog" scroll aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mod-dg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New Product</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Update Products Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Form body Add New Product -->
            <form enctype="multipart/form-data" method="POST" @submit.prevent="editmode ? updateProduct() :createProduct() ">
            <div class="modal-body mod-bdy">
                <!-- Name -->
                <div class="form-group">
                    <input v-model="form.name" type="text" name="name"
                    placeholder="Product Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <input v-model="form.price" type="number" name="price"
                    placeholder="Price"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
                    <has-error :form="form" field="price"></has-error>
                </div>

                <!-- Condtion -->
                 <div class="form-group">
                    <!-- <b-form-group label="Condition"> -->
                    <b-form-radio-group v-model="form.condition" id="brand" :options="condition"
                    name="brand" :class="{ 'is-invalid': form.errors.has('brand') }">
                    </b-form-radio-group>

                    <!-- </b-form-group> -->
                    <!-- <b-form-select  :options="condition" name="brand"
                    ></b-form-select> -->
                    <has-error :form="form" field="brand"></has-error>
                </div>


                <!-- Type -->

                <div class="form-group">
                    <select v-model="form.category_id" name="category" id="category" @change="onChange($event)"
                    class="form-control">
                        <option  value="">Select Product Category</option>
                        <option  value="1" >Cars</option>
                        <option  value="2" >Cars Part</option>
                        <option  value="3" >Cars Accessories</option>
                    </select>

                </div>


                <!-- <div class="form-group"> -->
                    <!-- <b-form-select v-model="form.subcategory_id" :options="cTOptions"
                    :class="{ 'is-invalid': form.errors.has('category_type') }"></b-form-select>
                    <has-error :form="form" field="category_type"></has-error> -->
                    <div class="form-group">
                    <b-form-select v-model="form.subcategory_id" :options="cTOptions" name="subcategory_id"
                    :class="{ 'is-invalid': form.errors.has('subcategory_id') }"></b-form-select>
                    <has-error :form="form" field="subcategory_id"></has-error>
                </div>
                <!-- </div> -->

                <!-- Brands -->
                 <div class="form-group">
                    <b-form-select v-model="form.brand_id" :options="brands" name="brands"
                    :class="{ 'is-invalid': form.errors.has('brands') }"></b-form-select>
                    <has-error :form="form" field="brands"></has-error>
                </div>

                <!-- Size -->
                <div class="form-group">
                    <input v-if="form.category_id!=1" v-model="form.size" type="size" name="size"
                    placeholder="Size"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('size') }">
                    <has-error :form="form" field="size"></has-error>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <input v-model="form.email" type="email" name="email"
                    placeholder="Email Address"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <input v-model="form.address" type="address" name="address"
                    placeholder="Address"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                    <has-error :form="form" field="address"></has-error>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <textarea v-model="form.description" name="description" id="description"
                    placeholder="Short description for product (Optional)"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                    <has-error :form="form" field="description"></has-error>
                </div>



                <!-- Photo -->
                <div class="form-group">
                    Product Image 1:
                            <input type="file" @change="addPhotoMain" name="photo_main" id="form-input">
                </div>

                <div class="form-group" v-show="editmode">
                    Product Image 2:
                            <input type="file" @change="addPhotoMain" name="photo_second" id="form-input">
                </div>

                <div class="form-group" v-show="editmode">
                    Product Image 3:
                            <input type="file" @change="addPhotoMain" name="photo_last" id="form-input">
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
        </div>
        </div>



<!-- ANCHOR Product Details -->
        <div>
            <b-modal hide-footer id="product-details" size="lg" centered scrollable title="Product Details">

                <div class="card-body">
                    <div class="bg-light-gray text-center">

                                <img class="product-detail-img" alt="Product" v-bind:src="'/img/productImage/' + selectedProductImage">
                    </div>
                    <div class="bg-light-gray div-small-p-img">
                        <img class="small-p-img" v-on:click="selectedProductImage = selectedProduct.photo_main" alt="Product" v-bind:src="'/img/productImage/' + selectedProduct.photo_main">
                        <img class="small-p-img" v-on:click="selectedProductImage = selectedProduct.photo_second" alt="Product" v-bind:src="'/img/productImage/' + selectedProduct.photo_second">
                        <img class="small-p-img" v-on:click="selectedProductImage = selectedProduct.photo_last" alt="Product" v-bind:src="'/img/productImage/' + selectedProduct.photo_last">
                    </div>
                    <div class="mt-2 mb-2 text-center">
                        <h3>{{selectedProduct.name}}</h3>
                    </div>

                    <div class="mt-4 mb-4">
                        <h4 class="m-b-0 m-t-20">Description</h4>
                        <p>{{selectedProduct.description}}</p>
                    </div>
                    <h4 class="mb-4">Specifications</h4>
                    <div class="pro_detail border p-4">
                        <h5 class="m-l-0 m-t-10">General</h5>
                        <ul class="list-unstyled mb-0 border-bottom-0">
                            <li class="row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Brand</div>
                                <div class="col-sm-3 mb-2">Fas-track</div>
                            </li>
                            <li class=" row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Model Number</div>
                                <div class="col-sm-3 mb-2">RDF016</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Model Name</div>
                                <div class="col-sm-3 mb-2">RS10</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Suitable For</div>
                                <div class="col-sm-3 mb-2">Men, Women</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Material</div>
                                <div class="col-sm-3 mb-2">Leather</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted">Color</div>
                                <div class="col-sm-3">Black</div>
                            </li>
                        </ul>
                    </div>
                    <div class="pro_detail border p-4 border-top-0">
                        <h5 class="m-l-0 m-t-0">Dimensions</h5>
                        <ul class="list-unstyled mb-0 ">
                            <li class="row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Width</div>
                                <div class="col-sm-3 mb-2">3 inch</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Works</div>
                                <div class="col-sm-3 mb-2">Alarm, Digital counter</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Warranty</div>
                                <div class="col-sm-3 mb-2">3 yrs</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted ">Others</div>
                                <div class="col-sm-3 "> Pulse Measurement</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </b-modal>

        </div>

                <!-- Pagination -->
                <div class="mb-3 ">
                    <div class="float-right">
                        <ul class="pagination ">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>
    // <my-component :user-name=></my-componet>


<script>
let cTValues;
    export default {
        data() {
            return {
                editmode: false,
                user: {},
                products: {},
                categories: {},
                selectedProduct: {},
                selectedProductImage: {},
                form: new Form({
                    id: '',
                    category_id: '',
                    subcategory_id: '',
                    brand_id: '',
                    name: '',
                    price: '',
                    size: '',
                    email: '',
                    address: '',
                    condition: '',
                    description: '',
                    photo_main: '',
                    photo_second: '',
                    photo_last: ''

                }),

                brands : [
                    { value: '', text: 'Please select brand' },
                    { value: '1', text: 'Acura' },
                    { value: '2', text: 'Audi' },

                ],
                condition : [
                    { value: 'new', text: 'New' },
                    { value: 'used', text: 'Used' },

                ],
                cTOptions: cTValues,
                searchP: ''

            }
        },

        methods: {
            searchit: _.debounce(() => {
            Fire.$emit('searching');
            }, 1000),

            showProduct(productId) {
                this.selectedProduct = productId;
                this.selectedProductImage = this.selectedProduct.photo_main;
                // console.log(this.selectedProductId);
            },
            addPhotoMain(e) {
            // console.log("uploading");
            // Converting image to base64
            let file = e.target.files[0];
            // console.log(file);
            var reader = new FileReader();

            // Check if the file size us less than 2mb
            if(file['size'] < 2111775){
                reader.onloadend = (file) => {

                this.form.photo_main = reader.result;
                // this.form.photo_second = reader.result;
                // this.form.photo_last = reader.result;
                console.log('RESULT', reader.result)

                }

                reader.readAsDataURL(file);

            }else{
                swal.fire(
                    'Ooops....',
                    'Your are uploading a large file',
                    'error'
                )
            }


        },

        // addPhotoSecond(f) {
        //     // console.log("uploading");
        //     // Converting image to base64
        //     let file = f.target.files[0];
        //     // console.log(file);
        //     var reader = new FileReader();

        //     // Check if the file size us less than 2mb
        //     if(file['size'] < 2111775){
        //         reader.onloadend = (file) => {
        //         // console.log('RESULT', reader.result)
        //         this.form.photo_second = reader.result;

        //         console.log('RESULT', reader.result)
        //         }

        //         reader.readAsDataURL(file);


        //     }else{
        //         swal.fire(
        //             'Ooops....',
        //             'Your are uploading a large file',
        //             'error'
        //         )
        //     }


        // },



            onChange(event) {
                if(event.target.value === "1"){
                    console.log('cars: Correct');


                    this.cTOptions = [
                    { value: '', text: 'Please select car type' },
                    { value: 1, text: 'SUV' },
                    { value: 2, text: 'Truck' },
                    { value: 3, text: 'Sedan' },
                    { value: 4, text: 'Van'},
                    { value: 5, text: 'Coupe'},
                    { value: 6, text: 'Wagon'},
                    { value: 7, text: 'Convertible'},
                    { value: 8, text: 'Sport Car'},
                    { value: 9, text: 'Diesel'},
                    { value: 10, text: 'Crossover'},
                    { value: 11, text: 'Luxury Car'},
                    { value: 12, text: 'Hybrid/Electric'},
                    { value: 13, text: 'Certified Pre-Owned'},
                ]
                console.log(this.options);

                }
                else if(event.target.value === "2"){
                    console.log('car parts: Correct')

                    this.cTOptions = [
                    { value: '', text: 'Please select car parts' },
                    { value: 'Bonnet', text: 'Oil' },
                    { value: 'plug', text: 'plug' },
                    // { value: { brain_box: '3.1' }, text: 'brain box' },
                    { value: 'brain_box' , text: 'brain box' },
                    { value: 'wheel', text: 'Wheel'}
                    // { value: 'wheel', text: 'Wheel', disabled: true }
                ]
                    console.log(this.options);
                }
                else if(event.target.value === "3"){

                    this.cTOptions = [
                    { value: '', text: 'Please select car accessories' },
                    { value: 'oil', text: 'Oil' },
                    { value: 'plug', text: 'plug' },
                    // { value: { brain_box: '3.1' }, text: 'brain box' },
                    { value: 'brain_box' , text: 'brain box' },
                    { value: 'wheel', text: 'Wheel'}
                    // { value: 'wheel', text: 'Wheel', disabled: true }

                ]

                console.log(this.options);

                }


            },

            getResults(page = 1) {
			    axios.get('api/product?page=' + page)
				.then(response => {
					this.product = response.data;
				});
            },
            updateProduct(){
                this.$Progress.start();
                this.form.put('api/product/'+this.form.id)
                .then(()=>{
                    $('#addNew').modal('hide');
                    swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('ActionCreate');

                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            editModal(product){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(product);

            },


            newModal(){
                this.editmode = false;
                this.form.reset();
                this.form.email = this.user.email
                this.form.address = this.user.address
                $('#addNew').modal('show');
            },
            deleteProduct(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        // Send request to the server
                    if (result.value) {
                        this.form.delete('api/product/'+id)
                        .then(()=>{

                            swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            Fire.$emit('ActionCreate');
                            })
                        .catch(()=>{
                            swal("Failed!", "There was something wrong.", "warning");
                        })
                    }
                    })
            },
            loadProducts(){
                // if(this.$gate.isAdminORAuthor()){
                    axios.get("api/product").then(({ data }) => (this.products = data));
                // }

            },

            loadCategory(){
                // if(this.$gate.isAdminORAuthor()){
                    axios.get("api/categories")
                    .then(({ data }) => (this.category = data));

            },

            loadUser(){
                // if(this.$gate.isAdminORAuthor()){
                    axios.get("api/profile")
                    .then(({ data }) => (this.user = data));

            },

            createProduct(){
                this.$Progress.start();
                // this.form.photo = 'profile.png'
                this.form.post('api/product')
                .then(()=>{
                    // emit create an event
                    Fire.$emit('ActionCreate');
                    $('#addNew').modal('hide');

                    toast.fire({
                        type: 'success',
                        title: 'Product created successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })

            }

        },
        created() {
            Fire.$on('searching', () => {
                let query = this.$parent.search;
                query = this.searchP;
                axios.get('api/findProduct?q=' + query)
                .then((data) => {
                    this.products = data.data
                })
                .catch(() => {

                })
            })
            this.loadProducts();
            this.loadUser();
            // on listen to trigger a function
            Fire.$on('ActionCreate',() => {
                this.loadProducts();
                this.loadUser();
            });
            // setInterval(()=> this.loadUsers(), 3000);
        },
    }

</script>

