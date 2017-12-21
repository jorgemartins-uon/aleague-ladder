<!-- /resources/assets/js/components/Liveladder.vue -->
<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Position</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(team, key) in sortedTeams">
                <td>{{ team.position }}</td>
                <td>{{ team.name }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                teams: []
            }
        },
        created() {
            this.fetchLiveladder();
            this.listenForChanges();
        },
        methods: {
            fetchLiveladder() {
                axios.get('/liveladder').then((response) => {
                    this.teams = response.data;
                })
            },
            listenForChanges() {
                console.info("listen");
                Echo.channel('liveladder')
                    .listen('PositionUpdated', (e) => {
                        for(var i = 0; i < e.length; i++) {
                            var obj = e[i];
                            var team = this.teams.find((team) => team.id === obj.id);
                            var index = this.teams.indexOf(team);
                            this.teams[index].position = obj.position;
                        }
                    })
            }
        },
        computed: {
            sortedTeams() {
                return this.teams.sort((a,b) => a.position - b.position)
            }
        }
    }
</script>
