var Scene_Game = function () {
    var scope = this;

    $.extend(this, Events, Scene, {
    init: function (name, args) {
        this.gridArray = new Array(); //keep field state
        this.el = this.createElement();
        this.$grid = this.el.find('.grid'); //keep spans of fields
        this.$score = this.el.find('.score .value');
        this.dimension = {x: 18, y: 18};
        this.mineNumber = 40;
        this.$info = $('#viewport').find('.info');
        this.$remainMines = $('#viewport').find('.mines-remain .value');
        this.actualMineNumber = this.mineNumber + 0;
        this.level = 1;
        this.$level = $('#viewport').find('.level .value');
        this.levels = {"easy" : {x : 6, y: 6}, "intermediate" : {x: 10, y: 10}, "hard" : {x: 18, y: 18}};
        this.mineNumberArr = {"easy" : 6, "intermediate" : 40, "hard": 80};

        this.$timeBig = this.el.find('.time .big'); //first two thirds are bigger than last
        this.$timeSmall = this.el.find('.time .small');
        this.$dialog = this.el.find('.dialog');

    },

    createElement: function () {
        return $('#scene-game');
    },

    destroy: function () {
        this.el.hide();
    },
    formatTime: function(time){ //time in seconds
        var hours, minutes, seconds;
        hours = parseInt(time/3600,10);
        minutes = parseInt((time%3600)/60);
        seconds = time - hours*3600-minutes*60;

        return {big : (hours < 10 ? "0" + hours : hours ) + ":" + (minutes < 10 ? "0" + minutes : minutes), small : (seconds < 10 ? "0" + seconds : seconds)};
    },
    initGame: function(){
        this.clearCounter();
        this.time = 0;
        this.gameOver = false;
        var timeS = this.formatTime(0);
        this.$timeBig.html(timeS.big);
        this.$timeSmall.html(timeS.small);

        this.dimension = this.levels[APP.level];
        if(!this.dimension)
            this.dimension = this.levels["easy"];
        this.mineNumber = this.mineNumberArr[APP.level];

        if(!this.mineNumber)
            this.mineNumber = this.mineNumberArr["easy"];

        this.initMinesGround(this.dimension);
        this.makeGrid(this.dimension);
        this.actualMineNumber = this.mineNumber + 0;
        this.$cells = this.$grid.find('.cell');

        this.$remainMines.html(this.mineNumber);
		document.getElementById('colorButtons').children[5].textContent = 'Označiť';
    },
    show: function (data) {
        $.extend(this, data);
        this.event_stack = {};

        this.el.show();
        this.el.addClass(APP.level);
        this.launchGame();
        this.focus();
    },
    handleNewGame: function(dontShowInfo){
        if(!dontShowInfo)
            this.$info.show();

        var scope = this;
        this.disableControl = true;


            scope.initGame();
            scope.focus();
            scope.disableControl = false;
    },
    setCounter: function(){
      if(this.counter)
          clearInterval(this.counter);
        var sec = 0, scope = this;
        var timeArr;
        this.counter = setInterval(function(){
            if(!scope.isRunning)
                return;
            ++sec;

            timeArr = scope.formatTime(sec);
            scope.secs = sec;

            scope.$timeBig.html(timeArr.big);
            scope.$timeSmall.html(timeArr.small);
        },1000);

        this.isRunning = true;
    },
    clearCounter: function(){
      if(this.counter)
          clearInterval(this.counter);

        this.isRunning = false;
    },
        //this function is no longer used, cause player will play last level till he crash
    won: function () {
        var timeArr = scope.formatTime(this.secs);
        this.$dialog.find('.text').html("Congratulations. You have won in " + timeArr.big + ":" + timeArr.small);
        var level = APP.level || "easy";
        var highscore = parseInt(Storage.get(level),10) || 0;
        if(highscore < this.secs)
            Storage.set(level, this.secs);

        var $hidden = this.el.find('.cell.hidden');

        for(var i = 0; i < $hidden.length; ++i){
            var cell = $($hidden[i]);
            var index = this.$cells.index(cell);
            this.pressed(index, true, true);
        }

        this.showDialog();
    },
    showDialog: function(){
        this.isRunning = false;

        this.$dialog.show();
    },
    launchGame: function () {
        this.score = 0;
        this.$score.html(0);

        this.initGame();
    },
    getRandomNumber: function () {
        return Math.floor((Math.random() * this.gridArray.length) + 0);
    },
        /**
         * reset minesweeper ground
         * @param {Integer} dimension
         */
    initMinesGround: function(dimension){
        /*
         * 0 - empty cell hidden
         * 1 - empty cell showed
         * 2 - mine cell hidden
         * 3 - mine cell marked
         * 4 - number cell hidden
         * 5 - number cell clicked
         * 6 - question mark
         */

        this.gridArray = [];
        for(var i = 0; i < dimension.y; ++i){
            for(var j = 0; j < dimension.x; ++j){
                var cell = {};
                cell.value = 0;
                this.gridArray.push(cell);
            }
        }
    },
        //now not used, cause levels are setted through settings
    switchLevel: function(){
        ++this.level;
        if(this.level > 2)
            this.level = 0;

        switch(this.level){
            case 0:
                this.dimension.x = 10;
                this.dimension.y = 15;
                this.mineNumber = 20;
                this.$level.html("Easy");
                break;
            case 1:
                this.dimension.x = 30;
                this.dimension.y = 25;
                this.mineNumber = 80;
                this.$level.html("Medium");
                break;
            case 2:
                this.dimension.x = 35;
                this.dimension.y = 25;
                this.mineNumber = 120;
                this.$level.html("Hard");
                break;
        }

        this.$info.html("Switching level. Wait a second please.");

        this.handleNewGame();
    },
    makeGrid: function (dimension) {
        this.$grid.empty();
        var $cell, $row = $('<div class="row"/>');

        for(var i = 0; i < dimension.y; ++i){
            for(var j = 0; j < dimension.x; ++j){
                $cell = $("<span class='cell focusable hidden'><span class='num'/><span class='focus'/><span class='mine'/></span>");
                $row.append($cell);
            }
            this.$grid.append($row);
            $row = $('<div class="row"/>');
        }

        var middleIndex = Math.floor(dimension.y/2) * this.dimension.x + Math.floor(dimension.x/2);
        for(var i = 0; i < this.mineNumber; ++i){
            var rand = this.getRandomNumber();

            if(this.gridArray[rand].value == 0 && (rand < middleIndex-1 || rand > middleIndex + 1) && ( rand < middleIndex - dimension.x - 1 || rand > middleIndex - dimension.x + 1) &&
                               ( rand < middleIndex + dimension.x - 1 || rand > middleIndex + dimension.x + 1)  )
                this.gridArray[rand].value = 2;
            else
                --i;
        };

        for(var i = 0; i < this.gridArray.length; ++i){
            var cellArr = this.gridArray[i];

            if(cellArr.value == 2)
                continue;
            var count = 0;

            count += i%dimension.x == 0 ? 0 : this.isMineThere(i-1);
            count += (i+1)%dimension.x == 0 ? 0 : this.isMineThere(i+1);
            count += this.isMineThere(i-dimension.x);
            count += this.isMineThere(i+dimension.x);
            count += i%dimension.x == 0 ? 0 :this.isMineThere(i+dimension.x-1);
            count += (i+1)%dimension.x == 0 ? 0 : this.isMineThere(i+dimension.x+1);
            count += i%dimension.x == 0 ? 0 : this.isMineThere(i-dimension.x-1);
            count += (i+1)%dimension.x == 0 ? 0 :this.isMineThere(i-dimension.x+1);

            cellArr.num = count;
            cellArr.value = count > 0 ? 4 : 0;
        }


        var str = "", ind = 0;
        for(var i = 0; i < this.gridArray.length; ++i)
        {
            if(i > 0 && i % (dimension.x) == 0){
                console.log(str);
                str = "";
            }
            if(this.gridArray[i].value == 2)
                ++ind;
            str += (this.gridArray[i].value == 2 ? "m" : this.gridArray[i].num) + " ";

        }
    },
    isMineThere: function(index){
        if(index < 0 || index >= this.gridArray.length)
            return 0;
        else if(this.gridArray[index].value == 2)
            return 1;
        else
            return 0;
    },
    clean: function () {

    },
    focus: function (index) {
        if(index == undefined){
            APP.focus(this.$cells[Math.floor(this.dimension.y/2) * this.dimension.x + Math.floor(this.dimension.x/2)]);
        }
        else
            APP.focus(this.$cells[index]);
    },
    lost: function(){

        this.gameOver = true;

        var $allCells = this.el.find('.cell');
        var $hidden = $allCells.filter('.hidden');
        var $flagged = $allCells.filter('.flag');
        var $questionMarks = $allCells.filter('.questionMark');

        checkFlaggedCells.call(this, $flagged);
        checkQuestionMarks.call(this, $questionMarks);
        var index = 0, cellArr;
        console.log(this.gridArray);

        for(var i = 0; i < $hidden.length; ++i){
            var $cell = $($hidden[i]);

            index = this.$cells.index($cell);
            cellArr = this.gridArray[index];
            console.log(cellArr.value, ' : ', cellArr.tempValue);
            if(cellArr.value == 2){
                $cell.removeClass('hidden questionMark').addClass('explosed');
            }

        }
        this.$dialog.addClass('lost');
        this.$dialog.find('.text').html('');

        this.showDialog();
		document.getElementById('colorButtons').children[5].textContent = 'Nová hra';
        //this.handleNewGame();

        function checkFlaggedCells($flagged) {
            for (var i = 0; i < $flagged.length; i++) {
                var $cell = $($flagged[i]);

                var index = this.$cells.index($cell);
                cell = this.gridArray[index];
                if(cell.tempValue === 2 && cell.value === 3){
                    $cell.removeClass('flag').addClass('flagged-mine');
                }
            }
        }

        function checkQuestionMarks($cells) {
            for (var i = 0; i < $cells.length; i++) {
                var $cell = $($cells[i]);

                var index = this.$cells.index($cell);
                cell = this.gridArray[index];
                if(cell.tempValue === 2){
                    $cell.removeClass('questionMark').addClass('explosed');
                }
            }
        }
    },
    mineChecked: function(cellArr, index){
        var flagsLeft = parseInt(this.$remainMines.html());

        if(cellArr.value == 3){
            cellArr.value = 6;
            $(this.$cells[index]).removeClass('flag').addClass('questionMark');
            if(cellArr.tempValue === 2) {
                this.actualMineNumber++;
            }
            this.$remainMines.html(flagsLeft + 1);

           return;
        }
        else if(cellArr.value == 2){
            if (!flagsLeft) {
                return ;
            }
            --this.actualMineNumber;
            if(this.actualMineNumber < 1){
                this.won();
            }
        }
        if (!flagsLeft) {
            return;
        }
        this.$remainMines.html(flagsLeft - 1);
        cellArr.tempValue = 0 + cellArr.value;
        $(this.$cells[index]).addClass('flag').removeClass('hidden');
        cellArr.value = 3;


    },
    onFocus: function (el) {
        // for mouse control if you have to do something with focused element
    },
    onEnter: function(rightButton){
        /*
         * 0 - empty cell hidden
         * 1 - empty cell showed
         * 2 - mine cell hidden
         * 3 - mine cell marked
         * 4 - number cell hidden
         * 5 - number cell clicked
         * 6 - question mark
         */

        var focused = Main.focused;
        var index = this.$cells.index(focused);
        var cellArr =this.gridArray[index];
        if(!this.isRunning)
            this.setCounter();
        if(this.$dialog.is(':visible')){
            this.handleNewGame();
            this.$dialog.removeClass('lost');
            this.$dialog.hide();
        }
        else if(rightButton){
            if(cellArr.value == 6){

                cellArr.value = 0 + cellArr.tempValue;
                $(this.$cells[index]).addClass('hidden').removeClass('questionMark');

            }
            else if( cellArr.value % 2 == 0 || cellArr.value == 3)
            {
                this.mineChecked(cellArr, index);
            }

        }
        else{
            if (cellArr.value == 6 || cellArr.value == 3)
                return;

            var isMine = this.gridArray[index].value == 2;
            console.log("is mine ", isMine);
            if(isMine){

                $(focused).addClass('clicked-bomb');
                this.lost();
            }
            else
            {
                this.pressed(index, false);
            }
        }

    },
    pressed:function(index, deep, afterWon) {
        if(index < 0 || index >= this.gridArray.length || this.gameOver)
            return;

        var cellArr = this.gridArray[index];
        var $cell = $(this.$cells[index]);

        if (cellArr.value == 0) { // 0 SKRYTE PRAZDNE
            $cell.addClass('empty').removeClass('hidden');
            cellArr.value = 1;

            if (!afterWon) {
                this.pressed(index - this.dimension.x, true); // hore
                if (index % this.dimension.x != 0) this.pressed(index - this.dimension.x - 1, true); // hore vlavo
                if ((index + 1) % this.dimension.x != 0) this.pressed(index - this.dimension.x + 1, true); // hore vpravo
                if ((index + 1) % this.dimension.x != 0) this.pressed(index + this.dimension.x + 1, true); // dole vpravo
                if (index % this.dimension.x != 0) this.pressed(index + this.dimension.x - 1, true); // dole vlavo
                this.pressed(index + this.dimension.x, true); // dole
                if ((index + 1) % this.dimension.x != 0) this.pressed(index + 1, true); // vpravo
                if (index % this.dimension.x != 0) this.pressed(index - 1, true); // vlavo
            }
        } else if(cellArr.value == 4) { // 4 SKYTE CISLO
            $cell.find('span.num').html(cellArr.num);
            $cell.removeClass('hidden').addClass('number');
            cellArr.value = 5;
        } else if (cellArr.value == 5 && !deep) { // 5 ODHALENE CISLO - nic
            this.shownNumberPressed(index - this.dimension.x, true); // hore
            if (index % this.dimension.x != 0) this.shownNumberPressed(index - this.dimension.x - 1, true); // hore vlavo
            if ((index + 1) % this.dimension.x != 0) this.shownNumberPressed(index - this.dimension.x + 1, true); // hore vpravo
            if ((index + 1) % this.dimension.x != 0) this.shownNumberPressed(index + this.dimension.x + 1, true); // dole vpravo
            if (index % this.dimension.x != 0) this.shownNumberPressed(index + this.dimension.x - 1, true); // dole vlavo
            this.shownNumberPressed(index + this.dimension.x, true); // dole
            if ((index + 1) % this.dimension.x != 0) this.shownNumberPressed(index + 1, true); // vpravo
            if (index % this.dimension.x != 0) this.shownNumberPressed(index - 1, true); // vlavo
        }

    },

    shownNumberPressed: function (index) {
        if(index < 0 || index >= this.gridArray.length || this.gameOver)
            return;

        var cellArr = this.gridArray[index];
        var $cell = $(this.$cells[index]);

        // 2 SKRYTA BOMBA - koniec hry
        var isMine = cellArr.value == 2;
        console.log("is mine ", isMine);
        if(isMine){
            $cell.addClass('clicked-bomb');
            this.lost();
        }

        // rekurzivne hladaj skryte prazdne policka a cisla a otvaraj ich
        if (cellArr.value == 0) { // 0 SKRYTE PRAZDNE - skumaj dalej
            $cell.addClass('empty').removeClass('hidden');
            cellArr.value = 1;

            this.shownNumberPressed(index - this.dimension.x, true); // hore
            if (index % this.dimension.x != 0) this.shownNumberPressed(index - this.dimension.x - 1, true); // hore vlavo
            if ((index + 1) % this.dimension.x != 0) this.shownNumberPressed(index - this.dimension.x + 1, true); // hore vpravo
            if ((index + 1) % this.dimension.x != 0) this.shownNumberPressed(index + this.dimension.x + 1, true); // dole vpravo
            if (index % this.dimension.x != 0) this.shownNumberPressed(index + this.dimension.x - 1, true); // dole vlavo
            this.shownNumberPressed(index + this.dimension.x, true); // dole
            if ((index + 1) % this.dimension.x != 0) this.shownNumberPressed(index + 1, true); // vpravo
            if (index % this.dimension.x != 0) this.shownNumberPressed(index - 1, true); // vlavo

        } else if(cellArr.value == 4) { // 4 SKYTE CISLO - ukonci
            $cell.find('span.num').html(cellArr.num);
            $cell.removeClass('hidden').addClass('number');
            cellArr.value = 5;
        }
    },

    onReturn: function(){
		document.getElementById("colorButtons").style.paddingLeft = "830px";
		document.getElementById("colorButtons").innerHTML = '<span class="btn red"></span><span id="redtxt">Ukončiť</span> <span class="btn yellow"></span><span id="bluetxt">Aplikácie</span>';
		this.el.removeClass(APP.level);
		APP.scene('welcome');
    },
    navigate: function(direction){
        var focused = $(Main.focused);
        var index = this.$cells.index(focused);
        if(direction == "up" || direction == "down"){
            var dir = direction == "down" ? 1 : -1;

            index += this.dimension.x * dir;
        }
        else{
            var dir = direction == "left" ? -1 : 1;
            index += dir;
        }

        if(index >= this.$cells.length || index < 0)
            return;
        APP.focus(this.$cells[index]);
    },
    keyDown: function (keyCode, status) {
        this.prevDirection = this.direction + "";
        if(this.disableControl)
            return;
        switch (keyCode) {
            case Main.key.ENTER:
                this.onEnter();
                break;
            case Main.key.DOWN:
                this.navigate("down");
                break;
            case Main.key.UP:
                this.navigate("up");
                break;
            case Main.key.RIGHT:
                this.navigate("right");
                break;
            case Main.key.LEFT:
                this.navigate("left");
                break;
            case Main.key.YELLOW:
                this.onEnter(true);
                break;
            case Main.key.RED:
                HbbTV.closeApplication();
                break;
            case 461:
                this.onReturn(true);
                break;
                /*case Main.key.ONE:
                 this.switchLevel(1);
                 break;
                 case Main.key.TWO:
                 this.switchLevel(2);
                 break;
                 case Main.key.THREE:
                 this.switchLevel(3);
                 break;
                 case Main.key.FOUR:
                 this.switchLevel(4);
                 break;
                 case Main.key.FIVE:
                 this.switchLevel(5);
                 break;
                 case Main.key.SIX:
                 this.switchLevel(6);
                 break;
                 case Main.key.SEVEN:
                 this.switchLevel(7);
                 break;
                 case Main.key.EIGHT:
                 this.switchLevel(8);
                 break;
                 case Main.key.NINE:
                 this.switchLevel(9);
                 break;*/
            default:
                return true;
        }

        return false;
    }

        });

    this.init.apply(this, arguments);
};
