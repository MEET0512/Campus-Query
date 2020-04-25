/* toggle menu function */

var Menu_visible = false;

function toggleMenu() 
{
    if (!Menu_visible)
    {
        document.getElementsByClassName('side')[0].classList.remove('width-0');
        document.getElementsByClassName('main')[0].classList.remove('margin-left-0');
        document.getElementsByClassName('menu-logo')[0].classList.remove('fa-bars');
        document.getElementsByClassName('menu-logo')[0].classList.add('fa-times');
        Menu_visible = true;
    }

    else 
    {
        document.getElementsByClassName('side')[0].classList.add('width-0');
        document.getElementsByClassName('main')[0].classList.add('margin-left-0');
        document.getElementsByClassName('menu-logo')[0].classList.add('fa-bars');
        document.getElementsByClassName('menu-logo')[0].classList.remove('fa-times');
        Menu_visible = false;
    }
}

/*Ask Question form validation function*/

function validate_queform() 
{
    var title = document.getElementById('txttitle');
    var question = document.getElementById('txtque');
    var dept = document.getElementById('dept');
    var img = document.getElementById('img');

    var error_title = document.getElementById('error_title');
    var error_question = document.getElementById('error_question');
    var error_dept = document.getElementById('error_dept');
    var error_img = document.getElementById('error_img');

    var title_e = false;
    var question_e = false;
    var dept_e = false;
    var img_e = false;

    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"]; 

    if( title.value == "" )
    {
        error_title.innerHTML = "*please Enter title";
        title_e = false;
        title.style.boxShadow = "0px 0px 4px 2px #ff0000";
    }
    else 
    {
        error_title.innerHTML = "";
        title_e = true;
        title.style.boxShadow = "";
    }

    if( question.value == "" )
    {
        error_question.innerHTML = "*please Enter question";
        question_e_e = false;
        question.style.boxShadow = "0px 0px 4px 2px #ff0000";
    }
    else 
    {
        error_question.innerHTML = "";
        question_e = true;
        question.style.boxShadow = "";
    }

    console.log(dept.value);

    if( dept.value == "0" )
    {
        error_dept.innerHTML = "*please select any department";
        dept_e = false;
        dept.style.boxShadow = "0px 0px 4px 2px #ff0000";
    }
    else 
    {
        error_dept.innerHTML = "";
        dept_e = true;
        dept.style.boxShadow = "";
    }

    if( img.value == "" ) {
        img_e = true;
    } else {
        for (var j = 0; j < _validFileExtensions.length; j++) {
            var sCurExtension = _validFileExtensions[j];
            if (img.value.substr(img.value.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                img_e = true;
                error_img.innerHTML = "";
                img.style.boxShadow = "";
            } else {
                img_e = false;
                error_img.innerHTML = "*please select valid image type";
                img.style.boxShadow = "0px 0px 4px 2px #ff0000";
            }
        }
    }

    return ((title_e && question_e) && (dept_e && img_e));
}

/* To close the Alert box */

function CloseMsg(alert)
{
    document.getElementById(alert).style.top = "-9%";
}

/* To show the Alert box */

function ShowMsg(msg)
{
    document.getElementById(msg).style.top = "1.5%";
}

/* Validate login form */

function validate_login()
{
    var uname = document.getElementById('uname');
    var pwd = document.getElementById('pwd');

    var uname_error = document.getElementById('uname_error');
    var pwd_error = document.getElementById('pwd_error');

    var e_uname = false;
    var e_pwd = false;

    if( uname.value == "" )
    {
        uname_error.innerHTML = "*please enter username";
        e_uname = false;
        uname.style.boxShadow = "0px 0px 4px 2px #ff0000";
    }
    else
    {
        uname_error.innerHTML = "";
        e_uname = true;
        uname.style.boxShadow = "";
    }

    if( pwd.value == "" )
    {
        pwd_error.innerHTML = "*please enter Password";
        e_pwd = false;
        pwd.style.boxShadow = "0px 0px 4px 2px #ff0000";
    }
    else
    {
        pwd_error.innerHTML = "";
        e_pwd = true;
        pwd.style.boxShadow = "";
    }

    return (e_uname && e_pwd);
}

/* To validate singup form */

function validate_singup()
{
    var id = document.getElementById('user_id');
    var name = document.getElementById('name');
    var dob = document.getElementById('dob');
    var email = document.getElementById('email');
    var dept = document.getElementById('dept');
    var pwd = document.getElementById('pwd');
    var cpwd = document.getElementById('cpwd');
    var img = document.getElementById('img');
    var uname = document.getElementById('uname');

    var id_error = document.getElementById('id_error');
    var name_error = document.getElementById('name_error');
    var dob_error = document.getElementById('dob_error');
    var email_error = document.getElementById('email_error');
    var dept_error = document.getElementById('dept_error');
    var pwd_error = document.getElementById('pwd_error');
    var cpwd_error = document.getElementById('cpwd_error');
    var img_error = document.getElementById('img_error');
    var uname_error = document.getElementById('uname_error');

    var e_id = false;
    var e_name = false;
    var e_dob = false;
    var e_email = false;
    var e_dept = false;
    var e_pwd = false;
    var e_cpwd = false;
    var e_img = false;
    var e_uname = false;

    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"]; 

    /* Empty filed error */
    if( id.value == "" ) {
        e_id = false;
        id_error.innerHTML = "*please enter user id";
        id.style.boxShadow = "0px 0px 4px 2px #ff0000";
    } else {
        e_id = true;
        id_error.innerHTML = "";
        id.style.boxShadow = "";
    }

    if( name.value == "" ) {
        e_name = false;
        name_error.innerHTML = "*please enter user name";
        name.style.boxShadow = "0px 0px 4px 2px #ff0000";
    } else {
        e_name = true;
        name_error.innerHTML = "";
        name.style.boxShadow = "";
    }

    if( dob.value == "" ) {
        e_dob = false;
        dob_error.innerHTML = "*please enter date of brith";
        dob.style.boxShadow = "0px 0px 4px 2px #ff0000";
    } else {
        e_dob = true;
        dob_error.innerHTML = "";
        dob.style.boxShadow = "";
    }

    if( email.value == "" ) {
        e_email = false;
        email_error.innerHTML = "*please enter email";
        email.style.boxShadow = "0px 0px 4px 2px #ff0000";
    } else {
        if( !emailPattern.test(email.value) )
        {
            e_email = false;
            email_error.innerHTML = "*please enter valid email";
            email.style.boxShadow = "0px 0px 4px 2px #ff0000";
        } else {
            e_email = true;
            email_error.innerHTML = "";
            email.style.boxShadow = "";
        }
    }

    if( dept.value == "0" ) {
        e_dept = false;
        dept_error.innerHTML = "*please select department";
        dept.style.boxShadow = "0px 0px 4px 2px #ff0000";
    } else {
        e_dept = true;
        dept_error.innerHTML = "";
        dept.style.boxShadow = "";
    }

    if( uname.value == "" ) {
        e_uname = false;
        uname_error.innerHTML = "*please enter username";
        uname.style.boxShadow = "0px 0px 4px 2px #ff0000";
    } else {
        e_uname = true;
        uname_error.innerHTML = "";
        uname.style.boxShadow = "";
    }

    if( pwd.value == "" ) {
        e_pwd = false;
        pwd_error.innerHTML = "*please enter password";
        pwd.style.boxShadow = "0px 0px 4px 2px #ff0000";
    } else {
        e_pwd = true;
        pwd_error.innerHTML = "";
        pwd.style.boxShadow = "";
    }

    if( cpwd.value == "" ) {
        e_cpwd = false;
        cpwd_error.innerHTML = "*please enter conform password";
        cpwd.style.boxShadow = "0px 0px 4px 2px #ff0000";
    } else {
        if(cpwd.value != pwd.value)
        {
            e_cpwd = false;
            cpwd_error.innerHTML = "*conform password is not match with password";
            cpwd.style.boxShadow = "0px 0px 4px 2px #ff0000";
        } else {
            e_cpwd = true;
            cpwd_error.innerHTML = "";
            cpwd.style.boxShadow = "";   
        }
    }

    if( img.value == "" ) {
        e_img = true;
    } else {
        for (var j = 0; j < _validFileExtensions.length; j++) {
            var sCurExtension = _validFileExtensions[j];
            if (img.value.substr(img.value.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                e_img = true;
                img_error.innerHTML = "";
                img.style.boxShadow = "";
            } else {
                e_img = false;
                img_error.innerHTML = "*please select valid image type";
                img.style.boxShadow = "0px 0px 4px 2px #ff0000";
            }
        }
    }

    return ((e_id && e_name) && (e_dept && e_dob) && (e_email && e_img) && (e_pwd && e_cpwd));
}

function toggleDrop()
{
    var menu = document.getElementById('umenu');
    menu.classList.toggle('show');
}

function getUname()
{
    var uname = document.getElementById('uname');
    uname.value = document.getElementById('user_id').value;
}

function validate_ans(){
    var ans = document.getElementById('ans');
    var img = document.getElementById('img');

    var ans_error = document.getElementById('ans_error');
    var img_error = document.getElementById('img_error');

    var e_ans = false;
    var e_img = true;

    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];

    if(ans.value == ""){
        ans_error.innerHTML = "*please enter answer";
        ans.style.boxShadow = "0px 0px 4px 2px #ff0000";
        e_ans = false;
    } else {
        ans_error.innerHTML = "";
        ans.style.boxShadow = "";
        e_ans = true;
    }

    if( img.value == "" ) {
        e_img = true;
    } else {
        for (var j = 0; j < _validFileExtensions.length; j++) {
            var sCurExtension = _validFileExtensions[j];
            if (img.value.substr(img.value.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                e_img = true;
                img_error.innerHTML = "";
                img.style.boxShadow = "";
            } else {
                e_img = false;
                img_error.innerHTML = "*please select valid image type";
                img.style.boxShadow = "0px 0px 4px 2px #ff0000";
            }
        }
    }
    return (e_ans && e_img);
}