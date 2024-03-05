<div class="grid grid-cols-1 mx-4 -my-0">
    <div class="col-span-1">
        <div class="rounded-2xl dark:bg-gray-900 shadow-xl h-30 min-h-full">
            <div class="rounded-2xl px-4 py-2 flex flex-col">
                <div x-data='{
                    labels: @json(array_values($labels)),
                    dconcluded: @json(array_values($dconcluded)),
                    perform: @json(array_values($perform))
                }'
                    x-init="new Chart($refs.myChart, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: 'Concluído (%)',
                                    data: dconcluded,
                                    borderWidth: 1,
                                    borderColor: 'rgb(0, 102, 204)',
                                    backgroundColor: 'rgba(0, 102, 204, 0.4)',
                                    borderWidth: 2,
                                    borderRadius: 5,
                                    borderSkipped: false,
                                },
                                {
                                    label: 'Rendimento (%)',
                                    data: perform,
                                    borderWidth: 1,
                                    borderColor: 'rgb(0, 128, 0)',
                                    backgroundColor: 'rgba(0, 128, 0, 0.4)',
                                    borderWidth: 2,
                                    borderRadius: 5,
                                    borderSkipped: false,
                                }
                            ]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Aproveitamento Geral'
                                }
                            },
                            responsive: true,
                            scales: {
                                y: {
                                    min: 0,
                                    max: 100,
                                }
                            }
                        },
                    });">
                    <div>
                        <div>
                            <canvas id="myChart" x-ref="myChart" height="100vw" ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
