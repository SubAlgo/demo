
function validateForm() {
    let userid = document.forms["myForm"]["userid"].value
    let pwd = document.forms["myForm"]["password"].value
    let pwd_check = document.forms["myForm"]["password_check"].value
    let titlename = document.forms["myForm"]["titlename"].value
    let name = document.forms["myForm"]["username"].value
    let surname = document.forms["myForm"]["surname"].value
    let p = document.forms["myForm"]["permis"].value

    let format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

    /* ----- Validate USER ----- */
    userid =  userid.trim()
    //-Check null
    if(userid.length == 0){
        alert("กรุณากรอก USERNAME")
        return false
    }
    //-Check special character
    if (format.test(userid)) {
        alert("มีตัวอักษณพิเศษ")
        return false
    }
    /* ----- Validate USER ----- */

    /* ----- Validate PASSWORD ----- */
    pwd = pwd.trim()
    if(pwd.length == 0) {
        alert("กรุณากรอก PASSWORD")
        return false
    }
    if (pwd.length < 6) {
        alert("กรุณาใส่ PASSWORD อย่างน้อย 6 ตัวอักษร")
        return false
    }

    if(pwd != pwd_check) {
        alert("ยืนยัน Password ไม่ถูกต้อง")
        return false
    }
    /* ----- Validate PASSWORD ----- */

    /* ----- Validate TITLE_NAME ----- */
    if(titlename == "") {
        alert("กรุณาเลือก คำนำชื่อ")
        return false
    }
    /* ----- Validate TITLE_NAME ----- */

    /* ----- Validate NAME ----- */
    name = name.trim()
    if(name == "") {
        alert("กรุณากรอก ชื่อผู้ใช้")
        return false
    }
    /* ----- Validate NAME ----- */

    /* ----- Validate SURNAME ----- */
    surname = surname.trim()
    if (surname == "") {
        alert("กรุณากรอก นามสกุลผู้ใช้")
        return false
    }
    /* ----- Validate SURNAME ----- */

    /* ----- Validate PERMISSION ----- */
    if(p == "") {
        alert("กรุณาเลือกระดับสิทธิ์")
        return false
    }
    /* ----- Validate PERMISSION ----- */
    
}
   