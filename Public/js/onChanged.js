$(document).ready(function() {
    $('#month').change(function() {
        var select = document.getElementById('month')
        var text = select.value
        var T = text.slice(0, text.length - 4)
        var N = text.substr(text.length - 4, text.length - 1)
        var session = document.getElementById('session')
        var idND = session.value
        $.ajax({
            url: "Models/Finance_json_data.php",
            dataType: 'json',
            success: function(data) {
                for (i = 0; i < data.length; i++) {
                    var finance = data[i];
                    var salary = finance['salary']
                    var th = finance['Thang']
                    var nam = finance['Nam']
                    var id = finance['idND']

                    if (idND == id) {
                        if (nam == N) {
                            if (th == T) {
                                var save = salary * 0.1
                                var spend = salary * 0.9
                                    // document.getElementById('title_salary').value = "";
                                document.getElementById('title_salary').innerHTML = "Mức lương tháng " + T + " (VNĐ)"
                                document.getElementById('salary').value = "";
                                document.getElementById('salary').value = salary + ""
                                document.getElementById('save_money').value = "";
                                document.getElementById('save_money').value = save + ""
                                document.getElementById('spend_money').value = "";
                                document.getElementById('spend_money').value = spend + ""

                                break
                            }
                        }
                    }
                }
            }
        })
    })

})