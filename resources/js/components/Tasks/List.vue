<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white ">

        <div v-for="task in tasks" :key="task.id">
            <div class="flex justify-center p-3 border-b-2 border-gray-300 my-2">
                <input type="checkbox" :checked="checkCompleted(task.completed)" @click="completeTask(task)">

                <p class="mx-2 mt-1 text-gray-900">{{ task.id }}</p>

                <p class="mx-2 mt-1 text-gray-900">{{ task.todo }}</p>
                <div class="ml-auto flex">
                    <router-link :to="'tasks/' + task.id ">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                            <line x1="16" y1="5" x2="19" y2="8" />
                        </svg>
                    </router-link>
                    <form v-on:submit.prevent="deleteTask(task.id)">
                        <button type="submit">
                            <svg class="h-5 w-5 text-red-400" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            tasks: []
        }
    },
    methods: {
        gettasks() {
            axios.get('/tasks')
                .then(response => {
                    this.tasks = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });
        },
        deleteTask(id) {
            const confirmation = confirm('desea elimar el regitro')
            if (confirmation) {
                axios.delete('/tasks/' + id)
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.gettasks();
            }
        },
        completeTask(task) {
            if (task.completed === 0) {
                var complete = 1;
            } else {
                var complete = 0;
            }
            axios.put('/tasks/' + task.id, {
                task: task.todo,
                completed: complete
            })
                .then(response => {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        checkCompleted(param) {
            if(param === 1){
                return true;
            }else{
                return false;
            }
        },
    },
    created() {
        this.gettasks();

    }

}

</script>
