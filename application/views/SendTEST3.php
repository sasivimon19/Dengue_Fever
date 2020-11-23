<button id="goFS">Go fullscreen</button>



<script>
  var goFS = document.getElementById("goFS");
  goFS.addEventListener("click", function() {
      
      
     
      
   const elem = document.documentElement;

//   if (elem.requestFullscreen) {
//       
//       elem.requestFullscreen()
//   }
   
  }, false);

</script>


<button id="myBtn">Try it</button>



<p id="demo"></p>

<script>
    document.getElementById("myBtn").addEventListener("click", function(){
    
    document.getElementById("demo").innerHTML = "Hello World";
    

});
</script>



<!--<button onclick="myFunction()">Try it</button>

<p id="demo1"></p>
<p id="demo2"></p>

<script>
    
var fruits = ["Banana", "Orange", "Apple", "Mango"];
document.getElementById("demo1").innerHTML = fruits;

function myFunction() {
  document.getElementById("demo2").innerHTML = fruits.push("Kiwi");
  document.getElementById("demo1").innerHTML = fruits;
}
</script>-->



<button id="GGGGG">GGGG</button>

<p id="demo1"></p>
<p id="demo2"></p>

<script>
    
var fruits = [];
document.getElementById("demo1").innerHTML = fruits;

//function myFunction() {
 var GGGGG = document.getElementById("GGGGG");
  GGGGG.addEventListener("click", function() {
      
  document.getElementById("demo2").innerHTML = fruits.push("UUUUU");
  document.getElementById("demo1").innerHTML = fruits;
  
    });


</script>

<button onclick="openRequestedPopup()">8888</button>

<script>
  var windowObjectReference;
  var strWindowFeatures = "menubar=no,location=no,resizable=no,scrollbars=no,status=yes,width=400,height=350";

     function openRequestedPopup() {

      windowObjectReference = window.open("https://www.google.com/search?sxsrf=ALeKk00UqPgUXdXiBCkC-jbX-_GNH2aA3A:1603855123233&q=window+object+reference+%E0%B8%84%E0%B8%B7%E0%B8%AD%E0%B8%AD%E0%B8%B0%E0%B9%84%E0%B8%A3&spell=1&sa=X&ved=2ahUKEwjpv5D3qdbsAhWUaCsKHRCPBYgQBSgAegQICBAu&biw=1536&bih=754", "CNN_WindowName", strWindowFeatures);
 };
</script>