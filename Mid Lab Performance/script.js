let mainDiv = document.getElementById('calculator');


let display = document.createElement('input');
display.type = "text";
display.id = "display";
display.readOnly = true;
mainDiv.appendChild(display);

mainDiv.appendChild(document.createElement('br'));


let buttons = [
    "7","8","9","/",
    "4","5","6","*",
    "1","2","3","-",
    "0",".","=","+"
];


buttons.forEach(function(val){

    let btn = document.createElement('button');
    btn.innerHTML = val;
    btn.style.margin = "5px";

    btn.addEventListener('click', function(){

        if(val === "="){
            calculate();
        }else{
            display.value += val;
        }

    });

    mainDiv.appendChild(btn);
});

function calculate(){

    let expression = display.value;

    let num1 = "";
    let num2 = "";
    let operator = "";

    
    for(let i = 0; i < expression.length; i++){

        let ch = expression[i];

        if(ch === "+" || ch === "-" || ch === "*" || ch === "/"){
            operator = ch;
        }
        else{
            if(operator === ""){
                num1 += ch;
            }else{
                num2 += ch;
            }
        }
    }

    num1 = parseFloat(num1);
    num2 = parseFloat(num2);

    let result = 0;

    if(operator === "+"){
        result = num1 + num2;
    }
    else if(operator === "-"){
        result = num1 - num2;
    }
    else if(operator === "*"){
        result = num1 * num2;
    }
    else if(operator === "/"){
        result = num1 / num2;
    }

    alert("Result: " + result);  

    display.value = "";          
}