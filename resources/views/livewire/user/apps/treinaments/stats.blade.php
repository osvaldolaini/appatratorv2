<div class="grid grid-cols-1 sm:grid-cols-2 w-full gap-4">
    @foreach ($stats as $item)
        <div class="card-body col-span-1 shadow-md rounded-md ">
            <h2 class="card-title w-full text-center">{{ $item['title'] }}</h2>
            <div class="w-full text-left text-xl font-semibold">
                Objetivo: <span>{{ $item['target'] }}</span>
            </div>
            <div class="text-center">
                <div class="px-2 rounded-md mx-3"
                    x-data='{labels: @json(array_values($item['labels'])),total: @json(array_values($item['qtd']))}'
                    x-init="new Chart($refs.myChart, {
                        type: 'line',
                        data: {
                            labels,
                            datasets: [{
                                label: 'Total',
                                data: total,
                                borderWidth: 1,
                                borderColor: 'rgb(201, 203, 207)',
                                backgroundColor: 'rgba(201, 203, 207, 0.2)',
                                tension: 0.1,
                                axis: 'y',
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                indexAxis: 'y',
                                legend: {
                                    position: 'top',
                                },

                            }
                        },
                    });">
                    <div>
                        <canvas id="myChart" x-ref="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
