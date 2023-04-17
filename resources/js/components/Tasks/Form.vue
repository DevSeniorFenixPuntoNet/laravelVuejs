<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white ">
        <h1 class="text-3x1 text-center font-bold py-4 text-gray-800">Create Tasks</h1>

        <form method="POST" v-on:submit.prevent="saveTask()">
            <div class="d-block flex px-3 py-4">
                <input type="text" placeholder="Task" name="todo" v-model="task"
                    class="text-xl p-2 mr-2 w-10/12 border-b-2 border-green-500">
                <input type="submit" value="Save" name="" id="" class="bg-green-500 w-2/12 text-white">

            </div>

        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            task: '',
        
        }
    },
    methods: {
        saveTask() {
            axios.post('/tasks', { todo: this.task })
                .then(function (response) {
                    console.log(response);                   
                })
                .catch(function (error) {
                    this.error = true;
                    console.log(error.response);
                })
                .finally(function () {
                    // always executed
                });

            this.task = '';
            this.$router.push('/');
        }
    }
}
</script>
