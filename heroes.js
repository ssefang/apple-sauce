// a. Include the current verison on the jQuery library


// b. Wait for document to be ready to ensure all jQeury has been loaded in the page
$(document).ready(function(){
    // c. Once ready, create an AJAX request to the json file provided
    $.get("json/heroes.json", function(data){
        console.log(data)
        let obj = JSON.parse(data)
        // 1. Create an h1 element, have its content be the *squadName* and append it to the existing header element
        // 2. Create a paragraph set its content as below and append it to the existing header element  Hometown: *homeTown* // Formed: *formed*
        let superName = $("<h1>" + obj.squadName + "</h1>")
        let superHome = $("<p>Hometown: " + obj.homeTown + " // Formed: " + obj.formed + "</p>")
        $("header").append(superName).append(superHome)
        
        // 6. Create an article element and append the 5 previously create elements (step 3,4,5)
        //7. Append the newly created article to the existing section in the html files
        for(item of obj.members){
            let newArticle = $("<article></article>")
            $("section").append(newArticle)    
            //3. Create an h2 element and have its content be the current hero's *name*.
            let heroName = $("<h2>" + item.name +"</h2>")
            $(newArticle).append(heroName)
            /*4. Create 3 seperate paragraphs elements have their content be:
                        Secret Identity: secretIdentity
                        Age: age
                        Superpowers:
                        */
            let newIdentity = $("<p>Secret identity: " + item.secretIdentity + "</p>")
            $(newArticle).append(newIdentity)
            let newAge = $("<p>Age: " + item.age + "</p>")
            $(newArticle).append(newAge)
            let newPower = $("<p>Superpowers: </p>")
            $(newArticle).append(newPower)

            // 5. Create a ul element.
            let newUL = $("<ul></ul>")
            $(newArticle).append(newUL)
            /* 6. Loop through the current hero's *superpowers* — for each one create an li element, put the *superpower* as its content, then put all the list items inside the ul element from step5 */
            let power = item.powers
            for(let i = 0; i <power.length; i++){
                let newItem = $("<li>" + power[i] + "</li>")
                $(newUL).append(newItem)
            }
        }
        /*
        8. Go back and alter your code so the ul element will slide down when you hover over the third paragraph ("Superpowers:") and slide up when you hover off.
        */
        
        $("section article:nth-child(1) p:nth-child(4)").hover(function(){
            $("section article:nth-child(1) ul:nth-child(5)").slideUp(1000)
        }, function(){
            $("section article:nth-child(1) ul:nth-child(5)").slideDown(1000)
        })
        $("section article:nth-child(2) p:nth-child(4)").hover(function(){
            $("section article:nth-child(2) ul:nth-child(5)").slideUp(1000)
        }, function(){
            $("section article:nth-child(2) ul:nth-child(5)").slideDown(1000)
        })
        $("section article:nth-child(3) p:nth-child(4)").hover(function(){
            $("section article:nth-child(3) ul:nth-child(5)").slideUp(1000)
        }, function(){
            $("section article:nth-child(3) ul:nth-child(5)").slideDown(1000)
        })
    })
    
 
})
