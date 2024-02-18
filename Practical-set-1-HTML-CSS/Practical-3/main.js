let icon = document.querySelector(".bx") 
 
icon.addEventListener("click",() => { 
   icon.classList.toggle("bx-menu") 
   icon.classList.toggle("bx-x") 
   let opsm = document.querySelector(".opsm") 
   if(icon.classList.contains("bx-menu")){ 
      opsm.style.transform = "translateY(-100vh)" 
   } 
   else{ 
      opsm.style.transform = "translateY(0)" 
   } 
})