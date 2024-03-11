<div>
    @livewire('user.apps.mentoring.mentoring-contest-user-bar', ['title' => 'Questões'])
    <div class=" bg-white dark:bg-gray-800 my-6 px-4">
        <div class="grid grid-cols-6 gap-1 mx-5 mb-48">
            <div class="col-span-6 rounded-md px-2"
                x-data='{
                        labels: @json(array_values($labels)),
                        hits: @json(array_values($hits)),
                        qtds: @json(array_values($qtds))
                    }'
                x-init="new Chart($refs.myChart, {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [{
                                label: 'Questões',
                                data: qtds,
                                borderColor: 'rgb(47,79,79)',
                                backgroundColor: 'rgba(47,79,79, 0.4)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                            },
                            {
                                label: 'Acertos',
                                data: hits,
                                borderColor: 'rgb(218,165,32)',
                                backgroundColor: 'rgba(218,165,32, 0.4)',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                            }
                        ]
                    },
                    options: {
                        responsive: true,

                    }
                });">
                <div class="card w-full dark:bg-gray-900 shadow-xl">
                    <div class="card-body">
                        <canvas id="myChart" x-ref="myChart" height="40vw" width="145vw"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
