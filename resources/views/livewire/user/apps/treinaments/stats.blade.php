<div class="w-100">
    <div class="bg-white shadow-md dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 px-4 py-5 ">
            @foreach ($stats as $item)
                <div class="card-body col-span-2">
                    <h2 class="card-title">{{ $item['title'] }}</h2>
                    <div class="grid grid-flow-col gap-5 text-center auto-cols-max">

                        <div class="col-span-3 sm:w-full p-2 rounded-md shadow-md mx-3"
                         x-data='{labels: @json(array_values($item["labels"])),total: @json(array_values($item["qtd"]))}'
                            x-init="
                                    new Chart($refs.myChart, {
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
                                    });
                            ">
                                <div >
                                    <canvas id="myChart" x-ref="myChart"></canvas>
                                </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>
