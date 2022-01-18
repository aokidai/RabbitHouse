function dongy(){
    var hoten   = document.getElementById('hoten');
    var diachi  = document.getElementById('diachi');
    var sdt     = document.getElementById('sdt');
    var maybay = document.getElementById('maybay');
    var oto = document.getElementById('oto');
    var people     = document.getElementById('people');
    var Children = document.getElementById('Children');
    var tb      = document.getElementById('tb');
    var number  = document.getElementById('number');
    if (hoten.value.trim() == '') {
        alert('Họ và tên không được để trống !');}
        else
        {
            if (diachi.value.trim() == '') {
                alert('địa chỉ không được để trống !');}
                else {
                    if (sdt.value.trim() == '') {
                        alert('Số điện thoại không được để trống !');}
                        else{
                            if (maybay.checked == false && oto.checked == false) {
                                alert('Vui lòng chọn phương tiện');}
                             
                                else 
                                tb.innerHTML="Bạn đã đăng ký thành công!!!";
                                    

                        }
                }
        }
    
}