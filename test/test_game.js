



function Game() {

var Infval1 = 10;
var Infval2 = 10;
//test


//this.LoadContent = function () {
// load content � graphics, sound etc.
//var ourGame = this;
//$(document).bind('keyup', function (event) {
//ourGame.Update(event);
//ourGame.Draw();
//});
//}

//this.Update = function() {
//update game variables, handle user input, perform calculations etc.
//}

//test


this.Draw = function (Infantry1,Infantry2) {

var _canvas = document.getElementById('Army1_Display');
var _canvasContext = null;

if (_canvas && _canvas.getContext) {
    //check whether browser support getting canvas context
    _canvasContext = _canvas.getContext('2d');
    _canvasContext.clearRect ( 0 , 0 , 350 , 28 );
    _canvasContext.fillStyle = "rgb(127,0,0)";
    _canvasContext.font = "bold 26px sans-serif";
    _canvasContext.fillText('Infantry : ' + Infantry1, 10, 20);}

var _canvas = document.getElementById('Army2_Display');
var _canvasContext = null;

if (_canvas && _canvas.getContext) {
    //check whether browser support getting canvas context
    _canvasContext = _canvas.getContext('2d');
    _canvasContext.clearRect ( 0 , 0 , 350 , 28);
    _canvasContext.fillStyle = "#3D33C9";
    _canvasContext.font = "bold 26px sans-serif";
    _canvasContext.fillText('Infantry : ' + Infantry2, 10, 20);}


var _canvas = document.getElementById('Army1_Visual_Display');
var _canvasContext = null;
var blocks = Infantry1 / 10;
var x = 1;
var locateblock_horizontal = 10;

if (_canvas && _canvas.getContext) {
    _canvasContext = _canvas.getContext('2d');
    _canvasContext.clearRect ( 0 , 0 , 100 , 450 );
    _canvasContext.fillStyle = "rgb(127,0,0)";
for (x=1;x<=blocks;x++)
{
  var locateblock_veritical = x * 4;
  _canvasContext.fillRect(locateblock_horizontal,locateblock_veritical,20,10);       } 
  
}


var _canvas = document.getElementById('Army2_Visual_Display');
var _canvasContext = null;
var blocks = Infantry2 / 10;
var x = 1;
var locateblock_horizontal = 10;

if (_canvas && _canvas.getContext) {
    _canvasContext = _canvas.getContext('2d');
    _canvasContext.clearRect ( 0 , 0 , 100 , 450 );
    _canvasContext.fillStyle = "#3D33C9";
for (x=1;x<=blocks;x++)
{
  var locateblock_veritical = x * 4;
  _canvasContext.fillRect(locateblock_horizontal,locateblock_veritical,20,10);       } 
  
}
    
                        


}


showInfantry1Value = function(newValue)
{
    document.getElementById('infantry1valuedisplay').innerHTML = newValue;   
    Infval1 = parseInt(document.getElementById('infantry1valuedisplay').innerHTML);
   
   this.Draw(Infval1,Infval2);
}
    


showInfantry2Value = function(newValue)
{
    document.getElementById('infantry2valuedisplay').innerHTML = newValue;
   Infval2 = parseInt(document.getElementById('infantry2valuedisplay').innerHTML);
   
   this.Draw(Infval1,Infval2);

}


//accepting battle initiation submission and displaying results
InitiateBattlebtn = function(){
Infval1 = parseInt(document.getElementById('Infantry1').value);
Infval2 = parseInt(document.getElementById('Infantry2').value);
window.location.href = "battle.php?phpInfval1=" + Infval1 + "&phpInfval2=" + Infval2;
}







this.Draw(Infval1,Infval2);


}

Game();




