import axios from "axios"
export default {
    name: 'DetailView',
    data() {
        return {
            postList: {},
            postId: 0,
            toSplit: true
        }
    },
    methods: {
        loadPost(id) {
            let post = {
                postId: id,
            }
            axios.post('http://localhost:8000/api/postDetails', post).then((response) => {
                console.log(response.data)

                response.data.post.image = "http://localhost:8000/storage/" + response.data.post.image;

                this.postList = response.data.post;
            });
        },
        back() {
            history.back();
        },
    },

    mounted() {
        this.postId = this.$route.query
        this.loadPost(this.postId);

    }
}