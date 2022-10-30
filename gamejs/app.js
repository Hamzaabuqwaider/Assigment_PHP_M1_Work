const p1Points = document.getElementById("p1-score");
const p2Points = document.getElementById("p2-score");
const p1Btn = document.getElementById("p1-btn");
const p2Btn = document.getElementById("p2-btn");
const p1Name = document.getElementById('p1-player-name');
const p2Name = document.getElementById('p2-player-name');
const winnerContainer = document.getElementById('winner');
const reset = document.getElementById("reset");

let p1Score = 0;
let p2Score = 0;
let changingColor;


const gameEndScoreElement = document.getElementById('gameEndScore');
let gameEndScore = gameEndScoreElement.value;

gameEndScoreElement.addEventListener("change", function (event) {
    gameEndScore = parseInt(event.target.value);
    console.log(gameEndScore)
});

p1Btn.addEventListener("click", function () {
    startGame();
    printScore(1);
    if (p1Score >= gameEndScore) {
        endGame();
    }
});

p2Btn.addEventListener("click", function () {
    startGame();
    printScore(2);
    if (p2Score >= gameEndScore) {
        endGame();
    }
});

reset.addEventListener('click', function () {
    p1Score = 0;
    p2Score = 0;
    p1Points.textContent = 0;
    p2Points.textContent = 0;
    p1Btn.disabled = false;
    p2Btn.disabled = false;
    winnerPlayer = null;
    winnerContainer.style.display = 'none';
    clearInterval(changingColor); // to stop the interval
    p1Name.style.backgroundColor = "white";
    p2Name.style.backgroundColor = "white";
    document.getElementsByTagName('body')[0].style.backgroundColor = "white";
    gameEndScoreElement.disabled = false;

    // same as the above. 
    // location.reload();
});

function startGame() {
    gameEndScoreElement.disabled = true;
}

// DRY - keep you're code DRY (Don't Repeat Yourself)
function printScore(player) {
    if (player == 1) {
        // add 1 point to the score
        p1Score++;
        if(p2Score>0){
        p2Score--;
        p2Points.textContent = p2Score;
        }
        // insert the score to the score section
        p1Points.textContent = p1Score;
    } else {
        // add 1 point to the score
        p2Score++;
        if(p1Score>0){
            p1Score--;
            p1Points.textContent = p1Score;
            }
        // insert the score to the score section
        p2Points.textContent = p2Score;
    }
}

function endGame() {
    p1Btn.disabled = true;
    p2Btn.disabled = true;
    let winnerPlayer = null;
    winnerContainer.style.display = 'block';
    if (p1Score > p2Score) {
        winnerPlayer = p1Name.textContent;
        p1Name.style.backgroundColor = "green";
        p2Name.style.backgroundColor = "red";
    } else {
        winnerPlayer = p2Name.textContent;
        p1Name.style.backgroundColor = "red";
        p2Name.style.backgroundColor = "green";
    }
    document.getElementById('winner-name').textContent = winnerPlayer;
    document.getElementsByTagName('body')[0].style.backgroundColor = "green";

    let colorSwitch = 0;
    changingColor = setInterval(function () {
        if (colorSwitch == 0) {
            winnerContainer.style.backgroundColor = "red";
            colorSwitch++;
        } else {
            winnerContainer.style.backgroundColor = "yellow";
            colorSwitch--;
        }
    }, 500);
    console.log(changingColor);
}

// Bonus Assignment
// The score should start from 0. (this is already done)
// If any player got a point, the point should be deducted from the other player.
// The players score should not go below zero.