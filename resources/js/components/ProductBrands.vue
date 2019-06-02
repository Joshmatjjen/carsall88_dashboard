<template>
    <div class="container-fluid">
        <div class="card mt-4">
        <div class="card-header mb-4">

            <div class="d-flex align-items-center">
                  <h2 class="card-title">Product Brands</h2>
                    <div class="mx-auto input-group px-4">
                        <input type="search" @keyup="searchit" v-model="searchB" class="form-control br-tl-7 br-bl-7" placeholder="Search brands....">
                        <button type="button" @click="searchit" class="btn btn-primary br-tr-7 br-br-7 input-group-btn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                        <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-cart-plus fa-fw"></i></button>
                </div>

            </div>
        </div>
        <!-- <div class="row row-cards justify-content-center"> -->


        <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-4 col-lg-3" v-for="brand in brands.data" :key="brand.id">
                        <div class="card item-card">
                            <div class="product-grid  card-body">
                                <div class="product-image">
                                    <a href="#">
                                        <img class="product-img" v-bind:src="'/img/BrandLogo/' + brand.logo">
                                    </a>
                                </div>
                                <!-- v-for="category in categories.data" :key="category.id" -->
                                <div class="product-content text-center mt-4" >
                                    <h5 class="title"><a href="#">{{brand.name}}</a></h5>
                                </div>
                                <ul class="icons">
                                     <!-- <b-button  variant="primary">xl modal</b-button> -->
                                    <li id="p-view"><a href="#" v-b-modal.product-details @click="showBrand(brand)" v-b-tooltip.hover title="View Brand"><i class="fa fa-eye"></i></a></li>
                                    <li v-if="$gate.isAdminORDeveloper()" id="p-edit"><a href="#" v-b-tooltip.hover title="Edit Brand" @click="editModal(brand)" data-tip="Edit Brand"><i class="fa fa-edit"></i></a></li>
                                    <li v-if="$gate.isAdminORDeveloper()" id="p-delete"><a href="#" @click="deleteBrand(brand.id)" v-b-tooltip.hover title="Delete Brand"><i class="fa fa-trash-alt"></i></a></li>
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
                <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New Brand</h5>
                <h5 v-show="editmode" class="modal-title" id="addNewLabel">Update Brands Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Form body Add New Product -->
            <form enctype="multipart/form-data" method="POST" @submit.prevent="editmode ? updateBrand() :createBrand() ">
            <div class="modal-body mod-bdy">
                <!-- Name -->
                <div class="form-group">
                    <input v-model="form.name" type="text" name="name"
                    placeholder="Brand Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
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
                    Logo:
                            <input type="file" @change="addLogo" name="logo" id="form-input">
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
            <b-modal hide-footer id="product-details" size="lg" centered scrollable title="Brand Details">

                <div class="card-body">
                    <div class="bg-light-gray text-center">

                                <img class="product-detail-img" alt="Brand" v-bind:src="'/img/BrandLogo/' + selectedBrand.logo">
                    </div>

                    <div class="mt-2 mb-2 text-center">
                        <h3>{{selectedBrand.name}}</h3>
                    </div>

                    <div class="mt-4 mb-4">
                        <h4 class="m-b-0 m-t-20">Description</h4>
                        <p>{{selectedBrand.description}}</p>
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
                    <div class="float-left">
                        <ul class="pagination ">
                            <div class="card-footer">
                  <pagination :data="brands" @pagination-change-page="getResults"></pagination>
              </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <!-- </div> -->
</template>

<script>
let cTValues;
    export default {
        data() {
            return {
                editmode: false,
                user: {},
                brands: {},
                selectedBrand: {},
                searchB: '',
                form: new Form({
                    id: '',
                    name: '',
                    logo: '',
                    description: '',


                }),

            }
        },

        methods: {
            searchit: _.debounce(() => {
            Fire.$emit('searching');
            }, 1000),

            showBrand(brandId) {
                this.selectedBrand = brandId;
                this.selectedBrandLogo = this.selectedBrand.logo;
            },
            addLogo(e) {
            // console.log("uploading");
            // Converting image to base64
            let file = e.target.files[0];
            // console.log(file);
            var reader = new FileReader();

            // Check if the file size us less than 2mb
            if(file['size'] < 2111775){
                reader.onloadend = (file) => {

                this.form.logo = reader.result;

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


            getResults(page = 1) {
			    axios.get('api/brand?page=' + page)
				.then(response => {
					this.brands = response.data;
				});
            },
            updateBrand(){
                this.$Progress.start();
                this.form.put('api/brand/'+this.form.id)
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
            editModal(brand){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(brand);

            },


            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteBrand(id){
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
                        this.form.delete('api/brand/'+id)
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
            loadBrands(){
                // if(this.$gate.isAdminORAuthor()){
                    axios.get("api/brand").then(({ data }) => (this.brands = data));
                // }

            },

            loadUser(){
                // if(this.$gate.isAdminORAuthor()){
                    axios.get("api/profile")
                    .then(({ data }) => (this.user = data));

            },

            createBrand(){
                this.$Progress.start();
                // this.form.photo = 'profile.png'
                this.form.post('api/brand')
                .then(()=>{
                    // emit create an event
                    Fire.$emit('ActionCreate');
                    $('#addNew').modal('hide');

                    toast.fire({
                        type: 'success',
                        title: 'Brand created successfully'
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
                query = this.searchB;
                axios.get('api/findBrand?q=' + query)
                .then((data) => {
                    this.brands = data.data
                })
                .catch(() => {

                })
            })
            this.loadBrands();
            this.loadUser();
            // on listen to trigger a function
            Fire.$on('ActionCreate',() => {
                this.loadBrands();
                this.loadUser();
            });
            // setInterval(()=> this.loadUsers(), 3000);
        },
    }

</script>
