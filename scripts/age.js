function usersAge( yearBirth){

    if(typeof(yearBirth) !="number"){
        console.log("No number provided");
    }else{
        let yearCurrent=2021;
        // let yearBirth=2000;
        
        let age1=yearCurrent-yearBirth;
        let age2=yearCurrent-yearBirth-1;
        
        console.log("You're either "+age1+" or "+age2+" years old.");
    }

}


