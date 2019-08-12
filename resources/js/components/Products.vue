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
                                    <label class="form-label mt-0">Cars</label>
                                    <select v-model="searchP" name="sub_category" id="sub_category" class="form-control custom-select">
                                        <option value="">--Select--</option>
                                        <option v-for="subcategory in cars_cat" v-bind:key="subcategory.id"
                                            v-bind:value="subcategory.category_id" class="form-control">{{subcategory.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Car Parts</label>
                                    <select v-model="searchP" name="sub_category" id="sub_category" class="form-control custom-select">
                                        <option value="">--Select--</option>
                                        <option v-for="subcategory in carP_cat" v-bind:key="subcategory.id"
                                            v-bind:value="subcategory.category_id" class="form-control">{{subcategory.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Car Accessories</label>
                                    <select name="beast" id="select-beast2" class="form-control custom-select">
                                        <option value="0">--Select--</option>
                                        <option v-for="subcategory in carA_cat" v-bind:key="subcategory.id"
                                            v-bind:value="subcategory.id" class="form-control">{{subcategory.name}}
                                        </option>
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
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="#">
                                        <img class="img-fluid" v-bind:src="'/img/productImage/' + product.photo1">
                                    </a>
                                </div>
                                <!-- v-for="category in categories.data" :key="category.id" -->
                                <div class="product-content text-center mt-4" >
                                    <h6 class="title green" v-if="product.category"><a href="#">{{product.category.name}}</a></h6>
                                    <h5 class="title"><a href="#">{{product.name}}</a></h5>

                                    <div class="price red" style="font-size:19px; font-family:Tahoma;">₦{{formatPrice(product.price)}}</div>
                                    <h6 class="" v-if="product.user">By {{product.user.name}}</h6>
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
        <div class="modal fade mod" id="addNew" tabindex="-1" role="dialog"  aria-labelledby="addNewLabel" aria-hidden="true">
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

                <!-- Type -->

                <div class="form-group">
                    <select v-model="form.category_id" name="category" id="category" @change="onChange($event)"
                    class="form-control">
                        <option  value="">Select Product Category</option>
                         <option v-for="category in categories" v-bind:key="category.id" v-bind:value="category.id" class="form-control">{{category.name}}</option>

                    </select>

                </div>


                <!-- SubCategory -->
                <div class="form-group">
                    <select v-model="form.sub_category_id" name="sub_category" id="sub_category"
                    class="form-control">
                        <option  value="">Select Product Category Type</option>
                         <option v-for="subcategory in cTOptions" v-bind:key="subcategory.id" v-bind:value="subcategory.id" class="form-control">{{subcategory.name}}</option>

                    </select>

                </div>
                <!-- </div> -->

                <!-- Colour -->
                <div class="form-group" v-if="form.category_id != 2 && form.category_id != 3">
                    <select name="colour" v-model="form.colour" class="form-control">
                        <option value="">Select Colour</option>
                        <option v-for="color in colours" v-bind:key="color" v-bind:value="color" class="form-control">{{color}}</option>
                    </select>
                </div>

                <!-- Brands -->
                <div class="form-group">
                    <select name="brand" v-model="form.brand_id" class="form-control">
                        <option value="">Select Brand</option>
                        <option v-for="brand in brands" v-bind:key="brand.id" v-bind:value="brand.id" class="form-control">{{brand.name}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <b-form-group label="Condition: ">
                    <b-form-radio-group v-model="form.condition" id="brand" :options="condition"
                    name="brand" :class="{ 'is-invalid': form.errors.has('brand') }">
                    </b-form-radio-group>
                    <has-error :form="form" field="brand"></has-error>
                    </b-form-group>
                </div>

                <!-- Transmision -->
                <div class="form-group" v-if="form.category_id != 2 && form.category_id != 3">
                    <b-form-group label="Transmission: ">
                    <b-form-radio-group  v-model="form.transmission" id="transmission" :options="transmission"
                    name="transmission" :class="{ 'is-invalid': form.errors.has('transmission') }">
                    </b-form-radio-group>
                    <has-error :form="form" field="transmission"></has-error>
                    </b-form-group>
                </div>

                <!-- Fuel Type -->
                <div class="form-group" v-if="form.category_id != 2 && form.category_id != 3">
                    <b-form-group label="Fuel Type: ">
                    <b-form-radio-group v-model="form.fuel_type" id="fuel_type" :options="fuelType"
                    name="fuel_type" :class="{ 'is-invalid': form.errors.has('fuel_type') }">
                    </b-form-radio-group>
                    <has-error :form="form" field="fuel_type"></has-error>
                    </b-form-group>
                </div>

                <!-- Model -->
                <div class="form-group">
                    <input v-model="form.model" type="text" name="model"
                    placeholder="Model Details"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('model') }">
                    <has-error :form="form" field="model"></has-error>
                </div>

                <!-- Year -->
                <div class="form-group">
                    <select name="year" v-model="form.year" class="form-control">
                        <option value="">Year:</option>
                        <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                    </select>
                </div>

                <!-- Size -->
                <div class="form-group">
                    <input v-if="form.category_id!=1" v-model="form.size" type="size" name="size"
                    placeholder="Size"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('size') }">
                    <has-error :form="form" field="size"></has-error>
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
                            <input type="file" @change="addPhoto1" name="photo1" id="form-input">
                </div>

                <div class="form-group">
                    Product Image 2:
                            <input type="file" @change="addPhoto2" name="photo2" id="form-input">
                </div>

                <div class="form-group">
                    Product Image 3:
                            <input type="file" @change="addPhoto3" name="photo3" id="form-input">
                </div>

                <div class="form-group">
                    Product Image 4:
                            <input type="file" @change="addPhoto4" name="photo3" id="form-input">
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
                        <img class="small-p-img" v-on:click="selectedProductImage = selectedProduct.photo1" alt="Product" v-bind:src="'/img/productImage/' + selectedProduct.photo1">
                        <img class="small-p-img" v-on:click="selectedProductImage = selectedProduct.photo2" alt="Product" v-bind:src="'/img/productImage/' + selectedProduct.photo2">
                        <img class="small-p-img" v-on:click="selectedProductImage = selectedProduct.photo3" alt="Product" v-bind:src="'/img/productImage/' + selectedProduct.photo3">
                        <img class="small-p-img" v-on:click="selectedProductImage = selectedProduct.photo4" alt="Product" v-bind:src="'/img/productImage/' + selectedProduct.photo4">
                    </div>
                    <div class="mt-2 mb-2 text-center">
                        <h3 style="font-family: Georgia;" class="p-1 blue">{{selectedProduct.name}}</h3>
                        <h4 style="font-family: Arial Narrow;" class="p-1 red"><strong>₦{{formatPrice(selectedProduct.price)}}</strong></h4>
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
                                <div class="col-sm-3 mb-2" v-if="selectedProduct.brand">
                                <img class="brand-sm-img img-circle" v-bind:src="'/img/BrandLogo/' + selectedProduct.brand.logo" alt="User profile picture">    {{selectedProduct.brand.name}}
                                </div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Model Details</div>
                                <div class="col-sm-3 mb-2" v-if="selectedProduct.category">{{selectedProduct.category.name}}</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Model Details</div>
                                <div class="col-sm-3 mb-2">{{selectedProduct.model}}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="pro_detail border p-4 border-top-0" v-if="selectedProduct.category">
                        <h5 class="m-l-0 m-t-0">Qualities</h5>
                        <ul class="list-unstyled mb-0 " v-if="selectedProduct.category.id = 1">
                            <li class="row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Transmission</div>
                                <div class="col-sm-3 mb-2">{{selectedProduct.transmission}}</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted mb-2">Colour</div>
                                <div class="col-sm-3 mb-2">{{selectedProduct.colour}}</div>
                            </li>
                            <li class="p-b-20 row border-bottom-0">
                                <div class="col-sm-3 text-muted ">Fuel Type</div>
                                <div class="col-sm-3 "> {{selectedProduct.fuel_type}}</div>
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
                sub_categories: {},
                brands: {},
                mechanics: {},
                selectedBrand: {},
                selectedProduct: {},
                selectedProductImage: {},
                form: new Form({
                    id: '',
                    category_id: '',
                    sub_category_id: '',
                    brand_id: '',
                    name: '',
                    price: '',
                    colour: '',
                    model: '',
                    transmission: '',
                    fuel_type: '',
                    year: '',
                    size: '',
                    condition: '',
                    description: '',
                    photo1: '',
                    photo2: '',
                    photo3: '',
                    photo4: '',

                }),

                condition : [
                    { value: 'Brand New', text: 'Brand New' },
                    { value: 'Used/Tokunbo', text: 'Used/Tokunbo' },

                ],
                transmission: [
                    { value: 'Automatic', text: 'Automatic' },
                    { value: 'Manual', text: 'Manual' },
                ],

                fuelType:[
                    { value: 'Petrol', text: 'Petrol' },
                    { value: 'Diesel', text: 'Diesel' },
                    { value: 'Electricity', text: 'Electricity' },
                    { value: 'Gas', text: 'Gas' },
                ],
                colours: ["AliceBlue","AntiqueWhite","Aqua","Aquamarine","Azure","Beige","Bisque","Black","BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue","Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue","DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin","NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon","SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"],
                cTOptions: cTValues,
                cars_cat: {},
                carP_cat: {},
                carA_cat: {},
                searchP: ''

            }
        },
        computed : {
            years () {
            const year = new Date().getFullYear()
            return Array.from({length: year - 1980}, (value, index) => 1980 + index)
            }
        },

        methods: {
            searchit: _.debounce(() => {
            Fire.$emit('searching');
            }, 1000),

            formatPrice(value) {
                let val = (value / 1).toFixed(2).replace(',', '.')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            },

            showProduct(productId) {
                this.selectedProduct = productId;
                this.selectedProductImage = this.selectedProduct.photo1;
                console.log(this.selectedProduct);
            },
            addPhoto1(e) {
            // Converting image to base64
            let file = e.target.files[0];
            // console.log(file);
            var reader = new FileReader();

            // Check if the file size us less than 2mb
            if(file['size'] < 2111775){
                reader.onloadend = (file) => {

                this.form.photo1 = reader.result;
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
        addPhoto2(e) {
            // Converting image to base64
            let file = e.target.files[0];
            // console.log(file);
            var reader = new FileReader();

            // Check if the file size us less than 2mb
            if(file['size'] < 2111775){
                reader.onloadend = (file) => {

                this.form.photo2 = reader.result;

                // console.log('RESULT', this.form.photo1, this.form.photo2, this.form.photo3);
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
        addPhoto3(e) {
            // Converting image to base64
            let file = e.target.files[0];
            // console.log(file);
            var reader = new FileReader();

            // Check if the file size us less than 2mb
            if(file['size'] < 2111775){
                reader.onloadend = (file) => {
                this.form.photo3 = reader.result;
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
        addPhoto4(e) {
            // Converting image to base64
            let file = e.target.files[0];
            // console.log(file);
            var reader = new FileReader();

            // Check if the file size us less than 2mb
            if(file['size'] < 2111775){
                reader.onloadend = (file) => {

                this.form.photo4 = reader.result;
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

            onChange(event) {

                // if(event = 1){
                //     this.cars_cat = this.sub_categories.filter(function (obj) {
                //         return obj.category_id === 1;
                //     });
                // }



                if(event.target.value === "1"){
                    console.log('cars: Correct');

                    this.cTOptions = this.sub_categories.filter(function (obj) {
                        return obj.category_id === 1;
                    });

                        // this.cTOptions = this.sub_categories.find(x => x.all.category_id = 1);


                console.log(this.options);

                }
                else if(event.target.value = 2){
                    console.log('car parts: Correct')

                    this.cTOptions = this.sub_categories.filter(function (obj) {
                        return obj.category_id === 2;
                    });
                    console.log(this.cTOptions);
                }
                else if(event.target.value = 3){

                    this.cTOptions = this.sub_categories.filter(function (obj) {
                        return obj.category_id === 3;
                    });

                console.log(this.cTOptions);

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
            loadMechanic(){
                axios.get("api/mechanic").then(({ data }) => (this.mechanics = data));
            },

            loadCategory(){
                // if(this.$gate.isAdminORAuthor()){
                    axios.get("api/allCategories")
                    .then(({ data }) => (this.categories = data));

            },

            loadSubCategory(){
                // if(this.$gate.isAdminORAuthor()){
                    axios.get("api/allSubCategories")
                    .then(({ data }) => (this.sub_categories = data))
                    .then(({ data }) => (this.cars_cat = this.sub_categories.filter((obj) => {return obj.category_id === 1})))
                    .then(({ data }) => (this.carP_cat = this.sub_categories.filter((obj) => {return obj.category_id === 2})))
                    .then(({ data }) => (this.carA_cat = this.sub_categories.filter((obj) => {return obj.category_id === 3})))
            },

            loadBrand(){
                axios.get("api/allBrands")
                .then(({data}) => (this.brands = data))
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
            this.loadUser();
            this.loadProducts();
            this.loadCategory();
            this.loadSubCategory();
            this.loadBrand();


            // on listen to trigger a function
            Fire.$on('ActionCreate',() => {
                this.loadUser();
                this.loadProducts();
            });
            // setInterval(()=> this.loadUsers(), 3000);
        },
    }

</script>

