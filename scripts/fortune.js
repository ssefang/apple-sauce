
let P="jin";
let J="manager";
let G="lasalle";
let D="wang";

function kids(num=0){
    if(num<=0||typeof(num)!="number"){
        console.log("You will be a "+J+" who will one day marry "+P+" and live in "+G+" with your dog "+D+".")
    }else if(num==1){
        console.log("You will be a "+J+" who will one day marry "+P+" and live in "+G+" with your "+num+" kid and your dog "+D+".")
    }else{
        console.log("You will be a "+J+" who will one day marry "+P+" and live in "+G+" with your "+num+" kids and your dog "+D+".")
    }
    
}

