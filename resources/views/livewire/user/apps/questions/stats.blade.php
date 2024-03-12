<div class="grid sm:grid-cols-3 px-2 pb-52 sm:mb-3">

    <div class="col-span-3 sm:w-full p-2  mx-3" x-data="{labels: @entangle('labels'),total: @entangle('total')}"
        x-init="
                new Chart($refs.myChart, {
                    type: 'bar',
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
                          title: {
                            display: true,
                            text: 'Feitas (últimos 7 dias)'
                          }
                        }
                      },
                });
        ">
            <div >
                <canvas id="myChart" x-ref="myChart"></canvas>
            </div>
    </div>
    <div class="col-span-3 sm:w-full p-2  mx-3" x-data="{labels: @entangle('labels'),hits: @entangle('hits')}"
        x-init="
                new Chart($refs.myChart, {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [{
                            label: 'Acertos',
                            data: hits,
                            borderWidth: 1,
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
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
                          title: {
                            display: true,
                            text: 'Acertos'
                          }
                        }
                      },
                });
        ">
            <div >
                <canvas id="myChart" x-ref="myChart"></canvas>
            </div>
    </div>
    <div class="col-span-3 sm:w-full p-2  mx-3" x-data="{labels: @entangle('labels'),foults: @entangle('foults')}"
        x-init="
                new Chart($refs.myChart, {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [{
                            label: 'Erros',
                            data: foults,
                            borderWidth: 1,
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
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
                          title: {
                            display: true,
                            text: 'Erros'
                          }
                        }
                      },
                });
        ">
            <div >
                <canvas id="myChart" x-ref="myChart"></canvas>
            </div>
    </div>
</div>

