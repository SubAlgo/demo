
function validateEditForm() {
    
    let titlename = document.forms["myForm"]["titlename"].value
    let name = document.forms["myForm"]["username"].value
    let surname = document.forms["myForm"]["surname"].value
    let p = document.forms["myForm"]["permis"].value

    let format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;


    /* ----- Validate TITLE_NAME ----- */
    if (titlename == "") {
        alert("กรุณาเลือก คำนำชื่อ")
        return false
    }
    /* ----- Validate TITLE_NAME ----- */

    /* ----- Validate NAME ----- */
    name = name.trim()

    if (name == "") {
        alert("กรุณากรอก ชื่อผู้ใช้")
        return false
    }
    //-Check special character
    if (format.test(name)) {
        alert("ห้ามตั้ง ชื่อผู้ใช้ ด้วยตัวอักษณพิเศษ")
        return false
    }
    //-check space
    if (/\s/.test(name)) {
        alert("ห้ามมีช่องว่างใน ชื่อผู้ใช้")
        return false
    }
    /* ----- Validate NAME ----- */

    /* ----- Validate SURNAME ----- */
    surname = surname.trim()
    if (surname == "") {
        alert("กรุณากรอก นามสกุลผู้ใช้")
        return false
    }
    if (format.test(surname)) {
        alert("ห้ามตั้ง นามสกุลผู้ใช้ ด้วยตัวอักษณพิเศษ")
        return false
    }
    //-check space
    if (/\s/.test(surname)) {
        alert("ห้ามมีช่องว่างใน นามสกุล")
        return false
    }
    /* ----- Validate SURNAME ----- */

    /* ----- Validate PERMISSION ----- */
    if (p == "") {
        alert("กรุณาเลือกระดับสิทธิ์")
        return false
    }
    /* ----- Validate PERMISSION ----- */

}



