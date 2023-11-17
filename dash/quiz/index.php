<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Test</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body onload="NextQuestion(0)">
    <main>
        <!-- creating a modal for when quiz ends -->
        <div class="modal-container" id="score-modal">
          
            <div class="modal-content-container">
              
                <h1>Тест завершен.</h1>
              
                <div class="grade-details">
                    <p>Попыток : 10</p>
                    <p>Неправильные ответы : <span id="wrong-answers"></span></p>
                    <p>Правильные ответы : <span id="right-answers"></span></p>
                    <p>Grade: <span id="grade-percentage"></span>%</p>
                    <p ><span id="remarks"></span></p>
                </div>
              
                <div class="modal-button-container">
                    <button onclick="closeScoreModal()">Продолжить</button>
                </div>
              
            </div>
        </div>

        <div class="game-quiz-container">
          
            <div class="game-details-container">
                <h1>Счёт : <span id="player-score"></span> / 10</h1>
                <h1> Вопрос : <span id="question-number"></span> / 10</h1>
            </div>

            <div class="game-question-container">
                <h1 id="display-question"></h1>
            </div>

            <div class="game-options-container">
              
               <div class="modal-container" id="option-modal">
                 
                    <div class="modal-content-container">
                         <h1>Выберите ответ!</h1>
                      
                         <div class="modal-button-container">
                            <button onclick="closeOptionModal()">Хорошо...</button>
                        </div>
                      
                    </div>
                 
               </div>
              
                <span>
                    <input type="radio" id="option-one" name="option" class="radio" value="optionA" />
                    <label for="option-one" class="option" id="option-one-label"></label>
                </span>
              

                <span>
                    <input type="radio" id="option-two" name="option" class="radio" value="optionB" />
                    <label for="option-two" class="option" id="option-two-label"></label>
                </span>
              

                <span>
                    <input type="radio" id="option-three" name="option" class="radio" value="optionC" />
                    <label for="option-three" class="option" id="option-three-label"></label>
                </span>
              

                <span>
                    <input type="radio" id="option-four" name="option" class="radio" value="optionD" />
                    <label for="option-four" class="option" id="option-four-label"></label>
                </span>


            </div>

            <div class="next-button-container">
                <button onclick="handleNextQuestion()">Следующий вопрос</button>
            </div>

        </div>
    </main>
    <script src="index.js"></script>
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
