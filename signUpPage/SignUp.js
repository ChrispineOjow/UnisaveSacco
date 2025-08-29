$(document).ready(function(){

    const signUpButton = $("#SignUp"),
        memberId = $("#memberId"),
        email = $("#Email"),
        name = $("#Name"),
        password = $("#Password"),
        errorMessage = $("#errormessage")

    
    signUpButton.on("click", function(e){

        e.preventDefault();

        const memberid = memberId.val(),
            Email = email.val(),
            Name = name.val(),
            Password = password.val()

        $.post(
            "../php/Controllers/SignUp.php",
            {
                SignUp:true,
                MemberId:memberid,
                Email,
                Name,
                Password
                
            },

            function(data){

                if(isJSON(data)){

                    data = JSON.parse(data)

                    if(data.status == "success"){

                        
                        window.location.href='../mainpage/MembershipLogin/MembershipLogin.html'
                    }
                    else if(data.status == "exists"){

                        errorMessage.html("<div class='alert alert-success' role='alert' >Email Already Exists Login .</div>")
                        email.val("")
                        name.val("")
                        password.val("")
                        name.focus()
                    }
                    else{

                        errorMessage.html(`<div class='alert alert-success' role='alert' > An error occured ${data.message}</div>`)
                        
                    }
                }else{
                    errorMessage.html(`<div class='alert alert-danger' role='alert'>Invalid server response.</div>`);
                }

            }

        )
    })


    function isJSON(str){
        try{

            return(JSON.parse(str) && !!str)

        } catch (e){

            return false

        }
    }

})