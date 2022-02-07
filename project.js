
//onload event listener
window.addEventListener('load', setupGame)

//create elements
var randomNumber
var countTries
// var isFlag = true


function setupGame(){
// 1. add elements 
// start don't need

// button1 onclick function player1
    document.getElementById('p1Click').onclick = player1
// button2 onclick function player2
    document.getElementById('p2Click').onclick = player2
    document.getElementById('p2Click').disabled = true
// button3 onclick function initializeGame
    document.getElementById('restart').onclick = initializeGame
    document.getElementById('restart').disabled = true
    document.getElementById('restart').style.display = "none"
//2. Initialize a new game by calling the initializeGame fumction
    initializeGame()
}


function player1(){
// restart button disable false
    document.getElementById('restart').disabled = false
    document.getElementById('restart').style.display = "block"
// button1 disable false
    document.getElementById('p1Click').disabled = false
// button2 disable true
    document.getElementById('p2Click').disabled = true
// change the round
        countTries ++
    document.getElementById('currentRound').innerText = "Round " + randomNumber    
// play dice  (if == 100 or > 100)
    let player1Number = 0
    if(player1Number <100){
        player1Number = player1Number + randomNumber
    }else if (player1Number > 100){
        player1Number = 200- player1Number
    }else{
        document.getElementById('p1Click').disabled = true
        document.getElementById('p2Click').disabled = true
        document.getElementById('restart').disabled = false
        document.getElementById('result').innerText = "Player1 is the winner"
    }
// and show the step
    document.getElementById('p1Location').innerText = player1Number
}

function player2(){
// button1 disable false
    document.getElementById('p1Click').disabled = true
// button2 disable true
    document.getElementById('p2Click').disabled = false
// play dice
    let player2Number = 0
        if(player2Number <100){
            player2Number = player2Number + randomNumber
        }else if (player2Number > 100){
            player2Number = 200- player2Number
        }else{
            document.getElementById('p1Click').disabled = true
            document.getElementById('p2Click').disabled = true
            document.getElementById('restart').disabled = false
            document.getElementById('result').innerText = "Player2 is the winner"
        }
// and show the step
    document.getElementById('p2Location').innerText = player2Number  
}
function initializeGame(){
// 1. clear the result
    document.getElementById('result').innerText = ""
// 3. clear the step
    document.getElementById('p2Location').innerText = "0"
    document.getElementById('p2Location').innerText = "0"
// 4. player2 button disable
    document.getElementById('p2Click').disabled = true
// 5. random number
    randomNumber = Math.floor(Math.random()*6 + 1)
// 6. round number
    countTries = 0
// 7.restart button disable
    document.getElementById('restart').disabled = true
}


// first prompt player1's  and player2's name
// make the step table
// the button start and restart just need one ?
// each round output the winner and loser