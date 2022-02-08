
//onload event listener
window.addEventListener('load', start)

//create elements
var randomNumber1
var randomNumber2
var countTries
var player1Number = 0
var player2Number = 0
// var isFlag = true


function start(){
    document.getElementById("p1Click").style.visibility="hidden"
    document.getElementById("p2Click").style.visibility="hidden"
    document.getElementById('start').onclick =setupGame
    document.getElementById('restart').disabled = true
}
document.getElementById('restart').onclick = initializeGame

function setupGame(){
// 1. add elements 
// start don't need

// button1 onclick function player1
    document.getElementById('p1Click').onclick = player1
// button2 onclick function player2
    document.getElementById('p2Click').onclick = player2
    document.getElementById('p2Click').disabled = true
    

// button3 onclick function initializeGame
    // document.getElementById('restart').onclick = initializeGame
    // document.getElementById('restart').disabled = true
    // document.getElementById('restart').style.display = "none"
//2. Initialize a new game by calling the initializeGame fumction
    initializeGame()
}


function player1(){
    document.getElementById('start').disabled = true
    document.getElementById('restart').disabled = false
//  random number
    randomNumber1 = Math.floor(Math.random()*6 + 1)
    document.getElementById('p1result').innerText = "play1 roll the dice and get "+randomNumber1  

// restart button disable false
    // document.getElementById('restart').disabled = false
    // document.getElementById('restart').style.display = "block"
// button1 disable false
    document.getElementById('p1Click').disabled = false
// button2 disable true
    document.getElementById('p2Click').disabled = true
// change the round
        countTries ++
    document.getElementById('currentRound').innerText = "Round " + countTries    
// play dice  (if == 100 or > 100)
    player1Number += randomNumber1    
    if(player1Number > 20){
        document.getElementById('p1result').innerText = "play1 roll the dice and get "+randomNumber1+", play1's step is above 20 should go back "+Math.abs(20-player1Number)+" step"    

        player1Number = 40 - player1Number
    }else if (player1Number == 20){
        // document.getElementById('p1Click').disabled = true
        // document.getElementById('p2Click').disabled = true
        document.getElementById("p1Click").style.visibility="hidden"
        document.getElementById("p2Click").style.visibility="hidden"

        document.getElementById('restart').disabled = false
        document.getElementById('p1result').innerText = "play1 roll the dice and get "+randomNumber1+" Player1 is the winner"
        
    }
// and show the step
    document.getElementById('p1Location').innerText = player1Number
    document.getElementById('p1Location').ariaValueNow = "player1Number*2"
    document.getElementById('p1Location').style.width = "(player1Number*2)%"
// button1 disable false
    document.getElementById('p1Click').disabled = true
// button2 disable true
    document.getElementById('p2Click').disabled = false

}

function player2(){
    if(document.getElementById('restart').onclick==true){
        setupGame
    }else{
// random number
        randomNumber2 = Math.floor(Math.random()*6 + 1)
        document.getElementById('p2result').innerText = "play2 roll the dice and get "+randomNumber2

// play dice
        player2Number += randomNumber2
        if (player2Number > 20){
            document.getElementById('p2result').innerText = "play2 roll the dice and get "+randomNumber2+", play2's step is above 20 should go back "+Math.abs(20-player2Number)+" step" 
            player2Number = 40- player2Number
        }else if(player2Number == 20){
            // document.getElementById('p1Click').disabled = true
            // document.getElementById('p2Click').disabled = true
            document.getElementById("p1Click").style.visibility="hidden"
            document.getElementById("p2Click").style.visibility="hidden"
            document.getElementById('restart').disabled = false
            document.getElementById('p2result').innerText = "play2 roll the dice and get "+randomNumber2+" Player2 is the winner"
        }
// and show the step
    document.getElementById('p2Location').innerText = player2Number  
// button1 disable false
    document.getElementById('p1Click').disabled = false
// button2 disable true
    document.getElementById('p2Click').disabled = true
}
}

function initializeGame(){
// 1. clear the result
    document.getElementById('p1result').innerText = ""
    document.getElementById('p2result').innerText = ""

// 3. clear the step
    document.getElementById('p1Location').innerText = "0"
    document.getElementById('p2Location').innerText = "0"
// 4. player2 button disable
    // document.getElementById('p2Click').disabled = true
// 5. round number
    countTries = 0
    document.getElementById('currentRound').innerText = "Round " + countTries    

player1Number = 0
player2Number = 0
// 6.restart button disable
    // document.getElementById('restart').disabled = true
    document.getElementById('p1Click').disabled = false

    document.getElementById('p2Click').disabled = true
    document.getElementById("p1Click").style.visibility="visible"
    document.getElementById("p2Click").style.visibility="visible"
}


// first prompt player1's  and player2's name
// promt the instruction of the game
// make the step table