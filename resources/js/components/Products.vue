<template>
    <div class="container">
        <div class="row row-cards justify-content-center">
            <div class="col-lg-9">
                <div class="input-group mt-4 mb-4">
                    <input type="text" class="form-control br-tl-7 br-bl-7" placeholder="">
                    <div class="input-group-append ">
                        <button type="button" class="btn btn-primary br-tr-7 br-br-7">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-4 col-md-12">
                        <div class="card item-card">
                            <div class="product-grid6  card-body">
                                <div class="product-image6">
                                    <a href="#">
                                        <img class="img-fluid" src="/img/product1.jpg">
                                    </a>
                                </div>
                                <div class="product-content text-center">
                                    <h4 class="title"><a href="#">Sports shoes</a></h4>
                                    <div class="price">$699<span class="ml-4">$999</span></div>
                                </div>
                                <ul class="icons">
                                    <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-md-12">
                        <div class="card item-card">
                            <div class="product-grid6 card-body ">
                                <div class="product-image6">
                                    <a href="#">
                                        <img class="img-fluid" src="/img/product2.jpg">
                                    </a>
                                </div>
                                <div class="product-content text-center mt-2">
                                    <h4 class="title"><a href="#">Metal Watch</a></h4>
                                    <div class="price">$529<span class="ml-4">$799</span></div>
                                </div>
                                <ul class="icons">
                                    <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                    <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>




                <!-- Form body Add New User -->



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
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
