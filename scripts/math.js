
function squareNumber(number){
    let result=number*number;
    console.log("The result of squaring the number "+number+" is "+result+".");
    return result;
}


function halfNumber(number){
    let result=number/2;
    console.log("Half of "+number+" is "+result+".");
    return result;
}

function percentOf(number1,number2){
    let result=number1/number2*100;
    console.log(number1+" is "+result+"% of "+number2+".");
    return result;
}

function areaOfCircle(number){
    const PI = Math.PI;
    let result=PI*number*number;
    console.log("The area for a circle with radius "+number+" is "+result+".")
    return result;
}

function allTheStuff(number){
    let a=halfNumber(number);
    let b=squareNumber(a);
    let c=areaOfCircle(b); 
    let d=percentOf(c,b);  
}