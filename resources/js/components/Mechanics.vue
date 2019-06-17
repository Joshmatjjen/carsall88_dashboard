<template>
    <div class="container" v-if="$gate.isAdminORDeveloper()">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mechanic Table</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="addRating">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Registered At</th>
                    <th>Modify</th>
                  </tr>

                  <tr v-for="mechanic in mechanics.data" :key="mechanic.id">

                    <td>{{mechanic.id}}</td>
                    <td><img class="profile-user-img img-fluid img-circle" v-bind:src="'/img/profile/' + mechanic.photo" alt="User profile picture"></td>
                    <td>{{mechanic.name}}</td>
                    <td>{{mechanic.email}}</td>
                    <td><star-rating v-if="mechanic.id" :rating="5" @rating-selected="addRating($event, mechanic.id)" :border-width="1" text-class="custom-text" :star-size="20" :glow="20"></star-rating><b-button variant="outline-primary" @click="showButton">Button</b-button><div float-right>AVG: {{mechanic.averageRating}}   Review:  {{mechanic.reviews}}</div></td>
                    <td>{{mechanic.created_at | myDate}}</td>
                    <td>
                        <a href="#" @click="editModal(mechanic)">
                            <i class="fa fa-user-edit blue"></i>
                        </a>
                        /
                        <a href="#" @click="deleteUser(mechanic.id)">
                            <i class="fa fa-trash-alt red"></i>
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="mechanics" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>


        <div v-if="!$gate.isAdminORDeveloper()">
            <not-found></not-found>
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

            <!-- Form body Add New User -->
            <form @submit.prevent="editmode ? updateUser() :createUser() ">
            <div class="modal-body">
                <!-- Name -->
                <div class="form-group">
                    <input v-model="form.name" type="text" name="name"
                    placeholder="Name"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <input v-model="form.email" type="email" name="email"
                    placeholder="Email Address"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                </div>

                <!-- Bio -->
                <div class="form-group">
                    <textarea v-model="form.bio" name="bio" id="bio"
                    placeholder="Short bio for user (Optional)"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                    <has-error :form="form" field="bio"></has-error>
                </div>

                <div class="form-group">
                    <textarea v-model="form.address" name="address" id="address"
                    placeholder="Place Of Work Address"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('address') }"></textarea>
                    <has-error :form="form" field="address"></has-error>
                </div>

                <!-- Type -->
                <div class="form-group">
                    <select v-model="form.type" name="type" id="type"
                    placeholder="Email Address"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                        <option value="">Select User Role</option>
                        <option value="admin">Admin</option>
                        <option value="mechanic">Mechanic</option>
                        <option value="user">Standard User</option>
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
    </div>
</template>

<script>
import { setInterval } from 'timers';
    export default {
        data() {
            return {
                editmode: false,
                mechanics: {},
                user: {},
                ratings: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    bio: '',
                    address: '',
                    photo: ''

                }),
                rating: new Form({
                    rate: '',
                })
            }
        },
        methods: {
            showCurrentRating($mech_id, $rate_rev_id, $rate_auth_id , $rates){
                if(($mech_id = $rate_rev_id) && (this.user.id = $rate_auth_id)){
                    return $rates;
                }
                else{
                    return $rates = 3;
                }
                // console.log($mech_id)
                // console.log(this.ratings.reviewrateable_id)
                // console.log(this.ratings.author_id)
                // return $rates;
            },
            showButton(){
                console.log(this.ratings.id)
            },
            getMechanicId($id){
                console.log($id);
            },
            getResults(page = 1) {
			    axios.get('api/user?page=' + page)
				.then(response => {
					this.mechanics = response.data;
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
            loadMechanics(){
                if(this.$gate.isAdminORDeveloper()){
                    axios.get("api/mechanic").then(({ data }) => (this.mechanics = data));
                }

            },
            loadUser(){
                if(this.$gate.isAdminORDeveloper()){
                    axios.get("api/profile").then(({ data }) => (this.user = data));
                }

            },
            addRating(rating, $id){
                // axios.post('api/updateRateMechanic/'+1);
                this.rating.rate = rating;
                this.$Progress.start();
                this.rating.post('api/rateMechanic/'+$id)
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

            },
            getRating(){
                if(this.$gate.isAdminORDeveloper()){
                    axios.get("api/mechanicRatings").then(data  => {
                        this.ratings = data.data;
                        })

                }

            },

            createUser(){
                this.$Progress.start();
                this.form.photo = 'profile.png'
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
                axios.get('api/findUser?q=' + query)
                .then((data) => {
                    this.mechanics = data.data
                })
                .catch(() => {

                })
            })
            this.loadUser();
            this.loadMechanics();
            this.getRating();
            // on listen to trigger a function
            Fire.$on('ActionCreate',() => {
                this.loadMechanics();
                this.loadUser();
                this.getRating();
            });
            // setInterval(()=> this.loadUsers(), 3000);
        }
    }
</script>
