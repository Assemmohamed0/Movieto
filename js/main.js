/*-----------------------------------------------------(Form Regex)-----------------------------------------------------*/

$("#submitBtn").attr("disabled" , true);
$(".inputs input").val("");
let firstNameRegex = /^\S+$/
let lastNameRegex = /^\S+$/
let emailRegex = /^[a-zA-Z][a-zA-Z0-9]{2,}@[a-z]{3,10}\.(com|net|org)$/
let phoneRegex = /^01[0125][0-9]{8}$/
let passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/

// check for regex
$(".inputs input").keyup((e)=>{

    let regex = eval(`${e.target.id}Regex`);
    if(regex.test(e.target.value) != true)
    {
        $(`#${e.target.id}Error`).removeClass("d-none");
        $(`#${e.target.id}`).removeClass("is-valid")
    }
    else
    {
        $(`#${e.target.id}Error`).addClass("d-none");
        $(`#${e.target.id}`).addClass("is-valid");
    }

    allValid()
    
})

// check for validity
function allValid()
{
    for(let i=0 ; i<$(".inputs input").length ; i++)
    {
        // console.log(!$(".inputs").find("input")[i].className.includes("is-valid"))
        if(!$(".inputs").find("input")[i].className.includes("is-valid"))
        {
            $("#submitBtn").attr("disabled" , true);
            return;
        }
    }
    $("#submitBtn").attr("disabled" , false);
}

// $("#submitBtn").click(()=>{
//     $("#submitBtn").attr("disabled" , true);
//     $(".inputs input").removeClass("is-valid")
// })


