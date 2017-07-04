/**
 * Created by erics on 2017-05-21.
 */

window.onload = pageLoaded;

function pageLoaded(){

    //email regex
    var emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    //grab sign-in form
    var signInForm = document.forms.namedItem('sign_in');

    signInForm.onsubmit = processSignIn;

    function processSignIn(){
        //username field
        if(signInForm.username.value === ''){
            signInForm.username.focus();
            return false;
        }else{
            signInForm.username.blur();
        }
        //password field
        if(signInForm.pass.value === ''){
            signInForm.pass.focus();
            return false;
        }else {
            signInForm.pass.blur();
        }
    }//end processSignIn()

    //grab sign-up form

    var signUpForm = document.forms.namedItem('sign_up');

    signUpForm.onsubmit = processSignUp;

    function processSignUp(){
        //username field
        if(signUpForm.su_username.value === ''){
            signUpForm.su_username.focus();
            return false;
        }else{
            signUpForm.su_username.blur();
        }
        //email field
        if(signUpForm.su_email.value === '' || emailRegEx.Test(signUpForm.su_email.value) === false){
            signUpForm.su_email.focus();
            return false;
        }else{
            signUpForm.su_email.blur();
        }

        //password field
        if(signUpForm.su_pass.value === ''){
            signUpForm.su_pass.focus();
            return false;
        }else{
            signUpForm.su_pass.blur();
        }



    }//end processSignUp()


}//end onload