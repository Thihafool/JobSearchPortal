<template>
    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px">
                            <a href="#" class="m-0 text-uppercase font-weight-bold text-decoration-none"
                                @click="(back)">Back</a>
                        </div>
                        <div class="owl-carousel tranding-carousel justify-content-center position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px">
                            <div class="text-truncate ">
                                <a class="text-secondary text-decoration-none  font-weight-semi-bold" href="">Job Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- News Detail Start -->
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <img class="img-fluid w-50" style="height: 200px; object-fit: cover"
                                    :src="postList.image" />
                                <a class="badge badge-primary  font-weight-semi-bold p-2 mr-2" href="">Full
                                    Time</a>
                                <div>
                                    <h1 class="mb-3 text-secondary  font-weight-bold">
                                        {{ postList.title }}
                                    </h1>
                                    <p>{{ postList.description }} </p>

                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <span>Entry Level</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="ml-3"><i class="fa-solid fa-location-dot"></i> Yangon</span>
                                        <span class="ml-3"><i class="fa-solid fa-map-location-dot"></i> Hlaing Tsp</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
</template>


<script src="../js/detailPage.js"></script>
