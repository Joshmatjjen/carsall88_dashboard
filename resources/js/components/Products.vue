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
                    <div class="col-lg-6 col-xl-4 col-md-12">
                        <div class="card item-card">
                            <div class="product-grid  card-body">
                                <div class="product-image">
                                    <a href="#">
                                        <img class="img-fluid" src="/img/product1.jpg">
                                    </a>
                                </div>
                                <div class="product-content text-center mt-4">
                                    <h4 class="title"><a href="#">Sports shoes</a></h4>
                                    <div class="price"><strong>₦</strong>2000</div>
                                </div>
                                <!-- <ul class="icons">
                                    <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    <li><a href="" data-tip="Add to Wishlist"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>

                </div>




                <!-- Modal Add New User -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New User</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Update User's Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Form body Add New Product -->
            <form @submit.prevent="editmode ? updateProduct() :createProduct() ">
            <div class="modal-body">
                <!-- Name -->
                <div class="form-group">
                    <input v-model="form.name" type="text" name="name"
                    placeholder="Name"
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
                    <select v-model="form.type" name="type" id="type"
                    placeholder="Email Address"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                        <option value="">Select User Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">Standard User</option>
                        <option value="author">Author</option>
                    </select>
                    <has-error :form="form" field="type"></has-error>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <input v-model="form.password" type="password" name="password" id="password"
                    placeholder="Password"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                    <has-error :form="form" field="password"></has-error>
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
                    email: '',
                    address: '',
                    description: '',
                    photo_main: '',
                    photo_second: '',
                    photo_last: ''

                })
            }
        },
        methods: {

            getResults(page = 1) {
			    axios.get('api/product?page=' + page)
				.then(response => {
					this.products = response.data;
				});
            },
            updateUser(){
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
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
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUser(id){
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
                        this.form.delete('api/user/'+id)
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
                if(this.$gate.isAdminORAuthor()){
                    axios.get("api/user").then(({ data }) => (this.users = data));
                }

            },
            createProduct(){
                this.$Progress.start();
                // this.form.photo = 'profile.png'
                this.form.post('api/user')
                .then(()=>{
                    // emit create an event
                    Fire.$emit('ActionCreate');
                    $('#addNew').modal('hide');

                    toast.fire({
                        type: 'success',
                        title: 'Signed in successfully'
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
                    this.products = data.data
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
