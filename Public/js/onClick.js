$(document).ready(function() {
    // Enable textbox
    $('#pen').click(function() {
        if (document.getElementById('salary').disabled == true) {
            document.getElementById('salary').disabled = false
            document.getElementById('ok_finance').disabled = false
        }
    });
    // hide dialog
    $('#ok_message').click(function() {
            document.getElementById('message').style.display = 'none';
        })
        // hide pass infor
    $('#hide').click(function() {
        if (document.getElementById('pass').type == 'password') {
            document.getElementById('hide').src = 'Public/images/hide.png';
            document.getElementById('pass').type = 'text';
        } else {
            document.getElementById('hide').src = 'Public/images/show.png';
            document.getElementById('pass').type = 'password';
        }
    });
    // changed IMG
    $('#closeAVT').click(function() {
        document.getElementById('loadAVT').style.display = 'none'
    })
    $('#camera_AVT').click(function() {
        document.getElementById('loadAVT').style.display = 'flex'
    })
    $('#closeBGR').click(function() {
        document.getElementById('loadBGR').style.display = 'none'
    })
    $('#camera_BGR').click(function() {
            document.getElementById('loadBGR').style.display = 'flex'
        })
        // watch IMG
    $('#AVT').click(function() {
        if (document.getElementById('AVT').src == document.getElementById('tmpAVT').src) {
            document.getElementById('IMG_zoom').style.display = 'none'

        } else {
            document.getElementById('IMG_zoom').style.display = 'flex'
            document.getElementById('zoom').src = document.getElementById('AVT').src;
        }
    })
    $('#BGRR').click(function() {

        if (document.getElementById('BGRR').src == document.getElementById('tmpBGR').src) {
            document.getElementById('IMG_zoom').style.display = 'none'

        } else {
            document.getElementById('IMG_zoom').style.display = 'flex'
            document.getElementById('zoom').src = document.getElementById('BGRR').src;
        }
    })
    $('#closezoom').click(function() {
            document.getElementById('IMG_zoom').style.display = 'none'
        })
        // hide pass login
    $('#hide').click(function() {

        if (document.getElementById('password').type == 'password') {
            document.getElementById('hide').src = 'Public/images/hide.png';
            document.getElementById('password').type = 'text';
        } else {
            document.getElementById('hide').src = 'Public/images/show.png';
            document.getElementById('password').type = 'password';
        }
    });

})