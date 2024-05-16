const button=document.getElementById("Btn");
const output=document.getElementById("output")
const input=document.getElementById("Input")


button.addEventListener("click",function()
{
   const userinput=input.value;
   output.textContent=userinput;
   output.style.backgroundColor="yellow";
});