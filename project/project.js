
//onload event listener
window.addEventListener('load', start)
document.getElementById('restart').onclick = initializeGame

//create elements
var randomNumber1
var randomNumber2
var countTries
var player1Number = 0
var player2Number = 0

function start(){
    document.getElementById("p1Click").style.visibility="hidden"
    document.getElementById("p2Click").style.visibility="hidden"
    document.getElementById('start').onclick =setupGame
    document.getElementById('restart').disabled = true
}

function setupGame(){

// button1 onclick function player1
    document.getElementById('p1Click').onclick = player1
// button2 onclick function player2
    document.getElementById('p2Click').onclick = player2
    document.getElementById('p2Click').disabled = true 
//2. Initialize a new game by calling the initializeGame fumction
    initializeGame()
}

function player1(){
    document.getElementById('start').disabled = true
    document.getElementById('restart').disabled = false
//  random number
    randomNumber1 = Math.floor(Math.random()*6 + 1)
    document.getElementById('p1result').innerText = "Tom rolls the dice and gets "+randomNumber1  
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
        document.getElementById('p1result').innerText = "Tom rolls the dice and gets "+randomNumber1+", Tom's step is above 20 should go back "+Math.abs(20-player1Number)+" steps"    
        player1Number = 40 - player1Number
    }else if (player1Number == 20){
        document.getElementById("p1Click").style.visibility="hidden"
        document.getElementById("p2Click").style.visibility="hidden"
        document.getElementById('restart').disabled = false
        document.getElementById('p1result').innerHTML = "Tom rolls the dice and gets "+randomNumber1+",he gets 20, <strong>Tom is the WINNER</strong>"
    }
// and show the step
    document.getElementById('p1Location').innerText = player1Number
    let progressNumber1 = player1Number*5
    document.getElementById('p1Location').ariaValueNow = progressNumber1
    document.getElementById('p1Location').style.width = progressNumber1 + "%"
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
        document.getElementById('p2result').innerText = "Jerry rolls the dice and gets "+randomNumber2
// play dice
        player2Number += randomNumber2
        if (player2Number > 20){
            document.getElementById('p2result').innerText = "Jerry rolls the dice and gets "+randomNumber2+", Jerry's step is above 20 should go back "+Math.abs(20-player2Number)+" steps" 
            player2Number = 40- player2Number
        }else if(player2Number == 20){
            document.getElementById("p1Click").style.visibility="hidden"
            document.getElementById("p2Click").style.visibility="hidden"
            document.getElementById('restart').disabled = false
            document.getElementById('p2result').innerHTML = "Jerry rolls the dice and gets "+randomNumber2+",he gets 20, <strong>Jerry is the WINNER</strong>"
        }
// and show the step
    document.getElementById('p2Location').innerText = player2Number
    let progressNumber2 = player2Number*5
    document.getElementById('p2Location').ariaValueNow = progressNumber2
    document.getElementById('p2Location').style.width = progressNumber2 + "%"  
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
// 5. round number
    countTries = 0
    document.getElementById('currentRound').innerText = "Round " + countTries    
    player1Number = 0
    player2Number = 0
// 6.restart button disable
    document.getElementById('p1Click').disabled = false
    document.getElementById('p2Click').disabled = true
    document.getElementById("p1Click").style.visibility="visible"
    document.getElementById("p2Click").style.visibility="visible"
// 7. initialize the 2 progress bars
    document.getElementById('p1Location').innerText = 0
    document.getElementById('p1Location').ariaValueNow = 0
    document.getElementById('p1Location').style.width = "0%"
    document.getElementById('p2Location').innerText = 0
    document.getElementById('p2Location').ariaValueNow = 0
    document.getElementById('p2Location').style.width = "0%"    
}

