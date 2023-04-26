export default {
    methods:{
        showError(err){
            //console.log(err);
            if (typeof err.response.data.errors === 'object') {
                for(let i in err.response.data.errors){
                    for(let a in err.response.data.errors[i]) {
                        this.$noty.error(err.response.data.errors[i][a]);
                    }
                }
            } else if (typeof err.response.data.error === 'object') {
                for(let i in err.response.data.error){
                    for(let a in err.response.data.error[i]) {
                        this.$noty.error(err.response.data.error[i][a]);
                    }
                }
            } else {
                if (err.response.status === 401 || err.response.status === 403)
                    this.$store.dispatch('logout').then(()=>this.$router.push({name:'login'}));

                this.$noty.error(err.response.data.error);
            }
        }
    }
};
