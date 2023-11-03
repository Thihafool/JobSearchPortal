<template>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar  navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="#" @click="(home)" class="nav-item nav-link active">Home Page</a>
                    <div class="nav-item dropdown">
                        <a href=" #" class="nav-link dropdown-toggle " @click="categorySearch('')" data-toggle="dropdown">By
                            Category
                        </a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class=" dropdown-item" @click="categorySearch(category.title)"
                                v-for="(category, index) in categoryList" :key="index">{{
                                    category.title }}</a>
                        </div>
                    </div>
                    <!-- <a href="contact.html" class="nav-item nav-link">ဆက်သွယ်ရန်</a> -->
                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <div>

        <!-- Breaking News End -->
        <!-- Main News Slider Start -->

        <!-- News With Sidebar Start -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title">
                                    <h4 class="m-0 text-primary font-weight-bold">
                                        {{ message }}
                                    </h4>
                                    <div class="input-group ml-auto d-lg-flex" style="width: 100%; max-width: 300px">
                                        <input v-on:keyup.enter="search()" type="text" v-model="searchKey"
                                            class="form-control border-0" placeholder="Position, Keyword" />
                                        <div class="input-group-append">
                                            <button @click="search()"
                                                class="input-group-text bg-primary text-dark border-0 px-3">
                                                Find Job </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-auto mt-5 d-flex text-center justify-content-center " style="height: 70vh"
                                    v-if="postList.length == 0">
                                    <h4 class="text-warning font-weight-bold pl-5 ">There is no job related
                                        to this category! </h4>
                                </div>

                                <div class="col-lg-6 " v-for="(post, index) in  postList " :key="index">
                                    <div class="position-relative mb-3" @click="postDetail(post.id)">

                                        <img class="img-fluid w-100 bg-cyan " style="height: 180px; object-fit:fill; "
                                            :src="post.image" />
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="mb-2">
                                                <a class="badge badge-primary  font-weight-semi-bold p-2 mr-2" href="">Full
                                                    Time</a>
                                                <span class=" ml-3 font-bold text-dark " href=""><small><i
                                                            class="fa-solid fa-dollar-sign"></i>
                                                        400,000</small></span>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary font-weight-bold" href="">{{
                                                post.title }}</a>
                                            <p class="m-0">
                                                {{ post.description.substring(1, 121) }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News With Sidebar End -->
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-lg-7 px-0">
                    <div class="position-relative overflow-hidden" style="height: 500px; object-fit: fill;">
                        <img class="img-fluid h-100" src="img/img.avif" />
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary font-weight-semi-bold p-2 mr-2" href="">Business</a>
                                <a class="text-white" href="">Jan 01, 2024</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="">Lorem ipsum dolor sit amet
                                elit. Proin
                                vitae porta diam...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 px-0">
                    <div class="row ">
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px; object-fit: cover;">
                                <img class="img-fluid w-100 h-100" src="img/news-700x435-1.jpg" />
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary font-weight-semi-bold p-2 mr-2" href="">Business</a>
                                        <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-white font-weight-semi-bold" href="">Lorem ipsum
                                        dolor sit amet
                                        elit...</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px">
                                <img class="img-fluid w-100 h-100" src="img/news-700x435-2.jpg" style="object-fit: cover" />
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary font-weight-semi-bold p-2 mr-2" href="">Business</a>
                                        <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-white font-weight-semi-bold" href="">Lorem ipsum
                                        dolor sit amet
                                        elit...</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px">
                                <img class="img-fluid w-100 h-100" src="img/news-700x435-3.jpg" style="object-fit: cover" />
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary font-weight-semi-bold p-2 mr-2" href="">Business</a>
                                        <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-white font-weight-semi-bold" href="">Lorem ipsum
                                        dolor sit amet
                                        elit...</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px">
                                <img class="img-fluid w-100 h-100" src="img/news-700x435-4.jpg" style="object-fit: cover" />
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary font-weight-semi-bold p-2 mr-2" href="">Business</a>
                                        <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-white font-weight-semi-bold" href="">Lorem ipsum
                                        dolor sit amet
                                        elit...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News Slider End -->

        <!-- Breaking News Start -->
        <div class="container-fluid bg-dark py-3 mb-3">
            <div class="container">
                <div class="row align-items-center bg-dark">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">

                            <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                                style="width: calc(100% - 170px); padding-right: 90px">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script src="../js/homePage.js"></script>


<style lang="scss" scoped></style>

