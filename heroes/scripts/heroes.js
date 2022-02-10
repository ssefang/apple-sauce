$(document).ready(function() {
    $.get("/json/heroes.json",function(data){
        console.log(data)
        let newElem=$("<h1>"+data.squadName+"</h1>")        
        let newParagraph=$("<p>Hometown: "+data.homeTown+" // Formed: "+data.formed+"</P>")
        $("header").append(newElem).append(newParagraph)
        
        
        for(let j in data.members){   
       
        let newArticle=("<article></article>")
        $("section").append(newArticle)        
        let newP2=$("<h2>"+data.members[j].name+"</h2>")
        $("article").append(newP2)
        let newUl=$("<ul></ul>")
        let paragraph1=$("<p>Secret Identity:"+data.members[j].secretIdentity+"</p>")
        let paragraph2=$("<p>Age:"+data.members[j].age+"</p>")
        let paragraph3=$("<p id='ul'>Superpowers:</p>")
        $("article").append(paragraph1).append(paragraph2).append(paragraph3)
        
        // for(let i=0;i<data.menbers[j].powers.length;i++){                
        //     let newLi=$("<li>"+data.members.powers[i]+"</li>")
        //     $("ul").append(newLi)
        
        // }
    }
        
    })
})