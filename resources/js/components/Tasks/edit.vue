<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white ">
        <h1 class="text-3x1 text-center font-bold py-4 text-gray-800">Edict Task {{ id }}</h1>

        <form method="POST" v-on:submit.prevent="saveTask()">
            <div class="d-block flex px-3 py-4">
                <input type="text" placeholder="Task" name="todo" v-model="task.todo"
                    class="text-xl p-2 mr-2 w-10/12 border-b-2 border-green-500">
                <input type="submit" value="Save" name="" id="" class="bg-green-500 w-2/12 text-white">

            </div>

        </form>
    </div>
</template>

<script>
import axios from 'axios';


export default {
    data() {
        return {
            id: this.$route.params.id,
            task: [],

        }
    },
    created() {
        axios.get('/tasks/' + this.id)
            .then(response => {
                this.task = response.data,
                    console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function () {
                // always executed
            });


    },
    methods: {
        saveTask() {

            axios.put('/tasks' + this.task.id , { todo: this.task.todo})
                .then(response => {
                    console.log(response);

                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });

            this.$router.push('/');

        }
    }
}
</script>
