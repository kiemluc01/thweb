$(document).ready(function() {
    $('#month').change(function() {
        var select = document.getElementById('month')
        var T = select.value.substr(0, select.value.lenght - 4)
        var N = select.value.substr(select.value.lenght - 5, 4)
        alert(select.value)
        alert(T)
        alert(N)
        $.ajax({
            url: "http://localhost:8080/webNC/Th%e1%bb%b1c%20h%c3%a0nh/thweb/Models/Finance_json_data.php",
            dataType: 'json',
            success: function(data) {
                for (i = 0; i < data.lenght; i++) {
                    var finance = data[i];
                    var salary = finance['salary']
                    alert(salary)
                    var th = finance['Thang']
                    var nam = finance['Nam']
                    if (th == T && nam == N) {
                        var save = (salary * 0.1).replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                        var spend = (salary * 0.9).replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                        salary = (salary).replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                        alert(save)
                        alert(spend)
                        alert(salary)
                        $('#salary').html(salary)
                        $('#save_money').html(save)
                        $('#spend_money').html(spend)
                    }
                }
            }
        })
    })
})