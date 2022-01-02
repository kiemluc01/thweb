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
    $('#month_spend').change(function() {
        var select = document.getElementById('month_spend')
        var text = select.value
        var session = document.getElementById('session')
        var idND = session.value
        $.ajax({
            url: "Models/spend_json_data.php",
            dataType: 'json',
            success: function(data) {
                var str = '<table id="content_table_spend"><tr> <th id="STT">STT</th> <th id="Loai">Loại chi tiêu</th><th id="content">Nội dung</th><th id="ngay">Ngày mua</th><th id="tong">Tổng tiền</th></tr>'

                var tien = 0;
                for (i = 0; i < data.length; i++) {
                    var spend = data[i]
                    var ngay = spend['ngaymua'].substr(0, 7)
                    if (ngay == text) {
                        if (idND == spend['idND']) {
                            str = str + "<tr><td>" + (i + 1) + "</td><td>" + spend['Loai'] + "</td><td>" + spend['noidung'] + "</td><td>" + spend['ngaymua'] + "</td><td>" + spend['tongtien'] + " VNĐ</td></tr>"
                            tien += Number(spend['tongtien'])
                        }
                    }
                }
                str = str + '<tr><td colspan="3">Tổng tiền</td><td colspan="2">' + tien + ' VNĐ</td></tr></table>'
                    // $('#content_table_spend').remove()
                document.getElementById('content_table_spend').style.display = 'none'
                document.getElementById('table_spend').innerHTML = str

            }
        })
    })
})