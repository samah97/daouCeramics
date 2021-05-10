const  previousBtn  =  document.getElementById('previousBtn');
const  nextBtn  =  document.getElementById('nextBtn');
const  finishBtn  =  document.getElementById('finishBtn');

const  bullets  =  [...document.querySelectorAll('.bullet')];

const MAX_STEPS = 4;
let currentStep = 1;
let cStep = 1;

$(document).ready(function()
{
    $("#previousBtn").hide();
    $("#stepTwoContent").hide();
    $("#stepOneContent").show();
    $("#stepThreeContent").hide();
    $("#stepFourContent").hide();
    $(".showcomplete").hide();
//content.innerText  =  `Step Number 1`;
});


previousBtn.addEventListener('click',  ()  =>  {
    currentStep=cStep;
    if  (currentStep  ===  1)  {
        previousBtn.disabled  =  true;
    }
    else
    {
        bullets[currentStep  -  2].classList.remove('completed');
        cStep  -=  1;
        //nextBtn.disabled  =  false;
        //finishBtn.disabled  =  true;

        if(currentStep==2)
        {
            $("#stepOneContent").show();
            $("#stepTwoContent").hide();
            $("#stepThreeContent").hide();
        }
        else
        if(currentStep==3)
        {
            $("#stepOneContent").hide();
            $("#stepTwoContent").show();
            $("#stepThreeContent").hide();
        }
        else
        if(currentStep==4)
        {
            $("#stepOneContent").hide();
            $("#stepTwoContent").hide();
            $("#stepThreeContent").show();
        }
        //content.innerText  =  `Step Number ${cStep}`;
    }
});
function nextstepsfunc(currentStep) {
    bullets[currentStep  -  1].classList.add('completed');
    //currentStep  +=  1;
    cStep+=1;
    if(cStep>1)
    {
        $("#previousBtn").show();
        previousBtn.disabled  =  false;
    }
    else{
        $("#previousBtn").hide();
    }
    if  (currentStep  ===  MAX_STEPS)  {
        nextBtn.disabled  =  true;
        finishBtn.disabled  =  false;
    }
    //content.innerText  =  `Step Number ${cStep}`;
    if(currentStep==1)
    {


        $(".showcomplete.completestep1").show();
        $(".bullet.bulletstep1").hide();
        $("#stepTwoContent").show();

        $("#stepOneContent").hide();
        $("#stepThreeContent").hide();
    }
    else

    if(currentStep==2)
    {
        $(".showcomplete.completestep2").show();
        $(".bullet.bulletstep2").hide();
        $("#stepThreeContent").show();

        $("#stepOneContent").hide();
        $("#stepTwoContent").hide();
    }
    else
    if(currentStep==3)

    {
        $(".showcomplete.completestep3").show();
        $(".bullet.bulletstep3").hide();
        $("#stepFourContent").show();
        $("#stepThreeContent").hide();
        $("#stepTwoContent").hide();
        $("#stepThreeContent").hide();
    }


}

function submitForm() {
    var form = $('form#paymentForm');
    if(validateForm()){
        form.submit();
    }
}

function validateForm() {
    return true;
}
