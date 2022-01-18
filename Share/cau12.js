function dongy(){
    var hoten   = document.getElementById('hoten');
    var diachi  = document.getElementById('diachi');
    var sdt     = document.getElementById('sdt');
    var gioitinhnam = document.getElementById('gioitinhnam');
    var gioitinhnu = document.getElementById('gioitinhnu');
    var job     = document.getElementById('job');
    var product = document.getElementById('product');
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
                            if (gioitinhnam.checked == false && gioitinhnu.checked == false) {
                                alert('Vui lòng chọn giới tính');}
                                else{
                                    if (number.value.trim() == '') {
                                        alert('Vui lòng nhập số người tham gia');}
                                else 
                                tb.innerHTML="Bạn đã đăng ký thành công!!!";
                                    }

                        }
                }
        }
    
}