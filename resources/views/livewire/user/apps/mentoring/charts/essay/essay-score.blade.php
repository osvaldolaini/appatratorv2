<div class="grid grid-cols-6 gap-2 mx-5 px-4">
    <div x-data='{
        labels: @json(array_slice($labels, 0, 10)),
        marks: @json(array_values($marks)),
        full_marks: @json(array_values($full_marks))
    }'
        x-init="new Chart($refs.myChart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Nota',
                        data: marks,
                        borderWidth: 1,
                        borderColor: 'rgb(218,165,32)',
                        backgroundColor: 'rgba(218,165,32, 0.4)',
                        borderWidth: 2,
                        borderSkipped: false,
                    },
                    {
                        label: 'Máximo',
                        data: full_marks,
                        borderWidth: 1,
                        borderColor: 'rgb(47,79,79)',
                        backgroundColor: 'rgba(47,79,79, 0.4)',
                        borderWidth: 2,
                        borderSkipped: false,
                    }
                ]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Últimas 10'
                    },
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: false
                    }
                }
            },
        });" class="col-span-6 sm:col-span-3 ">
        <div class="card w-full dark:bg-gray-900 shadow-xl">
            <div class="card-body">
                <canvas id="myChart" x-ref="myChart"></canvas>
            </div>
        </div>
    </div>
    <div x-data='{
            labels: @json(array_values($labels)),
            marks: @json(array_values($marks))
        }'
        x-init="new Chart($refs.mySecondChart, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Evolução',
                    data: marks,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            }
        });" class="col-span-6 sm:col-span-3 ">
        <div class="card w-full dark:bg-gray-900 shadow-xl">
            <div class="card-body">
                <canvas id="mySecondChart" x-ref="mySecondChart"></canvas>
            </div>
        </div>
    </div>
</div>
