<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col text-start">
                <p class="mb-0">&copy;
                    <?= date("Y"); ?>. Dev : Neng Satira Syahril Wafa
                </p>
            </div>
        </div>
    </div>
</footer>
</div>



</div>

<script src="../assets/js/app.js"></script>
<script src="../vendor/ckeditor/ckeditor.js"></script>
<script src="../vendor/datatables/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#data').DataTable();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document
            .getElementById("chartjs-dashboard-line")
            .getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115, 1562, 1584, 1892, 1587, 1923, 2566, 2448, 2805, 3438,
                            2917, 3327,
                        ],
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                tooltips: {
                    intersect: false,
                },
                hover: {
                    intersect: true,
                },
                plugins: {
                    filler: {
                        propagate: false,
                    },
                },
                scales: {
                    xAxes: [
                        {
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)",
                            },
                        },
                    ],
                    yAxes: [
                        {
                            ticks: {
                                stepSize: 1000,
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)",
                            },
                        },
                    ],
                },
            },
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: 0.75,
                        categoryPercentage: 0.5,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [
                        {
                            gridLines: {
                                display: false,
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20,
                            },
                        },
                    ],
                    xAxes: [
                        {
                            stacked: false,
                            gridLines: {
                                color: "transparent",
                            },
                        },
                    ],
                },
            },
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var date = new Date(Date.now() + 1 * 24 * 60 * 60 * 1000);
        var defaultDate =
            date.getUTCFullYear() +
            "-" +
            (date.getUTCMonth() + 1) +
            "-" +
            date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: '<span title="Previous month">&laquo;</span>',
            nextArrow: '<span title="Next month">&raquo;</span>',
            defaultDate: defaultDate,
        });
    });
</script>
</body>

</html>