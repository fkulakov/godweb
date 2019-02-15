'use strict';

let times = new Vue({
    el: '#times',
    data: {
        intervals: [],
        current: ''
    },
    methods: {
        getTimes: function () {
            fetch('/api/times').then((response) => {
                if (!response.ok) {
                    throw new Error('Error while get times data /api/times');
                }

                return response.json()
            }).then((json) => {
                this.intervals = json.prev;
                this.current = json.current;
            }).catch((error) => {
                console.log(error);
            });
        },
        
        reset: function (event) {
            fetch('/api/reset', {
                method: 'POST'
            }).then((response) => {
                if (!response.ok) {
                    throw new Error('Error while reset time (/api/reset)');
                }

                return this.getTimes();
            }).catch((error) => {
                console.log(error);
            });
        }
    },

    created() {
        this.getTimes();

        setInterval(function () {
            this.getTimes()
        }.bind(this), 1000);
    }
});