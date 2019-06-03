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
                                        <img class="img-fluid" v-bind:src="'/img/productImage/' + product.photo1">
                                    </a>
                                </div>
                                <!-- v-for="category in categories.data" :key="category.id" -->
                                <div class="product-content text-center mt-4" >
                                    <h6 class="title"><a href="#">{{product.category_id.name}}</a></h6>
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
                <div class="form-group" v-if="form.category_id != 2 || form.category_id != 3">
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
                    <!-- <b-form-group label="Condition"> -->
                    <b-form-radio-group v-model="form.condition" id="brand" :options="condition"
                    name="brand" :class="{ 'is-invalid': form.errors.has('brand') }">
                    </b-form-radio-group>
                    <has-error :form="form" field="brand"></has-error>
                </div>

                <!-- Transmision -->
                <div class="form-group">
                    <!-- <b-form-group label="Condition"> -->
                    <b-form-radio-group label="Condition" v-model="form.transmission" id="transmission" :options="transmission"
                    name="transmission" :class="{ 'is-invalid': form.errors.has('transmission') }">
                    </b-form-radio-group>
                    <has-error :form="form" field="transmission"></has-error>
                </div>

                <!-- Model -->
                <div class="form-group">
                    <input v-model="form.model" type="text" name="model"
                    placeholder="Model Name"
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

                <!-- Email -->
                <!-- <div class="form-group">
                    <input v-model="form.email" type="email" name="email"
                    placeholder="Email Address"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                </div> -->

                <!-- Address -->
                <!-- <div class="form-group">
                    <input v-model="form.address" type="address" name="address"
                    placeholder="Address"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                    <has-error :form="form" field="address"></has-error>
                </div> -->

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
                sub_categories: {},
                brands: {},
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
                    year: '',
                    size: '',
                    email: '',
                    address: '',
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
                colours: ["AliceBlue","AntiqueWhite","Aqua","Aquamarine","Azure","Beige","Bisque","Black","BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue","Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue","DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin","NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon","SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"],
                cTOptions: cTValues,
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

            showProduct(productId) {
                this.selectedProduct = productId;
                this.selectedProductImage = this.selectedProduct.photo1;
                // console.log(this.selectedProductId);
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
                if(event.target.value === "1"){
                    console.log('cars: Correct');

                    this.cTOptions = this.subcategories.filter(function (obj) {
                        return obj.category_id === 1;
                    });

                        // this.cTOptions = this.subcategories.find(x => x.all.category_id = 1);


                console.log(this.options);

                }
                else if(event.target.value === "2"){
                    console.log('car parts: Correct')

                    this.cTOptions = this.subcategories.filter(function (obj) {
                        return obj.category_id === 2;
                    });
                    console.log(this.cTOptions);
                }
                else if(event.target.value === "3"){

                    this.cTOptions = this.subcategories.filter(function (obj) {
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
                    axios.get("api/allCategories")
                    .then(({ data }) => (this.categories = data));

            },

            loadSubCategory(){
                // if(this.$gate.isAdminORAuthor()){
                    axios.get("api/allSubCategories")
                    .then(({ data }) => (this.subcategories = data));

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
            this.loadProducts();
            this.loadCategory();
            this.loadSubCategory();
            this.loadUser();
            this.loadBrand();
            // on listen to trigger a function
            Fire.$on('ActionCreate',() => {
                this.loadProducts();
                this.loadUser();
            });
            // setInterval(()=> this.loadUsers(), 3000);
        },
    }

</script>

