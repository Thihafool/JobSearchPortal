import axios from "axios"
export default {
    name: "HomeView",
    data() {
        return {
            message: 'All Positions',
            postList: {},
            categoryList: {},
            searchKey: "",

        };
    },
    methods: {
        getAllPost() {
            axios.get('http://localhost:8000/api/allPost').then((response) => {
                // console.log(response.data.post)
                this.postList = response.data.post;
                for (let i = 0; i < response.data.post.length; i++) {
                    response.data.post[i].image = "http://localhost:8000/storage/" + response.data.post[i].image;
                }
                this.postList = response.data.post
            });
        },
        loadCategory() {
            axios.get('http://localhost:8000/api/allCategory').then((response) => {
                    this.categoryList = response.data.category
                })
                .catch((e) => {
                    console.log(e)
                });
        },
        search() {
            let search = {
                key: this.searchKey,
            }
            axios.post('http://localhost:8000/api/postSearch', search).then((response) => {
                for (let i = 0; i < response.data.responseData.length; i++) {
                    response.data.responseData[i].image = "http://localhost:8000/storage/" + response.data.responseData[i].image;
                }

                this.postList = response.data.responseData;
            });
        },
        categorySearch(searchKey) {
            let search = {
                key: searchKey
            }
            axios.post('http://localhost:8000/api/category/search', search)
                .then((response) => {
                    for (let i = 0; i < response.data.result.length; i++) {
                        response.data.result[i].image = "http://localhost:8000/storage/" + response.data.result[i].image;
                    }
                    this.postList = response.data.result;
                })
        },
        postDetail(id) {
            console.log(id)
            this.$router.push({
                name: 'detailPage',
                query: {
                    postId: id,
                }
            });
        },
        home() {
            this.$router.push({
                name: 'homePage'
            })
        }

    },
    mounted() {
        this.getAllPost();
        this.loadCategory();

    }
}