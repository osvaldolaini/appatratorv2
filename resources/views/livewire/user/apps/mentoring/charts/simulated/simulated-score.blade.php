<div class="grid grid-cols-6 gap-2 mx-5 px-4">
    <div
        x-data='{
            labels: @json(array_slice($labels, 0, 10)),
            hits: @json(array_values($hitss)),
            misses: @json(array_values($missess)),
            guesses: @json(array_values($guessess)),
            blanks: @json(array_values($blankss))
        }'
        x-init="new Chart($refs.myChart, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                        label: 'Acertos',
                        data: hits,
                        borderWidth: 1,
                        borderColor: 'rgb(0,128,0)',
                        backgroundColor: 'rgba(0,128,0, 0.4)',
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 10
                    },
                    {
                        label: 'Erros',
                        data: misses,
                        borderWidth: 1,
                        borderColor: 'rgb(178,34,34)',
                        backgroundColor: 'rgba(178,34,34, 0.4)',
                        pointStyle: 'circle',
                        pointRadius: 10,
                        pointHoverRadius: 15
                    },
                    {
                        label: 'Chutes',
                        data: guesses,
                        borderWidth: 1,
                        borderColor: 'rgb(218,165,32)',
                        backgroundColor: 'rgba(218,165,32, 0.4)',
                        pointStyle: 'circle',
                        pointRadius: 10,
                        pointHoverRadius: 15
                    },
                    {
                        label: 'Branco',
                        data: blanks,
                        borderWidth: 1,
                        borderColor: 'rgb(201, 203, 207)',
                        backgroundColor: 'rgba(201, 203, 207, 0.4)',
                        pointStyle: 'circle',
                        pointRadius: 2,
                        pointHoverRadius: 15
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Últimas 10'
                    }
                }
            },
        });" class="col-span-6 sm:col-span-3">
        <div class="card w-full dark:bg-gray-900 shadow-xl">
            <div class="card-body">
                <canvas id="myChart" x-ref="myChart"></canvas>
            </div>
        </div>
    </div>
    <div
        x-data='{
            labels: @json(array_values($labels)),
            hits: @json(array_values($hitss)),
            misses: @json(array_values($missess)),
            guesses: @json(array_values($guessess)),
            blanks: @json(array_values($blankss))
        }'
        x-init="new Chart($refs.mySecondChart, {
            type: 'line',
            data: {
                labels,
                datasets: [{
                        label: 'Acertos',
                        data: hits,
                        borderWidth: 1,
                        borderColor: 'rgb(0,128,0)',
                        backgroundColor: 'rgba(0,128,0, 0.4)',
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 10
                    },
                    {
                        label: 'Erros',
                        data: misses,
                        borderWidth: 1,
                        borderColor: 'rgb(178,34,34)',
                        backgroundColor: 'rgba(178,34,34, 0.4)',
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 10
                    },
                    {
                        label: 'Chutes',
                        data: guesses,
                        borderWidth: 1,
                        borderColor: 'rgb(218,165,32)',
                        backgroundColor: 'rgba(218,165,32, 0.4)',
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 10
                    },
                    {
                        label: 'Branco',
                        data: blanks,
                        borderWidth: 1,
                        borderColor: 'rgb(201, 203, 207)',
                        backgroundColor: 'rgba(201, 203, 207, 0.4)',
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointHoverRadius: 10
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Evolução'
                    }
                }
            },
        });" class="col-span-6 sm:col-span-3">
        <div class="card w-full dark:bg-gray-900 shadow-xl">
            <div class="card-body">
                <canvas id="mySecondChart" x-ref="mySecondChart"></canvas>
            </div>
        </div>
    </div>
</div>

