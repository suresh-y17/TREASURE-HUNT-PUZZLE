
            function preback(){window.history.forward();}
            setTimeout("preback()",0);
         window.onunload=function(){null};

var startButton = document.querySelector('#start-button');
startButton.addEventListener('click', function handleClick() {
  alert('Start the game! remember you have only 5 chances. If you click on the correct number, it will take you to the next clue.');
  var cells = document.querySelectorAll('td');
  var clickCount = 0;
  var score = 100;
  var deduction = 0;

  cells.forEach(function(cell) {
    cell.addEventListener('click', function() {
      if (clickCount < 6) {
        var number = cell.textContent;
        switch (number) {
          case '9':
            alert('I have 3 factors on addition and multiplication of those 3 factors give the same number that is me as the result');
            score -= 8;
            break;
          case '6':
            alert('Number of times clocks hands overlap in a day.');
            score -= 7;
            break;
          case '22':
            alert('Most of the people think that I am unlucky.');
            score -= 6;
            break;
          case '7':
            alert('A man dies of old age on his 25th birthday.');
            score -= 5;
            break;
          case '29':
           
            window.location.href = "result.php?score=" + (score - deduction);
            break;
          case '18':
            deduction += 25;
            alert('Oops! That is a wrong number. You lose 5 points.');
            break;
          case '31':
            deduction += 25;
            alert('Oops! That is a wrong number. You lose 5 points.');
            break;
          default:
            if (!isNaN(parseInt(number))) {
              alert('This cell does not contain a valid clue. Please try again.');
            score -= 10;
            }
            break;
        }
        clickCount++;
      } else {
        window.history.pushState(null,null,location.href);
        window.onpopstate=function(event){
          history.go(1);
        };
        window.location.href="lost.php";
      }
      var finalScore = score - deduction;
      console.log("Current score: " + finalScore); // You can remove this line, it's just for testing purposes
    });
  });

  startButton.removeEventListener('click', handleClick);
});


var cluesButton = document.querySelector('#left-column button');
var cluesContainer = document.querySelector('#clues-container');
var f=0;
var currentClueIndex = 0;
var clickCount = 0; 

cluesButton.addEventListener('click', function() {
  if (clickCount < 5) { 
    cluesContainer.innerHTML = ''; 
    if (currentClueIndex === 0) {
      var p=document.createElement('p');
      p.textContent = "Your First Clue is:";
      p.style.color='gold';
      cluesContainer.appendChild(p);
      var img = document.createElement('img');
      img.src = 'clue1.jpg';
      img.width=480;
      img.height=250;
      cluesContainer.appendChild(img);
    }
    else if(currentClueIndex === 1){
      var p=document.createElement('p');
      p.textContent = "I'm a pallindrome adult number";
      p.style.color='gold';
      cluesContainer.appendChild(p);
    }
    else if(currentClueIndex === 2){
      var p=document.createElement('p');
      p.textContent = "Do You Know what my action is called in telugu?";
      p.style.color='gold';
      cluesContainer.appendChild(p);
      var img = document.createElement('img');
      img.src = 'cry.gif';
      img.width=480;
      img.height=250;
      cluesContainer.appendChild(img);
    }
    else if(currentClueIndex === 3){
      var p=document.createElement('p');
      p.textContent = "2.5,3,4,6,10,_____________";
      p.style.color='gold';
      cluesContainer.appendChild(p);
      var img = document.createElement('img');
      img.src = 'danger.gif';
      img.width=480;
      img.height=250;
      cluesContainer.appendChild(img);
    }
    if (currentClueIndex === 4) {
      var p=document.createElement('p');
      p.style.color='gold';
      p.textContent = "Your last Clue is:";
      cluesContainer.appendChild(p);
        var img = document.createElement('img');
        img.src = '29.gif';
        img.width=480;
        img.height=250;
        cluesContainer.appendChild(img);
        f=1;
      }
    currentClueIndex++;
    clickCount++;
    if (f===1) {
      alert("You have only one clue left");
      cluesButton.disabled = true; 
    }
  }
});