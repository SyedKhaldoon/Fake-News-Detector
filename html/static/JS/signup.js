


function register() {
    var password= document.getElementById("pass").value;
       var cpassword=document.getElementById("cpassword").value;
   
 if (password.length < 8) {
        document.getElementById("message1").innerHTML = "* Password must be atleast 8 char";

    }
    if (password != cpassword) {
        document.getElementById("message2").innerHTML = "* Password did not match";

    }

   

}
function login()
{
    var pass=dodocument.getElementById("pass").value;
}