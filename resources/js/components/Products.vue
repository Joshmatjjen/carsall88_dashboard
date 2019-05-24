<template>
    <div class="container-fluid">
        <div class="card mt-4">
        <div class="card-header mb-4">

            <div class="d-flex align-items-center">
                  <h2 class="card-title">Products</h2>
                    <div class="mx-auto input-group px-4">
                        <input type="text" class="form-control br-tl-7 br-bl-7" placeholder="Search products....">
                        <button type="button" class="btn btn-primary br-tr-7 br-br-7 input-group-btn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                        <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-cart-plus fa-fw"></i></button>
                </div>

            </div>
        </div>
        <div class="row row-cards justify-content-center">

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
                                <div class="product-content text-center mt-4">
                                    <h4 class="title"><a href="#">{{product.name}}</a></h4>
                                    <div class="price"><strong>₦</strong>{{product.price}}</div>
                                </div>
                                <ul class="icons">
                                    <li><a href="#" @click="editModal(product)" data-tip="Edit Product"><i class="fa fa-edit"></i></a></li>
                                    <li><a href="#" data-tip="Delete Product"><i class="fa fa-trash-alt"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>




                <!-- Modal Add New Product -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
            <div class="modal-body">
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

                <!-- Size -->
                <div class="form-group">
                    <input v-model="form.size" type="size" name="size"
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

                <!-- Type -->

                <div class="form-group">
                    <select v-model="form.category" name="category" id="category" @change="onChange($event)"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('category') }">
                        <option  value="">Select Product Category</option>
                        <option  value="cars">Cars</option>
                        <option  value="car_parts">Cars Part</option>
                    </select>
                    <has-error :form="form" field="category"></has-error>
                </div>


                <div class="form-group">
                    <b-form-select v-model="form.category_type" :options="options"></b-form-select>
                </div>


                <!-- Photo -->
                <div class="form-group">
                    Product Image 1:
                            <input type="file" @change="addPhotoMain" name="photo_main" id="form-input">
                </div>

                <div class="form-group">
                    Product Image 2:
                            <input type="file" @change="addPhotoSecond" name="photo_second" id="form-input">
                </div>

                <div class="form-group">
                    Product Image 3:
                            <input type="file" @change="addPhotoLast" name="photo_last" id="form-input">
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

<script>
let values;
    export default {
        data() {
            return {
                editmode: false,
                products: {},
                form: new Form({
                    id: '',
                    name: '',
                    price: '',
                    size: '',
                    category: '',
                    category_type: '',
                    email: '',
                    address: '',
                    description: '',
                    photo_main: '',
                    photo_second: '',
                    photo_last: ''

                }),

                options: values
            }
        },
        methods: {

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

        addPhotoSecond(f) {
            // console.log("uploading");
            // Converting image to base64
            let file = f.target.files[0];
            // console.log(file);
            var reader = new FileReader();

            // Check if the file size us less than 2mb
            if(file['size'] < 2111775){
                reader.onloadend = (file) => {
                // console.log('RESULT', reader.result)
                this.form.photo_second = reader.result;

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

        addPhotoLast(g) {
            // console.log("uploading");
            // Converting image to base64
            let file = g.target.files[0];
            // console.log(file);
            var reader = new FileReader();

            // Check if the file size us less than 2mb
            if(file['size'] < 2111775){
                reader.onloadend = (file) => {
                // console.log('RESULT', reader.result)
                this.form.photo_last = reader.result;

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

            onChange(event) {
                if(event.target.value === "cars"){
                    console.log('cars: Correct');

                    this.options = [
                    { value: '', text: 'Please select cars' },
                    { value: 'benz', text: 'Benz' },
                    { value: 'toyota', text: 'Toyota' },
                    { value: { bmw: '3PO' }, text: 'BMW' },
                    { value: 'ford', text: 'Ford', disabled: true }
                ]
                console.log(this.options);

                }
                else if(event.target.value === "car_parts"){
                    console.log('car parts: Correct')

                    this.options = [
                    { value: '', text: 'Please select car parts' },
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
                axios.get('api/findProduct?q=' + query)
                .then((data) => {
                    this.product = data.data
                })
                .catch(() => {

                })
            })
            this.loadProducts();
            // on listen to trigger a function
            Fire.$on('ActionCreate',() => {
                this.loadProducts();
            });
            // setInterval(()=> this.loadUsers(), 3000);
        }
    }

</script>
